<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Vendedores;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\VendedoresFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class VendedoresController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $vendedores=DB::table('vendedor as ven')
      ->select('ven.id','ven.nombre', 'ven.telefono')
      ->where('ven.nombre','LIKE','%'.$query.'%')
      ->orderBy('ven.id','asc')
      ->groupBy('ven.id','ven.nombre', 'ven.telefono')
      ->paginate(7);

      return view('vendedores.index',["vendedores"=>$vendedores,"searchText"=>$query]);
    }
  }

  public function create(){
    $vendedores=DB::table('vendedor')->get();
    return view("vendedores.create",["vendedor"=>$vendedores]);
  }

public function store(VendedoresFormRequest $request /*Request $request*/){
    $vendedor= new Vendedores;
    $vendedor->id = $request->get('id');
    $vendedor->nombre = $request->get('nombre');
    $vendedor->telefono = $request->get('telefono');

    $vendedor->save();
    return Redirect::to('vendedores/');
  }

  public function show($id){
    return view("vendedores.show",["vendedor"=>Vendedores::findOrFail($id)]);
  }

  public function edit($id){
    return view("vendedores.edit",["vendedor"=>Vendedores::findOrFail($id)]);
  }

  public function update(VendedoresFormRequest $request, $id){

  $vendedor=Vendedores::findOrFail($id);
  $vendedor->nombre = $request->get('nombre');
  $vendedor->telefono = $request->get('telefono');
  $paciente->update();

  return Redirect::to('vendedores');
}

  public function destroy($id){
    $vendedor = DB::table('vendedor')->where('id', '=',$id)->delete();
    return Redirect::to('vendedores');
  }
}
