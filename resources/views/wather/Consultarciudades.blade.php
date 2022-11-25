@extends('layout.layout')
@section('content') 
<div class="container" style="margin-top:30px">
    <div class="search-form">
      <form id="search-form">
        <div class="form-group">
          <input type="text" autocomplete="off" placeholder="Buscar ciudad..." class="form-control" id="searchbox" />
        </div>
      </form>
    </div>
    <div class="weather-card" id="card">
      <div class="city" id="city">Bogota, col</div>
      <div class="date" id="date">{{$date}}</div>
      <div class="temperature">
      <div class="col-sm-4">
        <img src="{{url('images/temp-mid.png')}}"  class="card-img-top" id="temp-img" />
      </div>        
<div class="temp" id="temp">14c</div>
      </div>
      <div class="weather" id="weather">Sol</div>
      <div class="range" id="range">12c / 18c</div>
    </div>
  </div>

 <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
<input type="hidden" id="url" value="{{url('')}}">
<link rel="stylesheet" href="{{url('/reset.css')}}" />
  <link rel="stylesheet" href="{{url('/style.css')}}" />
<script src="{{url('js/main.js')}}">
    
</script>
@endsection
