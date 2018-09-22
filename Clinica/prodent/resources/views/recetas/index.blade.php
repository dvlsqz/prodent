@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Recetas <a href="recetas/create"><button class="btn btn-success">Nuevo</button></h3></a><hr>
		@include('recetas.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fecha</th>
					<th>Paciente</th>
					<th>Medicamento</th>
					<th>Doctor</th>
					<th>Opciones</th>
				</thead>

        @foreach($recetas as $rec)
					<tr>
						<td>{{$rec->fecha}}</td>
            <td>{{$rec->nombre_paciente.' '.$rec->apellido_paciente}}</td>
						<td>{{$rec->medicamento}}</td>
						<td>{{$rec->nombre.' '.$rec->apellido}}</td>
						<td>
							<a href="{{URL::action('RecetasController@edit',$rec->id)}}">
								<button class="btn btn-info icon-edit" title="Editar"></button>
							</a>

							<a href="{{URL::action('RecetasController@show',$rec->id)}}">
								<button class="btn btn-primary icon-eye-open" title="Ver"></button>
							</a>

							<a href="{{URL::action('RecetasController@print',$rec->id)}}">
								<button class="btn btn-primary icon-print" title="Imprimir"></button>
							</a>

							<a href="" data-target="#modal-delete-{{$rec->id}}" data-toggle="modal">
								<button class="btn btn-danger icon-trash" title="Eliminar"></button>
							</a>
						</td>
					</tr>
					@include('recetas.modal')
				@endforeach

			</table>
		</div>
		{{$recetas->render()}}
	</div>
</div>
@endsection
