<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reportes;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ReportesFormRequest;
use Illuminate\Support\Facades\Input;
use DB;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class ReportesController extends Controller
{
  public function index(Request $request){

      return view('reportes.index');

  }

    public function rpvmedicamentos(){
        $medicamentos=DB::table('medicamento as med')
        ->select('med.id','med.codigo','med.nombre', 'med.fecha_cad', 'med.stock','med.stock_minimo', 'med.presentacion', 'med.precio_costo','med.precio_venta','med.estado')
        ->get();

        $pdf = PDF::loadView('reportes.medicamentos_vencer.rpvmedicamentos', compact('medicamentos'))->setPaper('oficio', 'portrait')->setWarnings(false)->save('reporte.pdf');
        return $pdf->stream('reporte.pdf');
    }

    public function reportemedicamentos(){
        $medicamentos=DB::table('medicamento as med')
        ->select('med.id','med.codigo','med.nombre', 'med.fecha_cad', 'med.stock','med.stock_minimo', 'med.presentacion', 'med.precio_costo','med.precio_venta','med.estado')
        ->get();

        $pdf = PDF::loadView('reportes.medicamentos.medicamentos', compact('medicamentos'))->setPaper('oficio', 'portrait')->setWarnings(false)->save('reporte.pdf');
        return $pdf->stream('reporte.pdf');
    }

    public function smmedicamentos(){
        $medicamentos=DB::table('medicamento as med')
        ->select('med.id','med.codigo','med.nombre', 'med.fecha_cad', 'med.stock','med.stock_minimo', 'med.presentacion', 'med.precio_costo','med.precio_venta','med.estado')
        ->get();

        $pdf = PDF::loadView('reportes.medicamentosStockMinimo.smmedicamentos', compact('medicamentos'))->setPaper('oficio', 'portrait')->setWarnings(false)->save('reporte.pdf');
        return $pdf->stream('reporte.pdf');
    }

    public function semedicamentos(){
        $medicamentos=DB::table('medicamento as med')
        ->select('med.id','med.codigo','med.nombre', 'med.fecha_cad', 'med.stock','med.stock_minimo', 'med.presentacion', 'med.precio_costo','med.precio_venta','med.estado')
        ->get();

        $pdf = PDF::loadView('reportes.medicamentosSinStock.semedicamentos', compact('medicamentos'))->setPaper('oficio', 'portrait')->setWarnings(false)->save('reporte.pdf');
        return $pdf->stream('reporte.pdf');
    }


}
