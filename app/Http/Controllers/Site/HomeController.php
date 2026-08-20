<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\Rate;
use App\Models\Specialist;
use App\Models\Specialization;

class HomeController extends Controller
{
    public function index()
    {
        $specializations = Specialization::withCount('hospitals')->latest()->take(10)->get();

        $hospitals = Hospital::withAvg('rates', 'rating')
            ->withCount('rates')
            ->latest()
            ->take(3)
            ->get();

        $specialists = Specialist::with('specialization')
            ->orderByDesc('rate')
            ->take(4)
            ->get();

        $rates = Rate::with(['user', 'hospital'])
            ->latest()
            ->take(5)
            ->get();

        $stats = [
            'hospitals' => Hospital::count(),
            'specialists' => Specialist::count(),
            'specializations' => Specialization::count(),
            'beneficiaries' => max(Hospital::sum('operations_count'), Hospital::count() * 50),
            'rates' => Rate::count(),
        ];

        return view('meditrip.index', compact('specializations', 'hospitals', 'specialists', 'rates', 'stats'));
    }
}
