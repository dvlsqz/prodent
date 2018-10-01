@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="form-group">
			<label for="nombre">Nombre(es)</label>
			<input type="text" name="nombre" required value="{{$doctor->nombre}}" class="form-control" placeholder="Nombre...">
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="apellido">Apellido(os)</label>
			<input type="text" name="apellido" required value="{{$doctor->apellido}}" class="form-control" placeholder="Apellido...">
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="direccion">Direccion</label>
			<input type="text" name="direccion" value="{{$doctor->direccion}}" class="form-control" placeholder="Direccion...">
		</div>
	</div>

  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="users_id">Usuario</label>
      <input disabled type="text" name="users_id" value="{{$doctor->email}}" class="form-control" placeholder="Usuario...">
    </div>
  </div>

  </div>


@endsection
