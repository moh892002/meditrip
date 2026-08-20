<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::withCount(['specialists', 'offers', 'rates', 'specializations'])
            ->latest()
            ->paginate(15);

        return view("dashboard.hospitals.index", compact("hospitals"));
    }

    public function create()
    {
        return view("dashboard.hospitals.create");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string|max:255",
            "city" => "required|string|max:255",
            "country" => "required|string|max:255",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "logo" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "about" => "nullable|string",
            "services" => "nullable|string",
            "facilities" => "nullable|string",
            "beds_num" => "nullable|integer|min:0",
            "founded_year" => "nullable|integer|min:1800|max:" . date('Y'),
            "doctors_count" => "nullable|integer|min:0",
            "staff_count" => "nullable|integer|min:0",
            "operations_count" => "nullable|integer|min:0",
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = 'images/' . $imageName;
        }

        if ($request->hasFile('logo')) {
            $logoName = 'logo_' . time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('images'), $logoName);
            $validated['logo'] = 'images/' . $logoName;
        }

        if (isset($validated['services']) && $validated['services'] !== null) {
            $validated['services'] = array_filter(array_map('trim', explode("\n", $validated['services'])));
        }

        Hospital::create($validated);

        return redirect()->route("dashboard.hospitals.index")->with("success", "تم إضافة المستشفى بنجاح.");
    }

    public function show(Hospital $hospital)
    {
        $hospital->loadCount(['specialists', 'offers', 'rates', 'orders']);

        return view("dashboard.hospitals.show", compact("hospital"));
    }

    public function edit(Hospital $hospital)
    {
        return view("dashboard.hospitals.edit", compact("hospital"));
    }

    public function update(Request $request, Hospital $hospital)
    {
        $validated = $request->validate([
            "name" => "sometimes|required|string|max:255",
            "city" => "sometimes|required|string|max:255",
            "country" => "sometimes|required|string|max:255",
            "image" => "sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "logo" => "sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "about" => "sometimes|nullable|string",
            "services" => "sometimes|nullable|string",
            "facilities" => "sometimes|nullable|string",
            "beds_num" => "sometimes|nullable|integer|min:0",
            "founded_year" => "sometimes|nullable|integer|min:1800|max:" . date('Y'),
            "doctors_count" => "sometimes|nullable|integer|min:0",
            "staff_count" => "sometimes|nullable|integer|min:0",
            "operations_count" => "sometimes|nullable|integer|min:0",
        ]);

        if ($request->hasFile('image')) {
            if ($hospital->image && file_exists(public_path($hospital->image))) {
                unlink(public_path($hospital->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validated['image'] = 'images/' . $imageName;
        }

        if ($request->hasFile('logo')) {
            if ($hospital->logo && file_exists(public_path($hospital->logo))) {
                unlink(public_path($hospital->logo));
            }
            $logoName = 'logo_' . time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('images'), $logoName);
            $validated['logo'] = 'images/' . $logoName;
        }

        if (isset($validated['services']) && $validated['services'] !== null) {
            $validated['services'] = array_filter(array_map('trim', explode("\n", $validated['services'])));
        }

        $hospital->update($validated);
        return redirect()->route("dashboard.hospitals.index")->with("success", "تم تحديث المستشفى بنجاح.");
    }

    public function destroy(Hospital $hospital)
    {
        if ($hospital->image && file_exists(public_path($hospital->image))) {
            unlink(public_path($hospital->image));
        }
        if ($hospital->logo && file_exists(public_path($hospital->logo))) {
            unlink(public_path($hospital->logo));
        }

        $hospital->delete();
        return redirect()->route("dashboard.hospitals.index")->with("success", "تم حذف المستشفى بنجاح.");
    }
}
