<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\usersController;
use App\Http\Controllers\Controller;

// Web routes (for browser requests)
Route::get('/dummy', [usersController::class, 'index']);
Route::post('/dummy', [usersController::class, 'store']);

Route::post('/employees', [usersController::class, 'create']);
Route::delete('/employees/{id}', [usersController::class, 'softDelete']);

Route::get('/requestAll', [usersController::class, 'requestAll']);

Route::get('/dummy5Second', [Controller::class, 'dispatchDummy']);

?>


