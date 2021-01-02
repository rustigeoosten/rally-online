@extends('welcome')
@section('title')
<title>Welcome to the rally</title>
@endsection
@section('favicon')
<link rel="icon" type="image/png" href="https://flagpedia.net/data/flags/h80/{{$rally->country}}.webp"/>
@endsection
@section('active3')
active
@endsection
@section('content')
<div class="container text-center">
    <h1>Welcome to the {{$rally->edition}}. Rally of</h1>
    <img src="https://flagpedia.net/data/flags/h80/{{$rally->country}}.webp" width="200px">
    <h5>{{$rally->description}}</h5>
    <a href="/rallies/{{$rally->id}}/setup"><button class="btn btn-info">Continue</button></a>
</div>
@endsection