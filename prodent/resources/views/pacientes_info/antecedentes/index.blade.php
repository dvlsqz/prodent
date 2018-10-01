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
					<th>Detalle</th>
					<th>Paciente</th>
					<th>Tipo</th>
					<th>Opciones</th>
				</thead>

        @foreach($antecedentes as $ant)
					<tr>
						<td>{{$ant->detalles}}</td>
						<td>{{$ant->nombre.' '.$ant->apellido}}</td>
						<td>{{$ant->tipo}}</td>
						<td>
							<a href="{{URL::action('AntecedentesController@edit',$ant->id)}}">
								<button class="btn btn-info btn-large icon-edit"></button>
							</a>

							<a href="{{URL::action('AntecedentesController@show',$ant->id)}}">
								<button class="btn btn-primary btn-large icon-eye-open"></button>
							</a>

							<a href="" data-target="#modal-delete-{{$ant->id}}" data-toggle="modal">
								<button class="btn btn-danger btn-large icon-trash"  ></button>
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
