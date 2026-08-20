<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpecializationController extends Controller
{
    public function index()
    {
        $specializations = Specialization::withCount(['hospitals', 'specialists'])
            ->latest()
            ->paginate(15);

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
            $validated['image'] = $request->file('image')->store('images/specializations', 'imageDisk');
        }

        Specialization::create($validated);

        return redirect()->route("dashboard.specializations.index")->with("success", "تم إضافة التخصص بنجاح.");
    }

    public function show(Specialization $specialization)
    {
        $specialization->load(['hospitals' => function ($query) {
            $query->withCount('specialists');
        }, 'specialists' => function ($query) {
            $query->with('hospital');
        }])
        ->loadCount(['hospitals', 'specialists']);

        return view("dashboard.specializations.show", compact("specialization"));
    }

    public function edit(Specialization $specialization)
    {
        return view("dashboard.specializations.edit", compact("specialization"));
    }

    public function update(Request $request, Specialization $specialization)
    {
        $validated = $request->validate([
            "name" => "sometimes|required|string|max:255",
            "image" => "sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        if ($request->hasFile('image')) {
            if ($specialization->image) {
                Storage::disk('imageDisk')->delete($specialization->image);
            }

            $validated['image'] = $request->file('image')->store('images/specializations', 'imageDisk');
        }

        $specialization->update($validated);

        return redirect()->route("dashboard.specializations.index")->with("success", "تم تحديث التخصص بنجاح.");
    }

    public function destroy(Specialization $specialization)
    {
        if ($specialization->image) {
            Storage::disk('imageDisk')->delete($specialization->image);
        }

        $specialization->delete();
        return redirect()->route("dashboard.specializations.index")->with("success", "تم حذف التخصص بنجاح.");
    }
}
