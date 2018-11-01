@extends('layouts.admin')
@section('contenido')

	<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="nombre">Nombre(s)</label>
      <input type="text" name="nombre" value="{{$paciente->nombre}}" class="form-control" placeholder="Nombre..." readonly="true">
    </div>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="apellido">Apellido(s)</label>
      <input type="text" name="apellido" value="{{$paciente->apellido}}" class="form-control" placeholder="Apellido..." readonly="true">
    </div>
  </div>


  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="genero_id">Género</label>
        <input  type="text" name="genero_id" value="{{$genero->genero}}" class="form-control" placeholder="Genero..." readonly="true">
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="fecha_nac">Fecha de Nacimiento</label>
        <input type="date" name="fecha_nac" value="{{$paciente->fecha_nac}}" class="form-control" readonly="true">
      </div>
    </div>

  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="direccion">Dirección</label>
      <input  type="text" name="direccion" value="{{$paciente->direccion}}" class="form-control" placeholder="Direccion..." readonly="true">
    </div>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="telefono">Teléfono</label>
      <input type="text" name="telefono" value="{{$paciente->telefono}}" class="form-control" placeholder="Telefono..." readonly="true">
    </div>
  </div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="fecha_registro">Fecha de Registro</label>
			<input type="datetime" name="fecha_registro" value="{{$paciente->fecha_registro}}" class="form-control" readonly="true">
		</div>
	</div>

  </div>
  <div class="row">
    <div class="col-2 col-offset-5">
      <a href="{{url('/pacientes')}}">
        <button class="btn btn-info btn-sm" title="Regresar">
          Regresar
        </button>
      </a>
    </div>
  </div>


@endsection
