@extends('welcome')
@section('title')
<title>Hall of fame</title>
@endsection
@section('active6')
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
        <th scope="col">Wins</th>
        <th scope="col">Podiums</th>
        <th scope="col">Championships</th>
      </tr>
    </thead>
    <tbody>
        @foreach($drivers as $driver)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td><img src="https://flagpedia.net/data/flags/h80/{{$driver->nationality}}.webp" width="50px"></td>
              <td>{{$driver->name}}</td>
              <td>{{$driver->wins}}</td>
              <td>{{$driver->podiums}}</td>
              <td>{{$driver->championships}}</td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection