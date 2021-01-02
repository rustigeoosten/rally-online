@extends('welcome')
@section('title')
<title>My Info</title>
@endsection
@section('active4')
active
@endsection
@section('content')
<div class="container">
  <div class="text-center">
    <h1>Season {{$seasonNumber}}</h1>
  </div>
    <form method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Driver name</label>
          <input type="name" class="form-control" id="name" name="name" aria-describedby="name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Driver nationality</label>
            <input type="name" class="form-control" id="nationality" name="nationality" aria-describedby="name">
          </div>
          <div class="form-group">
              <p>Enter your nation's <a href="https://en.wikipedia.org/wiki/List_of_ISO_3166_country_codes">alpha-2 code</a></p>
              <p><i>for example, for portugal enter pt (LOWERCASE!!!)</i></p>
          </div>
          
        <button type="submit" class="btn btn-primary mb-4">Submit</button>
      </form>
      <form method="POST" action="/changePoints">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Point system</label>
          <input type="name" class="form-control" id="pointSystem" name="pointSystem" aria-describedby="name">
        </div>
        <div class="form-group">
          <p>Divide by comma. Example: (10,8,6,5,4,3,2,1)</p>
      </div>
          
        <button type="submit" class="btn btn-primary mb-4">Submit</button>
      </form>

      <a href="/export"><button class="btn btn-info mb-4">Export results to excel sheet</button></a><br>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
            Start new championship
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
                  Are you sure you want to start a new championship and lose your current progress? you can't see your results anymore after this, so make some nice screenshots :)
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Take me back!</button>
                  <a href="/reset"><button type="button" class="btn btn-danger">I'm sure I want to start over!</button></a>
                </div>
              </div>
            </div>
          </div>


</div>
@endsection