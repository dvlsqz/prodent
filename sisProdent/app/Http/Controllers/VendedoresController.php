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
      ->join('proveedor as pro', 'ven.proveedor_id','=','pro.id')
      ->select('ven.id','ven.nombre' ,'ven.apellido','ven.correo','ven.direccion', 'ven.telefono', DB::raw("pro.nombre as proveedor"))
      ->where('ven.nombre','LIKE','%'.$query.'%')
      ->orderBy('ven.id','asc')
      ->paginate(7);

      return view('vendedores.index',["vendedores"=>$vendedores,"searchText"=>$query]);
    }
  }

  public function create(){
    $proveedores=DB::table('proveedor')->get();
    return view("vendedores.create",["proveedores"=>$proveedores]);
  }

public function store(VendedoresFormRequest $request /*Request $request*/){
    $vendedor= new Vendedores;
    $vendedor->id = $request->get('id');
    $vendedor->nombre = $request->get('nombre');
    $vendedor->apellido = $request->get('apellido');
    $vendedor->correo = $request->get('correo');
    $vendedor->direccion = $request->get('direccion');
    $vendedor->telefono = $request->get('telefono');
    $vendedor->proveedor_id = $request->get('proveedor_id');

    $vendedor->save();
    return Redirect::to('vendedores/');
  }

  public function show($id){
    $vendedores=DB::table('vendedor as ven')
      ->join('proveedor as pro', 'ven.proveedor_id','=','pro.id')
    ->select('ven.id','ven.nombre', 'ven.apellido','ven.correo','ven.direccion', 'ven.telefono', DB::raw("pro.nombre as proveedor"))
    ->where('ven.id','=',$id)->first();
    return view("vendedores.show",["vendedor"=>Vendedores::findOrFail($id)]);
  }

  public function edit($id){
    $proveedores=DB::table('proveedor')->get();
    return view("vendedores.edit",["vendedor"=>Vendedores::findOrFail($id),"proveedores"=>$proveedores]);
  }

  public function update(VendedoresFormRequest $request, $id){

  $vendedor=Vendedores::findOrFail($id);
  $vendedor->nombre = $request->get('nombre');
  $vendedor->apellido = $request->get('apellido');
  $vendedor->correo = $request->get('correo');
  $vendedor->direccion = $request->get('direccion');
  $vendedor->telefono = $request->get('telefono');
  $vendedor->proveedor_id = $request->get('proveedor_id');
  $vendedor->update();

  return Redirect::to('vendedores');
}

  public function destroy($id){
    $vendedor = DB::table('vendedor')->where('id', '=',$id)->delete();
    return Redirect::to('vendedores');
  }
}
