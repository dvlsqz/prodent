@extends('layouts.admin')
@section('contenido')

<div class="card">
	<div class="card-header">
		<h4 class="card-title">
			Reportes
		</h4>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="card-header">
					<h4 class="card-title">Medicamentos</h4>
				</div>
				<div class="card-body">
					<ul>
						<li><strong>Reporte</strong> del listado de medicamentos registrados en el sistema</li>
					</ul>
					<a href="{{URL::action('ReportesController@reportemedicamentos')}}" target="_blank">
						<button class="btn " title="Imprimir"> Generar</button>
					</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card-header">
					<h4 class="card-title">Medicamentos a Vencer</h4>
				</div>
				<div class="card-body">
					<ul>
						<li><strong>Reporte</strong> del listado de medicamentos proximos a vencer</li>
					</ul>
					<a href="{{URL::action('ReportesController@rpvmedicamentos')}}" target="_blank">
						<button class="btn " title="Imprimir"> Generar</button>
					</a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="card-header">
					<h4 class="card-title">Medicamentos por Desabastecerse</h4>
				</div>
				<div class="card-body">
					<ul>
						<li><strong>Reporte</strong> del listado de medicamentos proximos a Desabastecerse</li>
					</ul>
					<a href="{{URL::action('ReportesController@smmedicamentos')}}" target="_blank">
						<button class="btn " title="Imprimir"> Generar</button>
					</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card-header">
					<h4 class="card-title">Medicamentos sin Stock</h4>
				</div>
				<div class="card-body">
					<ul>
						<li><strong>Reporte</strong> del listado de medicamentos sin Existencias</li>
					</ul>
					<a href="{{URL::action('ReportesController@semedicamentos')}}" target="_blank">
						<button class="btn " title="Imprimir"> Generar</button>
					</a>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection
