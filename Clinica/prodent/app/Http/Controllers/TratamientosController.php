<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tratamientos;
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
      ->join('receta as rec', 'tra.receta_id','=','rec.id')
      ->select('tra.id','tra.nombre', 'tra.tipo', 'tra.detalle','tra.precio','rec.id')
      ->where('tra.nombre','LIKE','%'.$query.'%')
      ->orderBy('tra.id','asc')
      ->groupBy('tra.id','tra.nombre', 'tra.tipo', 'tra.detalle','tra.precio','rec.id')
      ->paginate(7);

      return view('tratamientos.index',["tratamientos"=>$tratamientos,"searchText"=>$query]);
    }
  }

  public function create(){
    $recetas=DB::table('receta')->get();
    return view("tratamientos.create",["recetas"=>$recetas]);
  }

public function store(ProveedoresFormRequest $request /*Request $request*/){
    $tratamiento= new Tratamientos;
    $tratamiento->id = $request->get('id');
    $tratamiento->nombre = $request->get('nombre');
    $tratamiento->tipo = $request->get('tipo');
    $tratamiento->detalle = $request->get('detalle');
    $tratamiento->precio = $request->get('precio');
    $tratamiento->receta_id = $request->get('receta_id');

    $tratamiento->save();
    return Redirect::to('tratamientos/');
  }

  public function show($id){
    return view("tratamientos.show",["tratamiento"=>Tratamientos::findOrFail($id)]);
  }

  public function edit($id){
    return view("tratamientos.edit",["tratamiento"=>Tratamientos::findOrFail($id)]);
  }

  public function update(ProveedoresFormRequest $request, $id){

  $tratamiento=Tratamientos::findOrFail($id);
  $tratamiento->nombre = $request->get('nombre');
  $tratamiento->tipo = $request->get('tipo');
  $tratamiento->detalle = $request->get('detalle');
  $tratamiento->precio = $request->get('precio');
  $tratamiento->receta_id = $request->get('receta_id');
  $tratamiento->update();

  return Redirect::to('tratamientos');
}

public function destroy($id){
  $tratamiento = DB::table('tratamiento')->where('id', '=',$id)->delete();
  return Redirect::to('tratamientos');
}
}
