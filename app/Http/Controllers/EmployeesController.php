<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Employee;
use App\Models\Province;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employee::with('province')->get();
        return view('employees.index', compact('employees'));
    }

    // Create method to show the form
    public function create()
    {
        // Fetch cities and provinces for dropdown selection
        $cities = City::all();
        $provinces = Province::all();

        return view('employees.create', compact('cities', 'provinces'));
    }

    // Store method to save new employee
    public function store(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'id_number' => 'required|integer',
        'phone_number' => 'required|string|max:20',
        'Employee_Area' => 'required|string|max:255',
        'city_id' => 'required|integer',
        'province_id' => 'required|integer',
    ]);

    // Create new employee
    Employee::create($request->all());

    return redirect()->route('employees.index')->with('success', 'Employee added successfully.');
}


    // Show employees by province
    public function showByProvince($provinceId)
    {
        // Retrieve employees for the specified province
        $employees = Employee::where('province_id', $provinceId)->get();

        return view('employees.index', compact('employees'));
    }

    // Edit method to show the edit form
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $cities = City::all(); // Fetch all cities for dropdown
        $provinces = Province::all(); // Fetch all provinces for dropdown

        return view('employees.edit', compact('employee', 'cities', 'provinces'));
    }

    // Update method to save edited employee
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'id_number' => 'required|integer',
            'phone_number' => 'required|string|max:20',
            'Employee_Area' => 'required|string|max:255',
            'city_id' => 'required|integer',
            'province_id' => 'required|integer',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    // Destroy method to delete an employee
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return response()->json(['success' => true]);
    }
}
