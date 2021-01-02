@extends('welcome')
@section('title')
<title>Drivers</title>
@endsection
@section('active5')
active
@endsection
@section('content')
@if($season == 1)
<h4>Changes between seasons will be shown here. Since this is season 1, there are no changes yet.</h4>
@else
<div class="text-center">
<h1>Changes between season {{$season - 1}} -> {{$season}}</h1>
<h3>Driver changes</h3>
</div>
<div class="container">
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">Nationality</th>
        <th scope="col">Driver</th>
        <th scope="col">Old team</th>
        <th scope="col">New team</th>
      </tr>
    </thead>
    <tbody>
        @foreach($DriverChanges as $driver)
            <tr>          
              <td><img src="https://flagpedia.net/data/flags/h80/{{$driver->driver()->get()[0]->nationality}}.webp" width="50px"></td>
              <td>{{$driver->driver()->get()[0]->name}}</td>
              <td><img src="/img/team/{{$driver->getOldTeam($driver->id)}}.png" height="50px"></td>
              <td><img src="/img/team/{{$driver->getNewTeam($driver->id)}}.png" height="50px"></td>
            </tr>
        @endforeach
    </tbody>
  </table>
  <div class="text-center">
    <h3>Team changes</h3>
    </div>
    <div class="container">
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Old team</th>
            <th scope="col">New team</th>
          </tr>
        </thead>
        <tbody>
            @foreach($TeamChanges as $team)
                <tr>          
                  <td><img src="/img/team/{{$team->getOldTeam($team->id)}}.png" height="50px"></td>
                  <td><img src="/img/team/{{$team->getNewTeam($team->id)}}.png" height="50px"></td>
                </tr>
            @endforeach
        </tbody>
      </table>
  <div class="text-center">
    <h3>Rally changes</h3>
    </div>
    <div class="container">
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Old rally</th>
            <th scope="col">New rally</th>
          </tr>
        </thead>
        <tbody>
            @foreach($RallyChanges as $rally)
                <tr>          
                  <td><img src="https://flagpedia.net/data/flags/h80/{{$rally->getOldRally($rally->id)[0]->country}}.webp" width="50px"></td>
                  <td><img src="https://flagpedia.net/data/flags/h80/{{$rally->getNewRally($rally->id)[0]->country}}.webp" width="50px"></td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endif
@endsection