<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Antecedentes;
use App\Pacientes;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AntecedentesFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class AntecedentesController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $antecedentes=DB::table('antecedentes as ant')
      ->join('paciente as pac', 'ant.paciente_id','=','pac.id')
      ->select('ant.id','ant.descripcion','ant.tipo', 'pac.nombre', 'pac.apellido')
      ->where('ant.descripcion','LIKE','%'.$query.'%')
      ->orderBy('ant.id','asc')
      ->groupBy('ant.id','ant.descripcion','ant.tipo', 'pac.nombre', 'pac.apellido')
      ->paginate(7);

      return view('pacientes_info.antecedentes.index',["antecedentes"=>$antecedentes,"searchText"=>$query]);
    }
  }

  public function create(){
    $pacientes=DB::table('paciente')->get();
    return view("pacientes_info.antecedentes.create",["pacientes"=>$pacientes]);
  }

  public function store(AntecedentesFormRequest $request /*Request $request*/){
    $antecedente= new Antecedentes;
    $antecedente->id = $request->get('id');
    $antecedente->descripcion = $request->get('descripcion');
    $antecedente->paciente_id = $request->get('paciente_id');
    $antecedente->tipo = $request->get('tipo');

    $antecedente->save();
    return Redirect::to('pacientes_info/antecedentes/');
  }

  public function show($id){
    $antecedente = Antecedentes::findOrFail($id);
    $paciente = Pacientes::findOrFail($antecedente->paciente_id);
    
    return view("pacientes_info.antecedentes.show")->with('antecedente',$antecedente)->with('paciente', $paciente);
  }

  public function edit($id){
    $pacientes=DB::table('paciente')->get();
    return view("pacientes_info.antecedentes.edit",["antecedente"=>Antecedentes::findOrFail($id),"pacientes"=>$pacientes]);
  }

  public function update(AntecedentesFormRequest $request, $id){

  $antecedente=Antecedentes::findOrFail($id);
  $antecedente->descripcion = $request->get('descripcion');
  $antecedente->paciente_id = $request->get('paciente_id');
  $antecedente->tipo = $request->get('tipo');
  $antecedente->update();

  return Redirect::to('pacientes_info/antecedentes/');
  }

  public function destroy($id){
  $antecedente = DB::table('antecedentes')->where('id', '=',$id)->delete();
  return Redirect::to('pacientes_info/antecedentes/');
  }
}
