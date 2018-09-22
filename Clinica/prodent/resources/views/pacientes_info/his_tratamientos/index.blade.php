@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Historial de Tratamientos <a href="his_tratamientos/create"><button class="btn btn-success">Nuevo</button></h3></a><hr>
		@include('pacientes_info.his_tratamientos.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fecha Inicio</th>
					<th>Fecha Culminacion</th>
					<th>Abono</th>
					<th>Estado</th>
					<th>Detalle</th>
					<th>Paciente</th>
					<th>Tratamiento</th>
					<th>Opciones</th>
				</thead>

        @foreach($historiales as $hist)
					<tr>
						<td>{{$hist->fecha_inicio}}</td>
						<td>{{$hist->fecha_culminacion}}</td>
						<td>{{$hist->abono}}</td>
						<td>{{$hist->estado}}</td>
						<td>{{$hist->detalle}}</td>
						<td>{{$hist->nombre.''.$hisc->apellido}}</td>
						<td>{{$hist->nombre}}</td>
						<td>
							<a href="{{URL::action('HistorialTratamientosController@edit',$hist->id)}}">
								<button class="btn btn-info btn-large icon-edit" title="Editar"></button>
							</a>

							<a href="{{URL::action('HistorialTratamientosController@show',$hist->id)}}">
								<button class="btn btn-primary btn-large icon-eye-open"></button>
							</a>

							<a href="" data-target="#modal-delete-{{$hist->id}}" data-toggle="modal">
								<button class="btn btn-danger btn-large icon-trash"  ></button>
							</a>
						</td>
					</tr>
					@include('pacientes_info.his_tratamientos.modal')
				@endforeach

			</table>
		</div>
		{{$historiales->render()}}
	</div>
</div>
@endsection
