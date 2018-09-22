@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Receta</h3><hr>
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

			{!!Form::open(array('url'=>'recetas','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

			<div class="row">

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

					<div class="form-group">
						<label for="prescripción">Prescripción</label>
						<input type="text" name="prescripción" required value="{{old('prescripción')}}" class="form-control" placeholder="Prescripción...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="indicaciones">Indicaciones</label>
						<input type="text" name="indicaciones" value="{{old('indicaciones')}}" class="form-control" placeholder="Indicaciones...">
					</div>
				</div>



				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    			<div class="form-group">
    				<label for="fecha">Fecha</label>
    				<input type="date" name="fecha" value="{{old('fecha')}}" class="form-control">
    			</div>
    		</div>

				</div>

				<div class="row">
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

					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
								<label for="doctor">Doctor</label>
								<select data-live-search="true" name="doctor_id" id="doctor_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
									@foreach($doctores as $doc)
										<option value="{{$doc->id}}">{{$doc->nombre.' '.$doc->apellido}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label for="medicamento">Medicamento</label>
									<select data-live-search="true" name="medicamento_id" id="medicamento_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
										@foreach($medicamentos as $med)
											<option value="{{$med->id}}">{{$med->codigo.' '.$med->nombre}}</option>
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
