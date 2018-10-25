@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Compras <a href="compras/create"><button class="btn btn-success">Nuevo</button></h3></a><hr>
		@include('medicamentos_cv.compras.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fecha</th>
					<th>Forma de Pago</th>
					<th>Total</th>
					<th>Opciones</th>
				</thead>

        @foreach($compras as $com)
					<tr>
						<td>{{$com->fecha}}</td>
						<td>{{$com->forma_pago}}</td>
						<td>{{$com->total}}</td>
						<td>{{$med->presentacion}}</td>
						<td>{{$med->estado}}</td>
						<td>

							<a href="{{URL::action('CompraController@show',$com->id)}}">
								<button class="btn btn-primary">Ver</button>
							</a>

							<a href="" data-target="#modal-delete-{{$com->id}}" data-toggle="modal">
								<button class="btn btn-danger">Eliminar</button>
							</a>
						</td>
					</tr>
					@include('medicamentos_cv.compras.modal')
				@endforeach

			</table>
		</div>
		{{$compras->render()}}
	</div>
</div>
@endsection
