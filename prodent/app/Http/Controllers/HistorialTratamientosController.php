<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\HistorialTratamientos;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\HistorialTratamientosFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class HistorialTratamientosController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $historiales=DB::table('historial_tratamiento as hist')
      ->join('paciente as pac', 'hist.paciente_id','=','pac.id')
      ->join('tratamiento as tra', 'hist.tratamiento_id','=','tra.id')
      ->select('hist.id','hist.fecha_inicio','hist.fecha_culminacion','hist.abono','hist.estado','hist.detalles', 'pac.nombre', 'pac.apellido', 'tra.nombre')
      ->where('hist.detalles','LIKE','%'.$query.'%')
      ->orderBy('hist.id','asc')
      ->groupBy('hist.id','hist.fecha_inicio','hist.fecha_culminacion','hist.abono','hist.estado','hist.detalles', 'pac.nombre', 'pac.apellido', 'tra.nombre')
      ->paginate(7);

      return view('pacientes_info.his_tratamientos.index',["historiales"=>$historiales,"searchText"=>$query]);
    }
  }

  public function create(){
    $pacientes=DB::table('paciente')->get();
    $tratamientos=DB::table('tratamiento')->get();
    return view("pacientes_info.his_tratamientos.create",["pacientes"=>$pacientes,"tratamientos"=>$tratamientos]);
  }

  public function store(HistorialTratamientosFormRequest $request /*Request $request*/){
    $historial= new HistorialTratamientos;
    $historial->id = $request->get('id');
    $historial->fecha_inicio = $request->get('fecha_inicio');
    $historial->fecha_culminacion = $request->get('fecha_culminacion');
    $historial->abono = $request->get('abono');
    $historial->estado = $request->get('estado');
    $historial->detalles = $request->get('detalles');
    $historial->paciente_id = $request->get('paciente_id');
    $historial->tratamiento_id = $request->get('tratamiento_id');

    $historial->save();
    return Redirect::to('pacientes_info/his_tratamientos/');
  }

  public function show($id){
    return view("pacientes_info.his_tratamientos.show",["historial"=>HistorialTratamientos::findOrFail($id)]);
  }

  public function edit($id){
    return view("pacientes_info.his_tratamientos.edit",["historial"=>HistorialTratamientos::findOrFail($id)]);
  }

  public function update(HistorialTratamientosFormRequest $request, $id){

  $historial=HistorialTratamientos::findOrFail($id);
  $historial->fecha_inicio = $request->get('fecha_inicio');
  $historial->fecha_culminacion = $request->get('fecha_culminacion');
  $historial->abono = $request->get('abono');
  $historial->estado = $request->get('estado');
  $historial->detalles = $request->get('detalles');
  $historial->paciente_id = $request->get('paciente_id');
  $historial->tratamiento_id = $request->get('tratamiento_id');
  $historial->update();

  return Redirect::to('pacientes_info/his_tratamientos/');
  }

  public function destroy($id){
  $historial = DB::table('historial_tratamiento')->where('id', '=',$id)->delete();
  return Redirect::to('pacientes_info/his_tratamientos/');
  }
}
