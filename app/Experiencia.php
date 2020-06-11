<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    protected $primaryKey = 'idexperiencia';
 	protected $fillable = [
    	'empresa',
    	'dtinicio',
    	'dtfim',
    	'cargo',
    	'atividades',
    	'curriculo_idcurriculo',
    ];
    protected $guarded = ['idexperiencia'];
    protected $table = 'experiencia';
    public $timestamps = false;
}
