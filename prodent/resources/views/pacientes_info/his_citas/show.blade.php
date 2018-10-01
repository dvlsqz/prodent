@extends('layouts.admin')
@section('contenido')

	<div class="row">

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion" required value="{{$historial->descripcion}}" class="form-control" placeholder="Descripcion...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="paciente_id">Paciente</label>
				<input type="text" name="paciente_id" required value="{{$historial->nombre.' '.$historial->apellido}}" class="form-control" placeholder="Paciente...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="tratamiento_id">Tratamiento</label>
				<input type="text" name="tratamiento_id" required value="{{$historial->nombre}}" class="form-control" placeholder="Tratamiento...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="agenda_id">Fecha Cita</label>
				<input type="text" name="agenda_id" required value="{{$historial->fecha_cita}}" class="form-control" placeholder="Fecha Cita...">
			</div>
		</div>


  </div>


@endsection
