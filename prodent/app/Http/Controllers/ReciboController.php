<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ReciboFormRequest;
use App\Recibo;
use App\DetalleRecibo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;

use Carbon\Carbon;

use Response;
use Illuminate\Support\Collection;

class ReciboController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $ventas=DB::table('recibo as reb')
      ->join('paciente as pac', 'reb.paciente_id','=','pac.id')
      ->join('forma_pago as fp', 'reb.forma_pago_id','=','fp.id')
      ->join('detalle_recibo as dr', 'reb.id','=','dr.recibo_id')
      ->select('reb.id','reb.serie', 'reb.fecha','reb.descuento','reb.total','reb.detalles','reb.estado', DB::raw('pac.nombe as nombre_paciente'),DB::raw('pac.apellido as apellido_paciente'),DB::raw('sum(dr.cantidad*dr.precio) as total'), DB::raw('fp.forma as forma_pago'))
      ->where('reb.detalles','LIKE','%'.$query.'%')
      ->orderBy('reb.id','asc')
      ->paginate(7);

      return view('medicamentos_cv.ventas.index',["ventas"=>$ventas,"searchText"=>$query]);
    }
  }

  public function create(){
    $pacientes=DB::table('paciente')->get();
    $fpagos=DB::table('forma_pago')->get();
    $tratamientos=DB::table('tratamiento')->get();
    $medicamentos = DB::table('medicamento as med')->get();

    return view("medicamentos_cv.ventas.create",["pacientes"=>$pacientes,"fpagos"=>$fpagos,"medicamentos"=>$medicamentos, "tratamientos"=>$tratamientos]);
  }

public function store(ReciboFormRequest $request /*Request $request*/){

  try{
    DB::beginTransaction();

        $recibo = New Recibo;
        $recibo->id = $request->get('id');
        $recibo->serie = $request->get('serie');
        $recibo->fecha=$request->get('fecha');
        $recibo->descuento = $request->get('descuento');
        $recibo->total=$request->get('total');
        $recibo->estado=$request->get('estado');
        $recibo->paciente_id = $request->get('paciente_id');
        $compra->forma_pago_id = $request->get('forma_pago_id');
        $recibo->save();

        $medicamento_id = $request->get('medicamento_id');
        $cantidad = $request->get('cantidad');
        $precio = $request->get('precio');
        $tratamiento_id =$request->get('tratamiento_id');

        $cont = 0;

        while($cont < count($medicament_id)){
          $detalle = new DetalleRecibo;
          $detalle->recibo_id = $recibo->id;
          $detalle->medicamento_id = $medicamento_id[$cont];
          $detalle->tratamiento_id = $tratamiento_id[$cont];
          $detalle->cantidad = $ccantidad[$cont];
          $detalle->precio = $precio[$cont];
          $detalle->save();
          $cont = $cont+1;
        }
        DB::commit();
      }catch(\Exception $e){
        DB::rollback();
      }
    return Redirect::to('medicamentos_cv/ventas');
  }

  public function show($id){
    $compra = DB::table('compra as com')
      ->join('doctor as doc', 'com.doctor_id','=','doc.id')
      ->join('forma_pago as fp', 'com.forma_pago_id','=','fp.id')
      ->join('detalle_compra as dc', 'com.id','=','dc.compra_id')
      ->select('com.id','com.num_lote', 'com.fecha','com.total', DB::raw('doc.nombe as nombre_doctor'),DB::raw('doc.apellido as apellido_doctor'),DB::raw('sum(dc.cantidad*dc.precio) as total'), DB::raw('fp.forma as forma_pago'))
      ->where('com.id','=',$id)->first();
    $detalles = DB::table('detalle_compra as dc')
      ->join('medicamento as med','d.medicamento_id','=','med.id')
      ->join('proveedor as pro','d.proveedor_id','=','pro.id')
      ->select('dc.cantidad','dc.precio',DB::raw('med.nombre as medicamento'), DB::raw('pro.nombre as proveedor'))
      ->where('dc.compra_id','=',$id)->get();
    return view("medicamentos_cv.compras.show",["compra"=>$compra,"detalles"=>$detalles]);
  }


  public function destroy($id){
    $venta = DB::table('recibo')->where('id', '=',$id)->delete();
    return Redirect::to('medicamentos_cv/ventas');
  }
}
