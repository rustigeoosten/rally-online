<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Rally;
use App\Team;
use App\Exports\ResultsExport;
use App\DriverChanges;
use App\TeamChanges;
use App\RallyChanges;
use Excel;
use App\Result;
use App\Settings;
use Illuminate\Http\Request;
use Spatie\DbDumper\Databases\MySql;

class HomeController extends Controller
{
    public function index() {
        if(!Settings::all()[0]->hasStarted){
            $teams = Team::all();
            $drivers = Driver::all();
            foreach($drivers as $driver){
                $driver->skill = rand(0,15);
                $driver->save();
            }
            foreach($teams as $team){
                $team->skill = rand(0,15);
                $team->save();
            }
            $drivers = Driver::inRandomOrder()->take(13)->get();
            foreach($drivers as $driver){
                $driver->isActive = 1;
                $driver->save();
            }

            $teams = Team::inRandomOrder()->take(7)->get();
            foreach($teams as $team){
                $team->isActive = 1;
                $team->skill = rand(0,15);
                for($i = 0; $i < 2; $i++){
                $driver = Driver::where([['isActive', 1], ['team_id', 0]])->inRandomOrder()->take(1)->get();
                if(count($driver) > 0){
                $driver[0]->team_id = $team->id;
                $driver[0]->save();
                }
                else{
                    $driver = Driver::create([
                        'name' => "Player",
                        'skill' => rand(0,15),
                        'points' => 0,
                        'team_id' => $team->id,
                        'nationality' => 'nl',
                        'isActive' => 1,
                        'podiums' => 0,
                        'wins' => 0,
                        'championships' => 0,
                    ]);
                }
                }
                $team->save();
            }

            $rallies = Rally::inRandomOrder()->take(8)->get();
            $number = 1;
            foreach ($rallies as $rally){
                $rally->order = $number;
                $rally->edition += 1;
                $rally->save();
                $number ++;
            }
            $settings = Settings::all()[0];
            $settings->hasStarted = 1;
            $settings->save();
        }
        return redirect('/teams');
    }
    public function reset(){
        $drivers = Driver::all();
        $teams = Team::all();
        $rallies = Rally::all();
        $results = Result::all();
        foreach($drivers as $driver){
            if($driver->id > 50){
                $driver->delete();
            }
            else{
            $driver->isActive = 0;
            $driver->team_id = 0;
            $driver->skill = 0;
            $driver->wins = 0;
            $driver->championships = 0;
            $driver->podiums = 0;
            $driver->points = 0;
            $driver->save();
        }
        }
        foreach($teams as $team){
            $team->isActive = 0;
            $team->skill = 0;
            $team->points = 0;
            $team->wins = 0;
            $team->driverChampionships = 0;
            $team->teamChampionships = 0;
            $team->podiums = 0;
            $team->save();
        }
        foreach($rallies as $rally){
            $rally->order = 0;
            $rally->edition = 0;
            $rally->isFinished = 0;
            $rally->save();
        }
        foreach($results as $result){
            $result->delete();  
        }
        $settings = Settings::all()[0];
        $settings->hasStarted = 0;
        $settings->pointSystem = "10,8,6,5,4,3,2,1";
        $settings->seasonNr = 1;
        $settings->save();
        return redirect("/");
    }
    public function teams()
    {
        $teams = Team::where([['isActive', 1]])->orderBy('points', 'DESC')->get();

        return view('home.teams', compact('teams'));
    }

    public function changes()
    {
        $DriverChanges = DriverChanges::all();
        $RallyChanges = RallyChanges::all();
        $TeamChanges = TeamChanges::all();
        $season = Settings::all()[0]->seasonNr;
        return view('home.changes', compact('DriverChanges', 'season', 'RallyChanges', 'TeamChanges'));
    }

    public function rallies()
    {
        $rallies = Rally::where([['order', '!=', 0]])->orderBy('order')->get();
        $unFinishedRallies = Rally::where([['isFinished', 0], ['order', '!=', 0]])->get();
        if(count($unFinishedRallies) == 0){
            $currentRallyId = -1;
        }
        else{
        $currentRallyId = Rally::where([['order', '!=', 0], ['isFinished', 0]])->orderBy('order')->get()[0]->id;
        }
        return view('home.rallies', compact('rallies', 'currentRallyId'));
    }

    public function drivers()
    {
        $drivers = Driver::where([['isActive', 1]])->orderBy('points', 'DESC')->get();

        return view('home.drivers', compact('drivers'));
    }

    public function myInfo()
    {
        $seasonNumber = Settings::all()[0]->seasonNr;
        return view('home.info', compact('seasonNumber'));
    }

    public function myInfoSubmit(Request $request)
    {
        $player = Driver::where([['id', '>', '50']])->get()[0];
        $player->name = $request->name;
        $player->nationality = $request->nationality;
        $player->save();
        return redirect('/');
    }

    public function changePoints(Request $request)
    {
        $settings = Settings::all()[0];
        $settings->pointSystem = $request->pointSystem;
        $settings->save();
        return redirect('/');
    }
    public function export()
    {
        return Excel::download(new ResultsExport, 'results.xlsx');
    }

    public function preSeason()
    {
        $driverChanges = DriverChanges::all();
        foreach($driverChanges as $change){
            $change->delete();
        }
        $teamChanges = TeamChanges::all();
        foreach($teamChanges as $change){
            $change->delete();
        }
        $rallyChanges = RallyChanges::all();
        foreach($rallyChanges as $change){
            $change->delete();
        }
        $rand = rand(0,9);
        //$rand = 5;
        if($rand == 5 || $rand == 9){
            $activeTeam = Team::where([['isActive', 1]])->inRandomOrder()->take(1)->get()[0];
            $inactiveTeam = Team::where([['isActive', 0]])->inRandomOrder()->take(1)->get()[0];
            //dd($activeTeam, $inactiveTeam);
            $teamChange = TeamChanges::create([
                'oldTeam' => $activeTeam->id,
                'newTeam' => $inactiveTeam->id
            ]);
            $driver1 = Driver::where([['team_id', $activeTeam->id]])->get()[0];
            $driver2 = Driver::where([['team_id', $activeTeam->id]])->get()[1];
           // dd($driver1, $driver2);
            $driverChange = DriverChanges::create([
                'driver' => $driver1->id,
                'oldTeam' => $driver1->team_id,
                'newTeam' => $inactiveTeam->id
            ]);
            $driverChange = DriverChanges::create([
                'driver' => $driver2->id,
                'oldTeam' => $driver2->team_id,
                'newTeam' => $inactiveTeam->id
            ]);
            $driver1->team_id = $inactiveTeam->id;
            $driver2->team_id = $inactiveTeam->id;
            $driver1->save();
            $driver2->save();
            $activeTeam->isActive = 0;
            $inactiveTeam->isActive = 1;
            $activeTeam->save();
            $inactiveTeam->save();
        }
        if($rand == 9){
            $activeTeam = Team::where([['isActive', 1]])->inRandomOrder()->take(1)->get()[0];
            $inactiveTeam = Team::where([['isActive', 0]])->inRandomOrder()->take(1)->get()[0];
            //dd($activeTeam, $inactiveTeam);
            $teamChange = TeamChanges::create([
                'oldTeam' => $activeTeam->id,
                'newTeam' => $inactiveTeam->id
            ]);
            $driver1 = Driver::where([['team_id', $activeTeam->id]])->get()[0];
            $driver2 = Driver::where([['team_id', $activeTeam->id]])->get()[1];
            //dd($driver1, $driver2);
            $driverChange = DriverChanges::create([
                'driver' => $driver1->id,
                'oldTeam' => $driver1->team_id,
                'newTeam' => $inactiveTeam->id
            ]);
            $driverChange = DriverChanges::create([
                'driver' => $driver2->id,
                'oldTeam' => $driver2->team_id,
                'newTeam' => $inactiveTeam->id
            ]);
            $driver1->team_id = $inactiveTeam->id;
            $driver2->team_id = $inactiveTeam->id;
            $driver1->save();
            $driver2->save();
            $activeTeam->isActive = 0;
            $inactiveTeam->isActive = 1;
            $activeTeam->save();
            $inactiveTeam->save();
        }


        $rand = rand(0,2);
        //$rand = 2;
        if($rand !== 0){
        for($i = 0; $i < $rand; $i++){
            $inactiveDriver = Driver::where([['isActive', 0]])->inRandomOrder()->get()[0];
            $activeDriver = Driver::where([['isActive', 1], ['id', '<', 51]])->inRandomOrder()->get()[0];
            $driverChange = DriverChanges::create([
                'driver' => $activeDriver->id,
                'oldTeam' => $activeDriver->team_id,
                'newTeam' => -1
            ]);
            $driverChange = DriverChanges::create([
                'driver' => $inactiveDriver->id,
                'oldTeam' => -1,
                'newTeam' => $activeDriver->team_id
            ]);
            $inactiveDriver->team_id = $activeDriver->team_id;
            $inactiveDriver->isActive = 1;
            $inactiveDriver->save();
            $activeDriver->team_id = 0;
            $activeDriver->isActive = 0;
            $activeDriver->save();

        }
    }
        /*
        $comparedToTeammate = [];
        $teams = Team::where([['isActive', 1]])->get();
        foreach($teams as $team){
            $teamsDrivers = Driver::where([['team_id', $team->id]])->orderBy('points', 'DESC')->get();
            $driverArray = [];
            $driver1id = $teamsDrivers[0]->id;
            $driver1points = $teamsDrivers[0]->points - $teamsDrivers[1]->points;
            $driverArray["driver_id"] = $driver1id;
            $driverArray["team_id"] = $team->id;
            $driverArray["points"] = $driver1points;
            $driverArray["teamSkill"] = $team->skill;
            array_push($comparedToTeammate, $driverArray);
            $driverArray = [];
            $driver2id = $teamsDrivers[1]->id;
            $driver2points = $teamsDrivers[1]->points - $teamsDrivers[0]->points;
            $driverArray["driver_id"] = $driver2id;
            $driverArray["team_id"] = $team->id;
            $driverArray["points"] = $driver2points;
            $driverArray["teamSkill"] = $team->skill;
            array_push($comparedToTeammate, $driverArray);
        }
        //dd($comparedToTeammate);
        $points = array_column($comparedToTeammate, "points");
        //dd($points);
        array_multisort($points, SORT_DESC, $comparedToTeammate);
        //dd($comparedToTeammate);
        $rand = rand(2,4);
        $reverseRand = 0 - $rand;
        $goodDrivers = array_slice($comparedToTeammate, 0, $rand);
        $badDrivers = array_slice($comparedToTeammate, 14 - $rand, $rand);
        $goodTeamIds = [];
        foreach($goodDrivers as $driver){
            array_push($goodTeamIds, $driver["team_id"]);
        }
        $badTeamIds = $goodTeamIds;
        foreach($badTeamIds as $id){
            array_push($goodTeamIds, $id);
        }
        //dd($goodTeamIds);
        //dd($goodDrivers, $badDrivers);
        shuffle($goodDrivers);
        shuffle($badDrivers);
        $index = 0;
        //dd($goodDrivers, $badDrivers);
        foreach($goodDrivers as $driver){
            $driver = Driver::find($driver["driver_id"]);
            if($driver->team_id !== $goodTeamIds[$index]){
            $driverChange = DriverChanges::create([
                'driver' => $driver->id,
                'oldTeam' => $driver->team_id,
                'newTeam' => $goodTeamIds[$index]
            ]);
        }
            $driver->team_id = $goodTeamIds[$index];
            $driver->save();
            $index++;
        }
        //dump($index);
        foreach($badDrivers as $driver){
            $driver = Driver::find($driver["driver_id"]);
            if($driver->team_id !== $goodTeamIds[$index]){
                $driverChange = DriverChanges::create([
                    'driver' => $driver->id,
                    'oldTeam' => $driver->team_id,
                    'newTeam' => $goodTeamIds[$index]
                ]);
            }
            $driver->team_id = $goodTeamIds[$index];
            $driver->save();
            $index++;
        }
        //dump($index);
        //die;
    
    ///////////////////////////////
    */
    //dd("lange clips geen disney");
    $rand = rand(0,7);
    if($rand == 1){
        $rand = 2;
    }
    //$rand = 7;
    if($rand !== 0){
        $teamIds = [];
        $drivers = Driver::where([['isActive', 1]])->inRandomOrder()->take($rand)->get();
        foreach($drivers as $driver){
            array_push($teamIds, $driver->team_id);
        }
        shuffle($teamIds);
        $index = 0;
        foreach($drivers as $driver){
            if($driver->team_id !== $teamIds[$index]){
                $currentDriverChange = DriverChanges::where([['driver', $driver->id]])->get();
                if(count($currentDriverChange) !== 0){
                    $currentDriverChange[0]->newTeam = $teamIds [$index];
                    $currentDriverChange[0]->save();
                }
                else{
                $driverChange = DriverChanges::create([
                    'driver' => $driver->id,
                    'oldTeam' => $driver->team_id,
                    'newTeam' => $teamIds[$index]
                ]);
            }
        }
            $driver->team_id = $teamIds[$index];
            $driver->save();
            $index ++;
        }
    }

    $drivers = Driver::all();
    $teams = Team::all();
    $rallies = Rally::all();
    $results = Result::all();
    foreach($drivers as $driver){
        $rand = rand(-3,3);
        $driver->skill = $driver->skill + $rand;
        if($driver->skill < 1){
            $driver->skill = 1;
        }
        if($driver->skill > 15){
            $driver->skill = 15;
        }
        $driver->points = 0;
        $driver->save();
    }
    foreach($teams as $team){
        $rand = rand(-3,3);
        $team->skill = $team->skill + $rand;
        if($team->skill < 1){
            $team->skill = 1;
        }
        if($team->skill > 15){
            $team->skill = 15;
        }
        $team->points = 0;
        $team->save();
    }
    foreach($rallies as $rally){
        $rally->isFinished = 0;
        $rally->save();
    }
    $rand = rand(0,2);
    //$rand = 1;
    if ($rand !== 0){
        $oldRallies = Rally::where([['order' , '>', 0]])->inRandomOrder()->take($rand)->get();
        $newRallies = Rally::where([['order', 0]])->inRandomOrder()->take($rand)->get();
        $index = 0;
        foreach($oldRallies as $rally){
            $rallyChange = RallyChanges::create([
                'oldRally' => $rally->id,
                'newRally' => $newRallies[$index]->id
            ]);
            $newRallies[$index]->order = $rally->order;
            $newRallies[$index]->save();
            $rally->order = 0;
            $rally->save();
            
            $index++;
        }
    }
    $rallies = Rally::where([['order', '>', 0]])->get();
    foreach($rallies as $rally){
        $rally->edition += 1;
        $rally->save();
    }
    foreach($results as $result){
        $result->delete();  
    }
    $settings = Settings::all()[0];
    $settings->seasonNr = $settings->seasonNr + 1;
    $settings->save();
    return redirect("/");

    }
    public function hofDrivers(){
        $drivers = Driver::orderBy('wins', 'DESC')->get();

        return view('home.hofDrivers', compact('drivers'));
    }
    public function hofTeams(){
        $teams = Team::orderBy('wins', 'DESC')->get();

        return view('home.hofTeams', compact('teams'));
    }
       
}
