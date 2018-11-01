@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Antecedentes <a href="antecedentes/create"><button class="btn btn-success">Nuevo</button></h3></a><hr>
		@include('pacientes_info.antecedentes.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Descripcion</th>
					<th>Paciente</th>
					<th>Tipo</th>
					<th>Opciones</th>
				</thead>

        @foreach($antecedentes as $ant)
					<tr>
						<td>{{$ant->descripcion}}</td>
						<td>{{$ant->nombre.' '.$ant->apellido}}</td>
						<td>{{$ant->tipo}}</td>
						<td>
							<a href="{{URL::action('AntecedentesController@edit',$ant->id)}}">
								<button class="btn btn-primary btn-sm" title="Editar">
									<i class="material-icons">edit</i>
									Editar
								</button>
							</a>

							<a href="{{URL::action('AntecedentesController@show',$ant->id)}}">
								<button class="btn btn-info btn-sm" title="Ver">
									<i class="material-icons">visibility</i>
									Ver
								</button>
							</a>

							<a href="" data-target="#modal-delete-{{$ant->id}}" data-toggle="modal">
								<button class="btn btn-danger btn-sm" title="Eliminar">
									<i class="material-icons">delete</i>
									Eliminar
								</button>
							</a>
						</td>
					</tr>
					@include('pacientes_info.antecedentes.modal')
				@endforeach

			</table>
		</div>
		{{$antecedentes->render()}}
	</div>
</div>
@endsection
