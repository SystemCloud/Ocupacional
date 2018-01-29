<?php

namespace App\Http\Controllers;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index() {
		 $tipo=Auth::user()->tipo;
		 $variablex='Un String';
		 if($tipo=='1'){
			 return view('layouts.dashboard.super.index');
		 }else if($tipo=='2'){
			 return view('layouts.dashboard.clinica.index');
		 }else if($tipo=='3'){
			 return view('layouts.dashboard.admin.index');
		 }

    }
}
