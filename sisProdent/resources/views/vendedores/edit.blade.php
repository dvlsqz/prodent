@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Vendedor: {{$vendedor->nombre.' '.$vendedor->apellido}}</h3>
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

			{!!Form::model($vendedor,['method'=>'PATCH','route'=>['vendedores.update',$vendedor->id]])!!}
			{{Form::token()}}
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
							<select data-live-search="true" name="proveedor_id" id="doctor_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
								@foreach($proveedores as $pro)
									<option value="{{$pro->id}}">{{$pro->nombre}}</option>
								@endforeach
							</select>
						</div>
					</div>

	</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<a href="{{url('/vendedores')}}">
					<button class="btn btn-danger" title="Cancelar">
						Cancelar
					</button>
				</a>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection
