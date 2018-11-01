@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Pagos <a href="pagos/create"><button class="btn btn-success">Nuevo</button></h3></a>
		@include('pagos.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fecha</th>
					<th>Cantidad</th>
					<th>Tratamiento</th>
					<th>Opciones</th>
				</thead>

				@foreach($pagos as $pag)
					<tr>
						<td>{{$pag->fecha}}</td>
						<td>{{$pag->saldo}}</td>
						<td>{{$pag->nombre}}</td>
						<td>

							<a href="{{URL::action('PagosController@show',$pag->id)}}">
								<button class="btn btn-info btn-sm" title="Ver">
									<i class="material-icons">visibility</i>
									Ver
								</button>
							</a>

							<a href="" data-target="#modal-delete-{{$pag->id}}" data-toggle="modal">
								<button class="btn btn-danger btn-sm" title="Eliminar">
									<i class="material-icons">delete</i>
									Eliminar
								</button>
							</a>
						</td>
					</tr>
					@include('pagos.modal')
				@endforeach
			</table>
		</div>
		{{$pagos->render()}}
	</div>
</div>
@endsection
