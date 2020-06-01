<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $primaryKey = 'idarea';
 	protected $fillable = [    	
    	'nome',
    	'status',
    ];
    protected $guarded = ['idarea'];
    protected $table = 'area';
}
