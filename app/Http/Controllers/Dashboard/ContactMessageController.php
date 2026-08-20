<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(15);

        return view("dashboard.messages.index", compact("messages"));
    }

    public function show(ContactMessage $message)
    {
        return view("dashboard.messages.show", compact("message"));
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return redirect()->route("dashboard.messages.index")->with("success", "تم حذف الرسالة بنجاح.");
    }
}
