<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Models\Location;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/add-location",[LocationController::class,"addLocation"]);

Route::post("/create-location",[LocationController::class,"createLocation"])->name('location.create');

Route::get("/locations",[LocationController::class,"getLocation"]);

Route::get('/location/{id}',[LocationController::class,'getLocationById']);

Route::get('/delete-location/{id}',[LocationController::class,'deleteLocation']);

Route::get('/edit-location/{id}',[LocationController::class,'editLocation']);

Route::post("/update-location",[LocationController::class,"updateLocation"])->name('location.update');
