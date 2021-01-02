<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rally extends Model
{
    protected $fillable = [
        'edition'
    ];
    public function getWinningTeam($id){
        $winningDriver = Result::where([['rally_id', $id]])->orderBy('rallyPoints', 'DESC')->get()[0];
        $driver = Driver::find($winningDriver->driver_id);
        $team = Team::where([['id', $driver->team_id]])->get();
        return $team;
    }

    public function getWinningDriver($id){
        $winningDriver = Result::where([['rally_id', $id]])->orderBy('rallyPoints', 'DESC')->get()[0];
        $driver = Driver::find($winningDriver->driver_id);

        return $driver;
    }
}
