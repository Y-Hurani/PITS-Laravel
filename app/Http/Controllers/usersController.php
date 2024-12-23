<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;


class usersController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'This is example index response'
        ]);
    }

    public function store(Request $request)
    {
        return response()->json([
            'message' => 'Data received',
            'data' => $request->all()
        ]);
    }

    // insert an employee
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'nullable|string|max:15',
        ]);

        // Create new employee and save database
        $employee = new Employee();
        $employee->name = $validated['name'];
        $employee->email = $validated['email'];
        $employee->phone = $validated['phone'] ?? null;
        $employee->save();

        // Return response
        return response()->json(['message' => 'User created successfully!', 'employee' => $employee], 201);
    }
    //
}
