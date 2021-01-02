@extends('welcome')
@section('title')
<title>Rallies</title>
@endsection
@section('active3')
active
@endsection
@section('content')
<div class="container">
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">Order</th>
        <th scope="col">Country</th>
        <th scope="col">Winning team</th>
        <th scope="col">Winning driver</th>
        <th scope="col">Action</th>
        <th scope="col">Simulate</th>
      </tr>
    </thead>
    <tbody>
        @foreach($rallies as $rally)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td><img src="https://flagpedia.net/data/flags/h80/{{$rally->country}}.webp" width="50px"></td>
              @if($rally->isFinished == 1)
              <td><img src="/img/team/{{$rally->getWinningTeam($rally->id)[0]->name}}.png" height="50px"></td>
              <td>{{$rally->getWinningDriver($rally->id)->name}}</td>
              @else
              <td></td>
              <td></td>
              @endif
              @if($rally->id == $currentRallyId)
              <td><a href="/rallies/{{$rally->id}}/start"><button class="btn btn-success">Start</button></a></td>
              <td><a href="/rallies/{{$rally->id}}/simulate"><button class="btn btn-info">Simulate</button></a></td>
              @elseif($rally->isFinished == 1)
              <td><a href="/rallies/{{$rally->id}}/viewPodium"><button class="btn btn-info">View results</button></a></td>
              <td></td>
              @else
              <td></td>
              <td></td>
              @endif
            </tr>
        @endforeach
    </tbody>
  </table>
  <td><a href="/rallies/simulateAll"><button class="btn btn-info">Simulate all</button></a></td>
  @if($currentRallyId == -1)
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
      To next season
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Reset</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want to go to the next season? you can't see your results anymore after this, so make some nice screenshots :)
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Take me back!</button>
            <a href="/preSeason"><button type="button" class="btn btn-success">Continue!</button></a>
          </div>
        </div>
      </div>
    </div>
  @endif
</div>
@endsection