@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" required value="{{$tratamiento->nombre}}" class="form-control" placeholder="Nombre..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="tipo">Tipo</label>
				<input type="text" name="tipo" required value="{{$tratamiento->tipo}}" class="form-control" placeholder="Tipo..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="detalle">Detalle</label>
				<input type="text" name="detalle" required value="{{$tratamiento->detalle}}" class="form-control" placeholder="Detalle..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="precio">Precio</label>
				<input type="number" name="precio" required value="{{$tratamiento->precio}}" class="form-control" placeholder="Precio..." readonly="true">
			</div>
		</div>


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="fecha_inicio">Fecha de Inicio</label>
				<input type="date" name="fecha_inicio" value="{{$tratamiento->fecha_inicio}}" class="form-control" readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="fecha_fin">Fecha de Fin</label>
				<input type="date" name="fecha_fin" value="{{$tratamiento->fecha_fin}}" class="form-control" readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="estado">Estado</label>
				<input type="text" name="estado" required value="{{$tratamiento->estado}}" class="form-control" placeholder="Estado..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="paciente_id">Paciente</label>
				<input type="text" name="paciente_id" required value="{{$paciente->nombre.' '.$paciente->apellido}}" class="form-control" placeholder="Paciente..." readonly="true">
			</div>
		</div>
  </div>
  <div class="row">
  	<div class="col-2 col-offset-5">
  		<a href="{{url('/tratamientos')}}">
  			<button class="btn btn-info btn-sm" title="Regresar">
  				Regresar
  			</button>
  		</a>
  	</div>
  </div>


@endsection
