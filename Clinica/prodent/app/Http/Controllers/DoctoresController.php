<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Doctores;
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
      ->select('doc.id','doc.nombre','doc.apellido', 'doc.direccion','use.email')
      ->where('doc.nombre','LIKE','%'.$query.'%')
      ->orderBy('doc.id','asc')
      ->groupBy('doc.id','doc.nombre','doc.apellido', 'doc.direccion','use.email')
      ->paginate(7);

      return view('doctores.index',["doctores"=>$doctores,"searchText"=>$query]);
    }
  }

  public function create(){
    $users=DB::table('users')->get();
    return view("doctores.create",["users"=>$users]);
  }

  public function store(DoctoresFormRequest $request /*Request $request*/){
    $doctor= new Doctores;
    $doctor->id = $request->get('id');
    $doctor->nombre = $request->get('nombre');
    $doctor->apellido = $request->get('apellido');
    $doctor->direccion = $request->get('direccion');
    $doctor->users_id = $request->get('users_id');

    $doctor->save();
    return Redirect::to('doctores/');
  }

  public function show($id){
    return view("doctores.show",["doctor"=>Doctores::findOrFail($id)]);
  }

  public function edit($id){
    return view("doctores.edit",["doctor"=>Doctores::findOrFail($id)]);
  }

  public function update(DoctoresFormRequest $request, $id){

    $doctor=Doctores::findOrFail($id);
    $doctor->nombre = $request->get('nombre');
    $doctor->apellido = $request->get('apellido');
    $doctor->direccion = $request->get('direccion');
    $doctor->users_id = $request->get('users_id');
    $doctor->update();

    return Redirect::to('doctores');
  }

  public function destroy($id){
    $doctor = DB::table('doctor')->where('id', '=',$id)->delete();
    return Redirect::to('doctores');
  }
}
