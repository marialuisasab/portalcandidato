<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $primaryKey = 'idcidade';
    protected $fillable = [
    	'nome',
    	'estado_idestado',
    	'codibge',
    ];
    protected $guarded = ['idcidade'];
    protected $table = 'cidade';
}
