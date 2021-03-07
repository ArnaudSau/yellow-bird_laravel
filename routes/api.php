<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//get all locations
Route::get('locations',[LocationController::class, 'getLocation']);

//get Specefic location detail
Route::get('location/{id}',[LocationController::class, 'getLocationById']);

//add location
Route::post('addLocation',[LocationController::class, 'addLocation']);

//update location
Route::put('updateLocation/{id}',[LocationController::class, 'updateLocation']);

//delete location
Route::delete('deleteLocation/{id}',[LocationController::class, 'deleteLocation']);

