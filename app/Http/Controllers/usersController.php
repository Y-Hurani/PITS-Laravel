<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    //
}
