<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    protected $primaryKey = 'idinstituicao';
 	protected $fillable = [
    	'nome',
    	'status',
    	'nivel',
    ];
    protected $guarded = ['idinstituicao'];
    protected $table = 'instituicao';
}
