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
      ->join('tratamiento as tra', 'hist.tratamiento_id','=','tra.id')
      ->select('hist.id','hist.fecha','hist.detalles',DB::raw('tra.nombre as tratamiento'))
      ->where('hist.detalles','LIKE','%'.$query.'%')
      ->orderBy('hist.id','asc')
      ->paginate(7);

      return view('pacientes_info.his_tratamientos.index',["historiales"=>$historiales,"searchText"=>$query]);
    }
  }

  public function create(){
    $tratamientos=DB::table('tratamiento')->get();
    return view("pacientes_info.his_tratamientos.create",["tratamientos"=>$tratamientos]);
  }

  public function store(HistorialTratamientosFormRequest $request /*Request $request*/){
    $historial= new HistorialTratamientos;
    $historial->id = $request->get('id');
    $historial->fecha = $request->get('fecha');
    $historial->detalles = $request->get('detalles');
    $historial->tratamiento_id = $request->get('tratamiento_id');

    $historial->save();
    return Redirect::to('pacientes_info/his_tratamientos/');
  }

  public function show($id){
    $historial=DB::table('historial_tratamiento as hist')
    ->join('tratamiento as tra', 'hist.tratamiento_id','=','tra.id')
    ->select('hist.id','hist.fecha','hist.detalles',DB::raw('tra.nombre as tratamiento'))
    ->where('tra.id','=',$id)->first();
    return view("pacientes_info.his_tratamientos.show",["historial"=>HistorialTratamientos::findOrFail($id)]);
  }

  public function edit($id){
    $tratamientos=DB::table('tratamiento')->get();
    return view("pacientes_info.his_tratamientos.edit",["historial"=>HistorialTratamientos::findOrFail($id),"tratamientos"=>$tratamientos]);
  }

  public function update(HistorialTratamientosFormRequest $request, $id){

  $historial=HistorialTratamientos::findOrFail($id);
  $historial->fecha = $request->get('fecha');
  $historial->detalles = $request->get('detalles');
  $historial->tratamiento_id = $request->get('tratamiento_id');
  $historial->update();

  return Redirect::to('pacientes_info/his_tratamientos/');
  }

  public function destroy($id){
  $historial = DB::table('historial_tratamiento')->where('id', '=',$id)->delete();
  return Redirect::to('pacientes_info/his_tratamientos/');
  }
}
