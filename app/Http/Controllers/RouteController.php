<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Route;
use App\Models\Location;
use App\Models\route_location;

class RouteController extends Controller
{
   // 
   public function addRoute()
   {
      return view("add-route");
   }

   public function createRoute(Request $request)
   {
      $image = $request->file("pathImage");
      $imageName = time() . '.' . $image->extension();
      $image->move(public_path('imagesRoute'), $imageName);

      $route = new Route();
      $route->name = $request->name;
      $route->pathImage = $imageName;
      $route->description = $request->description;
      $route->distance = 0;
      $route->save();
      return back()->with('route_created', 'Route has been created sucessfully !');
   }

   public function getRoute()
   {
      $routes = Route::orderBy('id', 'DESC')->get();
      return view('routes', compact('routes'));
   }

   public function getRouteById($id)
    {
        $route = Route::find($id);
        return view('single-route', compact('route'));
    }

    public function deleteRoute($id)
    {
        $route = Route::find($id);
        unlink(public_path('imagesRoute')."/".$route->pathImage);
        Route::where("id", $id)->delete();
        return back()->with('route_deleted', 'Route has been deleted sucessfully !');
    }

    public function editRoute($id)
    {
        $route = Route::find($id);
        return view('edit-route', compact('route'));
    }

    public function updateRoute(Request $request)
    {
        $image = $request->file("pathImage");
        if ($image != null) {
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('imagesRoute'), $imageName);
            $is_img = true;
        } else {
            $is_img = false;
        }

        $route = Route::find($request->id);
        $route->name = $request->name;
        if ($is_img) {
            $route->pathImage = $imageName;
        }
        $route->description = $request->description;
        $route->save();
        return back()->with('route_updated', 'route has been updated sucessfully !');
    }

    public function locationRoute($id)
    {
        $route = Route::find($id);
        $route_locations = route_location::where("route_id", $id)->get();
        $locations = Location::orderBy('id', 'ASC')->get();
        return view('location-route', compact('route','locations','route_locations'));
    }

    public function updateLocationRoute(Request $request)
    {
        $idRoute = $request->idRoute;
        route_location::where("route_id", $idRoute)->delete();
        for ($i=1; $i <=5 ; $i++) { 
            $lelieu = "lieu".$i;
            $idLocation = $request->$lelieu;
            if($idLocation != 0){
                $route_location = new route_location();
                $route_location->location_id = $idLocation;
                $route_location->route_id = $idRoute;
                $route_location->orderInRoute = $i;
                $route_location->save();
            }
        }
        return back()->with('location_route_updated', 'locationroute has been updated sucessfully !');
    }

}
