<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Location;

class LocationController extends Controller
{
    /* API */
    public function getLocation(){
        return response()->json(Location::all(),200);
    }

    public function getLocationById($id){
        $location = Location::find($id);
        if(is_null($location)){
            return response()->json(['message' => 'location not found'],404);
        }
        return response()->json($location::find($id),200);
    }

    public function addLocation(Request $request){
        $location = Location::create($request->all());
        return response($location,201);
    }

    public function updateLocation(Request $request,$id){
        $location = Location::find($id);
        if(is_null($location)){
            return response()->json(['message' => 'location not found'],404);
        }
        $location->update($request->all());
        return response($location,200);
    }

    public function deleteLocation(Request $request,$id){
        $location = Location::find($id);
        if(is_null($location)){
            return response()->json(['message' => 'location not found'],404);
        }
        $location->delete();
        return response()->json(null,204);
    }

}
