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
@if(session()->has('alert'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  successfully Uploaded..!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
  @endif

<div class=" d-flex justify-content-center align-items-center  " style="min-height: 80vh;padding:20px;">

 

    <div class="container" style="max-width:720px">
        <h1>Upload your audio</h1>
    <form  method="POST" action="/controller/audio/upload" enctype="multipart/form-data" >
        @csrf
        <div class="form-group">
            <label for="exampleInputname">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
          </div>
          <div class="form-group">
            <label for="exampleInputsinger">Singer</label>
            <input type="text" class="form-control" id="singer" placeholder="singer" name="singer">
          </div>

          <div class="form-group">
            <label for="exampleInputimage">Image</label>
            <input type="file" class="form-control" accept="image/*" id="image" placeholder="image" name="image">
    
          </div>
        <div class="form-group">
            <label for="exampleInputimage">Audio</label>
            <input type="file" accept="audio/*" accept="audio/*" class="form-control" id="audio" placeholder="audio" name="audio">
    
          </div>
          <div class="form-group text-right">
          <button type="submit" class="btn btn-primary">Upload</button>
          </div>



    </form>
</div>
</div>
<script
src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
crossorigin="anonymous"
></script>
{{-- <script>
$("form").submit(function(e){
  e.preventDefault();
  
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    
              $.ajax({
               type:'POST',
               url:"{{url('/controller/audio/upload')}}",
                data:{name:$('#name').val(),
                singer:$('#singer').val(),
                image:$('#image').val(),
                audio:$('#audio').val()
              
              },
              
               }).done(function(data) {
                
              
                    console.log(data);
                

               }).fail(function (data, textStatus, errorThrown) {
        console.log(textStatus);
        });});
      </script> --}}

@endsection