@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Historial Citas: {{$historial->descripcion}}</h3><hr>
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

	{!!Form::model($historial,['method'=>'PATCH','route'=>['his_citas.update',$historial->id]])!!}
	{{Form::token()}}
	<div class="row">

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion" required value="{{$historial->descripcion}}" class="form-control" placeholder="Descripcion...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="diagnostico">Diagnóstico</label>
				<input type="text" name="diagnostico" required value="{{$historial->diagnostico}}" class="form-control" placeholder="Diagnóstico...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="paciente_id">Paciente </label>

				<input type="text" name="paciente_id" required value="{{$paciente->nombre.' '.$paciente->apellido}}" class="form-control" placeholder="Paciente..." readonly="true">

			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="tratamiento_id">Tratamiento </label>

				<input type="text" name="tratamiento_id" required value="{{$tratamiento->nombre}}" class="form-control" placeholder="Tratamiento..." readonly="true">

			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="cita_id">Fecha Cita </label>

				<input type="text" name="cita_id" required value="{{$cita->fecha_cita}}" class="form-control" placeholder="FechaCita..." readonly="true">

			</div>
		</div>

	</div>

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
			</div>
		</div>
	</div>
	{!!Form::close()!!}
@endsection
