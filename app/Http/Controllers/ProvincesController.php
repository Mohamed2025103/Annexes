<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Region;
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
    $regions = Region::all(); // Assuming provinces belong to regions
    $cities = City::all(); // Fetch all cities or filter based on selected region later

    return view('provinces.create', compact('regions', 'cities'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'province_name' => 'required|string|max:255',
        'region_id' => 'required|exists:regions,id', // Ensure the selected region exists
        'city_id' => 'required|exists:cities,id', // Validate that city_id exists

    ]);

    Province::create([
        'province_name' => $validated['province_name'],
        'region_id' => $validated['region_id'],
        'city_id' => $validated['city_id'], // Include city_id

    ]);

    return redirect()->route('provinces.employees')->with('success', 'Province created successfully.');
}



public function edit($id)
{
    $province = Province::findOrFail($id);
    $regions = Region::all(); // Load all regions to choose from
    $cities = City::all(); // Load all cities to choose from
    return view('provinces.edit', compact('province', 'regions', 'cities'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'province_name' => 'required|string|max:255',
        'region_id' => 'required|exists:regions,id',
        'city_id' => 'required|exists:cities,id',
    ]);

    $province = Province::findOrFail($id);
    $province->update([
        'province_name' => $request->province_name,
        'region_id' => $request->region_id,
        'city_id' => $request->city_id,
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
