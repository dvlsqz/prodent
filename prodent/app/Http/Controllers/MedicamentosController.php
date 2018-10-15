<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Medicamentos;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\MedicamentosFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class MedicamentosController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(Request $request){
      if($request){
        $query= trim($request->get('searchText'));
        $medicamentos=DB::table('medicamento as med')
        ->select('med.id','med.codigo','med.nombre', 'med.fecha_cad', 'med.stock','med.stock_minimo', 'med.presentacion', 'med.precio_costo','med.precio_venta','med.estado')
        ->where('med.nombre','LIKE','%'.$query.'%')
        ->orderBy('med.id','asc')
        ->paginate(7);

        return view('medicamentos.index',["medicamentos"=>$medicamentos,"searchText"=>$query]);
      }
    }

    public function create(){
      return view("medicamentos.create");
    }

    public function store(MedicamentosFormRequest $request /*Request $request*/){
      $medicamento= new Medicamentos;
      $medicamento->id = $request->get('id');
      $medicamento->codigo = $request->get('codigo');
      $medicamento->nombre = $request->get('nombre');
      $medicamento->fecha_cad = $request->get('fecha_cad');
      $medicamento->stock = $request->get('stock');
      $medicamento->stock_minimo = $request->get('stock_minimo');
      $medicamento->presentacion = $request->get('presentacion');
      $medicamento->precio_costo = $request->get('precio_costo');
      $medicamento->precio_venta = $request->get('precio_venta');
      $medicamento->estado = "Activo";

      $medicamento->save();
      return Redirect::to('medicamentos/');
    }

    public function show($id){
      return view("medicamentos.show",["medicamento"=>Medicamentos::findOrFail($id)]);
    }

    public function edit($id){
      return view("medicamentos.edit",["medicamento"=>Medicamentos::findOrFail($id)]);
    }

    public function update(MedicamentosFormRequest $request, $id){

      $medicamento=Medicamentos::findOrFail($id);
      $medicamento->codigo = $request->get('codigo');
      $medicamento->nombre = $request->get('nombre');
      $medicamento->fecha_cad = $request->get('fecha_cad');
      $medicamento->stock = $request->get('stock');
      $medicamento->stock_minimo = $request->get('stock_minimo');
      $medicamento->presentacion = $request->get('presentacion');
      $medicamento->precio_costo = $request->get('precio_costo');
      $medicamento->precio_venta = $request->get('precio_venta');
      $medicamento->estado = $request->get('estado');
      $medicamento->update();

      return Redirect::to('medicamentos');
    }

    public function destroy($id){
      $medicamento = DB::table('medicamento')->where('id', '=',$id)->delete();
      return Redirect::to('medicamentos');
    }
}
