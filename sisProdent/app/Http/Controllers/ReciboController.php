<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Http\Requests\ReciboFormRequest;
use App\Recibo;
use App\DetalleRecibo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;

use Barryvdh\DomPDF\Facade as PDF;

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
      ->select('reb.id','reb.serie', 'reb.fecha','reb.detalles', DB::raw('pac.nombre as nombre_paciente'),DB::raw('pac.apellido as apellido_paciente'), DB::raw('fp.forma as forma_pago'))
      ->where('reb.detalles','LIKE','%'.$query.'%')
      ->orderBy('reb.id','asc')
      ->paginate(7);

    }
          return view('medicamentos_cv.ventas.index',["ventas"=>$ventas,"searchText"=>$query]);
  }

  public function create(){
    $pacientes=DB::table('paciente')->get();
    $fpagos=DB::table('forma_pago')->get();
    $tratamientos=DB::table('tratamiento')->get();
    $medicamentos = DB::table('medicamento as med')->get();

    return view("medicamentos_cv.ventas.create",["pacientes"=>$pacientes,"fpagos"=>$fpagos,"medicamentos"=>$medicamentos, "tratamientos"=>$tratamientos]);
  }

public function store(ReciboFormRequest $request /*Request $request*/){
  try {
           DB::beginTransaction();
           $recibo = New Recibo;
           $recibo->id = $request->get('id');
           $recibo->serie = $request->get('serie');
           $fecha = date("Y/m/d", strtotime($request->get('fecha')));
           $recibo->fecha = $fecha;
           $recibo->detalles = $request->get('detalles');
           $recibo->paciente_id = $request->get('paciente_id');
           $recibo->forma_pago_id = $request->get('forma_pago_id');
           $recibo->save();

           $medicamento_id = $request->get('medicamento_id');
           $cantidad = $request->get('cantidad');
           $precio = $request->get('precio');
           $tratamiento_id =$request->get('tratamiento_id');

           $cont = 0;

           while ($cont<count($medicamento_id)) {
             $detalle = new DetalleRecibo;
             $detalle->recibo_id = $recibo->id;
             $detalle->medicamento_id = $medicamento_id[$cont];
             $detalle->tratamiento_id = $tratamiento_id[$cont];
             $detalle->cantidad = $cantidad[$cont];
             $detalle->precio = $precio[$cont];
             $detalle->save();
             $cont = $cont+1;
           }

           DB::commit();
       } catch (Exception $e) {
           DB::rollback();
       }

    return Redirect::to('medicamentos_cv/ventas');
  }

  public function show($id){
    $ventas=DB::table('recibo as reb')
    ->join('paciente as pac', 'reb.paciente_id','=','pac.id')
    ->join('forma_pago as fp', 'reb.forma_pago_id','=','fp.id')
    ->select('reb.id','reb.serie', 'reb.fecha','reb.detalles', DB::raw('pac.nombre as nombre_paciente'),DB::raw('pac.apellido as apellido_paciente'), DB::raw('fp.forma as forma_pago'))
      ->where('reb.id','=',$id)->first();
    $detalles = DB::table('detalle_recibo as dr')
      ->join('medicamento as med','dr.medicamento_id','=','med.id')
      ->join('paciente as pac', 'reb.paciente_id','=','pac.id')
      ->select('dr.cantidad','dr.precio',DB::raw('med.nombre as medicamento'),  DB::raw('pac.nombre as nombre_paciente'),DB::raw('pac.apellido as apellido_paciente'))
      ->where('dr.recibo_id','=',$id)->get();
    return view("medicamentos_cv.ventas.show",["compra"=>$compra,"detalles"=>$detalles]);
  }



  public function destroy($id){
    $venta = DB::table('recibo')->where('id', '=',$id)->delete();
    return Redirect::to('medicamentos_cv/ventas');
  }

  public function print(Request $request, $id){
      // $contrato = Contratos::find($id);
      $venta=DB::table('recibo as reb')
      ->join('paciente as pac', 'reb.paciente_id','=','pac.id')
      ->join('forma_pago as fp', 'reb.forma_pago_id','=','fp.id')
      ->join('detalle_recibo as dr', 'reb.id','=','dr.id')
      ->select('reb.id','reb.serie', 'reb.fecha','reb.detalles',DB::raw('pac.nombre as nombre_paciente'),DB::raw('pac.apellido as apellido_paciente'), DB::raw('fp.forma as forma_pago'))
      ->where('reb.id','=',$id)->first();

      $pdf = PDF::loadView('medicamentos_cv.ventas.print', compact('venta'))->setPaper('oficio', 'portrait')->setWarnings(false)->save('recibo.pdf');
      return $pdf->stream('recibo.pdf');
    }
}
