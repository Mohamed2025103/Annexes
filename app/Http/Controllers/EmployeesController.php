<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Province;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    // List all employees
    public function index()
    {
        $employees = Employee::with('province')->get();
        return view('employees.index', compact('employees'));
    }

    // Show the form for creating a new employee
    public function create()
    {
        $provinces = Province::all(); // Fetch all provinces
        return view('employees.create', compact('provinces'));
    }

    // Store a new employee
    public function store(Request $request)
    {
        // Validate inputs
        $request->validate([
            'code' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'cin' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'province_id' => 'required|exists:provinces,id',
            'picture' => 'required|mimes:jpg,png,jpeg|max:5048', // Validate picture
        ]);

        // Handle file upload if it exists
        // $path = null;
        // if ($request->hasFile('picture')) {
        //     $path = $request->file('picture')->store('public/agents');
        //     $path = str_replace('public/', '', $path); // Remove "public/" for easy storage access
        // }

        // Create employee
        Employee::create([
            'code' => $request->code,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'cin' => $request->cin,
            'phone_number' => $request->phone_number,
            'province_id' => $request->province_id,
            // 'picture' => $path, // Save the file path
        ]);

        return redirect()->route('employees.index')->with('success', 'Agent added successfully!');
    }



    // Show employees by province
    public function showByProvince($provinceId)
    {
        $employees = Employee::where('province_id', $provinceId)->get();
        return view('employees.index', compact('employees'));
    }

    // Show the form for editing an employee
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $provinces = Province::all(); // Fetch all provinces
        return view('employees.edit', compact('employee', 'provinces'));
    }

    // Update an existing employee
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|string|max:20',           // Validate Code
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',       // Address (replaces Employee_Area)
            'cin' => 'required|string|max:20',            // Validate CIN
            'province_id' => 'required|exists:provinces,id'
        ]);

        // Update the employee
        $employee = Employee::findOrFail($id);
        $employee->update($request->only(['code', 'first_name', 'last_name', 'phone_number', 'address', 'cin', 'province_id']));

        return redirect()->route('employees.index')->with('success', 'Agent mis à jour avec succès.');
    }

    // Delete an employee
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return response()->json(['success' => true]);
    }
}
