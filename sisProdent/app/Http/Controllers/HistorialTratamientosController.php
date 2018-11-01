<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\HistorialTratamientos;
use App\Tratamientos;
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
    $fecha = date("Y/m/d", strtotime($request->get('fecha')));
    $historial->fecha = $fecha;
    $historial->detalles = $request->get('detalles');
    $historial->tratamiento_id = $request->get('tratamiento_id');

    $historial->save();
    return Redirect::to('pacientes_info/his_tratamientos/');
  }

  public function show($id){
    $historial= HistorialTratamientos::findOrFail($id);
    $tratamiento = Tratamientos::findOrFail($historial->tratamiento_id);

    return view("pacientes_info.his_tratamientos.show",["historial"=>$historial, "tratamiento"=>$tratamiento]);
  }

  public function edit($id){
    $historial= HistorialTratamientos::findOrFail($id);
    $tratamiento = Tratamientos::findOrFail($historial->tratamiento_id);

    return view("pacientes_info.his_tratamientos.edit",["historial"=>$historial, "tratamiento"=>$tratamiento]);
  }

  public function update(HistorialTratamientosFormRequest $request, $id){

    $historial=HistorialTratamientos::findOrFail($id);
    $fecha = date("Y/m/d", strtotime($request->get('fecha')));
    $historial->fecha = $fecha;
    $historial->detalles = $request->get('detalles');
    $historial->update();

  return Redirect::to('pacientes_info/his_tratamientos/');
  }

  public function destroy($id){
  $historial = DB::table('historial_tratamiento')->where('id', '=',$id)->delete();
  return Redirect::to('pacientes_info/his_tratamientos/');
  }
}
