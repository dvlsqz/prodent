@extends('layouts.admin')
@section('contenido')

	<div class="row">

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Descripción</label>
				<input type="text" name="descripcion" required value="{{$historial->descripcion}}" class="form-control" placeholder="Descripcion..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="paciente_id">Paciente</label>
				<input type="text" name="paciente_id" required value="{{$paciente->nombre.' '.$paciente->apellido}}" class="form-control" placeholder="Paciente..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="tratamiento_id">Tratamiento</label>
				<input type="text" name="tratamiento_id" required value="{{$tratamiento->nombre}}" class="form-control" placeholder="Tratamiento..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="agenda_id">Fecha Cita</label>
				<input type="text" name="agenda_id" required value="{{$cita->fecha_cita}}" class="form-control" placeholder="Fecha Cita..." readonly="true">
			</div>
		</div>
  </div>

  <div class="row">
  	<div class="col-2 col-offset-5">
  		<a href="{{url('pacientes_info/his_citas')}}">
  			<button class="btn btn-info btn-sm" title="Regresar">
  				Regresar
  			</button>
  		</a>
  	</div>
  </div>


@endsection
