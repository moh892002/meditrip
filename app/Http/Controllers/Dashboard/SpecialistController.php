<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Specialist;
use App\Models\Hospital;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpecialistController extends Controller
{
    public function index()
    {
        $specialists = Specialist::with(['hospital', 'specialization'])->latest()->paginate(15);

        return view("dashboard.specialists.index", compact("specialists"));
    }

    public function create()
    {
        $hospitals = Hospital::orderBy('name')->get();
        $specializations = Specialization::orderBy('name')->get();

        return view("dashboard.specialists.create", compact("hospitals", "specializations"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string|max:255",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "hospital_id" => "required|exists:hospitals,id",
            "specialization_id" => "required|exists:specializations,id",
            "rate" => "nullable|numeric|min:0|max:5",
            "description" => "nullable|string",
            "price" => "nullable|numeric|min:0",
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images/specialists', 'imageDisk');
        }

        Specialist::create($validated);

        return redirect()->route("dashboard.specialists.index")->with("success", "تم إضافة الأخصائي بنجاح.");
    }

    public function show(Specialist $specialist)
    {
        $specialist->load(['hospital', 'specialization']);

        return view("dashboard.specialists.show", compact("specialist"));
    }

    public function edit(Specialist $specialist)
    {
        $hospitals = Hospital::orderBy('name')->get();
        $specializations = Specialization::orderBy('name')->get();

        return view("dashboard.specialists.edit", compact("specialist", "hospitals", "specializations"));
    }

    public function update(Request $request, Specialist $specialist)
    {
        $validated = $request->validate([
            "name" => "sometimes|required|string|max:255",
            "image" => "sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "hospital_id" => "sometimes|required|exists:hospitals,id",
            "specialization_id" => "sometimes|required|exists:specializations,id",
            "rate" => "sometimes|nullable|numeric|min:0|max:5",
            "description" => "sometimes|nullable|string",
            "price" => "sometimes|nullable|numeric|min:0",
        ]);

        if ($request->hasFile('image')) {
            if ($specialist->image) {
                Storage::disk('imageDisk')->delete($specialist->image);
            }

            $validated['image'] = $request->file('image')->store('images/specialists', 'imageDisk');
        }

        $specialist->update($validated);
        return redirect()->route("dashboard.specialists.index")->with("success", "تم تحديث بيانات الأخصائي بنجاح.");
    }

    public function destroy(Specialist $specialist)
    {
        if ($specialist->image) {
            Storage::disk('imageDisk')->delete($specialist->image);
        }

        $specialist->delete();
        return redirect()->route("dashboard.specialists.index")->with("success", "تم حذف الأخصائي بنجاح.");
    }
}
