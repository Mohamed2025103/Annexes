<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::withCount(['cities', 'provinces'])->get();
        return view('dashboard', compact('regions'));
    }

    public function create()
{
    return view('create-region');
}

public function store(Request $request)
{
    // Validate the request data
    $validated = $request->validate([
        'region_name' => 'required|string|max:255',

    ]);

    // Create the new region
    Region::create([
        'region_name' => $validated['region_name'],
    ]);

    // Redirect back to the regions list
    return redirect()->route('regions.index')->with('success', 'Region added successfully!');
}

public function edit($id)
{
    $region = Region::findOrFail($id);
    return view('edit-region', compact('region'));
}

public function update(Request $request, $id)
{
    // Validate the request data
    $validated = $request->validate([
        'region_name' => 'required|string|max:255',
    ]);

    // Find the region and update it
    $region = Region::findOrFail($id);
    $region->update([
        'region_name' => $validated['region_name'],
    ]);

    // Redirect back to the regions list with a success message
    return redirect()->route('regions.index')->with('success', 'Region updated successfully!');
}




    public function destroy($id)
    {
        $region = Region::findOrFail($id);

        // Optional: Add any additional logic (e.g., cascade delete related data)
        $region->delete();

        return response()->json(['success' => true]);
    }
}
