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
										<label for="fecha_inicio">Fecha de Inicio</label>
										<input type="date" name="fecha_inicio" value="{{$tratamiento->fecha_inicio}}" class="form-control">
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="form-group">
										<label for="fecha_fin">Fecha de Fin</label>
										<input type="date" name="fecha_fin" value="{{$tratamiento->fecha_fin}}" class="form-control">
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="form-group">
											<label for="estado">Estado</label>
											<input type="text" name="estado" required value="{{$tratamiento->estado}}" class="form-control" placeholder="Estado...">
										</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="form-group">
										<label for="paciente_id">Paciente</label>
										<input type="text" name="paciente_id" required value="{{$responsable->nombre_paciente.' '.$responsable->apellido_paciente}}" class="form-control" placeholder="Paciente...">
									</div>
								</div>


  </div>


@endsection
