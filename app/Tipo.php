<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $primaryKey = 'idtipo';
 	protected $fillable = [    	
    	'nome',
    	'status',
    ];
    protected $guarded = ['idtipo'];
    protected $table = 'tipo';
}
