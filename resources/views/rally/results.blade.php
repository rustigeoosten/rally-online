@extends('welcome')
@section('title')
<title>Results</title>
@endsection
@section('favicon')
<link rel="icon" type="image/png" href="https://flagpedia.net/data/flags/h80/{{$rally->country}}.webp"/>
@endsection
@section('active3')
active
@endsection
@section('content')
<div class="container">
    <div class="text-center">
        <h1>Results of the {{$rally->edition}}. Rally of</h1>
        <img src="https://flagpedia.net/data/flags/h80/{{$rally->country}}.webp" width="200px">
    </div>
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
        @foreach($results as $result)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td><img src="https://flagpedia.net/data/flags/h80/{{$result->driver()->get()[0]->nationality}}.webp" width="50px"></td>
              <td>{{$result->driver()->get()[0]->name}}</td>
              <td><img src="/img/team/{{$result->driver()->get()[0]->getTeamName($result->driver()->get()[0]->id)}}.png" height="50px"></td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection