{!! Form::open(array('url'=>'tratamientos','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Ingrese el Nombre del Tratamiento a Buscar" value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>
		</input>
	</div>
</div>

{{Form::close()}}
