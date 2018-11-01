<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pacientes;
use App\Generos;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PacientesFormRequest;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
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
      ->join('genero as gen', 'pac.genero_id','=','gen.id')
			->select('pac.id','pac.nombre', 'pac.apellido', DB::raw('gen.genero as genero'),'pac.fecha_nac', 'pac.direccion', 'pac.telefono', 'pac.fecha_registro')
			->where('pac.nombre','LIKE','%'.$query.'%')
			->orderBy('pac.id','asc')
			->paginate(10);

			return view('pacientes.index',["pacientes"=>$pacientes,"searchText"=>$query]);
		}
  }

  public function create(){
    $generos=DB::table('genero')->get();
    return view("pacientes.create",["generos"=>$generos]);
  }

  public function store(PacientesFormRequest $request /*Request $request*/){
    $paciente= new Pacientes;
    $paciente->id = $request->get('id');
    $paciente->nombre = $request->get('nombre');
    $paciente->apellido = $request->get('apellido');
    $paciente->genero_id = $request->get('genero_id');
    $fecha = date("Y/m/d", strtotime($request->get('fecha_nac')));
    $paciente->fecha_nac = $fecha;
    $paciente->direccion = $request->get('direccion');
    $paciente->telefono = $request->get('telefono');
    $paciente->fecha_registro = Carbon::now()->toDateString(); 

    $paciente->save();
    return Redirect::to('pacientes/');
  }

  public function show($id){
    $paciente = Pacientes::findOrFail($id);
    $genero = Generos::findOrFail($paciente->genero_id);
    return view("pacientes.show",["paciente"=>$paciente, "genero"=>$genero]);
  }

  public function edit($id){
    $generos=DB::table('genero')->get();
    return view("pacientes.edit",["paciente"=>Pacientes::findOrFail($id),"generos"=>$generos]);
  }

  public function update(PacientesFormRequest $request, $id){

  $paciente=Pacientes::findOrFail($id);
  $paciente->nombre = $request->get('nombre');
  $paciente->apellido = $request->get('apellido');
  $paciente->genero_id = $request->get('genero_id');
  $fecha = date("Y/m/d", strtotime($request->get('fecha_nac')));
  $paciente->fecha_nac = $fecha;
  $paciente->direccion = $request->get('direccion');
  $paciente->telefono = $request->get('telefono');
  $paciente->update();

  return Redirect::to('pacientes');
}

  public function destroy($id){
    $paciente = DB::table('paciente')->where('id', '=',$id)->delete();
    return Redirect::to('pacientes');
  }
}
