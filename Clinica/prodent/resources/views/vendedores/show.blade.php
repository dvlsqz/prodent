@extends('layouts.admin')
@section('contenido')

	<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="nombre">Nombre(es)</label>
      <input disabled type="text" name="nombre" required value="{{$vendedor->nombre}}" class="form-control" placeholder="Nombre...">
    </div>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
      <label for="telefono">Telefono</label>
      <input disabled type="text" name="telefono" value="{{$vendedor->telefono}}" class="form-control" placeholder="Telefono...">
    </div>
  </div>

  </div>


@endsection
