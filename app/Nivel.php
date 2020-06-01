<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $primaryKey = 'idnivel';
 	protected $fillable = [    	
    	'nome',
    	'status',
    ];
    protected $guarded = ['idnivel'];
    protected $table = 'nivel';
}
