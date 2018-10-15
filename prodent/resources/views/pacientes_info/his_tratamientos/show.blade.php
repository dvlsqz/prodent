@extends('layouts.admin')
@section('contenido')

	<div class="row">

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="fecha">Fecha</label>
				<input type="text" name="fecha" required value="{{$historial->fecha}}" class="form-control" placeholder="Fecha...">
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
				<label for="tratamiento_id">Tratamiento</label>
				<input type="text" name="tratamiento_id" required value="{{$historial->tratamiento}}" class="form-control" placeholder="Tratamiento...">
			</div>
		</div>




  </div>


@endsection
