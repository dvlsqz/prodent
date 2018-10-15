@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Generos <a href="genero/create"><button class="btn btn-success">Nuevo</button></h3></a>
		@include('genero.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Opciones</th>
				</thead>

				@foreach($generos as $gen)
					<tr>
						<td>{{$gen->genero}}</td>
						<td>
							<a href="{{URL::action('GenerosController@edit', $gen->id)}}">
								<button class="btn btn-info  icon-edit" title="Editar" ></button>
							</a>

							<a href="{{URL::action('GenerosController@show',$gen->id)}}">
								<button class="btn btn-primary icon-eye-open" title="Ver"></button>
							</a>

							<a href="" data-target="#modal-delete-{{$gen->id}}" data-toggle="modal">
								<button class="btn btn-danger icon-trash" title="Eliminar"></button>
							</a>
						</td>
					</tr>
					@include('genero.modal')
				@endforeach
			</table>
		</div>
		{{$generos->render()}}
	</div>
</div>
@endsection
