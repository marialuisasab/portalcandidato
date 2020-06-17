<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habilidade extends Model
{
    protected $primaryKey = 'idhabilidade';
 	protected $fillable = [
    	'nome',
    	'nivel',
    	'curriculo_idcurriculo',
    	'tipo_idtipo',
    ];
    protected $guarded = ['idhabilidade'];
    protected $table = 'habilidade';
    public $timestamps = false;
}
