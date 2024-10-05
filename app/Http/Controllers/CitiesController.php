<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Region;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = City::withCount(['provinces', 'employees'])->get();

        return view('cities.index', compact('cities'));
    }




    // use App\Models\Region;

public function create()
{
    // Get all regions to show in the select dropdown
    $regions = Region::all();

    // Return the view with the regions
    return view('cities.create', compact('regions'));
}

public function store(Request $request)
{
    // Validate the request data
    $validated = $request->validate([
        'city_name' => 'required|string|max:255',
        'region_id' => 'required|exists:regions,id', // Ensure region_id is valid
    ]);

    // Create the new city with the region_id
    City::create([
        'city_name' => $validated['city_name'],
        'region_id' => $validated['region_id'], // Include the region_id in the insert
    ]);

    // Redirect to the cities list with a success message
    return redirect()->route('cities.index')->with('success', 'City added successfully!');
}

public function edit($id)
{
    // Find the city by ID
    $city = City::findOrFail($id);

    // Get all regions to show in the select dropdown
    $regions = Region::all();

    // Return the edit view with city and regions data
    return view('cities.edit', compact('city', 'regions'));
}

public function update(Request $request, $id)
{
    // Validate the request data
    $validated = $request->validate([
        'city_name' => 'required|string|max:255',
        'region_id' => 'required|exists:regions,id',
    ]);

    // Find the city by ID and update it
    $city = City::findOrFail($id);
    $city->update([
        'city_name' => $validated['city_name'],
        'region_id' => $validated['region_id'],
    ]);

    // Redirect back to the cities index with a success message
    return redirect()->route('cities.index')->with('success', 'City updated successfully!');
}


    public function showByRegion($regionId)
    {
        $cities = City::where('region_id', $regionId)
            ->withCount(['provinces', 'employees'])
            ->get();

        return view('cities.index', compact('cities'));
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return response()->json(['success' => true]);
    }
}
