@extends('welcome')
@section('title')
<title>Teams</title>
@endsection
@section('active1')
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
        <th scope="col">Driver 1</th>
        <th scope="col">Driver 2</th>
        <th scope="col">Points</th>
      </tr>
    </thead>
    <tbody>
        @foreach($teams as $team)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$team->name}}</td>
              <td><img src="/img/team/{{$team->name}}.png" height="50px"></td>
              <td><img src="https://flagpedia.net/data/flags/h80/{{$team->getFirstDriverNationality($team->id)}}.webp" width="40px">&nbsp;{{$team->getFirstDriverName($team->id)}}</td>
              <td><img src="https://flagpedia.net/data/flags/h80/{{$team->getSecondDriverNationality($team->id)}}.webp" width="40px">&nbsp;{{$team->getSecondDriverName($team->id)}}</td>
              <td>{{$team->points}}</td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection