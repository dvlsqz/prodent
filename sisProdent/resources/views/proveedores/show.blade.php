@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" required value="{{$proveedor->nombre}}" class="form-control" placeholder="Nombre...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="direccion">Direccion</label>
				<input type="text" name="direccion" value="{{$proveedor->direccion}}" class="form-control" placeholder="Direccion...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="correo">Correo Electronico</label>
				<input type="text" name="direccion" value="{{$proveedor->correo}}" class="form-control" placeholder="Correo Electronico...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="num_cuenta">No. Cuenta</label>
				<input type="text" name="num_cuenta" value="{{$proveedor->num_cuenta}}" class="form-control" placeholder="No. Cuenta...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="telefono1">telefono No.1</label>
				<input type="text" name="telefono1" required value="{{$proveedor->telefono1}}" class="form-control" placeholder="Telefono No.1...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="telefono2">telefono No.2</label>
				<input type="text" name="telefono2" required value="{{$proveedor->telefono2}}" class="form-control" placeholder="Telefono2...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="vendedor_id">Vendedor</label>
				<input type="text" name="vendedor_id" required value="{{$proveedor->nombre}}" class="form-control" placeholder="Vendedor...">
			</div>
		</div>

  </div>


@endsection
