<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use  Illuminate\Database\Eloquent\Builder;
/**
 * Class Clima
 *
 * @property $idclima
 * @property $humedad
 * @property $temperatura
 * @property $ciudad_id
 *
 * @property Ciudad $ciudad
 * @package App
 * 
 */
class Clima extends Model
{
    
 

   protected $table= 'clima';
    public $timestamps = false;     
    
    protected $primaryKey = 'idclima';    
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idclima','humedad','temperatura','ciudad_id','fechaconsulta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ciudad()
    {
        return $this->hasOne('App\Models\Ciudad', 'idciudad', 'ciudad_id');
    }
    

}
