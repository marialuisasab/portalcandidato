<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;

use Illuminate\Support\Str;

class AdminController extends Controller
{

	public function __construct(){
		$this->middleware('auth:admin');
	}

    public function index(){

		$admin = Admin::where("id", Auth::user()->id)->get();
    	return view('admin', compact(['admin']));

	}

	public function editarPerfil($id){
		$admin = Admin::where("id", $id)->get();
    	return view('admin.edit', compact(['admin']));		
	}

	public function updatePerfil(Request $request, $id){
		$this->validarFormulario($request);
		$admin = Auth::user();
		
		if(isset($admin)){
			$admin->name = mb_convert_case($request->nome, MB_CASE_TITLE, "UTF-8");        	  
	        if($request->hasFile('foto') && $request->file('foto')->isValid()){	        	
                $nomeArquivo = 'admin_'.$admin->id;
                $extensao = $request->file('foto')->extension();
                $arquivo = "{$nomeArquivo}.{$extensao}";                              
                $upload = $request->file('foto')->move('fotos', $arquivo);               
                if(!$upload){
                    flash('Falha ao realizar upload da imagem!')->error();
                    return redirect()->back();                                
                }
                $admin->foto = $arquivo;                  
            }
            if($admin->save()){  
             	flash('Informações gravadas com sucesso!')->success();
               	return redirect()->route('admin.index');
            }else {
                flash('Falha ao gravar as informações!')->error();
                return redirect()->back();
            }
		}
	}
	public function validarFormulario($request){

        $regras = [
            'nome'=>'required|string|max:100'
        ];

        $mensagens = [
            'required' => 'Este campo não poderá estar em branco!',
        ];

        $request->validate($regras, $mensagens);
    }
	
	public function buscar(){
		return view('admin.buscarcurriculo');
	}

	public function cadastrarvaga(){
		return view('admin.cadastrovaga');
	}


}
