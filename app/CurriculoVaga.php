<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class CurriculoVaga extends Model
{
    protected $primaryKey = ['curriculo_idcurriculo', 'vaga_idvaga'];
 	protected $fillable = [    	
    	'status',
    	'obs',
    	'dtcandidatura'
    ];
    protected $guarded = ['curriculo_idcurriculo', 'vaga_idvaga'];
    protected $table = 'curriculo_vaga';
    public $incrementing = false;
    public $timestamps = false;

    protected function setKeysForSaveQuery(Builder $query)
    {
        return $query->where('curriculo_idcurriculo', $this->getAttribute('curriculo_idcurriculo'))
            ->where('vaga_idvaga', $this->getAttribute('vaga_idvaga'));
    }
}
