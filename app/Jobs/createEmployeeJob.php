<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class createEmployeeJob implements ShouldQueue
{
    use Queueable;
    public $data;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        /**  insert an employee
        $validated = $request;
        // Create new employee and save database
        $employee = new Employee();
        $employee->name = $validated['name'];
        $employee->email = $validated['email'];
        $employee->phone = $validated['phone'] ?? null;
        $employee->save();

        **/

        // Return response
        // return response()->json(['message' => 'User created successfully!', 'employee' => $employee], 201);
    }
}
