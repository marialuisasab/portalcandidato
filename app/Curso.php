<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $primaryKey = 'idcurso';
 	protected $fillable = [
    	'area_idarea',
    	'nome',
    	'escolaridade',
    	'dtinicio',
    	'dtfim',
    	'instituicao_idinstituicao',
    	'nivel_idnivel',
    	'curriculo_idcurriculo',
    	'periodo',
    	'categoria_idcategoria',
    	'status',
        'escola'
    ];
    protected $guarded = ['idcurso'];
    protected $table = 'curso';
    public $timestamps = false;
}
