<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pagos;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PagosFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class PagosController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $pagos=DB::table('cuenta as cu')
      ->join('tratamiento as tra', 'cu.tratamiento_id','=','tra.id')
      ->select('cu.id','cu.saldo','cu.fecha','tra.saldo_actual','tra.nombre')
      ->where('cu.fecha','LIKE','%'.$query.'%')
      ->orderBy('cu.id','asc')
      ->paginate(7);

      return view('pagos.index',["pagos"=>$pagos,"searchText"=>$query]);
    }
  }

  public function create(){
    $tratamientos=DB::table('tratamiento as tra')
      ->join('paciente as pac','tra.paciente_id','=','pac.id')
      ->select('tra.id','tra.nombre',DB::raw('pac.nombre as nombre_paciente'),DB::raw('pac.apellido as apellido_paciente'),'tra.saldo_actual')
      ->get();
    return view("pagos.create",["tratamientos"=>$tratamientos]);
  }

public function store(PagosFormRequest $request /*Request $request*/){
    $pago= new Pagos;
    $pago->id = $request->get('id');
    $pago->saldo = $request->get('saldo');
    $pago->fecha = $request->get('fecha');
    $pago->tratamiento_id = $request->get('tratamiento_id');

    $pago->save();
    return Redirect::to('pagos/');
  }

  public function show($id){
    $pago=DB::table('cuenta as cu')
    ->join('tratamiento as tra', 'cu.tratamiento_id','=','tra.id')
    ->join('paciente as pac', 'tra.paciente_id','=','pac.id')
    ->select('cu.id','cu.saldo','cu.fecha','tra.saldo_actual','tra.nombre','pac.nombre','pac.apellido')
    ->where('cu.id','=',$id)->first();
    return view("pagos.show",["pago"=>Pagos::findOrFail($id)]);
  }

  public function edit($id){
    $tratamientos=DB::table('tratamiento')->get();
    return view("pagos.edit",["pago"=>Pagos::findOrFail($id),"tratamientos"=>$tratamientos]);
  }

  public function update(PagosFormRequest $request, $id){

    $pago=Pagos::findOrFail($id);
    $pago->saldo = $request->get('saldo');
    $pago->fecha = $request->get('fecha');
    $pago->tratamiento_id = $request->get('tratamiento_id');
    $pago->update();

    return Redirect::to('pagos');
  }

  public function destroy($id){
    $pago = DB::table('cuenta')->where('id', '=',$id)->delete();
    return Redirect::to('pagos');
  }
}
