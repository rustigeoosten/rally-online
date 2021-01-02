<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamChanges extends Model
{
    protected $fillable = [
        'oldTeam', 'newTeam'
    ];
    public function getOldTeam($id)
    {
        $teamChange = TeamChanges::find($id);

        $team = Team::where([['id', $teamChange->oldTeam]])->get();
        return strtolower($team[0]->name);

    }
    public function getNewTeam($id)
    {
        $teamChange = TeamChanges::find($id);

        $team = Team::where([['id', $teamChange->newTeam]])->get();
        return strtolower($team[0]->name);

    }
}
