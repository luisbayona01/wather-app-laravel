<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Ciudad;
use App\Models\Clima;
use App\Models\Pais;
use App\WatherTrait;
class watherController extends Controller
{  //,4167147,512858

    use WatherTrait;
  public  function Humedad(){
$response = file_get_contents("https://api.openweathermap.org/data/2.5/group?id=4164138,4167147,5128581&appid=c5bf773edb8a08af76bd29e8f68cd99a");
 
$data=json_decode($response);
$list=$data->list;

$this->SaveDataDb($list);

return view('wather.wather', compact('list'));

}


public  function Consultarciudades(){
$date = Carbon::now();
$date = $date->format('Y-m-d');
return  view('wather.Consultarciudades',compact('date'));
}

public  function Saveconsulta( Request $request){
   $data = json_decode(file_get_contents("php://input"));
$list=$data->list;
 $this->SaveDataDb($list);
 $res= [
            "exito"=> true,
                      ];
 return response()->json($res,200);
//dd($data->list);
//($request->list);
}

public function Showhistorial(){
$historial= Ciudad::join('clima','ciudad.idciudad','=','clima.ciudad_id')
                     ->join('pais','ciudad.idpais','=', 'pais.idpais')   
        ->get(['clima.humedad', 'clima.temperatura','pais.nombre  as  pais','ciudad.nombre as ciudad','clima.fechaconsulta']);
     
return  view('wather.historial',compact('historial'));

}  




  
   
}
