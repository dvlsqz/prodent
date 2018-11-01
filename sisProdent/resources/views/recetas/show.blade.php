@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

			<div class="form-group">
				<label for="indicaciones">Indicaciones</label>
				<input type="text" name="indicaciones" required value="{{$receta->indicaciones}}" class="form-control" placeholder="Indicaciones..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="fecha">Fecha</label>
				<input type="datetime" name="fecha" value="{{$receta->fecha}}" class="form-control" readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="doctor">Doctor</label>
				<input type="text" name="doctor" value="{{$doctor->nombre.' '.$doctor->apellido}}" class="form-control" readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="paciente">Paciente</label>
				<input type="text" name="paciente" value="{{$paciente->nombre.' '.$paciente->apellido}}" class="form-control" readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="medic">Medicamento</label>
				<input type="text" name="medic" value="{{$medicamento->nombre}}" class="form-control" readonly="true">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-2 col-offset-5">
			<a href="{{url('/recetas')}}">
				<button class="btn btn-info btn-sm" title="Regresar">
					Regresar
				</button>
			</a>
		</div>
	</div>

@endsection
