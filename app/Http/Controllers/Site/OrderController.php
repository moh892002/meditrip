<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\Order;
use App\Models\Specialization;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Start the quote flow for a hospital.
     */
    public function start(Hospital $hospital, Request $request)
    {
        $quote = ['hospital_id' => $hospital->id];

        // Capture any details provided by the quick-quote form on the hospital page.
        foreach (['patient_name', 'patient_email', 'patient_phone', 'disease_description', 'specialization_id'] as $field) {
            if ($request->filled($field)) {
                $quote[$field] = $request->input($field);
            }
        }

        session(['quote' => $quote]);

        // If a specialization was already chosen, skip step 1.
        if (! empty($quote['specialization_id'])) {
            return redirect()->route('q2');
        }

        return redirect()->route('questions');
    }

    /**
     * Show step 1: choose a specialization.
     */
    public function question1()
    {
        $specializations = Specialization::all();

        return view('meditrip.questions', compact('specializations'));
    }

    /**
     * Store step 1 and move to step 2.
     */
    public function storeQuestion1(Request $request)
    {
        $validated = $request->validate([
            'specialization_id' => ['required', 'exists:specializations,id'],
        ]);

        $quote = session('quote', []);
        $quote['specialization_id'] = $validated['specialization_id'];
        session(['quote' => $quote]);

        return redirect()->route('q2');
    }

    /**
     * Show step 2: what do you want to do.
     */
    public function question2()
    {
        return view('meditrip.q2');
    }

    /**
     * Store step 2 and move to step 3.
     */
    public function storeQuestion2(Request $request)
    {
        $validated = $request->validate([
            'plan' => ['required', 'string'],
        ]);

        $quote = session('quote', []);
        $quote['plan'] = $validated['plan'];
        session(['quote' => $quote]);

        return redirect()->route('q3');
    }

    /**
     * Show step 3: when did you do the tests.
     */
    public function question3()
    {
        return view('meditrip.q3');
    }

    /**
     * Store step 3 and move to step 4.
     */
    public function storeQuestion3(Request $request)
    {
        $validated = $request->validate([
            'tests_timing' => ['required', 'string'],
        ]);

        $quote = session('quote', []);
        $quote['tests_timing'] = $validated['tests_timing'];
        session(['quote' => $quote]);

        return redirect()->route('q4');
    }

    /**
     * Show step 4: upload the tests files.
     */
    public function question4()
    {
        return view('meditrip.q4');
    }

    /**
     * Store step 4 and move to step 5.
     */
    public function storeQuestion4(Request $request)
    {
        $request->validate([
            'files' => ['nullable', 'file', 'mimes:pdf,doc,docx,jpg,jpeg,png,zip', 'max:5120'],
        ]);

        $quote = session('quote', []);

        if ($request->hasFile('files')) {
            $quote['files'] = $request->file('files')->store('order-files', 'imageDisk');
        }

        session(['quote' => $quote]);

        return redirect()->route('q5');
    }

    /**
     * Show step 5: additional notes.
     */
    public function question5()
    {
        return view('meditrip.q5');
    }

    /**
     * Store step 5 and move to the summary page.
     */
    public function storeQuestion5(Request $request)
    {
        $validated = $request->validate([
            'notes' => ['nullable', 'string', 'max:5000'],
        ]);

        $quote = session('quote', []);
        $quote['notes'] = $validated['notes'] ?? null;
        session(['quote' => $quote]);

        return redirect()->route('order');
    }

    /**
     * Show the quote summary before submission.
     */
    public function summary()
    {
        $quote = session('quote');

        abort_if(empty($quote) || empty($quote['hospital_id']), 404);

        $hospital = Hospital::withAvg('rates', 'rating')->withCount('rates')->findOrFail($quote['hospital_id']);
        $specialization = isset($quote['specialization_id']) ? Specialization::find($quote['specialization_id']) : null;

        return view('meditrip.order', compact('quote', 'hospital', 'specialization'));
    }

    /**
     * Submit the order.
     */
    public function store(Request $request)
    {
        $quote = session('quote');

        abort_if(empty($quote) || empty($quote['hospital_id']), 404);

        $validated = $request->validate([
            'patient_name' => ['nullable', 'string', 'max:255'],
            'patient_email' => ['nullable', 'string', 'email', 'max:255'],
            'patient_phone' => ['nullable', 'string', 'max:255'],
        ]);

        $notes = [];
        if (! empty($quote['plan'])) {
            $notes[] = 'الهدف: ' . $quote['plan'];
        }
        if (! empty($quote['tests_timing'])) {
            $notes[] = 'موعد إجراء الفحوصات: ' . $quote['tests_timing'];
        }
        if (! empty($quote['notes'])) {
            $notes[] = 'ملاحظات: ' . $quote['notes'];
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'hospital_id' => $quote['hospital_id'],
            'specialization_id' => $quote['specialization_id'] ?? null,
            'status' => 'pending',
            'notes' => implode("\n", $notes) ?: null,
            'files' => $quote['files'] ?? null,
            'patient_name' => $quote['patient_name'] ?? $validated['patient_name'] ?? auth()->user()?->name,
            'patient_email' => $quote['patient_email'] ?? $validated['patient_email'] ?? auth()->user()?->email,
            'patient_phone' => $quote['patient_phone'] ?? $validated['patient_phone'] ?? auth()->user()?->phone,
            'disease_description' => $quote['disease_description'] ?? $quote['notes'] ?? null,
        ]);

        session()->forget('quote');

        return redirect()->route('request-details', $order)->with('success', 'تم إرسال طلب عرض السعر بنجاح.');
    }

    /**
     * Show a single order details page.
     */
    public function show(Order $order)
    {
        abort_unless($order->user_id === auth()->id(), 403);

        $order->load(['hospital', 'specialization']);

        return view('meditrip.request-details', compact('order'));
    }
}
