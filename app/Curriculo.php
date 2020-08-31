<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model
{       
    protected $primaryKey = 'idcurriculo';
    protected $fillable = [
    	'endereco_idendereco',
    	'telefone1',
    	'telefone2',
    	'cpf',
    	'catcnh', 
    	'cnh',
    	'ufcnh',
    	'dtnascimento',
    	'dtcadastro',
    	'dtatualizacao',
    	'nomepai',
    	'nomemae',
    	'foto',
    	'pretsalarial',
		'dfisico',
		'tpdeficiencia',
    	'genero',
    	'sobre',
    	'ctps',
    	'nacionalidade', 
    	'naturalidade',
    	'estadocivil',
    	'rg',
    	'users_id',
    ];
    protected $guarded = ['idcurriculo', 'created_at', 'updated_at'];
    protected $table = 'curriculo';
}
