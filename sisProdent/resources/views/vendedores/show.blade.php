@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<input type="text" name="nombre" required value="{{$vendedor->nombre}}" class="form-control" placeholder="Nombre..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<input type="text" name="apellido" required value="{{$vendedor->apellido}}" class="form-control" placeholder="Apellido..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<input type="text" name="direccion" required value="{{$vendedor->direccion}}" class="form-control" placeholder="Direccion..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<input type="text" name="correo" required value="{{$vendedor->correo}}" class="form-control" placeholder="Correo Electronico..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<input type="text" name="telefono" required value="{{$vendedor->telefono}}" class="form-control" placeholder="Telefono..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<input type="text" name="proveedor_id" required value="{{$vendedor->proveedor}}" class="form-control" placeholder="Proveedor..." readonly="true">
			</div>
		</div>

  	</div>
  	<div class="row">
  		<div class="col-2 col-offset-5">
  			<a href="{{url('/vendedores')}}">
  				<button class="btn btn-info btn-sm" title="Regresar">
  					Regresar
  				</button>
  			</a>
  		</div>
  	</div>

@endsection
