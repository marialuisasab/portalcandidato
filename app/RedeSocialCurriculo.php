<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    protected function setKeysForSaveQuery(Builder $query)
    {
        return $query->where('redesocial_idredesocial', $this->getAttribute('redesocial_idredesocial'))
            ->where('curriculo_idcurriculo', $this->getAttribute('curriculo_idcurriculo'));
    }
}
