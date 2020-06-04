<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $primaryKey = 'idpais';
 	protected $fillable = [
    	'nome',
    ];
    protected $guarded = ['idpais'];
    protected $table = 'pais';
}
