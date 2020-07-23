<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;

class AdminController extends Controller
{

	public function __construct(){
		$this->middleware('auth:admin');
	}

    public function index(){

		$admin = Admin::where("id",Auth::user()->id)->get();
    	return view('admin', compact(['admin']));
    }

}
