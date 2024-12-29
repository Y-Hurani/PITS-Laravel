<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use Illuminate\Auth\Events\Validated;

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
    public function create(StoreEmployeeRequest $request)
    {
        $validated = $request;
        // Create new employee and save database
        $employee = new Employee();
        $employee->name = $validated['name'];
        $employee->email = $validated['email'];
        $employee->phone = $validated['phone'] ?? null;
        $employee->save();

        // Return response
        return response()->json(['message' => 'User created successfully!', 'employee' => $employee], 201);
    }

    public function softDelete($id)
    {
        $employee = Employee::find($id);

        // Check if the employee exists
        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        $employee->delete();
        return response()->json(['message' => 'Employee soft deleted successfully'], 200);
    }

    public function requestAll()
    {
        $employees = Employee::all();
        return response()->json([
            'message' => 'Employees retrieved successfully',
            'employees' => $employees
            ]);
    }
}
