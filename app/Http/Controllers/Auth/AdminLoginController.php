<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Admin;

class AdminLoginController extends Controller
{
	public function __construct(){
		$this->middleware('guest:admin');
	}


    public function index(){
    	return view("auth.admin-login");
	}
	public function pegaremail($email){
	$admin=Admin::where('email', $email)->get();
	if(count($admin)==0){
	return 1;
	} else {
	return 2;
	}

	}

    public function login(Request $request){
    	
    	$this->validate($request, [
    		'email' => 'required|string',
    		'password' => 'required|string',
    	]); //validação dos dados preenchidos

    	$dados = [
    		'email' => $request->email,
    		'password' => $request->password,
    	]; //array credenciais

    	$authOk = Auth::guard('admin')->attempt($dados, $request->remember); //verificação das credenciais

    	if ($authOk){
    		return redirect()->intended(route('admin.index'));
    	}
    	  flash('Usuário ou senha invalido(s)!')->error();
    	return redirect()->back()->withInputs($request->only('email', 'remember'));
    }

}
