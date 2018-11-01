@extends('layouts.admin')
@section('contenido')
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>

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
				<input type="text" name="fecha" value="{{old('fecha')}}" class="form-control datepicker">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<input type="number" name="num_lote" required value="{{old('num_lote')}}" class="form-control" placeholder="Número de Lote...">
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<input type="text" name="detalles" required value="{{old('detalles')}}" class="form-control" placeholder="Detalles...">
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
	<div class="row" style="margin-top: 15px;">
		<div class="col-lg-12 col-md-12">
			<div class="card">
				<div class="card-header card-header-primary">
					<h4 class="card-title">Compra</h4>
					<p class="card-category">Detalle de Compras</p>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="pproveedor_id">Proveedor</label>
								<select data-live-search="true" name="pproveedor_id" id="pproveedor_id" class="form-control selectpicker">
									@foreach($proveedores as $pro)
									<option value="{{$pro->id}}">{{$pro->nombre}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="form-group">
								<label for="pmedicamento_id">Medicamento</label>
								<select data-live-search="true" name="pmedicamento_id" id="pmedicamento_id" class="form-control selectpicker">
									@foreach($medicamentos as $med)
									<option value="{{$med->id}}">{{$med->codigo.' - '.$med->nombre}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12" >
							<div class="form-group">
								<label for="cantidad">Cantidad</label>
								<input type="number" name="pcantidad" id="pcantidad" min="0" class="form-control">
							</div>
						</div>

						<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12" >
							<div class="form-group">
								<label for="precio">Precio</label>
								<input type="number" name="pprecio" id="pprecio" class="form-control" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'#CFD8DC'">
							</div>
						</div>


						<div class="col-sm-2 col-md-2 col-lg-2 col-xs-12" >
							<div class="form-group">
								<button type="button" id="bt_add" class="btn btn-success btn-sm">Agregar</button>
							</div>
						</div>
					</div>

				</div>

				<div class="card-body table-responsive">
					<table class="table table-hover" id="detalles">
						<thead class="text-info">
							<th>Opciones</th>
							<th>Proveedor</th>
							<th>Medicamento</th>
							<th>Cantidad</th>
							<th>Precio</th>
							<th>Total</th>
						</thead>
						<tbody>

						</tbody>
						<tfoot>
							<th>Subtotal</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							 <th><h4 id="total">Q 0.00</h4></th>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar">
			<div class="form-group">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
	</div>

	{!!Form::close()!!}

  <script>
        $(document).ready(function(){
         $('#bt_add').click(function(){
          agregar();
          });
        });

   var cont=0;
   total=0;
   subtotal=[];
   $("#guardar").hide();

   function agregar(){
     medicamento_id=$("#pmedicamento_id").val();
     medicamento=$("#pmedicamento_id option:selected").text();
     proveedor_id=$("#pproveedor_id").val();
     proveedor=$("#pproveedor_id option:selected").text();
     cantidad=$("#pcantidad").val();
     precio=$("#pprecio").val();

     if (medicamento_id!="" && cantidad!="" && cantidad>0 && proveedor_id!="" && precio!="")
     {
        subtotal[cont]=(cantidad*precio);
        total=total+subtotal[cont];

        var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="proveedor_id[]" value="'+proveedor_id+'">'+proveedor+'</td><td><input type="hidden" name="medicamento_id[]" value="'+medicamento_id+'">'+medicamento+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio[]" value="'+precio+'"></td></td><td>'+subtotal[cont]+'</td></tr>';
        cont++;
        limpiar();
        $('#total').html("Q " + total);
        evaluar();
        $('#detalles').append(fila);

     }
     else
     {
       alert("Error al ingresar el detalle de la compra, revise los datos del medicamento")
     }

   }
   function limpiar(){
     $("#pcantidad").val("");
     $("#pprecio").val("");
   }

   function evaluar()
   {
     if (total>0)
     {
       $("#guardar").show();
     }
     else
     {
       $("#guardar").hide();
     }
    }

    function eliminar(index){
     total=total-subtotal[index];
     $("#total").html("Q " + total);
     $("#fila" + index).remove();
     evaluar();

   }
          </script>

@endsection
