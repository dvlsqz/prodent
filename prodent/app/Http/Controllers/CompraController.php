<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CompraFormRequest;
use App\Compra;
use App\DetalleCompra;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;

use Carbon\Carbon;

use Response;
use Illuminate\Support\Collection;

class CompraController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $compras=DB::table('compra as com')
      ->join('doctor as doc', 'com.doctor_id','=','doc.id')
      ->join('forma_pago as fp', 'com.forma_pago_id','=','fp.id')
      ->join('detalle_compra as dc', 'com.id','=','dc.compra_id')
      ->select('com.id','com.num_lote', 'com.fecha','com.total', DB::raw('doc.nombe as nombre_doctor'),DB::raw('doc.apellido as apellido_doctor'),DB::raw('sum(dc.cantidad*dc.precio) as total'), DB::raw('fp.forma as forma_pago'),'com.detalles')
      ->where('com.detalles','LIKE','%'.$query.'%')
      ->orderBy('com.id','asc')
      ->paginate(7);

      return view('medicamentos_cv.compras.index',["compras"=>$compras,"searchText"=>$query]);
    }
  }

  public function create(){
    $doctores=DB::table('doctor')->get();
    $fpagos=DB::table('forma_pago')->get();
    $proveedores=DB::table('proveedor')->get();
    $medicamentos = DB::table('medicamento as med')->get();

    return view("medicamentos_cv.compras.create",["doctores"=>$doctores,"fpagos"=>$fpagos,"medicamentos"=>$medicamentos, "proveedores"=>$proveedores]);
  }

public function store(CompraFormRequest $request /*Request $request*/){
DB::beginTransaction();
  try{


        $compra = New Compra;
        $compra->id = $request->get('id');
        $compra->num_lote = $request->get('num_lote');
        $compra->fecha=$request->get('fecha');
        $compra->detalles = $request->get('detalles');
        $compra->doctor_id = $request->get('doctor_id');
        $compra->forma_pago_id = $request->get('forma_pago_id');
        $compra->save();

        $medicamento_id = $request->get('medicamento_id');
        $cantidad = $request->get('cantidad');
        $precio = $request->get('precio');
        $proveedor_id =$request->get('proveedor_id');

        $cont = 0;

        while($cont < count($medicamento_id)){
          $detalle = new DetalleCompra;
          $detalle->compra_id = $compra->id;
          $detalle->medicamento_id = $medicamento_id[$cont];
          $detalle->proveedor_id = $proveedor_id[$cont];
          $detalle->cantidad = $ccantidad[$cont];
          $detalle->precio = $precio[$cont];
          $detalle->save();
          $cont = $cont+1;
        }
        DB::commit();
      }catch(\Exception $e){
        echo $e->getMessage();
        DB::rollback();
      }


    return Redirect::to('medicamentos_cv/compras');
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
    $compra = DB::table('compra')->where('id', '=',$id)->delete();
    return Redirect::to('medicamentos_cv/compras');
  }
}
