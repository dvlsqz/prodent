@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Vendedor: {{$vendedor->nombre}}</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

			{!!Form::model($vendedor,['method'=>'PATCH','route'=>['vendedores.update',$vendedor->id]])!!}
			{{Form::token()}}
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

        <div class="form-group">
          <label for="nombre">Nombre(es)</label>
          <input type="text" name="nombre" required value="{{$vendedor->nombre}}" class="form-control" placeholder="Nombre...">
        </div>
      </div>


      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="telefono">telefono</label>
          <input type="text" name="telefono" required value="{{$vendedor->telefono}}" class="form-control" placeholder="Telefono...">
        </div>
      </div>
	</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection
