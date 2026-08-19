<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Order;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the user's profile with their orders.
     */
    public function index()
    {
        $user = auth()->user();

        $orders = Order::with(['hospital', 'specialization'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        $articles = Article::latest()->take(4)->get();

        return view('meditrip.profile', compact('user', 'orders', 'articles'));
    }

    /**
     * Show the user info edit form.
     */
    public function edit()
    {
        $user = auth()->user();

        return view('meditrip.user-info', compact('user'));
    }

    /**
     * Update the user's profile.
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'password' => ['nullable', 'confirmed', 'min:8'],
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'country' => $validated['country'] ?? null,
        ];

        if (! empty($validated['password'])) {
            $data['password'] = bcrypt($validated['password']);
        }

        $user->update($data);

        return redirect()->route('profile')->with('success', 'تم تحديث بياناتك بنجاح.');
    }

    /**
     * Delete one of the user's orders.
     */
    public function destroyOrder(Order $order)
    {
        abort_unless($order->user_id === auth()->id(), 403);

        $order->delete();

        return back()->with('success', 'تم حذف الطلب بنجاح.');
    }
}
