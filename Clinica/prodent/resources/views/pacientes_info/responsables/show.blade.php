@extends('layouts.admin')
@section('contenido')

	<div class="row">

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

			<div class="form-group">
				<label for="nombre">Nombre(es)</label>
				<input type="text" name="nombre" required value="{{$responsable->nombre}}" class="form-control" placeholder="Nombre...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="apellido">Apellido(os)</label>
				<input type="text" name="apellido" required value="{{$responsable->apellido}}" class="form-control" placeholder="Apellido...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="edad">Edad</label>
				<input type="number" name="edad" required value="{{$responsable->edad}}" class="form-control" placeholder="Edad...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="parentesco">Parentesco</label>
				<input type="text" name="parentesco" required value="{{$responsable->parentesco}}" class="form-control" placeholder="Parentesco...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="direccion">Direccion</label>
				<input type="text" name="direccion" value="{{$responsable->direccion}}" class="form-control" placeholder="Direccion...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="telefono">telefono</label>
				<input type="text" name="telefono" required value="{{$responsable->telefono}}" class="form-control" placeholder="Telefono...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="paciente_id">Paciente</label>
				<input type="text" name="paciente_id" required value="{{$responsable->nombre.' '.$responsable->apellido}}" class="form-control" placeholder="Paciente...">
			</div>
		</div>

  </div>


@endsection
