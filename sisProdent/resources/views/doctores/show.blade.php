@extends('layouts.admin')
@section('contenido')

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Nombre(s)</label>
			<input type="text" name="nombre" value="{{$doctor->nombre}}" class="form-control" placeholder="Nombre..." readonly="true">
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="apellido">Apellido(s)</label>
			<input type="text" name="apellido"value="{{$doctor->apellido}}" class="form-control" placeholder="Apellido..." readonly="true">
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="direccion">Direccion</label>
			<input type="text" name="direccion" value="{{$doctor->direccion}}" class="form-control" placeholder="Direccion..." readonly="true">
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="genero_id">Género</label>
        <input type="text" name="genero_id" value="{{$genero->genero}}" class="form-control" placeholder="Género..." readonly="true">
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="fecha_nac">Fecha de Nacimiento</label>
        <input type="date" name="fecha_nac" value="{{$doctor->fecha_nac}}" class="form-control" readonly="true">
      </div>
    </div>

  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="users_id">Usuario</label>
      <input type="text" name="users_id" value="{{$usuario->email}}" class="form-control" placeholder="Usuario..." readonly="true">
    </div>
  </div>

  </div>
  <div class="row">
  	<div class="col-2 col-offset-5">
  		<a href="{{url('/doctores')}}">
			<button class="btn btn-info btn-sm" title="Regresar">
				Regresar
			</button>
		</a>
  	</div>
  </div>


@endsection
