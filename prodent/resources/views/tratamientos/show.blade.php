@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" required value="{{$tratamiento->nombre}}" class="form-control" placeholder="Nombre...">
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="tipo">Tipo</label>
						<input type="text" name="tipo" required value="{{$tratamiento->tipo}}" class="form-control" placeholder="Tipo...">
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label for="detalle">Detalle</label>
							<input type="text" name="detalle" required value="{{$tratamiento->detalle}}" class="form-control" placeholder="Detalle...">
						</div>
				</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="precio">Precio</label>
					<input type="number" name="precio" required value="{{$tratamiento->precio}}" class="form-control" placeholder="Precio...">
				</div>
			</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="receta">Receta</label>
				<input type="text" name="receta" value="{{$receta->id}}" class="form-control" placeholder="Receta...">
			</div>
		</div>


  </div>


@endsection
