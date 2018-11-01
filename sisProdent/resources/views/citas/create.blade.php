@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Cita</h3><hr>
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

	{!!Form::open(array('url'=>'citas','method'=>'POST','autocomplete'=>'off'))!!}
	{{Form::token()}}

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="fecha_cita">Fecha de Cita</label>
				<input type="text" name="fecha_cita" value="{{old('fecha_cita')}}" class="form-control datepicker">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<input type="time" name="hora" required value="{{old('hora')}}" class="form-control" placeholder="Horario de la Cita...">
			</div>
		</div>


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<input type="text" name="detalles" value="{{old('detalles')}}" class="form-control" placeholder="Detalles...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="doctor_id">Doctor</label>
				<select data-live-search="true" name="doctor_id" id="doctor_id" class="form-control selectpicker">
					@foreach($doctores as $doc)
					<option value="{{$doc->id}}">{{$doc->nombre.' '.$doc->apellido}}</option>
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
