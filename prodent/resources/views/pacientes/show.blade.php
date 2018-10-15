@extends('layouts.admin')
@section('contenido')

	<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="nombre">Nombre(es)</label>
      <input disabled type="text" name="nombre" required value="{{$paciente->nombre}}" class="form-control" placeholder="Nombre...">
    </div>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="apellido">Apellido(os)</label>
      <input disabled type="text" name="apellido" required value="{{$paciente->apellido}}" class="form-control" placeholder="Apellido...">
    </div>
  </div>


  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="genero_id">genero</label>
        <input disabled  type="text" name="genero_id" required value="{{$paciente->genero}}" class="form-control" placeholder="Genero...">
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="fecha_nac">Fecha de Nacimiento</label>
        <input disabled type="date" name="fecha_nac" value="{{$paciente->fecha_nac}}" class="form-control">
      </div>
    </div>

  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="direccion">Direccion</label>
      <input disabled type="text" name="direccion" value="{{$paciente->direccion}}" class="form-control" placeholder="Direccion...">
    </div>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="telefono">Telefono</label>
      <input disabled type="text" name="telefono" value="{{$paciente->telefono}}" class="form-control" placeholder="Telefono...">
    </div>
  </div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="fecha_registro">Fecha de Registro</label>
			<input disabled type="date" name="fecha_registro" value="{{$paciente->fecha_registro}}" class="form-control">
		</div>
	</div>

  </div>


@endsection
