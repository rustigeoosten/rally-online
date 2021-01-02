@extends('welcome')
@section('title')
<title>How was the setup?</title>
@endsection
@section('favicon')
<link rel="icon" type="image/png" href="https://flagpedia.net/data/flags/h80/{{$rally->country}}.webp"/>
@endsection
@section('active3')
active
@endsection
@section('content')
<div class="container text-center">
    <h1>Here is how you did</h1>
    <h3>{{$gearMsg}}</h3>
    <h3>{{$brakeMsg}}</h3>
    <h3>{{$rideMsg}}</h3>
    <a href="/rallies/{{$rally->id}}/race/1"><button class="btn btn-success">Continue</button></a>
    
</div>
@endsection