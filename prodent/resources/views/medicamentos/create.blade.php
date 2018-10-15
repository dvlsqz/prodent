@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Medimento</h3><hr>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

			{!!Form::open(array('url'=>'medicamentos','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="codgio">Codgio</label>
						<input type="text" name="codigo" required value="{{old('codigo')}}" class="form-control" placeholder="Codigo...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    			<div class="form-group">
    				<label for="fecha_cad">Fecha Caducidad</label>
    				<input type="date" name="fecha_cad" value="{{old('fecha_cad')}}" class="form-control">
    			</div>
    		</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="stock">Stock</label>
						<input type="number" name="stock" required value="{{old('stock')}}" class="form-control" placeholder="Stock...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="stock_minimo">Stock Minimo</label>
						<input type="number" name="stock_minimo" required value="{{old('stock_minimo')}}" class="form-control" placeholder="Stock Minimo...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="presentacion">Presentacion</label>
						<input type="text" name="presentacion" value="{{old('presentacion')}}" class="form-control" placeholder="Presentacion...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="precio_costo">Precio Costo</label>
						<input type="number" name="precio_costo" required value="{{old('precio_costo')}}" class="form-control" placeholder="Precio Costo...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="precio_venta">Precio Venta</label>
						<input type="number" name="precio_venta" required value="{{old('precio_venta')}}" class="form-control" placeholder="Precio Venta...">
					</div>
				</div>




			</div>




			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection
