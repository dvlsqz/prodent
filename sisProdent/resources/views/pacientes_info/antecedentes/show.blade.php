@extends('layouts.admin')
@section('contenido')

	<div class="row">

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Detalle</label>
				<input type="text" name="descripcion" required value="{{$antecedente->descripcion}}" class="form-control" placeholder="Descripcion..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="paciente_id">Paciente</label>
				<input type="text" name="paciente_id" required value="{{$paciente->nombre.''.$paciente->apellido}}" class="form-control" placeholder="Paciente..." readonly="true">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="tipo">Tipo</label>
				<input type="text" name="tipo_id" required value="{{$antecedente->tipo}}" class="form-control" placeholder="Tipo..." readonly="true">
			</div>
		</div>

  	</div>

  	<div class="row">
  		<div class="col-2 col-offset-5">
  			<a href="{{url('/pacientes_info/antecedentes')}}">
  				<button class="btn btn-info btn-sm" title="Regresar">
  					Regresar
  				</button>
  			</a>
  		</div>
  	</div>

@endsection
