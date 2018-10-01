@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Tipos <a href="tipos/create"><button class="btn btn-success">Nuevo</button></h3></a><hr>
		@include('pacientes_info.tipos.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Tipo</th>
					<th>Opciones</th>
				</thead>

        @foreach($tipos as $tip)
					<tr>
						<td>{{$tip->tipo}}</td>
						<td>
							<a href="{{URL::action('TiposController@edit',$tip->id)}}">
								<button class="btn btn-info btn-large icon-edit"></button>
							</a>

							<a href="{{URL::action('TiposController@show',$tip->id)}}">
								<button class="btn btn-primary btn-large icon-eye-open"></button>
							</a>

							<a href="" data-target="#modal-delete-{{$tip->id}}" data-toggle="modal">
								<button class="btn btn-danger btn-large icon-trash"  ></button>
							</a>
						</td>
					</tr>
					@include('pacientes_info.tipos.modal')
				@endforeach

			</table>
		</div>
		{{$tipos->render()}}
	</div>
</div>
@endsection
