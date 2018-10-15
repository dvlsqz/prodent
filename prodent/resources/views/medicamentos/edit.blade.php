@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Medimento: {{$medicamento->nombre}}</h3><hr>
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

			{!!Form::model($medicamento,['method'=>'PATCH','route'=>['medicamentos.update',$medicamento->id]])!!}
			{{Form::token()}}
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
						<input disabled type="number" name="stock" required value="{{$medicamento->stock}}" class="form-control" placeholder="Stock...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="stock_minimo">Stock Minimo</label>
						<input disabled type="number" name="stock_minimo" required value="{{$medicamento->stock_minimo}}" class="form-control" placeholder="Stock Minimo...">
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
            <label for="estado" >Estado</label>
              <select name="estado" class="form-control">
                <option value="Activo">Activo</option>
                <option value="Desactivo">Desactivo</option>
              </select>
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
