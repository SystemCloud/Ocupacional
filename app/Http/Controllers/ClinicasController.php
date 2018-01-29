<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Clinicas;
use Auth;

class ClinicasController extends Controller{
	public function __construct(){
		$this->middleware('auth');
	//	$this->middleware('super');
	}
  public function index(){
		$clinicas=Clinicas::paginate(1);
		return view('super.clinicas.index')
		->with('clinicas',$clinicas);
  }
  public function create(){
		return view('super.clinicas.create');
  }
  public function store(Request $request){

  }
  public function show($id){

	}
  public function edit($id){
				return view('super.clinicas.edit');
  }
  public function update(Request $request, $id){

  }
  public function destroy($id){

  }
}
