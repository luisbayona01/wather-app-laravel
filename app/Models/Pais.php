<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use  Illuminate\Database\Eloquent\Builder;
/**
 * Class Pai
 *
 * @property $idpais
 * @property $nombre
 *
 * @property Ciudad[] $ciudads
 * @package App

 */
class Pais extends Model
{

   protected $table= 'pais';
    public $timestamps = false;     
    
    protected $primaryKey = 'idpais';    

/**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idpais','nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ciudads()
    {
        return $this->hasMany('App\Models\Ciudad', 'idpais', 'idpais');
    }
    

}
