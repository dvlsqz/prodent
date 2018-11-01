@extends('layouts.admin')
@section('contenido')

	<div class="row">

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="fecha">Fecha</label>
				<input type="text" name="fecha" required value="{{$historial->fecha}}" class="form-control" placeholder="Fecha..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="detalles">Detalles</label>
				<input type="text" name="detalles" required value="{{$historial->detalles}}" class="form-control" placeholder="Detalles..." readonly="true">
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
				<label for="fecha_in">Inicio Tratamiento</label>
				<input type="text" name="fecha_in" required value="{{$tratamiento->fecha_inicio}}" class="form-control" placeholder="Inicio..." readonly="true">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="fecha_fin">Fin Tratamiento</label>
				<input type="text" name="fecha_fin" required value="{{$tratamiento->fecha_fin}}" class="form-control" placeholder="Fin..." readonly="true">
			</div>
		</div>
  </div>

  <div class="row">
  	<div class="col-2 col-offset-5">
  		<a href="{{url('pacientes_info/his_tratamientos')}}">
  			<button class="btn btn-info btn-sm" title="Regresar">
  				Regresar
  			</button>
  		</a>
  	</div>
  </div>


@endsection
