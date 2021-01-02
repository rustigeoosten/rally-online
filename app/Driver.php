<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = ['name', 'team_id', 'skill', 'points', 'nationality', 'isActive', 'wins', 'podiums', 'championships'];

    public function getTeamName($id){
        $teamId = Driver::find($id)->team_id;
        $team = Team::where([['id', $teamId]])->get();
        return strtolower($team[0]->name);
    }
    public function team()
    {
        return $this->belongsTo('App\Team', 'team_id', 'id');
    }
}
