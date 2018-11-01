@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Tratamientos <a href="tratamientos/create"><button class="btn btn-success">Nuevo</button></h3></a><hr>
		@include('tratamientos.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Tipo</th>
					<th>Detalle</th>
					<th>Paciente</th>
					<th>Precio | Situacion</th>
					<th>Saldo Actual</th>
					<th>Opciones</th>
				</thead>

        @foreach($tratamientos as $tra)
					<tr>
            <td>{{$tra->nombre}}</td>
						<td>{{$tra->tipo}}</td>
						<td>{{$tra->detalle}}</td>
						<td>{{$tra->nombre_paciente.' '.$tra->apellido_paciente}}</td>
						<td>{{$tra->precio}} | @if ($tra->saldo_actual == $tra->precio) Sin Abonar @elseif ($tra->saldo_actual == 0) Pagado @else Abonando @endif</td>
						<td>{{$tra->saldo_actual}}</td>
						<td>
							<a href="{{URL::action('TratamientosController@edit',$tra->id)}}">
								<button class="btn btn-primary btn-sm" title="Editar">
									<i class="material-icons">edit</i>
									Editar
								</button>

							</a>

							<a href="{{URL::action('TratamientosController@show',$tra->id)}}">
								<button class="btn btn-info btn-sm" title="Ver">
									<i class="material-icons">visibility</i>
									Ver
								</button>
							</a>

							<a href="" data-target="#modal-delete-{{$tra->id}}" data-toggle="modal">
								<button class="btn btn-danger btn-sm" title="Eliminar">
									<i class="material-icons">delete</i>
									Eliminar
								</button>
							</a>
						</td>
					</tr>
					@include('tratamientos.modal')
				@endforeach

			</table>
		</div>
		{{$tratamientos->render()}}
	</div>
</div>
@endsection
