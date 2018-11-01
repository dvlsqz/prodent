@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="codgio">Código</label>
				<input type="text" name="codigo" required value="{{$medicamento->codigo}}" class="form-control" placeholder="Codigo..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" required value="{{$medicamento->nombre}}" class="form-control" placeholder="Nombre..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="fecha_cad">Fecha Caducidad</label>
				<input type="date" name="fecha_cad" value="{{$medicamento->fecha_cad}}" class="form-control" readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="stock">Stock</label>
				<input type="number" name="stock" required value="{{$medicamento->stock}}" class="form-control" placeholder="Stock..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="stock_minimo">Stock Mínimo</label>
				<input type="number" name="stock" required value="{{$medicamento->stock_minimo}}" class="form-control" placeholder="Stock Minimo..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="presentacion">Presentación</label>
				<input type="text" name="presentacion" value="{{$medicamento->presentacion}}" class="form-control" placeholder="Presentacion..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="precio_costo">Precio Costo</label>
				<input type="number" name="precio_costo" required value="{{$medicamento->precio_costo}}" class="form-control" placeholder="Precio Costo..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="precio_venta">Precio Venta</label>
				<input type="number" name="precio_venta" required value="{{$medicamento->precio_venta}}" class="form-control" placeholder="Precio Venta..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="estado">Estado</label>
				<input type="text" name="estado" value="{{$medicamento->estado}}" class="form-control" placeholder="Estado..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="proveedor">Proveedor</label>
				<input type="text" name="proveedor" value="{{$medicamento->nombre}}" class="form-control" placeholder="Proveedor..." readonly="true">
			</div>
		</div>
  </div>
  <div class="row">
  	<div class="col-2 col-offset-5">
  		<a href="{{url('/medicamentos')}}">
			<button class="btn btn-info btn-sm" title="Regresar">
				Regresar
			</button>
		</a>
  	</div>
  </div>


@endsection
