@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Responsable</h3><hr>
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

			{!!Form::open(array('url'=>'pacientes_info/responsables','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

			<div class="row">

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

					<div class="form-group">
						<label for="nombre">Nombre(es)</label>
						<input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="apellido">Apellido(os)</label>
						<input type="text" name="apellido" required value="{{old('apellido')}}" class="form-control" placeholder="Apellido...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="edad">Edad</label>
						<input type="number" name="edad" required value="{{old('edad')}}" class="form-control" placeholder="Edad...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="parentesco">Parentesco</label>
						<input type="text" name="parentesco" required value="{{old('parentesco')}}" class="form-control" placeholder="Parentesco...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="direccion">Direccion</label>
						<input type="text" name="direccion" value="{{old('direccion')}}" class="form-control" placeholder="Direccion...">
					</div>
				</div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="telefono">Telefono</label>
						<input type="text" name="telefono" required value="{{old('telefono')}}" class="form-control" placeholder="Telefono...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="paciente_id">Paciente </label>
						<select data-live-search="true" name="paciente_id" id="paciente_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($pacientes as $pac)
								<option value="{{$pac->id}}">{{$pac->nombre.' '.$pac->apellido}}</option>
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