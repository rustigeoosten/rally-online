<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['rally_id', 'driver_id', 'rallyPoints'];

        public function driver()
        {
            return $this->belongsTo('App\Driver', 'driver_id', 'id');
        }
}
