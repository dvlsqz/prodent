@extends('layouts.admin')
@section('contenido')


	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Compra</h3>
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

			{!!Form::open(array('url'=>'medicamentos_cv/compras','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="fecha">Fecha</label>
				<input type="date" name="fecha" value="{{old('fecha')}}" class="form-control">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="num_lote">Numero de Lote</label>
				<input type="number" name="num_lote" required value="{{old('num_lote')}}" class="form-control" placeholder="Numero de Lote...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="detalles">Detalles</label>
				<input type="text" name="detalles" required value="{{old('detalles')}}" class="form-control" placeholder="Detalle...">
			</div>
		</div>


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="doctor_id">Doctor </label>
				<select data-live-search="true" name="doctor_id" id="doctor_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
					@foreach($doctores as $doc)
						<option value="{{$doc->id}}">{{$doc->nombre.' '.$doc->apellido}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="forma_pago_id">Forma de Pago </label>
				<select data-live-search="true" name="forma_pago_id" id="forma_pago_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
					@foreach($fpagos as $fp)
						<option value="{{$fp->id}}">{{$fp->forma}}</option>
					@endforeach
				</select>
			</div>
		</div>


	</div>

	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<label for="pproveedor_id">Proveedor</label>
						<select data-live-search="true" name="pproveedor_id" id="pproveedor_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($proveedores as $pro)
								<option value="{{$pro->id}}">{{$pro->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="pmedicamento_id">Medicamento</label>
						<select data-live-search="true" name="pmedicamento_id" id="pmedicamento_id" class="form-control selectpicker" <script src="{{asset('js/bootstrap.min.js')}}"></script>>
							@foreach($medicamentos as $med)
								<option value="{{$med->id}}">{{$med->codigo.' - '.$med->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12" >
					<div class="form-group">
						<label for="cantidad">Cantidad</label>
						<input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad...">
					</div>
				</div>

				<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12" >
					<div class="form-group">
						<label for="precio">Precio</label>
						<input type="number" name="pprecio" id="pprecio" class="form-control" placeholder="Precio...">
					</div>
				</div>


				<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12" >
					<div class="form-group">
						<button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
					</div>
				</div>

				<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12" >
					<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
						<thead style="background-color:#A9D0F5">
							<th>Opciones</th>
							<th>Proveedor</th>
							<th>Medicamento</th>
							<th>Cantidad</th>
							<th>Precio</th>
							<th>Total</th>
						</thead>
						<tfoot>
							<th>Subtotal</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th><h4 id="subtotal">0.00</h4> <input type="hidden" name="subtotal" id="subtotal"></th>
						</tfoot>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>


		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar">
			<div class="form-group">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
	</div>

	{!!Form::close()!!}

	@push ('scripts')
				 <script>
					 $(document).ready(function(){
				$('#bt_add').click(function(){
				 agregar();
				 });
			 });

	var cont=0;
	suma=0;
	subtotal=0;
	resta=0;
	total=[];
	$("#guardar").hide();


	function agregar(){
		//datosCurso= document.getElementById('pidCurso');

		proveedor_id=document.getElementById('pproveedor_id');
		medicamento_id=document.getElementById('pidSubArea');
		proveedor=$("#pproveedor_id option:selected").text();
		medicamento=$("#pmedicamento_id option:selected").text();
		cantidad=parseFloat($("#pcantidad").val());
		precio=parseFloat($("#pprecio").val());

		if (proveedor_id!="" && medicamento_id!="" && cantidad!="" && precio!="" )
		{
			cont++;

			total[cont]=((cantidad)*(precio));
			suma=suma+total[cont];
			//promedio = suma/cont;

			var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="proveedor_id[]" value="'+proveedor_id+'">'+Proveedor+'</td><td><input type="hidden" name="medicamento_id[]" value="'+medicamento_id+'">'+Medicamento+'</td><td><input disabled  type="number" name="cantidad[]" value="'+Cantidad+'"></td><td><input disabled  type="number" name="precio[]" value="'+precio+'"><td>'+total[cont]+'</td></tr>';

			limpiar();
			//$("#promedio").html(promedio);
			//$("#total_venta").val(total);
			evaluar();
			$('#detalles').append(fila);

		}
		else
		{
			alert("Error al ingresar el detalle de la venta, revise los datos del medicamento")
		}

	}
	function limpiar(){
		$("#pcantidad").val("");
		$("#pprecio").val("");
		//$("#pstock").val("");
	}

	function evaluar()
	{
		if (promedio>0)
		{
			$("#guardar").show();
		}
		else
		{
			$("#guardar").hide();
		}
	 }

	 function eliminar(index){
		suma=suma-total[cont];
		promedio=suma;
		cont--;
		//$("#promedio").html(promedio);
		//$("#total_venta").val(total);
		$("#fila" + index).remove();
		evaluar();

	}
				 </script>
				 @endpush



	@endsection
