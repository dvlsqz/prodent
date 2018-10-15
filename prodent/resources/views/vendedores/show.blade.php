@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre(es)</label>
				<input type="text" name="nombre" required value="{{$vendedor->nombre}}" class="form-control" placeholder="Nombre...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="apellido">Apellido(os)</label>
				<input type="text" name="apellido" required value="{{$vendedor->apellido}}" class="form-control" placeholder="Apellido...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="direccion">Direccion</label>
				<input type="text" name="direccion" required value="{{$vendedor->direccion}}" class="form-control" placeholder="Direccion...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="correo">Correo Electronico</label>
				<input type="text" name="correo" required value="{{$vendedor->correo}}" class="form-control" placeholder="Correo Electronico...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="telefono">telefono</label>
				<input type="text" name="telefono" required value="{{$vendedor->telefono}}" class="form-control" placeholder="Telefono...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="proveedor_id">Proveedor</label>
				<input type="text" name="proveedor_id" required value="{{$vendedor->proveedor}}" class="form-control" placeholder="Proveedor...">
			</div>
		</div>

  </div>


@endsection
