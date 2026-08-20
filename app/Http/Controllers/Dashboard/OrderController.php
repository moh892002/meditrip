<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Hospital;
use App\Models\Specialization;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['hospital', 'specialization', 'user'])->latest()->paginate(15);

        return view("dashboard.orders.index", compact("orders"));
    }

    public function show(Order $order)
    {
        $order->load(['hospital', 'specialization', 'user']);

        return view("dashboard.orders.show", compact("order"));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            "status" => "required|in:pending,processing,completed,cancelled",
        ]);

        $order->update($validated);
        return redirect()->route("dashboard.orders.show", $order)->with("success", "تم تحديث حالة الطلب بنجاح.");
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route("dashboard.orders.index")->with("success", "تم حذف الطلب بنجاح.");
    }
}
