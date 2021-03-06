@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Historial de Citas <a href="his_citas/create"><button class="btn btn-success">Nuevo</button></h3></a><hr>
		@include('pacientes_info.his_citas.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Descripcion</th>
					<th>Paciente</th>
					<th>Tratamiento</th>
					<th>Fecha Cita</th>
					<th>Opciones</th>
				</thead>

        @foreach($historiales as $hisc)
					<tr>
						<td>{{$hisc->descripcion}}</td>
						<td>{{$hisc->nombre_paciente.''.$hisc->apellido_paciente}}</td>
						<td>{{$hisc->descripcion}}</td>
						<td>{{$hisc->fecha_cita}}</td>
						<td>
							<a href="{{URL::action('HistorialCitasController@edit',$hisc->id)}}">
								<button class="btn btn-primary btn-sm" title="Editar">
									<i class="material-icons">edit</i>
									Editar
								</button>
							</a>

							<a href="{{URL::action('HistorialCitasController@show',$hisc->id)}}">
								<button class="btn btn-info btn-sm" title="Ver">
									<i class="material-icons">visibility</i>
									Ver
								</button>
							</a>

							<a href="" data-target="#modal-delete-{{$hisc->id}}" data-toggle="modal">
								<button class="btn btn-danger btn-sm" title="Eliminar">
									<i class="material-icons">delete</i>
									Eliminar
								</button>
							</a>
						</td>
					</tr>
					@include('pacientes_info.his_citas.modal')
				@endforeach

			</table>
		</div>
		{{$historiales->render()}}
	</div>
</div>
@endsection
