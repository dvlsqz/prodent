@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Tipo: {{$tipo->tipo}}</h3><hr>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

			{!!Form::model($antecedente,['method'=>'PATCH','route'=>['pacientes_info.antecedentes.update',$antecedente->id]])!!}
			{{Form::token()}}
			<div class="row">

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="detalle">Detalle</label>
						<input type="text" name="detalles" required value="{{$antecedente->detalles}}" class="form-control" placeholder="Detalle...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="paciente_id">Paciente </label>
						<select data-live-search="true" name="paciente_id" id="paciente_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($pacientes as $pac)
								<option value="{{$pac->id}}">{{$pac->nombre.''.$pac->apellido}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="tipo_id">Tipo </label>
						<select data-live-search="true" name="tipo_id" id="tipo_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($tipos as $tip)
								<option value="{{$tip->id}}">{{$tip->tipo}}</option>
							@endforeach
						</select>
					</div>
				</div>

			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection