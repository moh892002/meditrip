<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function index()
    {
        $rates = Rate::with(['user', 'hospital'])->latest()->paginate(15);

        return view("dashboard.rates.index", compact("rates"));
    }

    public function show(Rate $rate)
    {
        $rate->load(['user', 'hospital']);

        return view("dashboard.rates.show", compact("rate"));
    }

    public function destroy(Rate $rate)
    {
        $rate->delete();
        return redirect()->route("dashboard.rates.index")->with("success", "تم حذف التقييم بنجاح.");
    }
}
