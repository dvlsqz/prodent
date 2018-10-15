<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Recetas;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RecetasFormRequest;
use Illuminate\Support\Facades\Input;
use DB;
use Barryvdh\DomPDF\Facade as PDF;

class RecetasController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $recetas=DB::table('receta as rec')
      ->join('paciente as pac', 'rec.paciente_id','=','pac.id')
      ->join('medicamento as med', 'rec.medicamento_id','=','med.id')
      ->join('doctor as doc', 'rec.doctor_id','=','doc.id')
      ->select('rec.id','rec.indicaciones', 'rec.fecha', DB::raw("pac.nombre AS nombre_paciente"),DB::raw("pac.apellido AS apellido_paciente"), 'med.codigo', DB::raw("med.nombre as medicamento"), 'doc.nombre', 'doc.apellido')
      ->where('rec.fecha','LIKE','%'.$query.'%')
      ->orderBy('rec.id','asc')
      ->paginate(7);

      return view('recetas.index',["recetas"=>$recetas,"searchText"=>$query]);
    }
  }

  public function create(){
    $pacientes=DB::table('paciente')->get();
    $medicamentos=DB::table('medicamento')->get();
    $doctores=DB::table('doctor')->get();
    return view("recetas.create",["pacientes"=>$pacientes, "medicamentos"=>$medicamentos, "doctores"=>$doctores]);
  }

  public function store(RecetasFormRequest $request /*Request $request*/){
    $receta= new Recetas;
    $receta->id = $request->get('id');
    $receta->indicaciones = $request->get('indicaciones');
    $receta->fecha = $request->get('fecha');
    $receta->paciente_id = $request->get('paciente_id');
    $receta->medicamento_id = $request->get('medicamento_id');
    $receta->doctor_id = $request->get('doctor_id');

    $receta->save();
    return Redirect::to('recetas/');
  }

  public function show($id){
    return view("recetas.show",["receta"=>Recetas::findOrFail($id)]);
  }
  public function edit($id){
    $pacientes=DB::table('paciente')->get();
    $medicamentos=DB::table('medicamento')->get();
    $doctores=DB::table('doctor')->get();
    return view("recetas.edit",["receta"=>Recetas::findOrFail($id),"pacientes"=>$pacientes, "medicamentos"=>$medicamentos, "doctores"=>$doctores]);
  }

  public function update(RecetasFormRequest $request, $id){

    $receta=Recetas::findOrFail($id);
    $receta->indicaciones = $request->get('indicaciones');
    $receta->direccion = $request->get('fecha');
    $receta->paciente_id = $request->get('paciente_id');
    $receta->medicamento_id = $request->get('medicamento_id');
    $receta->doctor_id = $request->get('doctor_id');
    $receta->update();

    return Redirect::to('recetas');
  }

  public function destroy($id){
    $receta = DB::table('receta')->where('id', '=',$id)->delete();
    return Redirect::to('recetas');
  }

  public function print(Request $request, $id){
      // $contrato = Contratos::find($id);
      $receta=DB::table('receta as rec')
      ->join('paciente as pac', 'rec.paciente_id','=','pac.id')
      ->join('medicamento as med', 'rec.medicamento_id','=','med.id')
      ->join('doctor as doc', 'rec.doctor_id','=','doc.id')
      ->select('rec.indicaciones', 'rec.fecha', DB::raw('pac.nombre as nombre_paciente'),DB::raw('pac.apellido as apellido_paciente'), DB::raw('med.nombre as medicamento'))
      ->where('rec.id','=',$id)->first();

      $pdf = PDF::loadView('recetas.print', compact('receta'))->setPaper('oficio', 'portrait')->setWarnings(false)->save('receta.pdf');
      return $pdf->stream('receta.pdf');
    }



}
