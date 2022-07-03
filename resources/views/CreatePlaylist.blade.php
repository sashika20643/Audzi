@extends('layouts.app')

@section('content')
@foreach ($errors->all() as $error)
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{ $error }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
@endforeach
<div class="container pt-3" style="max-width:900px;  border:1px solid black">
 
 <h1 class="mb-3 text-center">Create A New Playlist</h1>   


 <div class="container">
<form action="/playlist/create" method="POST" class="mt-2 " enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="exampleInputname">Name</label>
        <input type="text" class="form-control" id="exampleInputname1" placeholder="Name" name="name">
      </div>
    
      <div class="form-group">
        <label for="exampleInputdescription">Name</label>
        <input type="text" class="form-control" id="exampleInputdescription1" placeholder="description" name="description">
      </div>
      <div class="form-group">
        <label for="exampleInputimage">Image</label>
        <input type="file" class="form-control" id="exampleInputimage1" placeholder="image" name="image">

      </div>
      <div class="form-group text-right">
      <button type="submit" class="btn btn-primary">Next</button>
      </div>

</form>
</div>
</div>
@endsection