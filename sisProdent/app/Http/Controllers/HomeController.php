<?php

namespace App\Http\Controllers;
use App\Doctores;
use App\Pacientes;
use App\Responsables;
use App\Proveedores;
use App\Vendedores;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctores = Doctores::count();
        $pacientes = Pacientes::count();
        $responsables = Responsables::count();
        $proveedores = Proveedores::count();
        $vendedores = Vendedores::count();
        return view('home',["doc"=>$doctores, "pac"=>$pacientes, "resp"=>$responsables, "prov"=>$proveedores, "vend"=>$vendedores]);
    }
}
