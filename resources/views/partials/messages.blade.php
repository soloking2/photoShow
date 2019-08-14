@if(count($errors) > 0)
<div class="alert alert-danger">
  @foreach($errors->all() as $error)
  <li><strong>{{ $error }}</strong></li>
  @endforeach
</div>
@endif

@if(session('success'))
  <div class="alert alert-success">
    <li><strong>{{ session('success') }}</strong></li>
  </div>
@endif
