<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RedeSocial extends Model
{
    protected $primaryKey = 'idredesocial';
 	protected $fillable = [    	
    	'nome',
    ];
    protected $guarded = ['idredesocial'];
    protected $table = 'redesocial';
}
