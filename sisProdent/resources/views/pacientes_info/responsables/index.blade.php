@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Responsables <a href="responsables/create"><button class="btn btn-success">Nuevo</button></h3></a><hr>
		@include('pacientes_info.responsables.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Telefono</th>
					<th>Parentesco</th>
					<th>Paciente a Cargo</th>
					<th>Opciones</th>
				</thead>

        @foreach($responsables as $res)
					<tr>
						<td>{{$res->nombre.' '.$res->apellido}}</td>
						<td>{{$res->direccion}}</td>
						<td>{{$res->telefono}}</td>
						<td>{{$res->parentesco}}</td>
						<td>{{$res->nombre_paciente.' '.$res->apellido_paciente}}</td>
						<td>
							<a href="{{URL::action('ResponsablesController@edit',$res->id)}}">
								<button class="btn btn-primary btn-sm" title="Editar">
								<i class="material-icons">edit</i>
								Editar
							</button>
							</a>

							<a href="{{URL::action('ResponsablesController@show',$res->id)}}">
								<button class="btn btn-info btn-sm" title="Ver">
								<i class="material-icons">visibility</i>
								Ver
							</button>
							</a>

							<a href="" data-target="#modal-delete-{{$res->id}}" data-toggle="modal">
								<button class="btn btn-danger btn-sm" title="Eliminar">
								<i class="material-icons">delete</i>
								Eliminar
							</button>
							</a>
						</td>
					</tr>
					@include('pacientes_info.responsables.modal')
				@endforeach

			</table>
		</div>
		{{$responsables->render()}}
	</div>
</div>
@endsection
