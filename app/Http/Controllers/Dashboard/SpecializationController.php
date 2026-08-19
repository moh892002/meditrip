<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Specializtion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    public function index()
    {
        $specializations = Specializtion::withCount(['hospitals', 'specialists'])
            ->latest()
            ->get();

        return view("dashboard.specializations.index", compact("specializations"));
    }

    public function create()
    {
        return view("dashboard.specializations.create");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string|max:255",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store("images/specializations", "imageDisk");
            $validated['image'] = $path;
        }

        Specializtion::create($validated);

        return redirect()->route("dashboard.specializations.index")->with("success", "Specialization created successfully.");
    }

    public function show(Specializtion $specialization)
    {
        $specialization->load(['hospitals' => function ($query) {
            $query->withCount('specialists');
        }, 'specialists' => function ($query) {
            $query->with('hospital');
        }])
        ->loadCount(['hospitals', 'specialists']);

        return view("dashboard.specializations.show", compact("specialization"));
    }

    public function edit(Specializtion $specialization)
    {
        return view("dashboard.specializations.edit", compact("specialization"));
    }

    public function update(Request $request, Specializtion $specialization)
    {
        $validated = $request->validate([
            "name" => "required|string|max:255",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        if ($request->hasFile('image')) {
            if ($specialization->image && file_exists(public_path($specialization->image))) {
                Storage::disk('imageDisk')->delete($specialization->image);
            }

            $image = $request->file('image');
            $path = $image->store("images/specializations", "imageDisk");
            $validated['image'] = $path;
        }

        $specialization->update($validated);

        return redirect()->route("dashboard.specializations.index")->with("success", "Specialization updated successfully.");
    }

    public function destroy(Specializtion $specialization)
    {
        if ($specialization->image && file_exists(public_path($specialization->image))) {
            Storage::disk('imageDisk')->delete($specialization->image);
        }

        $specialization->delete();
        return redirect()->route("dashboard.specializations.index")->with("success", "Specialization deleted successfully.");
    }
}
