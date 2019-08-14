@extends('layouts.app')
@section('content')
  <p class="lead">Photo Album</p>
  @if(count($album) > 0)
  <div class="container">
    <div class="row">
      @foreach($album as $albums)
      <div class="col-lg-4 col-md-4 push-up">
        <a href="/albums/{{$albums->id}}">
          <img class="img-thumbnail" src="storage/album_covers/{{$albums->cover_image}}" alt="{{$albums->name}}">
        </a>
        <br>
        <p style="margin-left:90px;">{{$albums->name}}</p>
      </div>
        @endforeach
    </div>

  </div>

@else
<p class="lead">No albums To Display</p>
@endif
@endsection
