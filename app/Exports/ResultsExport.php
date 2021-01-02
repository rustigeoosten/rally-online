<?php

namespace App\Exports;

use App\Result;
use App\Driver;
use App\Team;
use App\Rally;
use Maatwebsite\Excel\Concerns\FromArray;

class ResultsExport implements FromArray
{
    public function array(): array
    {
        $data = [];
        $drivers = Driver::where('isActive', '1')->orderBy('points', 'DESC')->get();
        $rallies = Rally::where('order', '!=', 0)->orderBy('order')->get();
        $rowNames = ['', ''];
        foreach($rallies as $rally){
            array_push($rowNames, $rally->country);
        }
        array_push($rowNames, "");
        array_push($rowNames, "Points");
        array_push($data, $rowNames);
        $driverData = [];
        foreach($drivers as $driver){
            $thisDriverData = [];
            $team = Team::where('id', $driver->team_id)->get()[0];
            array_push($thisDriverData, $driver->name);
            array_push($thisDriverData, $team->name);
            foreach($rallies as $rally){
                $results = Result::where('rally_id', $rally->id)->orderBy('rallyPoints', 'DESC')->get();
                $position = 1;
                foreach($results as $result){
                    if($result->driver_id == $driver->id){
                        array_push($thisDriverData, $position);
                    }
                    $position++;
                }
            }
            array_push($thisDriverData, "");
            array_push($thisDriverData, $driver->points);
            array_push($driverData, $thisDriverData);
        }
        array_push($data, $driverData);
        return $data;
    }   
}
