<?php 
namespace App;

use Illuminate\Http\Request;
use App\Models\Ciudad;
use App\Models\Clima;
use App\Models\Pais;
use Carbon\Carbon;
trait  WatherTrait{

public  function  SaveDataDb ($list){
//dd($list->sys->country);
$date = Carbon::now();
$date = $date->format('Y-m-d');
$pais=[];
$clima=[];
$ciudad=[];
if (is_countable($list) && count($list) > 0){
for ($i=0; $i<count($list) ; $i++) { 
   
$pais['nombre']=$list[$i]->sys->country;
$ciudad['idciudad']=$list[$i]->id;
$ciudad['nombre']=$list[$i]->name;
$ciudad['latitud']=$list[$i]->coord->lat;
$ciudad['longitud']=$list[$i]->coord->lon;
$ciudad['idpais']=$this->Savepais($pais);
$clima['humedad']= $list[$i]->main->humidity;
$clima ['temperatura']=$list[$i]->main->temp;
$clima['ciudad_id']=$list[$i]->id;
$clima['fechaconsulta']=$date;
$this->Saveciudad($ciudad);
$this->Saveclima($clima);
}

}else{
//echo "algo";
$date = Carbon::now();
$date = $date->format('Y-m-d');
$pais=[];
$clima=[];
$ciudad=[];

$pais['nombre']=$list->sys->country;
$ciudad['idciudad']=$list->id;
$ciudad['nombre']=$list->name;
$ciudad['latitud']=$list->coord->lat;
$ciudad['longitud']=$list->coord->lon;
$ciudad['idpais']=$this->Savepais($pais);
$clima['humedad']= $list->main->humidity;
$clima ['temperatura']=$list->main->temp;
$clima['ciudad_id']=$list->id;
$clima['fechaconsulta']=$date;
$this->Saveciudad($ciudad);
$this->Saveclima($clima);

}

//die();

 //
} 

public function Savepais($pais){
//dd($pais['nombre']);
$Paises =Pais::updateOrCreate(['nombre'=>$pais['nombre']],$pais);

return  $Paises->idpais;

}
 
public function Saveciudad($ciudad){
$Ciudades =Ciudad::updateOrCreate(['nombre'=>$ciudad['nombre']],$ciudad);

return  $Ciudades->idciudad;
}
 
public  function Saveclima($clima){
$Ciudades =Clima::updateOrCreate(['ciudad_id'=>$clima['ciudad_id']],$clima);
}

} 

?>