@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Doctores <a href="doctores/create"><button class="btn btn-success">Nuevo</button></h3></a><hr>
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

        @foreach($doctores as $doc)
					<tr>
						<td>{{$doc->nombre.'  '.$doc->apellido}}</td>
						<td>{{$doc->direccion}}</td>
						<td>{{$doc->email}}</td>
						<td>
							<a href="{{URL::action('DoctoresController@edit',$doc->id)}}">
								<button class="btn btn-primary btn-sm" title="Editar">
									<i class="material-icons">edit</i>
									Editar
								</button>
							</a>

							<a href="{{URL::action('DoctoresController@show',$doc->id)}}">
								<button class="btn btn-info btn-sm" title="Ver">
									<i class="material-icons">visibility</i>
									Ver
								</button>
							</a>

							<a href="" data-target="#modal-delete-{{$doc->id}}" data-toggle="modal">
								<button class="btn btn-danger btn-sm" title="Eliminar">
									<i class="material-icons">delete</i>
									Eliminar
								</button>
							</a>
						</td>
					</tr>
					@include('doctores.modal')
				@endforeach

			</table>
		</div>
		{{$doctores->render()}}
	</div>
</div>
@endsection
