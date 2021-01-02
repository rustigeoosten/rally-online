<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverChanges extends Model
{
    protected $fillable = [
        'driver', 'oldTeam', 'newTeam'
    ];
    public function driver()
    {
        return $this->belongsTo('App\Driver', 'driver', 'id');
    }
    public function getOldTeam($id)
    {
        $driverChange = DriverChanges::find($id);
        if($driverChange->oldTeam !== -1){
        $team = Team::where([['id', $driverChange->oldTeam]])->get();
        return strtolower($team[0]->name);
        }
        else{
            return("none");
        }
    }
    public function getNewTeam($id)
    {
        $driverChange = DriverChanges::find($id);
        if($driverChange->newTeam !== -1){
        $team = Team::where([['id', $driverChange->newTeam]])->get();
        return strtolower($team[0]->name);
        }
        else{
            return("none");
        }
    }
}
