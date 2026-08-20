<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Hospital;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::with('hospital')->latest()->paginate(15);

        return view("dashboard.offers.index", compact("offers"));
    }

    public function create()
    {
        $hospitals = Hospital::orderBy('name')->get();

        return view("dashboard.offers.create", compact("hospitals"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string|max:255",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "price" => "required|numeric|min:0",
            "offer_price" => "required|numeric|min:0",
            "hospital_id" => "required|exists:hospitals,id",
            "description" => "nullable|string",
            "valid_until" => "nullable|date",
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/offers'), $imageName);
            $validated['image'] = 'images/offers/' . $imageName;
        }

        Offer::create($validated);

        return redirect()->route("dashboard.offers.index")->with("success", "تم إضافة العرض بنجاح.");
    }

    public function show(Offer $offer)
    {
        $offer->load('hospital');

        return view("dashboard.offers.show", compact("offer"));
    }

    public function edit(Offer $offer)
    {
        $hospitals = Hospital::orderBy('name')->get();

        return view("dashboard.offers.edit", compact("offer", "hospitals"));
    }

    public function update(Request $request, Offer $offer)
    {
        $validated = $request->validate([
            "name" => "sometimes|required|string|max:255",
            "image" => "sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "price" => "sometimes|required|numeric|min:0",
            "offer_price" => "sometimes|required|numeric|min:0",
            "hospital_id" => "sometimes|required|exists:hospitals,id",
            "description" => "sometimes|nullable|string",
            "valid_until" => "sometimes|nullable|date",
        ]);

        if ($request->hasFile('image')) {
            if ($offer->image && file_exists(public_path($offer->image))) {
                unlink(public_path($offer->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/offers'), $imageName);
            $validated['image'] = 'images/offers/' . $imageName;
        }

        $offer->update($validated);
        return redirect()->route("dashboard.offers.index")->with("success", "تم تحديث العرض بنجاح.");
    }

    public function destroy(Offer $offer)
    {
        if ($offer->image && file_exists(public_path($offer->image))) {
            unlink(public_path($offer->image));
        }

        $offer->delete();
        return redirect()->route("dashboard.offers.index")->with("success", "تم حذف العرض بنجاح.");
    }
}
