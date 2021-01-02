<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Driver;

class Team extends Model
{
    protected $fillable = [
        'podiums', 'wins', 'teamChampionships', 'driverChampionships'
    ];
    public function getFirstDriverName($id){
        $drivers = Driver::where([['team_id', $id]])->get();
        return $drivers[0]->name;
    }
    public function getFirstDriverNationality($id){
        $drivers = Driver::where([['team_id', $id]])->get();
        return $drivers[0]->nationality;
    }
    public function getSecondDriverName($id){
        $drivers = Driver::where([['team_id', $id]])->get();
        return $drivers[1]->name;
    }
    public function getSecondDriverNationality($id){
        $drivers = Driver::where([['team_id', $id]])->get();
        return $drivers[1]->nationality;
    }
}
