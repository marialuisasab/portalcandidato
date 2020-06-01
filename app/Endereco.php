<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $primaryKey = 'idendereco';
 	protected $fillable = [
    	'estado_idestado',
    	'cidade_idcidade',
    	'logradouro',
    	'bairro',
    	'numero',
    	'complemento', 
    	'pais_idpais',
        'cep',
    ];
    protected $guarded = ['idendereco'];
    protected $table = 'endereco';
    public $timestamps = false;
}
