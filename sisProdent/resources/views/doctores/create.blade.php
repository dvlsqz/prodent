@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Doctor</h3><hr>
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

			{!!Form::open(array('url'=>'doctores','method'=>'POST','autocomplete'=>'off'))!!}
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
	    				<label for="fecha_nac">Fecha de Nacimiento</label>
	    				<input type="text" name="fecha_nac" class="form-control datepicker" value="{{old('fecha_nac')}}"/>
	    			</div>
	    		</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="users_id">Género </label>
						<select name="genero_id" id="genero_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($generos as $gen)
								<option value="{{$gen->id}}">{{$gen->genero}}</option>
							@endforeach
						</select>
					</div>
				</div>
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="users_id">Usuario </label>
						<select name="users_id" id="users_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($users as $use)
								<option value="{{$use->id}}">{{$use->email}}</option>
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
@endsection
