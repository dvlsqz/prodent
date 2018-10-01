@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Paciente: {{$paciente->nombre.''.$paciente->apellido}}</h3><hr>
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

			{!!Form::model($paciente,['method'=>'PATCH','route'=>['pacientes.update',$paciente->id]])!!}
			{{Form::token()}}
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

        <div class="form-group">
          <label for="nombre">Nombre(es)</label>
          <input type="text" name="nombre" required value="{{$paciente->nombre}}" class="form-control" placeholder="Nombre...">
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="apellido">Apellido(os)</label>
          <input type="text" name="apellido" required value="{{$paciente->apellido}}" class="form-control" placeholder="Apellido...">
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="genero" >Genero</label>
            <select name="genero" class="form-control">
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
            </select>
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="fecha_nac">Fecha de Nacimiento</label>
          <input type="date" name="fecha_nac" value="{{$paciente->fecha_nac}}" class="form-control">
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="direccion">Direccion</label>
          <input type="text" name="direccion" value="{{$paciente->direccion}}" class="form-control" placeholder="Direccion...">
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="telefono">telefono</label>
          <input type="text" name="telefono" required value="{{$paciente->telefono}}" class="form-control" placeholder="Telefono...">
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