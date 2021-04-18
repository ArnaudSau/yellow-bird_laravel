<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RouteController;
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

/* LOCATION */
Route::get("/add-location",[LocationController::class,"addLocation"]);

Route::post("/create-location",[LocationController::class,"createLocation"])->name('location.create');

Route::get("/locations",[LocationController::class,"getLocation"]);

Route::get('/location/{id}',[LocationController::class,'getLocationById']);

Route::get('/delete-location/{id}',[LocationController::class,'deleteLocation']);

Route::get('/edit-location/{id}',[LocationController::class,'editLocation']);

Route::post("/update-location",[LocationController::class,"updateLocation"])->name('location.update');

/* ROUTE */
Route::get("/add-route",[RouteController::class,"addRoute"]);

Route::post("/create-route",[RouteController::class,"createRoute"])->name('route.create');

Route::get("/routes",[RouteController::class,"getRoute"]);

Route::get('/route/{id}',[RouteController::class,'getRouteById']);

Route::get('/delete-route/{id}',[RouteController::class,'deleteRoute']);

Route::get('/edit-route/{id}',[RouteController::class,'editRoute']);

Route::post("/update-route",[RouteController::class,"updateRoute"])->name('route.update');

Route::get('/location-route/{id}',[RouteController::class,'locationRoute']);

Route::post("/update-location-route",[RouteController::class,"updateLocationRoute"])->name('location-route.update');

