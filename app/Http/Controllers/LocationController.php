<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Location;

class LocationController extends Controller
{
    /* Classic CRUD */
    public function addLocation()
    {
        return view("add-location");
    }

    public function createLocation(Request $request)
    {
        $image = $request->file("pathImage");
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);

        $location = new Location();
        $location->name = $request->name;
        $location->pathImage = $imageName;
        $location->description = $request->description;
        $location->anecdote = $request->anecdote;
        $location->longitude = $request->longitude;
        $location->latitude = $request->latitude;
        $location->save();
        return back()->with('location_created', 'Location has been created sucessfully !');
    }

    public function getLocation()
    {
        $locations = Location::orderBy('id', 'DESC')->get();
        return view('locations', compact('locations'));
    }

    public function getLocationById($id)
    {
        $location = Location::find($id);
        return view('single-location', compact('location'));
    }

    public function deleteLocation($id)
    {
        Location::where("id", $id)->delete();
        return back()->with('location_deleted', 'Location has been deleted sucessfully !');
    }

    public function editLocation($id)
    {
        $location = Location::find($id);
        return view('edit-location', compact('location'));
    }

    public function updateLocation(Request $request)
    {
        $image = $request->file("pathImage");
        if ($image != null) {
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $is_img = true;
        } else {
            $is_img = false;
        }

        $location = Location::find($request->id);
        $location->name = $request->name;
        if ($is_img) {
            $location->pathImage = $imageName;
        }
        $location->description = $request->description;
        $location->anecdote = $request->anecdote;
        $location->longitude = $request->longitude;
        $location->latitude = $request->latitude;
        $location->save();
        return back()->with('location_updated', 'Location has been updated sucessfully !');
    }


    /*---------- API -------------- */
    public function getLocationApi()
    {
        return response()->json(Location::all(), 200);
    }

    public function getLocationByIdApi($id)
    {
        $location = Location::find($id);
        if (is_null($location)) {
            return response()->json(['message' => 'location not found'], 404);
        }
        return response()->json($location::find($id), 200);
    }

    public function addLocationApi(Request $request)
    {
        $location = Location::create($request->all());
        return response($location, 201);
    }

    public function updateLocationApi(Request $request, $id)
    {
        $location = Location::find($id);
        if (is_null($location)) {
            return response()->json(['message' => 'location not found'], 404);
        }
        $location->update($request->all());
        return response($location, 200);
    }

    public function deleteLocationApi(Request $request, $id)
    {
        $location = Location::find($id);
        if (is_null($location)) {
            return response()->json(['message' => 'location not found'], 404);
        }
        $location->delete();
        return response()->json(null, 204);
    }
}
