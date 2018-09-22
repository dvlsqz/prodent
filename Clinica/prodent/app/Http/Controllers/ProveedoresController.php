<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Proveedores;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProveedoresFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class ProveedoresController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(Request $request){
      if($request){
  			$query= trim($request->get('searchText'));
  			$proveedores=DB::table('proveedor as pro')
        ->join('vendedor as ven', 'pro.vendedor_id','=','ven.id')
  			->select('pro.id','pro.nombre', 'pro.direccion', 'pro.correo','pro.num_cuenta', 'pro.telefono1', 'pro.telefono2', DB::raw("ven.nombre as vendedor"))
  			->where('pro.nombre','LIKE','%'.$query.'%')
  			->orderBy('pro.id','asc')
  			->groupBy('pro.id','pro.nombre', 'pro.direccion', 'pro.correo','pro.num_cuenta', 'pro.telefono1', 'pro.telefono2', 'ven.nombre')
  			->paginate(7);

  			return view('proveedores.index',["proveedores"=>$proveedores,"searchText"=>$query]);
  		}
    }

    public function create(){
      $vendedores=DB::table('vendedor')->get();
      return view("proveedores.create",["vendedores"=>$vendedores]);
    }

  public function store(ProveedoresFormRequest $request /*Request $request*/){
      $proveedor= new Proveedores;
      $proveedor->id = $request->get('id');
      $proveedor->nombre = $request->get('nombre');
      $proveedor->direccion = $request->get('direccion');
      $proveedor->correo = $request->get('correo');
      $proveedor->num_cuenta = $request->get('num_cuenta');
      $proveedor->telefono1 = $request->get('telefono1');
      $proveedor->telefono2 = $request->get('telefono2');
      $proveedor->vendedor_id = $request->get('vendedor_id');

      $proveedor->save();
      return Redirect::to('proveedores/');
    }

    public function show($id){
      return view("proveedores.show",["proveedor"=>Proveedores::findOrFail($id)]);
    }

    public function edit($id){
      return view("proveedores.edit",["proveedor"=>Proveedores::findOrFail($id)]);
    }

    public function update(ProveedoresFormRequest $request, $id){

    $proveedor=Proveedores::findOrFail($id);
    $proveedor->nombre = $request->get('nombre');
    $proveedor->direccion = $request->get('direccion');
    $proveedor->correo = $request->get('correo');
    $proveedor->num_cuenta = $request->get('num_cuenta');
    $proveedor->telefono1 = $request->get('telefono1');
    $proveedor->telefono2 = $request->get('telefono2');
    $proveedor->vendedor_id = $request->get('vendedor_id');
    $proveedor->update();

    return Redirect::to('proveedores');
  }

  public function destroy($id){
    $proveedor = DB::table('proveedor')->where('id', '=',$id)->delete();
    return Redirect::to('proveedores');
  }
}
