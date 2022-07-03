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

<div class="d-flex justify-content-center align-items-center">
    <div class="col-12 col-lg-6">
        <div class="new-hits-area mb-100" id="contain">
            <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                <p>See what’s new</p>
                <h2>Select songs</h2>
                <div class="d-flex justify-content-between align-items-center mt-3">
                <button type="button" class="btn btn-success " onclick="checkAll()">Select All</button>
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
            </div>
            <div class="container pt-3 pb-3 mb-5" id="cont" style="background-color: rgb(188, 191, 194) ">

            </div>
            @foreach ($songs as $item)
            <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
              <div class="first-part d-flex align-items-center">
                <div>
                  <input class="form-check-input" type="checkbox" id="{{ $item->id }}" value="{{ $item->id }}" aria-label="...">
                </div>
                  <div class="thumbnail">
                      <img src="{{asset('Audio_images/'.$item->image) }}" alt="">
                  </div>
                  <div class="content-">
                      <h6>{{ $item->name }}</h6>
                      <p>{{ $item->singer }}</p>
                  </div>
              </div>
              <audio controls>
                  <source src="{{asset('Audios/'.$item->audio) }}">
              </audio>
          </div>

          @endforeach
          <div class="text-right">

         
          <button type="button" class="btn btn-success " >Done</button>
        </div>
        </div>
    </div>
</div>


<script>
var count=0;

  function checkAll(){

if(count==0)
   { $('input:checkbox').prop('checked', true);
  count=1;
  }
  else{
    $('input:checkbox').prop('checked', false);
  count=0;
  }
};
</script>


<script>
$( 'form' ).submit(function(e) 
{  e.preventDefault();

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
      
                $.ajax({
                 type:'POST',
                 url:"{{url('/controller/audio/list')}}",
                  data:{name:$('#search').val()
                
                },
                
                 }).done(function(data) {
                  console.log(data);
                  var str="";
                  if(data.length==0){
                    str="<h3>no search result found";
                  }
                  data.forEach(element => {
                    var audio='http://127.0.0.1:8000/Audios/'+element['audio'];
                    var image='http://127.0.0.1:8000/Audio_images/'+element['image'];



                     str+=`<div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
              <div class="first-part d-flex align-items-center">
                <div>
                  <input class="form-check-input" type="checkbox" id="${element['id']}" value="" aria-label="...">
                </div>
                  <div class="thumbnail">
                      <img src="${image}" alt="">
                  </div>
                  <div class="content-">
                      <h6>${ element['name'] }</h6>
                      <p>${ element['singer'] }</p>
                  </div>
              </div>
              <audio controls class="audioplayer-playpause">
                  <source src="${audio}">
              </audio>
          </div>`;

          console.log(str);
                  });
                $('#cont').html(str);
               
                        
                      
                  
  
                 }).fail(function (data, textStatus, errorThrown) {
          console.log(textStatus);
          });})

    
</script>
@endsection