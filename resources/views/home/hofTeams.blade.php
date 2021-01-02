@extends('welcome')
@section('title')
<title>Hall of fame</title>
@endsection
@section('active7')
active
@endsection
@section('content')
<div class="container">
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">Position</th>
        <th scope="col">Name</th>
        <th scope="col">Logo</th>
        <th scope="col">Wins</th>
        <th scope="col">Podiums</th>
        <th scope="col">Driver champs</th>
        <th scope="col">Team champs</th>
      </tr>
    </thead>
    <tbody>
        @foreach($teams as $team)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$team->name}}</td>
                <td><img src="/img/team/{{$team->name}}.png" height="50px"></td>
                <td>{{$team->wins}}</td>
                <td>{{$team->podiums}}</td>
                <td>{{$team->driverChampionships}}</td>
                <td>{{$team->teamChampionships}}</td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection