@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Ventas <a href="ventas/create"><button class="btn btn-success">Nuevo</button></h3></a><hr>
		@include('medicamentos_cv.ventas.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fecha</th>
					<th>Forma de Pago</th>
					<th>Opciones</th>
				</thead>

        @foreach($ventas as $ven)
					<tr>
						<td>{{$ven->fecha}}</td>
						<td>{{$ven->forma_pago}}</td>
						<td>


							<a href="{{URL::action('ReciboController@print',$ven->id)}}">
								<button class="btn btn-sm" title="Imprimir">
									<i class="material-icons">print</i>
									Imprimir
								</button>
							</a>

							<a href="" data-target="#modal-delete-{{$ven->id}}" data-toggle="modal">
								<button class="btn btn-danger btn-sm" title="Eliminar">
									<i class="material-icons">delete</i>
									Eliminar
								</button>
							</a>
						</td>
					</tr>
					@include('medicamentos_cv.ventas.modal')
				@endforeach

			</table>
		</div>
		{{$ventas->render()}}
	</div>
</div>
@endsection
