@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Doctor: {{$doctor->nombre.''.$doctor->apellido}}</h3><hr>
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

			{!!Form::model($doctor,['method'=>'PATCH','route'=>['doctores.update',$doctor->id]])!!}
			{{Form::token()}}
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

				<div class="form-group">
					<label for="nombre">Nombre(es)</label>
					<input type="text" name="nombre" required value="{{$doctor->nombre}}" class="form-control" placeholder="Nombre...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="apellido">Apellido(os)</label>
					<input type="text" name="apellido" required value="{{$doctor->apellido}}" class="form-control" placeholder="Apellido...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="direccion">Direccion</label>
					<input type="text" name="direccion" value="{{$doctor->direccion}}" class="form-control" placeholder="Direccion...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="users_id">Genero </label>
					<select data-live-search="true" name="genero_id" id="genero_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
						@foreach($generos as $gen)
							<option value="{{$gen->id}}">{{$gen->genero}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="fecha_nac">Fecha de Nacimiento</label>
					<input type="date" name="fecha_nac" value="{{$doctor->fecha_nac}}" class="form-control">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="users_id">Usuario </label>
					<select data-live-search="true" name="users_id" id="users_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
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
		</div>
	</div>
@endsection
