<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Specialization;

class SpecializationController extends Controller
{
    /**
     * Display a listing of specializations.
     */
    public function index()
    {
        $specializations = Specialization::withCount('hospitals')
            ->latest()
            ->get();

        return view('meditrip.specializations', compact('specializations'));
    }

    /**
     * Display the specified specialization and its hospitals.
     */
    public function show(Specialization $specialization)
    {
        $specialization->load(['hospitals' => function ($query) {
            $query->withAvg('rates', 'rating');
        }, 'specialists']);

        return view('meditrip.specialization-details', compact('specialization'));
    }
}
