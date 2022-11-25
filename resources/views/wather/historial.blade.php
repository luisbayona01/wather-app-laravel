@extends('layout.layout')
@section('content')

<h1> Historial de Consultas</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">pais</th>
      <th scope="col">ciudad</th>
      <th scope="col">temperatura</th>
      <th scope="col">humedad</th>
       <th scope="col">fechaconsulta</th>
    </tr>
  </thead>
  <tbody>
@foreach ( $historial as $historialtiempo)

    <tr>
    
     <td>{{$historialtiempo->pais}}</td>
      <td>{{$historialtiempo->ciudad}}</td>
      <td>{{round($historialtiempo->temperatura - 273.15)}}º</td>
      <td>{{$historialtiempo->humedad}}%</td>
      <td scope="row">{{$historialtiempo->fechaconsulta}}</td>
    </tr>
@endforeach
     </tbody>
</table>



@endsection