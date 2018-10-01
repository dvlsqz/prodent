<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Responsables;
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
      ->select('res.id','res.nombre','res.apellido','res.parentesco','res.edad', 'res.direccion', 'res.telefono','pac.nombre','pac.apellido')
      ->where('res.nombre','LIKE','%'.$query.'%')
      ->orderBy('res.id','asc')
      ->groupBy('res.id','res.nombre','res.apellido','res.parentesco','res.edad', 'res.direccion', 'res.telefono','pac.nombre','pac.apellido')
      ->paginate(7);

      return view('pacientes_info.responsables.index',["responsables"=>$responsables,"searchText"=>$query]);
    }
  }

  public function create(){
    $pacientes=DB::table('paciente')->get();
    return view("pacientes_info.responsables.create",["pacientes"=>$pacientes]);
  }

  public function store(ResponsablesFormRequest $request /*Request $request*/){
    $responsable= new Responsables;
    $responsable->id = $request->get('id');
    $responsable->nombre = $request->get('nombre');
    $responsable->apellido = $request->get('apellido');
    $responsable->edad = $request->get('edad');
    $responsable->direccion = $request->get('direccion');
    $responsable->telefono = $request->get('telefono');
    $responsable->paciente_id = $request->get('paciente_id');

    $proveedor->save();
    return Redirect::to('pacientes_info/responsables/');
  }

  public function show($id){
    return view("pacientes_info.responsables.show",["responsable"=>Responsables::findOrFail($id)]);
  }

  public function edit($id){
    return view("pacientes_info.responsables.edit",["responsable"=>Responsables::findOrFail($id)]);
  }

  public function update(ResponsablesFormRequest $request, $id){

  $responsable=Responsables::findOrFail($id);
  $responsable->nombre = $request->get('nombre');
  $responsable->apellido = $request->get('apellido');
  $responsable->edad = $request->get('edad');
  $responsable->direccion = $request->get('direccion');
  $responsable->telefono = $request->get('telefono');
  $responsable->paciente_id = $request->get('paciente_id');
  $responsable->update();

  return Redirect::to('pacientes_info/responsables');
  }

  public function destroy($id){
  $responsable = DB::table('responsable')->where('id', '=',$id)->delete();
  return Redirect::to('pacientes_info/responsables');
  }
}
