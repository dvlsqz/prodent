@extends('layouts.admin')
@section('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Citas <a href="citas/create"><button class="btn btn-success">Nuevo</button></h3></a><hr>
		@include('doctores.search')
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Usuario</th>
					<th>Opciones</th>
				</thead>

        @foreach($citas as $ci)
					<tr>
						<td>{{$ci->nombre_doctor.'  '.$ci->apellido_doctor}}</td>
						<td>{{$ci->estado}}</td>
						<td>{{$ci->hora}}</td>
						<td>
							<a href="{{URL::action('CitasController@edit',$ci->id)}}">
								<button class="btn btn-primary btn-sm" title="Editar">
									<i class="material-icons">edit</i>
									Editar
								</button>
							</a>

							<a href="{{URL::action('CitasController@show',$ci->id)}}">
								<button class="btn btn-info btn-sm" title="Ver">
									<i class="material-icons">visibility</i>
									Ver
								</button>
							</a>

							<a href="" data-target="#modal-delete-{{$ci->id}}" data-toggle="modal">
								<button class="btn btn-danger btn-sm" title="Eliminar">
									<i class="material-icons">delete</i>
									Eliminar
								</button>
							</a>
						</td>
					</tr>
					@include('citas.modal')
				@endforeach

			</table>
		</div>
		{{$citas->render()}}
	</div>
</div>
@endsection
