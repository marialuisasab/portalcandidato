<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $primaryKey = 'idestado';
 	protected $fillable = [
    	'uf',
    	'nome',
    ];
    protected $guarded = ['idestado'];
    protected $table = 'estado';


     public function cidades()
     {
     return $this->hasMany('App\Cidade');
     }

}
