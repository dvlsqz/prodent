@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Historial Tratamientos: {{$historial->detalle}}</h3><hr>
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

			{!!Form::model($historial,['method'=>'PATCH','route'=>['his_tratamientos.update',$historial->id]])!!}
			{{Form::token()}}
			<div class="row">

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    			<div class="form-group">
    				<label for="fecha">Fecha</label>
    				<input type="text" name="fecha" value="{{$historial->fecha}}" class="form-control datepicker">
    			</div>
    		</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="detalles">Detalle</label>
						<input type="text" name="detalles" required value="{{$historial->detalles}}" class="form-control" placeholder="Detalles...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="tratamiento_id">Tratamiento </label>

						<input type="text" name="tratamiento" required value="{{$tratamiento->nombre}}" class="form-control" placeholder="Tratamiento..." readonly="true">

					</div>
				</div>

			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection
