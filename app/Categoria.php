<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $primaryKey = 'idcategoria';
 	protected $fillable = [    	
    	'nome',
    ];
    protected $guarded = ['idcategoria'];
    protected $table = 'categoria';
}
