<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function locations()
    {
        return $this->belongsToMany(Location::class,'route_locations');
    }

    /* public function route_locations()
    {
        return $this->hasMany(Route_location::class);
    } */

}
