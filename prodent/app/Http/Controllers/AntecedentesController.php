<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Antecedentes;
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
      ->join('tipo as tip', 'ant.tipo_id','=','tip.id')
      ->select('ant.id','ant.detalles', 'pac.nombre', 'pac.apellido','tip.tipo')
      ->where('ant.detalles','LIKE','%'.$query.'%')
      ->orderBy('pro.id','asc')
      ->groupBy('ant.id','ant.detalles', 'pac.nombre', 'pac.apellido','tip.tipo')
      ->paginate(7);

      return view('pacientes_info.antecedentes.index',["antecedentes"=>$antecedentes,"searchText"=>$query]);
    }
  }

  public function create(){
    $pacientes=DB::table('paciente')->get();
    $tipos=DB::table('tipo')->get();
    return view("pacientes_info.antecedentes.create",["pacientes"=>$pacientes,"tipos"=>$tipos]);
  }

  public function store(AntecedentesFormRequest $request /*Request $request*/){
    $antecedente= new Antecedentes;
    $antecedente->id = $request->get('id');
    $antecedente->detalles = $request->get('detalles');
    $antecedente->paciente_id = $request->get('paciente_id');
    $antecedente->tipo_id = $request->get('tipo_id');

    $antecedente->save();
    return Redirect::to('pacientes_info/antecedentes/');
  }

  public function show($id){
    return view("pacientes_info.antecedentes.show",["antecedente"=>Antecedentes::findOrFail($id)]);
  }

  public function edit($id){
    return view("pacientes_info.antecedentes.edit",["antecedente"=>Antecedentes::findOrFail($id)]);
  }

  public function update(AntecedentesFormRequest $request, $id){

  $antecedente=Antecedentes::findOrFail($id);
  $antecedente->detalles = $request->get('detalles');
  $antecedente->paciente_id = $request->get('paciente_id');
  $antecedente->tipo_id = $request->get('tipo_id');
  $antecedente->update();

  return Redirect::to('pacientes_info/antecedentes/');
  }

  public function destroy($id){
  $antecedente = DB::table('antecedentes')->where('id', '=',$id)->delete();
  return Redirect::to('pacientes_info/antecedentes/');
  }
}
