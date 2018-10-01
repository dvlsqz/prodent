<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pacientes;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PacientesFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class PacientesController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
			$query= trim($request->get('searchText'));
			$pacientes=DB::table('paciente as pac')
			->select('pac.id','pac.nombre', 'pac.apellido', 'pac.genero','pac.fecha_nac', 'pac.direccion', 'pac.telefono', 'pac.fecha_registro')
			->where('pac.nombre','LIKE','%'.$query.'%')
			->orderBy('pac.id','asc')
			->groupBy('pac.id','pac.nombre', 'pac.apellido', 'pac.genero','pac.fecha_nac', 'pac.direccion', 'pac.telefono', 'pac.fecha_registro')
			->paginate(7);

			return view('pacientes.index',["pacientes"=>$pacientes,"searchText"=>$query]);
		}
  }

  public function create(){
    return view("pacientes.create");
  }

  public function store(PacientesFormRequest $request /*Request $request*/){
    $paciente= new Pacientes;
    $paciente->id = $request->get('id');
    $paciente->nombre = $request->get('nombre');
    $paciente->apellido = $request->get('apellido');
    $paciente->genero = $request->get('genero');
    $paciente->fecha_nac = $request->get('fecha_nac');
    $paciente->direccion = $request->get('direccion');
    $paciente->telefono = $request->get('telefono');
    $paciente->fecha_registro = $request->get('fecha_registro');

    $paciente->save();
    return Redirect::to('pacientes/');
  }

  public function show($id){
    return view("pacientes.show",["paciente"=>Pacientes::findOrFail($id)]);
  }

  public function edit($id){
    return view("pacientes.edit",["paciente"=>Pacientes::findOrFail($id)]);
  }

  public function update(PacientesFormRequest $request, $id){

  $paciente=Pacientes::findOrFail($id);
  $paciente->nombre = $request->get('nombre');
  $paciente->apellido = $request->get('apellido');
  $paciente->genero = $request->get('genero');
  $paciente->fecha_nac = $request->get('fecha_nac');
  $paciente->direccion = $request->get('direccion');
  $paciente->telefono = $request->get('telefono');
  $paciente->fecha_registro = $request->get('fecha_registro');
  $paciente->update();

  return Redirect::to('pacientes');
}

  public function destroy($id){
    $paciente = DB::table('paciente')->where('id', '=',$id)->delete();
    return Redirect::to('pacientes');
  }
}
