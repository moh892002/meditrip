<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(15);

        return view("dashboard.users.index", compact("users"));
    }

    public function show(User $user)
    {
        $user->loadCount('orders');

        return view("dashboard.users.show", compact("user"));
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->withErrors(['error' => 'لا يمكنك حذف حسابك الخاص.']);
        }

        if ($user->is_admin && User::where('is_admin', true)->count() <= 1) {
            return back()->withErrors(['error' => 'لا يمكنك حذف آخر مدير في النظام.']);
        }

        $user->delete();
        return redirect()->route("dashboard.users.index")->with("success", "تم حذف المستخدم بنجاح.");
    }
}
