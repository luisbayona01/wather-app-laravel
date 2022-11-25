@extends('layout.layout')
@section('content')


   @for ($i =0; $i < count($list); $i++)
<div class="col-sm-3">
<div class="card">
<div class="container">
<div class="col-sm3">
<div id="{{$i}}" class="card-img-top" style="width:300px;height:400px;"></div>
</div>
</div>
<input type="hidden" class="long" value="{{$list[$i]->coord->lon}}">
<input type="hidden" class="lat" value="{{$list[$i]->coord->lat}}">


  <div class="card-body">
    <h5 class="card-title">{{$list[$i]->name}}</h5>
   
    <p class="card-text"><i class="bi bi-droplet-half">
Humedad:
</i>  {{$list[$i]->main->humidity}} % </p>
  
  </div>
</div>
</div>
@endfor


<script>
function myMap() {
  const  logintud= document.getElementsByClassName("long");
  const latitud=  document.getElementsByClassName("lat");
 
//console.log(logintud[0].value); 
 
for (let i = 0;  i< logintud.length; i++) {

const myLatLng = { lat:parseInt(latitud[i].value), lng: parseInt(logintud[i].value) };
  const map = new google.maps.Map(document.getElementById([i]), {
    zoom: 6,
    center: myLatLng,
  });

  new google.maps.Marker({
    position: myLatLng,
    map,
    title: "Hello World!",
  });  


}
/**/
} 
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1qqV6X7GnsS4hXQyhfid-MbMJNxLDi6o&callback=myMap"></script>



@endsection



