<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RedeSocialCurriculo extends Model
{
    protected $primaryKey = ['redesocial_idredesocial', 'curriculo_idcurriculo'];
 	protected $fillable = [    	
    	'link',
    ];
    protected $guarded = ['redesocial_idredesocial', 'curriculo_idcurriculo'];
    protected $table = 'redesocial_curriculo';
    public $incrementing = false;
    public $timestamps = false;

}
