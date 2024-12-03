<?php

use App\Http\Controllers\Api\PlateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Plate resources
Route::get("/plates", [PlateController::class, "index"])->name("api.plates.index");
Route::get("/plates/{plate}", [PlateController::class, "show"])->name("api.plates.show");
