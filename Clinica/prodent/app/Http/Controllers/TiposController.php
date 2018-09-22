<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tipos;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\TiposFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class TiposController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $tipos=DB::table('tipo as tip')
      ->select('tip.id','tip.tipo')
      ->where('tip.tipo','LIKE','%'.$query.'%')
      ->orderBy('tip.id','asc')
      ->groupBy('tip.id','tip.tipo')
      ->paginate(7);

      return view('pacientes_info.tipos.index',["tipos"=>$tipos,"searchText"=>$query]);
    }
  }

  public function create(){
      return view("pacientes_info.tipos.create");
  }

public function store(TiposFormRequest $request /*Request $request*/){
    $tipo= new Tipos;
    $tipo->id = $request->get('id');
    $tipo->tipo = $request->get('tipo');


    $tipo->save();
    return Redirect::to('pacientes_info/tipos/');
  }

  public function show($id){
    return view("pacientes_info.tipos.show",["tipo"=>Tipos::findOrFail($id)]);
  }

  public function edit($id){
    return view("pacientes_info.tipos.edit",["tipo"=>Tipos::findOrFail($id)]);
  }

  public function update(ProveedoresFormRequest $request, $id){

  $tipo=Tipos::findOrFail($id);
  $tipo->tipo = $request->get('tipo');
  $tipo->update();

  return Redirect::to('pacientes_info/tipos/');
  }

  public function destroy($id){
  $tipo = DB::table('tipo')->where('id', '=',$id)->delete();
  return Redirect::to('pacientes_info/tipos/');
  }
}
