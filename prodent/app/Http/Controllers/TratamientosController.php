<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tratamientos;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\TratamientosFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class TratamientosController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $tratamientos=DB::table('tratamiento as tra')
      ->join('paciente as pac', 'tra.paciente_id','=','pac.id')
      ->select('tra.id','tra.nombre', 'tra.tipo', 'tra.detalle','tra.fecha_inicio','tra.fecha_fin','tra.precio','tra.saldo_actual','tra.estado',DB::raw('pac.nombre as nombre_paciente'),DB::raw('pac.apellido as apellido_paciente'))
      ->where('tra.nombre','LIKE','%'.$query.'%')
      ->orderBy('tra.id','asc')
      ->paginate(7);

      return view('tratamientos.index',["tratamientos"=>$tratamientos,"searchText"=>$query]);
    }
  }

  public function create(){
    $pacientes=DB::table('paciente')->get();
    return view("tratamientos.create",["pacientes"=>$pacientes]);
  }

public function store(TratamientosFormRequest $request /*Request $request*/){
    $tratamiento= new Tratamientos;
    $tratamiento->id = $request->get('id');
    $tratamiento->nombre = $request->get('nombre');
    $tratamiento->tipo = $request->get('tipo');
    $tratamiento->detalle = $request->get('detalle');
    $tratamiento->fecha_inicio= $request->get('fecha_inicio');
    $tratamiento->fecha_fin = $request->get('fecha_fin');
    $tratamiento->precio = $request->get('precio');
    $tratamiento->saldo_actual = $request->get('precio');
    $tratamiento->estado = $request->get('estado');
    $tratamiento->paciente_id = $request->get('paciente_id');

    $tratamiento->save();
    return Redirect::to('tratamientos/');
  }

  public function show($id){
    $tratamiento = DB::table('tratamiento as tra')
    ->join('paciente as pac', 'tra.paciente_id','=','pac.id')
    ->select('tra.id','tra.nombre', 'tra.tipo', 'tra.detalle','tra.fecha_inicio','tra.fecha_fin','tra.precio','tra.saldo_actual','tra.estado',DB::raw('pac.nombre as nombre_paciente'),DB::raw('pac.apellido as apellido_paciente'))
    ->where('pac.id','=',$id)->first();
    return view("tratamientos.show",["tratamiento"=>Tratamientos::findOrFail($id)]);
  }

  public function edit($id){
    $pacientes=DB::table('paciente')->get();
    return view("tratamientos.edit",["tratamiento"=>Tratamientos::findOrFail($id),"pacientes"=>$pacientes]);
  }

  public function update(TratamientosFormRequest $request, $id){

  $tratamiento=Tratamientos::findOrFail($id);
  $tratamiento->nombre = $request->get('nombre');
  $tratamiento->tipo = $request->get('tipo');
  $tratamiento->detalle = $request->get('detalle');
  $tratamiento->fecha_inicio= $request->get('fecha_inicio');
  $tratamiento->fecha_fin = $request->get('fecha_fin');
  $tratamiento->precio = $request->get('precio');
  $tratamiento->estado = $request->get('estado');
  $tratamiento->paciente_id = $request->get('paciente_id');
  $tratamiento->update();

  return Redirect::to('tratamientos');
}

public function destroy($id){
  $tratamiento = DB::table('tratamiento')->where('id', '=',$id)->delete();
  return Redirect::to('tratamientos');
}
}
