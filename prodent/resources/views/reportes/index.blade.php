@extends('layouts.admin')
@section('contenido')


<div class="main">

	<div class="main-inner">

	    <div class="container">

	      <div class="row">

	      	<div class="span12">

	      		<div class="widget">

					<div class="widget-header">
						<i class="icon-th-large"></i>
						<h3>Reportes</h3>
					</div> <!-- /widget-header -->

					<div class="widget-content">

						<div class="pricing-plans plans-3">

						<div class="plan-container">
					        <div class="plan">
						        <div class="plan-header">

						        	<div class="plan-title">
						        		Medicamentos
					        		</div> <!-- /plan-title -->


						        </div> <!-- /plan-header -->

									<div class="plan-features">
									<ul>
										<li><strong>Reporte</strong> del listado de medicamentos registrados en el sistema</li>
									</ul>
								</div> <!-- /plan-features -->

								<div class="plan-actions">
										<a href="{{URL::action('ReportesController@reportemedicamentos')}}">
										<button class="btn " title="Imprimir"> Generar</button>
									</a>
								</div> <!-- /plan-actions -->

							</div> <!-- /plan -->
					    </div> <!-- /plan-container -->


							<div class="plan-container">
						        <div class="plan">
							        <div class="plan-header">

							        	<div class="plan-title">
							        		Medicamentos a Vencer
						        		</div> <!-- /plan-title -->


							        </div> <!-- /plan-header -->

										<div class="plan-features">
										<ul>
											<li><strong>Reporte</strong> del listado de medicamentos proximos a vencer</li>
										</ul>
									</div> <!-- /plan-features -->

									<div class="plan-actions">
										<a href="{{URL::action('ReportesController@rpvmedicamentos')}}">
											<button class="btn " title="Imprimir"> Generar</button>
										</a>
									</div> <!-- /plan-actions -->

								</div> <!-- /plan -->
						    </div> <!-- /plan-container -->


								<div class="plan-container">
											<div class="plan">
												<div class="plan-header">

													<div class="plan-title">
														Medicamentos por Desabastecerse
													</div> <!-- /plan-title -->


												</div> <!-- /plan-header -->

											<div class="plan-features">
											<ul>
												<li><strong>Reporte</strong> del listado de medicamentos proximos a Desabastecerse</li>
											</ul>
										</div> <!-- /plan-features -->

										<div class="plan-actions">
											<a href="{{URL::action('ReportesController@smmedicamentos')}}">
												<button class="btn " title="Imprimir"> Generar</button>
											</a>
										</div> <!-- /plan-actions -->

									</div> <!-- /plan -->
									</div> <!-- /plan-container -->

									<div class="plan-container">
												<div class="plan">
													<div class="plan-header">

														<div class="plan-title">
															Medicamentos sin Stock
														</div> <!-- /plan-title -->


													</div> <!-- /plan-header -->

												<div class="plan-features">
												<ul>
													<li><strong>Reporte</strong> del listado de medicamentos sin Existencias</li>
												</ul>
											</div> <!-- /plan-features -->

											<div class="plan-actions">
												<a href="{{URL::action('ReportesController@semedicamentos')}}">
													<button class="btn " title="Imprimir"> Generar</button>
												</a>
											</div> <!-- /plan-actions -->

										</div> <!-- /plan -->
										</div> <!-- /plan-container -->


							</div> <!-- /plan -->
					    </div> <!-- /plan-container -->

						</div> <!-- /pricing-plans -->

						</div> <!-- /widget-content -->

					</div> <!-- /widget -->

					</div> <!-- /span12 -->


					</div> <!-- /row -->

				</div> <!-- /container -->

		</div> <!-- /main-inner -->

	</div> <!-- /main -->
</div>
@endsection
