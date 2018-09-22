<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\HistorialCitas;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\HistorialCitasFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class HistorialCitasController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $historiales=DB::table('historial_cita as hisc')
      ->join('paciente as pac', 'hisc.paciente_id','=','pac.id')
      ->join('tratamiento as tra', 'hisc.tratamiento_id','=','tra.id')
      ->join('agenda as age', 'hisc.agenda_id','=','age.id')
      ->select('hisc.id','hisc.descripcion', 'pac.nombre', 'pac.apellido', 'tra.nombre', 'age.fecha_cita')
      ->where('hisc.descripcion','LIKE','%'.$query.'%')
      ->orderBy('hisc.id','asc')
      ->groupBy('hisc.id','hisc.descripcion', 'pac.nombre', 'pac.apellido', 'tra.nombre', 'age.fecha_cita')
      ->paginate(7);

      return view('pacientes_info.his_citas.index',["historiales"=>$historiales,"searchText"=>$query]);
    }
  }

  public function create(){
    $pacientes=DB::table('paciente')->get();
    $tratamientos=DB::table('tratamiento')->get();
    $agendas=DB::table('agenda')->get();
    return view("pacientes_info.his_citas.create",["pacientes"=>$pacientes,"tratamientos"=>$tratamientos,"agendas"=>$agendas]);
  }

  public function store(HistorialCitasFormRequest $request /*Request $request*/){
    $historial= new HistorialCitas;
    $historial->id = $request->get('id');
    $historial->descripcion = $request->get('descripcion');
    $historial->Paciente_id = $request->get('Paciente_id');
    $historial->tratamiento_id = $request->get('tratamiento_id');
    $historial->agenda_id = $request->get('agenda_id');

    $historial->save();
    return Redirect::to('pacientes_info/his_citas/');
  }

  public function show($id){
    return view("pacientes_info.his_citas.show",["historial"=>HistorialCitas::findOrFail($id)]);
  }

  public function edit($id){
    return view("pacientes_info.his_citas.edit",["historial"=>HistorialCitas::findOrFail($id)]);
  }

  public function update(HistorialCitasFormRequest $request, $id){

  $historial=HistorialCitas::findOrFail($id);
  $historial->descripcion = $request->get('descripcion');
  $historial->Paciente_id = $request->get('Paciente_id');
  $historial->tratamiento_id = $request->get('tratamiento_id');
  $historial->agenda_id = $request->get('agenda_id');
  $historial->update();

  return Redirect::to('pacientes_info/his_citas/');
  }

  public function destroy($id){
  $historial = DB::table('historial_cita')->where('id', '=',$id)->delete();
  return Redirect::to('pacientes_info/his_citas/');
  }
}
