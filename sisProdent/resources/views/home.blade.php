@extends('layouts.admin')
@section('contenido')
<div class="row">
        <div class="col-12">
            <div class="card card-trans">
                <div class="card-header card-header-primary">
                    <h3 class="card-title">
                        Inicio
                    </h3>
                    <p class="card-category">
                        Datos Generales
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Card Pacientes -->
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">supervisor_account</i>
                    </div>
                    <p class="card-category">Doctores</p>
                    <!-- Cantidad de doctores -->
                    <h3 class="card-title">{{$doc}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="{{url('doctores/')}}" class="btn btn-sm">Ver</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Pacientes -->
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">assignment_ind</i>
                    </div>
                    <p class="card-category">Pacientes</p>
                    <!-- Cantidad de pacientes -->
                    <h3 class="card-title">{{$pac}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="{{url('pacientes/')}}" class="btn btn-sm">Ver</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Responsables -->
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">face</i>
                    </div>
                    <p class="card-category">Responsables</p>
                    <!-- Cantidad de responsables -->
                    <h3 class="card-title">{{$resp}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="{{url('pacientes_info/responsables')}}" class="btn btn-sm">Ver</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Proveedores -->
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">local_shipping</i>
                    </div>
                    <p class="card-category">Proveedores</p>
                    <!-- Cantidad de proveedores -->
                    <h3 class="card-title">{{$prov}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="{{url('proveedores/')}}" class="btn btn-sm">Ver</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Vendedores -->
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">transfer_within_a_station</i>
                    </div>
                    <p class="card-category">Vendedores</p>
                    <!-- Cantidad de vendedores -->
                    <h3 class="card-title">{{$vend}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="{{url('vendedores/')}}" class="btn btn-sm">Ver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .card-footer{
            justify-content: center !important;
        }
        .card-trans{
            background: rgba(0%, 0%, 0%, 0%);
            box-shadow: none;
        }
    </style>
@endsection
