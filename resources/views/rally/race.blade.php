@extends('welcome')
@section('title')
<title>And we are racing!</title>
@endsection
@section('favicon')
<link rel="icon" type="image/png" href="https://flagpedia.net/data/flags/h80/{{$rallyName}}.webp"/>
@endsection
@section('active3')
active
@endsection
@section('content')
<div class="container text-center">
    <h1>Stage {{$stageNumber}}/12</h1>
    <img src="/img/stage/{{$stage->image}}" height="300px">
    <br>
    <h3>{{$stage->description}}</h3>
    <br>
    <a href="/rallies/{{$rally}}/race/{{$stageNumber + 1}}/{{$stage->id}}/1"><button class="btn btn-info">{{$stage->option1}}</button></a>
    <a href="/rallies/{{$rally}}/race/{{$stageNumber + 1}}/{{$stage->id}}/2"><button class="btn btn-info">{{$stage->option2}}</button></a>
    <a href="/rallies/{{$rally}}/race/{{$stageNumber + 1}}/{{$stage->id}}/3"><button class="btn btn-info">{{$stage->option3}}</button></a>
    <h1>Current standings</h1>
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Position</th>
            <th scope="col">Nationality</th>
            <th scope="col">Name</th>
            <th scope="col">Team</th>
          </tr>
        </thead>
        <tbody>
            @foreach($orderedResults as $result)
            @if($loop->iteration < 4 || $result->driver_id > 50)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td><img src="https://flagpedia.net/data/flags/h80/{{$result->driver()->get()[0]->nationality}}.webp" width="50px"></td>
                  <td>{{$result->driver()->get()[0]->name}}</td>
                  <td><img src="/img/team/{{$result->driver()->get()[0]->getTeamName($result->driver()->get()[0]->id)}}.png" height="50px"></td>
                </tr>
            @endif
            @endforeach
        </tbody>
      </table>
</div>
@endsection