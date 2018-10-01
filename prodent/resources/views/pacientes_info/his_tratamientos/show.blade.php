@extends('layouts.admin')
@section('contenido')

	<div class="row">

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="fecha_inicio">Fecha Inicio</label>
				<input type="text" name="fecha_inicio" required value="{{$historial->fecha_inicio}}" class="form-control" placeholder="Fecha Inicio...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="fecha_culminacion">Fecha Culminacion</label>
					<input type="text" name="fecha_culminacion" required value="{{$historial->fecha_culminacion}}" class="form-control" placeholder="Fecha Culminacion...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="abono">Abono</label>
				<input type="text" name="abono" required value="{{$historial->abono}}" class="form-control" placeholder="Abono...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="estado">Estado</label>
				<input type="text" name="estado" required value="{{$historial->estado}}" class="form-control" placeholder="Estado...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="detalles">Detalle</label>
				<input type="text" name="detalles" required value="{{$historial->detalles}}" class="form-control" placeholder="Detalle...">
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




  </div>


@endsection
