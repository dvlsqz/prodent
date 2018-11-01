<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Doctores;
use App\Generos;
use App\User;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\DoctoresFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class DoctoresController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    if($request){
      $query= trim($request->get('searchText'));
      $doctores=DB::table('doctor as doc')
      ->join('users as use', 'doc.users_id','=','use.id')
      ->join('genero as gen', 'doc.genero_id','=','gen.id')
      ->select('doc.id','doc.nombre','doc.apellido','doc.fecha_nac','doc.genero_id','doc.direccion','use.email', DB::raw('gen.genero as genero'))
      ->where('doc.nombre','LIKE','%'.$query.'%')
      ->orderBy('doc.id','asc')
      ->paginate(7);

      return view('doctores.index',["doctores"=>$doctores,"searchText"=>$query]);
    }
  }

  public function create(){
    $users=DB::table('users')->get();
    $generos=DB::table('genero')->get();
    return view("doctores.create",["users"=>$users,"generos"=>$generos]);
  }

  public function store(DoctoresFormRequest $request /*Request $request*/){
    $doctor= new Doctores;
    $doctor->id = $request->get('id');
    $doctor->nombre = $request->get('nombre');
    $doctor->apellido = $request->get('apellido');
    $doctor->direccion = $request->get('direccion');
    $fecha = date("Y/m/d", strtotime($request->get('fecha_nac')));
    $doctor->fecha_nac = $fecha;
    $doctor->genero_id = $request->get('genero_id');
    $doctor->users_id = $request->get('users_id');

    $doctor->save();
    return Redirect::to('doctores/');
  }

  public function show($id){
    $doctor = Doctores::findOrFail($id);
    $genero = Generos::findOrFail($doctor->genero_id);
    $usuario = User::findOrFail($doctor->users_id);
    
    return view("doctores.show",["doctor"=>$doctor, "genero"=>$genero, "usuario"=>$usuario]);
  }

  public function edit($id){
    $users=DB::table('users')->get();
    $generos=DB::table('genero')->get();
    return view("doctores.edit",["doctor"=>Doctores::findOrFail($id),"users"=>$users,"generos"=>$generos]);
  }

  public function update(DoctoresFormRequest $request, $id){

    $doctor=Doctores::findOrFail($id);
    $doctor->nombre = $request->get('nombre');
    $doctor->apellido = $request->get('apellido');
    $doctor->direccion = $request->get('direccion');
    $fecha = date("Y/m/d", strtotime($request->get('fecha_nac')));
    $doctor->fecha_nac = $fecha;
    $doctor->genero_id = $request->get('genero_id');
    $doctor->users_id = $request->get('users_id');
    $doctor->update();

    return Redirect::to('doctores');
  }

  public function destroy($id){
    $doctor = DB::table('doctor')->where('id', '=',$id)->delete();
    return Redirect::to('doctores');
  }
}
