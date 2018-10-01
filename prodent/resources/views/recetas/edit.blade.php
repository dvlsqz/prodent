@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Proveedor: {{$proveedor->nombre}}</h3>
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

			{!!Form::model($proveedor,['method'=>'PATCH','route'=>['proveedores.update',$proveedor->id]])!!}
			{{Form::token()}}
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

					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
								<label for="vendedor_id">Vendedor </label>
								<select data-live-search="true" name="vendedor_id" id="vendedor_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
									@foreach($vendedores as $ven)
										<option value="{{$ven->id}}">{{$ven->nombre}}</option>
									@endforeach
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
