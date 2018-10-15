@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Historial Tratamientos</h3><hr>
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

			{!!Form::open(array('url'=>'pacientes_info/his_tratamientos','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

			<div class="row">

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    			<div class="form-group">
    				<label for="fecha">Fecha</label>
    				<input type="date" name="fecha" value="{{old('fecha')}}" class="form-control">
    			</div>
    		</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="detalles">Detalle</label>
						<input type="text" name="detalle" required value="{{old('detalles')}}" class="form-control" placeholder="Detalle...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="tratamiento_id">Tratamiento </label>
						<select data-live-search="true" name="tratamiento_id" id="tratamiento_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($tratamientos as $tra)
								<option value="{{$tra->id}}">{{$tra->nombe}}</option>
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
