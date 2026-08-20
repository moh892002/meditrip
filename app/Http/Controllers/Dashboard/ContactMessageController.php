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
        if ($message->status !== 'read') {
            $message->update(['status' => 'read']);
        }

        return view("dashboard.messages.show", compact("message"));
    }

    public function markRead(ContactMessage $message)
    {
        $message->update(['status' => 'read']);
        return redirect()->route("dashboard.messages.show", $message)->with("success", "تم تحديد الرسالة كمقروءة.");
    }

    public function destroy(ContactMessage $message)
    {
        if ($message->file && file_exists(public_path($message->file))) {
            unlink(public_path($message->file));
        }

        $message->delete();
        return redirect()->route("dashboard.messages.index")->with("success", "تم حذف الرسالة بنجاح.");
    }
}
