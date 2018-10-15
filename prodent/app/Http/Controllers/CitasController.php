<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Citas;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CitasFormRequest;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use DB;

class CitasController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $citas=DB::table('cita as ci')
      ->join('doctor as doc', 'ci.doctor_id','=','doc.id')
      ->select('ci.id','ci.fecha_registro','ci.fecha_cita','ci.hora','ci.detalles','ci.estado',DB::raw("doc.nombre as nombre_doctor"),DB::raw("doc.apellido as apellido_doctor"))
      ->where('ci.fecha_cita','LIKE','%'.$query.'%')
      ->orderBy('ci.id','asc')
      ->paginate(7);
    }
      return view('citas.index',["citas"=>$citas,"searchText"=>$query]);
  }

  public function create(){
    $doctores=DB::table('doctor')->get();
    return view("citas.create",["doctores"=>$doctores]);
  }

public function store(CitasFormRequest $request /*Request $request*/){
    $cita= new Citas;
    $cita->id = $request->get('id');
    $cita->fecha_registro = Carbon::now()->toDateString();
    $cita->fecha_cita = $request->get('fecha_cita');
    $cita->hora = $request->get('hora');
    $cita->detalles = $request->get('detalles');
    $cita->estado = "Asignada";
    $cita->doctor_id = $request->get('doctor_id');

    $cita->save();
    return Redirect::to('citas/');
  }

  public function show($id){
    return view("citas.show");
  }
}
