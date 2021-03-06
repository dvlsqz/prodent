@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Vendedor</h3> <hr>
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

			{!!Form::open(array('url'=>'vendedores','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

			<div class="row">

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre(s)...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<input type="text" name="apellido" required value="{{old('apellido')}}" class="form-control" placeholder="Apellido(s)...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<input type="text" name="direccion" value="{{old('direccion')}}" class="form-control" placeholder="Dirección...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<input type="text" name="correo" value="{{old('correo')}}" class="form-control" placeholder="Correo Electrónico...">
					</div>
				</div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<input type="text" name="telefono" value="{{old('telefono')}}" class="form-control" placeholder="Teléfono...">
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

			</div>




			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection
