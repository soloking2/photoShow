@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-8 mx-auto">
    <h3>Upload Photos</h3>
    <form action="{{ route('photos.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" placeholder="Title Name" spellcheck="false">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" rows="3" cols="80" class="form-control" placeholder="Album Description"></textarea>
        </div>
        <input type="hidden" name="album_id" value="{{ $album_id }}" class="form-control">
        <div class="form-group">
          <label for="photo">Choose an Image</label>
          <input type="file" name="photo" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-success btn-lg" value="Submit">
        </div>
    </form>
  </div>
</div>

@endsection
