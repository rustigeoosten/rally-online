<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RallyChanges extends Model
{
    protected $fillable = [
        'oldRally', 'newRally'
    ];
    public function getOldRally($id)
    {
        $rallyChange = RallyChanges::find($id);
        $rally = Rally::where([['id', $rallyChange->oldRally]])->get();
        return $rally;
    }
public function getNewRally($id)
    {
        $rallyChange = RallyChanges::find($id);
        $rally = Rally::where([['id', $rallyChange->newRally]])->get();
        return $rally;
    }
}
