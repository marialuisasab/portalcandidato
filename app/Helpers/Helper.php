<?php

namespace App\Helpers;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Cidade;
use App\Estado;

class Helper
{
   
    public static function setData($stringData){
        return  Carbon::parse(str_replace('/', '-',$stringData))->format('Y-m-d'); //
    }

    public static function setPretensao($valor){
        return str_replace(',','.',$valor);
    }
    public static function getPretensao($valor){
        return 'R$'.str_replace('.',',',$valor);
    }
    public static function getEstados(){
        $estados = Estado::orderBy('uf','ASC')->get();
        return $estados;
    }
    public static function getCidades(){
        $cidades = Cidade::orderBy('nome','ASC')->get();
        return $cidades;
    }
}
