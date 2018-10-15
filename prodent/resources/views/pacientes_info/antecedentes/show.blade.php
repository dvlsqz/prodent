@extends('layouts.admin')
@section('contenido')

	<div class="row">

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Detalle</label>
				<input type="text" name="descripcion" required value="{{$antecedente->descripcion}}" class="form-control" placeholder="Descripcion...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="paciente_id">Paciente</label>
				<input type="text" name="paciente_id" required value="{{$antecedente->nombre.''.$antecedente->apellido}}" class="form-control" placeholder="Paciente...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="tipo">Tipo</label>
				<input type="text" name="tipo_id" required value="{{$antecedente->tipo}}" class="form-control" placeholder="Tipo...">
			</div>
		</div>

  </div>


@endsection
