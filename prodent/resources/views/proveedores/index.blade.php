@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Proveedores <a href="proveedores/create"><button class="btn btn-success">Nuevo</button></h3></a><hr>
		@include('proveedores.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Direccion</th>
					<th>Correo Electronico</th>
					<th>No. Cuenta</th>
					<th>Telefonos</th>
					<th>Vendedor</th>
					<th>Opciones</th>
				</thead>

        @foreach($proveedores as $pro)
					<tr>
						<td>{{$pro->nombre}}</td>
            <td>{{$pro->direccion}}</td>
						<td>{{$pro->correo}}</td>
						<td>{{$pro->num_cuenta}}</td>
						<td>{{$pro->telefono1.'/'.$pro->telefono2}}</td>
						<td>{{$pro->vendedor}}</td>
						<td>
							<a href="{{URL::action('ProveedoresController@edit',$pro->id)}}">
								<button class="btn btn-info">Editar</button>
							</a>

							<a href="{{URL::action('ProveedoresController@show',$pro->id)}}">
								<button class="btn btn-primary">Ver</button>
							</a>

							<a href="" data-target="#modal-delete-{{$pro->id}}" data-toggle="modal">
								<button class="btn btn-danger">Eliminar</button>
							</a>
						</td>
					</tr>
					@include('proveedores.modal')
				@endforeach

			</table>
		</div>
		{{$proveedores->render()}}
	</div>
</div>
@endsection
