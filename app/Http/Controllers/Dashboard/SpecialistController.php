<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Specialist;
use App\Models\Hospital;
use App\Models\Specializtion;
use Illuminate\Http\Request;

class SpecialistController extends Controller
{
    public function index()
    {
        $specialists = Specialist::with(['hospital', 'specialization'])->latest()->paginate(15);

        return view("dashboard.specialists.index", compact("specialists"));
    }

    public function create()
    {
        $hospitals = Hospital::orderBy('name')->get();
        $specializations = Specializtion::orderBy('name')->get();

        return view("dashboard.specialists.create", compact("hospitals", "specializations"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string|max:255",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "hospital_id" => "required|exists:hospitals,id",
            "specializtion_id" => "required|exists:specializtions,id",
            "rate" => "nullable|numeric|min:0|max:5",
            "description" => "nullable|string",
            "price" => "nullable|numeric|min:0",
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/specialists'), $imageName);
            $validated['image'] = 'images/specialists/' . $imageName;
        }

        Specialist::create($validated);

        return redirect()->route("dashboard.specialists.index")->with("success", "تم إضافة الأخصائي بنجاح.");
    }

    public function show(Specialist $specialist)
    {
        $specialist->load(['hospital', 'specialization']);

        return view("dashboard.specialists.show", compact("specialist"));
    }

    public function edit(Specialist $specialist)
    {
        $hospitals = Hospital::orderBy('name')->get();
        $specializations = Specializtion::orderBy('name')->get();

        return view("dashboard.specialists.edit", compact("specialist", "hospitals", "specializations"));
    }

    public function update(Request $request, Specialist $specialist)
    {
        $validated = $request->validate([
            "name" => "sometimes|required|string|max:255",
            "image" => "sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "hospital_id" => "sometimes|required|exists:hospitals,id",
            "specializtion_id" => "sometimes|required|exists:specializtions,id",
            "rate" => "sometimes|nullable|numeric|min:0|max:5",
            "description" => "sometimes|nullable|string",
            "price" => "sometimes|nullable|numeric|min:0",
        ]);

        if ($request->hasFile('image')) {
            if ($specialist->image && file_exists(public_path($specialist->image))) {
                unlink(public_path($specialist->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/specialists'), $imageName);
            $validated['image'] = 'images/specialists/' . $imageName;
        }

        $specialist->update($validated);
        return redirect()->route("dashboard.specialists.index")->with("success", "تم تحديث بيانات الأخصائي بنجاح.");
    }

    public function destroy(Specialist $specialist)
    {
        if ($specialist->image && file_exists(public_path($specialist->image))) {
            unlink(public_path($specialist->image));
        }

        $specialist->delete();
        return redirect()->route("dashboard.specialists.index")->with("success", "تم حذف الأخصائي بنجاح.");
    }
}
