@extends('layouts.app')

@section('content')
<a href="/albums/{{$photo->album_id}}" class="btn btn-secondary">Back to Gallery</a>
<div class="mt-2">
  <h3>{{$photo->title}}</h3>
  <p class="lead">{{$photo->description}}</p>
  <br>
  <img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">

  <br><br>
  <form action="{{ route('photos.destroy',[$photo->id])}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="delete">
    <input type="submit" name="sub" class="btn btn-danger" value="Delete">
  </form>

</div>
@endsection
