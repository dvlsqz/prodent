@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Tratamiento</h3><hr>
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

			{!!Form::open(array('url'=>'tratamientos','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="tipo">Tipo</label>
							<input type="text" name="tipo" required value="{{old('tipo')}}" class="form-control" placeholder="Tipo...">
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
								<label for="detalle">Detalle</label>
								<input type="text" name="detalle" required value="{{old('detalle')}}" class="form-control" placeholder="Detalle...">
							</div>
					</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="precio">Precio</label>
						<input type="number" name="precio" required value="{{old('precio')}}" class="form-control" placeholder="Precio...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    			<div class="form-group">
    				<label for="fecha_inicio">Fecha de Inicio</label>
    				<input type="date" name="fecha_inicio" value="{{old('fecha_inicio')}}" class="form-control">
    			</div>
    		</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    			<div class="form-group">
    				<label for="fecha_fin">Fecha de Fin</label>
    				<input type="date" name="fecha_fin" value="{{old('fecha_fin')}}" class="form-control">
    			</div>
    		</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="estado">Estado</label>
							<input type="text" name="estado" required value="{{old('estado')}}" class="form-control" placeholder="Estado...">
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
