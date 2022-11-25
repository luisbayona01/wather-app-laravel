<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use  Illuminate\Database\Eloquent\Builder;
/**
 * Class Ciudad
 *
 * @property $idciudad
 * @property $nombre
 * @property $latitud
 * @property $longitud
 * @property $idpais
 *
 * @property Clima[] $climas
 * @property Pais $pais
 * @package App
 
 */
class Ciudad extends Model
{
    
    protected $table= 'ciudad';
    public $timestamps = false;     
    
    protected $primaryKey = 'idciudad';    

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idciudad','nombre','latitud','longitud','idpais'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function climas()
    {
        return $this->hasMany('App\Models\Clima', 'ciudad_id', 'idciudad');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pais()
    {
        return $this->hasOne('App\Models\Pais', 'idpais', 'idpais');
    }
    

}
