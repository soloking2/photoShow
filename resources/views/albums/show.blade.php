@extends('layouts.app')

@section('content')
<h3>{{ $album->name }}</h3>
<a href="/" class="btn btn-secondary">Go Back</a>
<a href="/photos/create/{{$album->id}}" class="btn btn-primary">Upload Image to the Album</a>
<hr>
@if(count($album->photos) > 0)
<div class="container">
  <div class="row">
    @foreach($album->photos as $photo)
    <div class="col-lg-4 col-md-4 push-up mt-4">
      <a href="/photos/{{$photo->id}}">
        <img class="img-thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
      </a>
      <br>
      <p style="margin-left:90px;">{{$photo->title}}</p>
    </div>
      @endforeach
  </div>

</div>

@else
<p class="lead">No albums To Display</p>
@endif
@endsection
