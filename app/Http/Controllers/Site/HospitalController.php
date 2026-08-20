<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\Specialization;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of hospitals.
     */
    public function index(Request $request)
    {
        $query = Hospital::with(['specializations'])
            ->withAvg('rates', 'rating')
            ->withCount('rates');

        // Search by name
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by city
        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }

        // Filter by specialization
        if ($request->filled('specialization')) {
            $query->whereHas('specializations', fn ($q) => $q->where('specializations.id', $request->specialization));
        }

        $hospitals = $query->latest()->paginate(10)->withQueryString();

        $cities = Hospital::select('city')->distinct()->orderBy('city')->pluck('city');
        $specializations = Specialization::orderBy('name')->get();

        return view('meditrip.hospitals', compact('hospitals', 'cities', 'specializations'));
    }

    /**
     * Display the specified hospital.
     */
    public function show(Hospital $hospital)
    {
        $hospital->load(['specializations', 'specialists.specialization', 'offers', 'rates.user'])
            ->loadAvg('rates', 'rating')
            ->loadCount('rates');

        $otherHospitals = Hospital::where('id', '!=', $hospital->id)
            ->withAvg('rates', 'rating')
            ->withCount('rates')
            ->inRandomOrder()
            ->take(3)
            ->get();

        $userRate = auth()->check()
            ? $hospital->rates()->where('user_id', auth()->id())->first()
            : null;

        return view('meditrip.hospital-details', compact('hospital', 'otherHospitals', 'userRate'));
    }
}
