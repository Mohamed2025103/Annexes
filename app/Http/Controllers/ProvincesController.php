<?php

namespace App\Http\Controllers;


use App\Models\Province;
use Illuminate\Http\Request;

class ProvincesController extends Controller
{
    public function index()
    {
        $provinces = Province::withCount(['employees'])->get();

        return view('provinces.index', compact('provinces'));
    }



    public function create()
{

    return view('provinces.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'code' => 'required|string|max:255',
        'nom' => 'required|string|max:255',
        'adresse' => 'required|string|max:255',
        'adresse_tel' => 'required|string|max:255',

    ]);

    Province::create($validated);

    return redirect()->route('provinces.index')->with('success', 'Province created successfully.');
}



public function edit($id)
{
    $province = Province::findOrFail($id);
    return view('provinces.edit', compact('province'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'province_name' => 'required|string|max:255',
    ]);

    $province = Province::findOrFail($id);
    $province->update([
        'province_name' => $request->province_name,
    ]);

    return redirect()->route('provinces.index')->with('success', 'Province updated successfully!');
}




    public function showByCity($cityId)
    {
        $provinces = Province::where('city_id', $cityId)
            ->withCount(['employees'])
            ->get();

        // if ($provinces->isEmpty()) {
        //     dd("No provinces found for city ID: {$cityId}");
        // }

        return view('provinces.index', compact('provinces'));
    }

    public function destroy($id)
    {
        $province = Province::findOrFail($id);

        $province->delete();

        return response()->json(['success' => true]);
    }
}
