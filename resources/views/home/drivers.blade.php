@extends('welcome')
@section('title')
<title>Drivers</title>
@endsection
@section('active2')
active
@endsection
@section('content')
<div class="container">
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">Position</th>
        <th scope="col">Nationality</th>
        <th scope="col">Name</th>
        <th scope="col">Team</th>
        <th scope="col">Points</th>
      </tr>
    </thead>
    <tbody>
        @foreach($drivers as $driver)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td><img src="https://flagpedia.net/data/flags/h80/{{$driver->nationality}}.webp" width="50px"></td>
              <td>{{$driver->name}}</td>
              <td><img src="/img/team/{{$driver->getTeamName($driver->id)}}.png" height="50px"></td>
              <td>{{$driver->points}}</td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection