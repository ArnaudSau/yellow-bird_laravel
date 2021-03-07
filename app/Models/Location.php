<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    public $timestamp = false;
    protected $guarded = [];

    public function route_locations()
    {
        return $this->hasMany(Route_location::class);
    }
/*     protected $fillable = ['name','description','pathImage','anecdote','longitude', 'latitude'];
 */}
