@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Vendedores <a href="vendedores/create"><button class="btn btn-success">Nuevo</button></h3></a><hr>
		@include('vendedores.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Telefono</th>
					<th>Opciones</th>
				</thead>

        @foreach($vendedores as $ven)
					<tr>
						<td>{{$ven->nombre}}</td>
						<td>{{$ven->telefono}}</td>
						<td>
							<a href="{{URL::action('VendedoresController@edit',$ven->id)}}">
								<button class="btn btn-info">Editar</button>
							</a>

							<a href="{{URL::action('VendedoresController@show',$ven->id)}}">
								<button class="btn btn-primary">Ver</button>
							</a>

							<a href="" data-target="#modal-delete-{{$ven->id}}" data-toggle="modal" data-target="#myModal">
								<button class="btn btn-danger">Eliminar</button>
							</a>
						</td>
					</tr>
					@include('vendedores.modal')
				@endforeach

			</table>
		</div>
		{{$vendedores->render()}}
	</div>
</div>
@endsection
