@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-8 mx-auto">
      <h3>Create New album</h3>
      <form action="{{ route('albums.store')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Album Name" spellcheck="false">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" rows="3" cols="80" class="form-control" placeholder="Album Description"></textarea>
          </div>
          <div class="form-group">
            <label for="cover_image">Image</label>
            <input type="file" name="cover_image" class="form-control">
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-success btn-lg" value="Submit">
          </div>
      </form>
    </div>
  </div>
@endsection
