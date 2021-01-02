<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Rally;
use App\Team;
use App\Result;
use App\Stage;
use App\Settings;
use Illuminate\Http\Request;

class RallyController extends Controller
{
    public function start($id) {
        $rally = Rally::find($id);
        
        return view('rally.start', compact('rally'));
    }
    public function setup($id) {
        $rally = Rally::find($id);

        $drivers = Driver::where([['isActive', 1]])->get();

        $results = Result::where([['rally_id', $id]])->get();
        foreach($results as $result){
            $result->delete();
        }
        foreach($drivers as $driver){
            Result::create([
                'rally_id' => $id,
                'driver_id' => $driver->id,
                'rallyPoints' => 0
            ]);
        }
        return view('rally.setup', compact('rally'));
    }
    public function confirmSetup($id, Request $request) {
        $rally = Rally::find($id);
        $rallyPoints = 0;
        $player = Driver::where([['id', '>', '50']])->get()[0];
        $team = Team::where([['id', $player->team_id]])->get()[0];
        $playerResult = Result::where([['rally_id', $id], ['driver_id', $player->id]])->get()[0];
        $gear = $request->gear - $rally->idealGear;
        $brake = $request->brakePower - $rally->idealBrakeForce;
        $ride = $request->rideHeight - $rally->idealRideHeight;

        if($gear ==  0){
            $gearMsg = "Your gear ratio is perfect for this rally";
        }
        elseif($gear > 0){
            $gearMsg = "Your gear ratio is too high for this rally";
        }
        else{
            $gearMsg = "Your gear ratio is too low for this rally";
        }

        if($brake ==  0){
            $brakeMsg = "Your brake force is perfect for this rally";
        }
        elseif($brake > 0){
            $brakeMsg = "Your brake force is too strong for this rally";
        }
        else{
            $brakeMsg = "Your brake force is too weak for this rally";
        }

        if($ride ==  0){
            $rideMsg = "Your ride height is perfect for this rally";
        }
        elseif($ride > 0){
            $rideMsg = "Your ride height is too high for this rally";
        }
        else{
            $rideMsg = "Your ride height is too low for this rally";
        }

        if($ride == 0){
            $rallyPoints += 5;
        }
        elseif($ride == -1 || $ride == -2 || $ride == 1 || $ride == 2){
            $rallyPoints += 3;
        }
        elseif($ride == 3 || $ride == -3){
            $rallyPoints += 1;
        }

        if($brake == 0){
            $rallyPoints += 5;
        }
        elseif($brake == -1 || $brake == -2 || $brake == 1 || $brake == 2){
            $rallyPoints += 3;
        }
        elseif($brake == 3 || $brake == -3){
            $rallyPoints += 1;
        }

        if($gear == 0){
            $rallyPoints += 5;
        }
        elseif($gear == -1 || $gear == -2 || $gear == 1 || $gear == 2){
            $rallyPoints += 3;
        }
        elseif($gear == 3 || $gear == -3){
            $rallyPoints += 1;
        }
        $playerResult->rallyPoints = $rallyPoints + $player->skill + $team->skill;
        $playerResult->save();

        $results = Result::where([['rally_id', $rally->id]])->get();
        foreach($results as $result){
            if($result->driver_id < 51){
                $driver = Driver::find($result->driver_id);
                $team = Team::find($driver->team_id);
                $result->rallyPoints = $driver->skill + $team->skill;
                $result->save();
            }
        }

        return view('rally.reviewSetup', compact('gearMsg', 'brakeMsg', 'rideMsg', 'rally'));
    }
    public function race($rally, $stageNumber)
    {
        if($stageNumber == 1){
            $player = Driver::where([['id', '>', '50']])->get()[0];
            $playerResult = Result::where([['rally_id', $rally], ['driver_id', $player->id]])->get()[0];
            $stage = Stage::inRandomOrder()->take(1)->get()[0];

            $drivers = Driver::where([['isActive', 1]])->get();
            $teams = Driver::where([['isActive', 1]])->get();
            $results = Result::where([['rally_id', $rally]])->get();
            foreach($results as $result){
                if($result->driver_id < 51){
                    $driver = Driver::find($result->driver_id);
                    $team = Team::find($driver->team_id);
                    $random = rand(0,15);
                    $result->rallyPoints += $random;
                    $result->save();
                }
            }
            $orderedResults = Result::where([['rally_id', $rally]])->orderBy('rallyPoints', 'DESC')->get();
            $rallyName = Rally::find($rally)->country;

            return view('rally.race', compact('rally', 'stage', 'stageNumber', 'orderedResults', 'rallyName'));
        }
        elseif($stageNumber < 13){
            $player = Driver::where([['id', '>', '50']])->get()[0];
            $playerResult = Result::where([['rally_id', $rally], ['driver_id', $player->id]])->get()[0];
            $stage = Stage::inRandomOrder()->take(1)->get()[0];

            $drivers = Driver::where([['isActive', 1]])->get();
            $teams = Driver::where([['isActive', 1]])->get();
            $results = Result::where([['rally_id', $rally]])->get();
            foreach($results as $result){
                if($result->driver_id < 51){
                    $driver = Driver::find($result->driver_id);
                    $team = Team::find($driver->team_id);
                    $random = rand(-2,2);
                    $result->rallyPoints += $random;
                    $result->save();
                }
            }
            $orderedResults = Result::where([['rally_id', $rally]])->orderBy('rallyPoints', 'DESC')->get();

            $rallyName = Rally::find($rally)->country;
            return view('rally.race', compact('rally', 'stage', 'stageNumber', 'orderedResults', 'rallyName'));
        }
        else{
            $drivers = Driver::where([['isActive', 1]])->get();
            $teams = Driver::where([['isActive', 1]])->get();
            $results = Result::where([['rally_id', $rally]])->get();
            foreach($results as $result){
                if($result->driver_id < 51){
                    $driver = Driver::find($result->driver_id);
                    $team = Team::find($driver->team_id);
                    $random = rand(-2,2);
                    $result->rallyPoints += $random;
                    $result->save();
                }
            }
            $orderedResults = Result::where([['rally_id', $rally]])->orderBy('rallyPoints', 'DESC')->get();
            $position = 0;
            $points = explode(',', Settings::all()[0]->pointSystem);
            while(count($points) < 14){
                array_push($points, '0');
            }
            foreach ($orderedResults as $result){
                $driver = Driver::find($result->driver_id);
                $team = Team::find($driver->team_id);
                $driver->points += $points[$position];
                $team->points += $points[$position];
                if($position == 0){
                    $driver->wins += 1;
                    $team->wins += 1;
                }
                if($position < 3){
                    $driver->podiums += 1;
                    $team->podiums += 1;
                }
                $driver->save();
                $team->save();
                $position ++;
            }
            $rally = Rally::find($rally);
            $rally->isFinished = 1;
            $rally->save();
            if($rally->order == 8){
                $driverChampion = Driver::where([['isActive', 1]])->orderBy('points', 'DESC')->get()[0];
                $driverChampion->championships += 1;
                $driverChampion->save();
                $teamDriverChampion = Team::where([['id', $driverChampion->team_id]])->get()[0];
                $teamDriverChampion->driverChampionships += 1;
                $teamDriverChampion->save();
                $teamChampion = Team::where([['isActive', 1]])->orderBy('points', 'DESC')->get()[0];
                $teamChampion->teamChampionships += 1;
                $teamChampion->save();
                
            }
    
            return redirect('/rallies/' . $rally->id . '/viewPodium');
        }
    }
    public function confirmAction($rally, $stageNumber, $selectedStage, $option)
    {
        $player = Driver::where([['id', '>', '50']])->get()[0];
        $playerResult = Result::where([['rally_id', $rally], ['driver_id', $player->id]])->get()[0];
        $stage = Stage::find($selectedStage);

        if($option == 1){
            $values = explode(',', $stage->values1);
            $points = rand($values[0], $values[1]);
            $playerResult->rallyPoints += $points;
            $playerResult->save();
        }
        elseif($option == 2){
            $values = explode(',', $stage->values2);
            $points = rand($values[0], $values[1]);
            $playerResult->rallyPoints += $points;
            $playerResult->save();
        }
        elseif($option == 3){
            $values = explode(',', $stage->values3);
            $points = rand($values[0], $values[1]);
            $playerResult->rallyPoints += $points;
            $playerResult->save();
        }

        return redirect('/rallies/' . $rally . '/race/' . $stageNumber);
    }
    public function viewPodium($rallyId){
        $rally = Rally::find($rallyId);
        $results = Result::where([['rally_id', $rallyId]])->orderBy('rallyPoints', 'DESC')->get();

        return view('rally.podium', compact('rally', 'results'));

    }
    public function viewResults($rallyId){
        $rally = Rally::find($rallyId);
        $results = Result::where([['rally_id', $rallyId]])->orderBy('rallyPoints', 'DESC')->get();

        return view('rally.results', compact('rally', 'results'));

    }

    public function simulate($rallyId){
        $rally = Rally::find($rallyId);

        $drivers = Driver::where([['isActive', 1]])->get();

        $results = Result::where([['rally_id', $rallyId]])->get();
        foreach($results as $result){
            $result->delete();
        }
        foreach($drivers as $driver){
            $driverSkill = $driver->skill;
            $teamSkill = Team::where([['id', $driver->team_id]])->get()[0]->skill;
            $rand1 = rand(0,15);
            $rand2 = 0;
            for ($i = 0; $i < 12; $i++){
                $rand2 += rand(-2,2);
            }
            Result::create([
                'rally_id' => $rallyId,
                'driver_id' => $driver->id,
                'rallyPoints' => $driverSkill + $teamSkill + $rand1 + $rand2
            ]);
        }
        $orderedResults = Result::where([['rally_id', $rallyId]])->orderBy('rallyPoints', 'DESC')->get();
        $position = 0;
        $points = explode(',', Settings::all()[0]->pointSystem);
        while(count($points) < 14){
            array_push($points, '0');
        }
        foreach ($orderedResults as $result){
            $driver = Driver::find($result->driver_id);
            $team = Team::find($driver->team_id);
            $driver->points += $points[$position];
            $team->points += $points[$position];
            if($position == 0){
                $driver->wins += 1;
                $team->wins += 1;
            }
            if($position < 3){
                $driver->podiums += 1;
                $team->podiums += 1;
            }
            $driver->save();
            $team->save();
            $position ++;
        }
        $rally = Rally::find($rallyId);
        $rally->isFinished = 1;
        $rally->save();

        if($rally->order == 8){
            $driverChampion = Driver::where([['isActive', 1]])->orderBy('points', 'DESC')->get()[0];
            //dd($driverChampion);
            $driverChampion->championships += 1;
            $driverChampion->save();
            $teamDriverChampion = Team::where([['id', $driverChampion->team_id]])->get()[0];
            $teamDriverChampion->driverChampionships += 1;
            $teamDriverChampion->save();
            $teamChampion = Team::where([['isActive', 1]])->orderBy('points', 'DESC')->get()[0];
            $teamChampion->teamChampionships += 1;
            $teamChampion->save();
            
        }

        return redirect('/rallies/' . $rallyId . '/viewPodium');
    }
    public function simulateAll(){
        $rallies = Rally::where([['order', '!=' ,0]])->orderBy('order')->get();
        foreach($rallies as $rally){

            $drivers = Driver::where([['isActive', 1]])->get();
    
            $results = Result::where([['rally_id', $rally->id]])->get();
            foreach($results as $result){
                $result->delete();
            }
            foreach($drivers as $driver){
                $driverSkill = $driver->skill;
                $teamSkill = Team::where([['id', $driver->team_id]])->get()[0]->skill;
                $rand1 = rand(0,15);
                $rand2 = 0;
                for ($i = 0; $i < 12; $i++){
                    $rand2 += rand(-2,2);
                }
                Result::create([
                    'rally_id' => $rally->id,
                    'driver_id' => $driver->id,
                    'rallyPoints' => $driverSkill + $teamSkill + $rand1 + $rand2
                ]);
            }
            $orderedResults = Result::where([['rally_id', $rally->id]])->orderBy('rallyPoints', 'DESC')->get();
            $position = 0;
            $points = explode(',', Settings::all()[0]->pointSystem);
            while(count($points) < 14){
                array_push($points, '0');
            }
            foreach ($orderedResults as $result){
                $driver = Driver::find($result->driver_id);
                $team = Team::find($driver->team_id);
                $driver->points += $points[$position];
                $team->points += $points[$position];
                if($position == 0){
                    $driver->wins += 1;
                    $team->wins += 1;
                }
                if($position < 3){
                    $driver->podiums += 1;
                    $team->podiums += 1;
                }
                $driver->save();
                $team->save();
                $position ++;
            }
            $rally->isFinished = 1;
            $rally->save();
    
            if($rally->order == 8){
                $driverChampion = Driver::where([['isActive', 1]])->orderBy('points', 'DESC')->get()[0];
                //dd($driverChampion);
                $driverChampion->championships += 1;
                $driverChampion->save();
                $teamDriverChampion = Team::where([['id', $driverChampion->team_id]])->get()[0];
                $teamDriverChampion->driverChampionships += 1;
                $teamDriverChampion->save();
                $teamChampion = Team::where([['isActive', 1]])->orderBy('points', 'DESC')->get()[0];
                $teamChampion->teamChampionships += 1;
                $teamChampion->save();
                
            }
        }
        return redirect('/rallies');
    }
}