@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="codgio">Codgio</label>
				<input type="text" name="codigo" required value="{{$medicamento->codigo}}" class="form-control" placeholder="Codigo...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" required value="{{$medicamento->nombre}}" class="form-control" placeholder="Nombre...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="fecha_cad">Fecha Caducidad</label>
				<input type="date" name="fecha_cad" value="{{$medicamento->fecha_cad}}" class="form-control">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="stock">Stock</label>
				<input type="number" name="stock" required value="{{$medicamento->stock}}" class="form-control" placeholder="Stock...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="stock_minimo">Stock Minimo</label>
				<input type="number" name="stock" required value="{{$medicamento->stock_minimo}}" class="form-control" placeholder="Stock Minimo...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="presentacion">Presentacion</label>
				<input type="text" name="presentacion" value="{{$medicamento->presentacion}}" class="form-control" placeholder="Presentacion...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="precio_costo">Precio Costo</label>
				<input type="number" name="precio_costo" required value="{{$medicamento->precio_costo}}" class="form-control" placeholder="Precio Costo...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="precio_venta">Precio Venta</label>
				<input type="number" name="precio_venta" required value="{{$medicamento->precio_venta}}" class="form-control" placeholder="Precio Venta...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="estado">Estado</label>
				<input type="text" name="estado" value="{{$medicamento->estado}}" class="form-control" placeholder="Estado...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="proveedor">Proveedor</label>
				<input type="text" name="proveedor" value="{{$medicamento->nombre}}" class="form-control" placeholder="Proveedor...">
			</div>
		</div>


  </div>


@endsection
