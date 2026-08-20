<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Specializtion;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    public function index()
    {
        $specializations = Specializtion::withCount(['hospitals', 'specialists'])
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
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/specializations'), $imageName);
            $validated['image'] = 'images/specializations/' . $imageName;
        }

        Specializtion::create($validated);

        return redirect()->route("dashboard.specializations.index")->with("success", "تم إضافة التخصص بنجاح.");
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
            "name" => "sometimes|required|string|max:255",
            "image" => "sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        if ($request->hasFile('image')) {
            if ($specialization->image && file_exists(public_path($specialization->image))) {
                unlink(public_path($specialization->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/specializations'), $imageName);
            $validated['image'] = 'images/specializations/' . $imageName;
        }

        $specialization->update($validated);

        return redirect()->route("dashboard.specializations.index")->with("success", "تم تحديث التخصص بنجاح.");
    }

    public function destroy(Specializtion $specialization)
    {
        if ($specialization->image && file_exists(public_path($specialization->image))) {
            unlink(public_path($specialization->image));
        }

        $specialization->delete();
        return redirect()->route("dashboard.specializations.index")->with("success", "تم حذف التخصص بنجاح.");
    }
}
