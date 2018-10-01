<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Citas;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CitasFormRequest;
use Illuminate\Support\Facades\Input;
use DB;

class CitasController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    return view('citas.index');
  }

  public function show($id){
    return view("citas.show");
  }
}
