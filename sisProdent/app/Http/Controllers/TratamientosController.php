<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tratamientos;
use App\Pacientes;
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
    $fecha1 = date("Y/m/d", strtotime($request->get('fecha_inicio')));
    $fecha2 = date("Y/m/d", strtotime($request->get('fecha_fin')));
    $tratamiento->fecha_inicio= $fecha1;
    $tratamiento->fecha_fin = $fecha2;
    $tratamiento->precio = $request->get('precio');
    $tratamiento->saldo_actual = $request->get('precio');
    $tratamiento->estado ='Activo';
    $tratamiento->paciente_id = $request->get('paciente_id');

    $tratamiento->save();
    return Redirect::to('tratamientos/');
  }

  public function show($id){
    $tratamiento=Tratamientos::findOrFail($id);
    //Paciente con el id que está registrado en el tratamiento
    $paciente = Pacientes::findOrFail($tratamiento->paciente_id);
    
    return view("tratamientos.show")->with('tratamiento',$tratamiento)->with('paciente',$paciente);
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
  $fecha1 = date("Y/m/d", strtotime($request->get('fecha_inicio')));
  $fecha2 = date("Y/m/d", strtotime($request->get('fecha_fin')));
  $tratamiento->fecha_inicio= $fecha1;
  $tratamiento->fecha_fin = $fecha2;
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
