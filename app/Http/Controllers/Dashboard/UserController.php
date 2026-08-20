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
        $user->delete();
        return redirect()->route("dashboard.users.index")->with("success", "تم حذف المستخدم بنجاح.");
    }
}
