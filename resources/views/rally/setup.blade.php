@extends('welcome')
@section('title')
<title>Setup</title>
@endsection
@section('favicon')
<link rel="icon" type="image/png" href="https://flagpedia.net/data/flags/h80/{{$rally->country}}.webp"/>
@endsection
@section('active3')
active
@endsection
@section('content')
<div class="container text-center">
    <h1>Choose the setup for this rally</h1>
    <form action="/rallies/{{$rally->id}}/confirmSetup" method="POST">
        @csrf
        <label class="form-label" for="customRange1">Gear ratio</label>
        <div class="range">
          <input type="range" class="form-range" id="gear" name= "gear" min="1" max="10" />
        </div>
        <label class="form-label" for="customRange1">Brake power</label>
        <div class="range">
          <input type="range" class="form-range" id="brakePower" name="brakePower" min="1" max="10" />
        </div>
        <label class="form-label" for="customRange1">Ride height</label>
        <div class="range">
          <input type="range" class="form-range" id="rideHeight" name="rideHeight" min="1" max="10" />
        </div>
        <button type="submit" class="btn btn-primary mb-4">Submit</button>
    </form>
    
</div>
@endsection