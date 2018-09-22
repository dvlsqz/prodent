@extends('layouts.admin')
@section('contenido')

	<div class="row">
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group">
				<label for="tipo">Tipo</label>
				<input type="text" name="tipo" required value="{{old('tipo')}}" class="form-control" placeholder="Tipo...">
			</div>
		</div>

  </div>


@endsection
