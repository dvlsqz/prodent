@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Tratamiento: {{$tratamiento->id}}</h3><hr>
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

			{!!Form::model($tratamiento,['method'=>'PATCH','route'=>['tratamientos.update',$tratamiento->id]])!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre" required value="{{$tratamiento->nombre}}" class="form-control" placeholder="Nombre...">
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
								<label for="tipo">Tipo</label>
								<input type="text" name="tipo" required value="{{$tratamiento->tipo}}" class="form-control" placeholder="Tipo...">
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
								<label for="detalle">Detalle</label>
								<input type="text" name="detalle" required value="{{$tratamiento->detalle}}" class="form-control" placeholder="Detalle...">
							</div>
						</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="precio">Precio</label>
							<input type="number" name="precio" required value="{{$tratamiento->precio}}" class="form-control" placeholder="Precio..." step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'#CFD8DC'">
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="fecha_inicio">Fecha de Inicio</label>
							<input type="text" name="fecha_inicio" value="{{$tratamiento->fecha_inicio}}" class="form-control datepicker">
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="fecha_fin">Fecha de Fin</label>
							<input type="text" name="fecha_fin" value="{{$tratamiento->fecha_fin}}" class="form-control datepicker">
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
								<label for="estado">Estado</label>
								<input type="text" name="estado" required value="{{$tratamiento->estado}}" class="form-control" placeholder="Estado...">
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
				<a href="{{url('/tratamientos')}}">
					<button class="btn btn-danger" title="Cancelar">
						Cancelar
					</button>
				</a>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection
