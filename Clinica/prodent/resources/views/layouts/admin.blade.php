<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>PRODENT</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">

<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('css/calendar.css')}}">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="{{asset('js/calendario/es-ES.js')}}"></script>
<script src="{{asset('js/calendario/jquery.min.js')}}"></script>
<script src="{{asset('js/calendario/moment.js')}}"></script>
<script src="{{asset('js/calendario/bootstrap.min.js')}}"></script>
<script src="{{asset('js/calendario/bootstrap-datetimepicker.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.min.css')}}" >

<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('css/bootstrap-responsive.min.css')}}" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
<link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
<link href="{{asset('css/style.css')}}" rel="stylesheet">
<link href="{{asset('css/pages/dashboard.css')}}" rel="stylesheet">
<script src="{{asset('js/bootstrap.js')}}"></script>



<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html">CLINICA PRODENT <?php echo date('l jS \of F Y h:i:s A');?></a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <!--<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Account <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Settings</a></li>
              <li><a href="javascript:;">Help</a></li>
            </ul>
          </li>-->

          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> {{ Auth::user()->name }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;"></a></li>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
            </ul>
          </li>
        </ul>
      <!--  <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
        </form>-->
      </div>
      <!--/.nav-collapse -->
    </div>
    <!-- /container -->
  </div>
  <!-- /navbar-inner -->
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li><a href="{{url('/home')}}"><i class="icon-home"></i><span>INICIO</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-pencil"></i><span>REGISTROS</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{url('pacientes/')}}">PACIENTES</a></li>
            <li><a href="{{url('doctores/')}}">DOCTORES</a></li>
            <li><a href="{{url('medicamentos/')}}">MEDICAMENTOS</a></li>
            <li><a href="{{url('proveedores/')}}">PROVEEDORES</a></li>
            <li><a href="{{url('vendedores/')}}">VENDEDORES</a></li>
            <li><a href="{{url('tratamientos/')}}">TRATAMIENTOS</a></li>
          </ul>
        </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><span>PACIENTES</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{url('pacientes_info/antecedentes')}}">ANTECEDENTES</a></li>
            <li><a href="{{url('pacientes_info/tipos')}}">TIPO</a></li>
            <li><a href="{{url('pacientes_info/his_citas')}}">HISTORIAL CITAS</a></li>
            <li><a href="{{url('pacientes_info/his_tratamientos')}}">HISTORIAL TRATAMIENTOS</a></li>
            <li><a href="{{url('pacientes_info/responsables')}}">RESPONSABLE</a></li>
          </ul>
        </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-th"></i><span>MEDICAMENTOS</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{url('medicamentos/compras')}}">COMPRA</a></li>
            <li><a href="{{url('medicamentos/ventas')}}">VENTA</a></li>
          </ul>
        </li>
        <li><a href="{{url('citas/')}}"><i class="icon-calendar"></i><span>CITAS</span> </a> </li>
        <li><a href="{{url('recetas/')}}"><i class="icon-file"></i><span>RECETAS</span> </a> </li>
        <li><a href="{{url('pagos/')}}"><i class="icon-list-alt"></i><span>PAGOS</span> </a> </li>
        <li><a href="{{url('reportes/')}}"><i class="icon-bar-chart"></i><span>REPORTES</span> </a> </li>
        <li><a href="{{url('usuarios/')}}"><i class="icon-lock"></i><span>ACCESOS</span> </a> </li>


      </ul>
    </div>
    <!-- /container -->
  </div>
  <!-- /subnavbar-inner -->
</div>
<!-- /subnavbar -->

<div class="container">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              @yield('contenido')

		                          <!--Fin Contenido-->

                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->









</body>
</html>
