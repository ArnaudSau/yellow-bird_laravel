<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class route_location extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}
