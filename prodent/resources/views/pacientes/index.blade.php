@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Pacientes <a href="pacientes/create"><button class="btn btn-success">Nuevo</button></h3></a><hr>
		@include('pacientes.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Genero</th>
					<th>Edad</th>
					<th>Direccion</th>
					<th>Telefono</th>
					<th>Opciones</th>
				</thead>

        @foreach($pacientes as $pac)
					<tr>
						<td>{{$pac->nombre.'  '.$pac->apellido}}</td>
            <td>{{$pac->genero}}</td>
						<td>{{\Carbon\Carbon::parse($pac->fecha_nac)->age}}</td>
						<td>{{$pac->direccion}}</td>
						<td>{{$pac->telefono}}</td>
						<td>
							<a href="{{URL::action('PacientesController@edit',$pac->id)}}">
								<button class="btn btn-info btn-large icon-edit" title="Editar"></button>
							</a>

							<a href="{{URL::action('PacientesController@show',$pac->id)}}">
								<button class="btn btn-primary btn-large icon-eye-open" title="Ver"></button>
							</a>

							<a href="" data-target="#modal-delete-{{$pac->id}}" data-toggle="modal">
								<button class="btn btn-danger btn-large icon-trash" title="Eliminar"></button>
							</a>
						</td>
					</tr>
					@include('pacientes.modal')
				@endforeach

			</table>
		</div>
		{{$pacientes->render()}}
	</div>
</div>
@endsection
