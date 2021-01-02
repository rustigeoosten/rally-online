@extends('welcome')
@section('title')
<title>Podium</title>
@endsection
@section('favicon')
<link rel="icon" type="image/png" href="https://flagpedia.net/data/flags/h80/{{$rally->country}}.webp"/>
@endsection
@section('active3')
active
@endsection
@section('content')
<div class="container text-center">
    <h1>Podium of the {{$rally->edition}}. Rally of</h1>
    <img src="https://flagpedia.net/data/flags/h80/{{$rally->country}}.webp" width="200px" class="mb-5">
    <div class="row">
        <div class="col-4">
            <h3>{{$results[1]->driver()->get()[0]->name}}</h3>
            <img src="https://flagpedia.net/data/flags/h80/{{$results[1]->driver()->get()[0]->nationality}}.webp" height="100px">
            <br>
            <img src="/img/team/{{$results[1]->driver()->get()[0]->team()->get()[0]->name}}.png" height="150px">
            <h1 style="background-color:silver">2</h1>
        </div>
        <div class="col-4">
            <h3>{{$results[0]->driver()->get()[0]->name}}</h3>
            <img src="https://flagpedia.net/data/flags/h80/{{$results[0]->driver()->get()[0]->nationality}}.webp" height="100px">
            <br>
            <img src="/img/team/{{$results[0]->driver()->get()[0]->team()->get()[0]->name}}.png" height="150px">
            <h1 style="background-color:gold">1</h1>
        </div>
        <div class="col-4">
            <h3>{{$results[2]->driver()->get()[0]->name}}</h3>
            <img src="https://flagpedia.net/data/flags/h80/{{$results[2]->driver()->get()[0]->nationality}}.webp" height="100px">
            <br>
            <img src="/img/team/{{$results[2]->driver()->get()[0]->team()->get()[0]->name}}.png" height="150px">
            <h1 style="background-color:#cd7f32">3</h1>
        </div>
    </div>
    <a href="/rallies/{{$rally->id}}/viewResults"><button class="btn btn-info">View full results</button></a>
</div>
@endsection