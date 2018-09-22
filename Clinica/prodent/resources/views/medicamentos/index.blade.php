@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Medicamentos <a href="medicamentos/create"><button class="btn btn-success">Nuevo</button></h3></a><hr>
		@include('medicamentos.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Fecha Caducidad</th>
					<th>Stock</th>
					<th>Presentacion</th>
					<th>Proveedor</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>

        @foreach($medicamentos as $med)
					<tr>
						<td>{{$med->codigo}}</td>
            <td>{{$med->nombre}}</td>
						<td>{{$med->fecha_cad}}</td>
						<td>{{$med->stock}}</td>
						<td>{{$med->presentacion}}</td>
						<td>{{$med->proveedor}}</td>
						<td>{{$med->estado}}</td>
						<td>
							<a href="{{URL::action('MedicamentosController@edit',$med->id)}}">
								<button class="btn btn-info">Editar</button>
							</a>

							<a href="{{URL::action('MedicamentosController@show',$med->id)}}">
								<button class="btn btn-primary">Ver</button>
							</a>

							<a href="" data-target="#modal-delete-{{$med->id}}" data-toggle="modal">
								<button class="btn btn-danger">Eliminar</button>
							</a>
						</td>
					</tr>
					@include('medicamentos.modal')
				@endforeach

			</table>
		</div>
		{{$medicamentos->render()}}
	</div>
</div>
@endsection
