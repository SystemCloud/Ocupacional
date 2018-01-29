<?php

namespace App\Http\Controllers\super;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Clinicas;
use App\Tarifas;

use Auth;

class ClinicasController extends Controller{
	public function __construct(){
		$this->middleware('auth');
	//	$this->middleware('super');
	}
  public function index(){ 
		$clinicas=Clinicas::paginate(10);
		return view('super.clinicas.index')
		->with('clinicas',$clinicas);
  }
  public function create(){
    $tarifas = Tarifas::all();
		return view('super.clinicas.create')
    ->with('tarifas',$tarifas);
  }
  public function store(Request $request){
    if($request->ajax()){
            Clinicas::create($request->all());
            return response()->json([
                "mensaje" => "creado"
            ]);
        }
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
