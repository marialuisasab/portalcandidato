<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    protected $primaryKey = 'idvaga';
    protected $fillable = [
    	'dtinicio',
    	'dtfim',
    	'dtprazo',
    	'quant',
    	'titulo',
    	'descricao',
    	'requisitos',
    	'local',
    	'status',
    	'tpvaga',
    	'pcd',
        'responsavel',
    ];
    protected $guarded = ['idvaga'];
    protected $table = 'vaga';
    public $timestamps = false;
}
