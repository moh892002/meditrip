<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    /**
     * Store a new rating for a hospital.
     */
    public function store(Request $request, Hospital $hospital)
    {
        $validated = $request->validate([
            'rating' => ['required', 'numeric', 'min:1', 'max:5'],
            'review' => ['nullable', 'string', 'max:2000'],
        ]);

        // One review per user per hospital: update the existing one if present.
        Rate::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'hospital_id' => $hospital->id,
            ],
            [
                'rating' => $validated['rating'],
                'review' => $validated['review'] ?? null,
            ]
        );

        return back()->with('success', 'شكراً لك، تم إضافة تقييمك بنجاح.');
    }
}
