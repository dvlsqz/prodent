<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Responsables;
use App\Pacientes;
use App\Generos;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ResponsablesFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class ResponsablesController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $responsables=DB::table('responsable as res')
      ->join('paciente as pac', 'res.paciente_id','=','pac.id')
      ->join('genero as gen', 'res.genero_id','=','gen.id')
      ->select('res.id','res.nombre','res.apellido','res.parentesco','res.fecha_nac', 'res.direccion', 'res.telefono',DB::raw('pac.nombre as nombre_paciente'),DB::raw('pac.apellido as apellido_paciente'), DB::raw('gen.genero as genero'))
      ->where('res.nombre','LIKE','%'.$query.'%')
      ->orderBy('res.id','asc')
      ->paginate(10);

      return view('pacientes_info.responsables.index',["responsables"=>$responsables,"searchText"=>$query]);
    }
  }

  public function create(){
    $pacientes=DB::table('paciente')->get();
    $generos=DB::table('genero')->get();
    return view("pacientes_info.responsables.create",["pacientes"=>$pacientes,"generos"=>$generos]);
  }

  public function store(ResponsablesFormRequest $request /*Request $request*/){
    $responsable= new Responsables;
    $responsable->id = $request->get('id');
    $responsable->nombre = $request->get('nombre');
    $responsable->apellido = $request->get('apellido');
    $responsable->parentesco = $request->get('parentesco');
    $fecha = date("Y/m/d", strtotime($request->get('fecha_nac')));
    $responsable->fecha_nac = $fecha;
    $responsable->direccion = $request->get('direccion');
    $responsable->telefono = $request->get('telefono');
    $responsable->paciente_id = $request->get('paciente_id');
    $responsable->genero_id = $request->get('genero_id');

    $responsable->save();
    return Redirect::to('pacientes_info/responsables/');
  }

  public function show($id){
   $responsable = Responsables::findOrFail($id);
   $paciente = Pacientes::findOrFail($responsable->paciente_id);
   
    return view("pacientes_info.responsables.show",["responsable"=>$responsable, "paciente"=>$paciente]);
  }

  public function edit($id){
    $responsable = Responsables::findOrFail($id);
    $paciente = Pacientes::findOrFail($responsable->paciente_id);
    $generos = Generos::get();

    return view("pacientes_info.responsables.edit",["responsable"=>$responsable, "paciente"=>$paciente,"generos"=>$generos]);
  }

  public function update(ResponsablesFormRequest $request, $id){

    $responsable=Responsables::findOrFail($id);
    $responsable->nombre = $request->get('nombre');
    $responsable->apellido = $request->get('apellido');
    $responsable->parentesco = $request->get('parentesco');
    $fecha = date("Y/m/d", strtotime($request->get('fecha_nac')));
    $responsable->fecha_nac = $fecha;
    $responsable->direccion = $request->get('direccion');
    $responsable->telefono = $request->get('telefono');
    $responsable->genero_id = $request->get('genero_id');
    $responsable->update();

    return Redirect::to('pacientes_info/responsables');
  }

  public function destroy($id){
  $responsable = DB::table('responsable')->where('id', '=',$id)->delete();
  return Redirect::to('pacientes_info/responsables');
  }
}
