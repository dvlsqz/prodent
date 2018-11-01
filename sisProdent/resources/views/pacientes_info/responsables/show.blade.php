@extends('layouts.admin')
@section('contenido')

	<div class="row">

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

			<div class="form-group">
				<label for="nombre">Nombre(s)</label>
				<input type="text" name="nombre" value="{{$responsable->nombre}}" class="form-control" placeholder="Nombre..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="apellido">Apellido(s)</label>
				<input type="text" name="apellido"  value="{{$responsable->apellido}}" class="form-control" placeholder="Apellido..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="fecha_nac">Fecha de Nacimiento</label>
				<input type="date" name="fecha_nac"  value="{{$responsable->fecha_nac}}" class="form-control" placeholder="Edad..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="parentesco">Parentesco</label>
				<input type="text" name="parentesco"  value="{{$responsable->parentesco}}" class="form-control" placeholder="Parentesco..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="direccion">Direccion</label>
				<input type="text" name="direccion" value="{{$responsable->direccion}}" class="form-control" placeholder="Dirección..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="telefono">telefono</label>
				<input type="text" name="telefono" value="{{$responsable->telefono}}" class="form-control" placeholder="Teléfono..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="paciente_id">Paciente</label>
				<input type="text" name="paciente_id" r value="{{$paciente->nombre.' '.$paciente->apellido}}" class="form-control" placeholder="Paciente..." readonly="true">
			</div>
		</div>

	</div>

	<div class="row">
		<div class="col-2 col-offset-5">
			<a href="{{url('pacientes_info/responsables')}}">
				<button class="btn btn-info btn-sm" title="Regresar">
					Regresar
				</button>
			</a>
		</div>
	</div>
@endsection
