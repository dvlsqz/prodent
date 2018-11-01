<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<title>Clinica SProdent</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">

<link rel="shortcut icon" href="{{asset('imagenes/medical-24_icon-icons.com_73920.ico')}}" />

<!--     Iconos y Fuentes     -->

<link rel="stylesheet" type="text/css" href="{{ asset('css/google-fonts.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/material-icons.css') }}" />
<link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css')}}" />

<!-- CSS Files -->
<link href="{{asset('css/material-dashboard.min.css?v=2.0.2')}}" rel="stylesheet" />
@yield('css')
</head>
<body>
<!-- Inicio de Contenido Completo -->
<div class="wrapper ">

  <!-- Inicio SideBar -->
  <div class="sidebar" data-color="purple" data-background-color="black" data-image="{{asset('img/bg_sidebar-1.jpg')}}">
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
          GT
        </a>
        <a href="#" class="simple-text logo-normal">
          UMG
        </a>
    </div>
    <div class="sidebar-wrapper">
        <!-- Apartados - Botones de Módulos -->
        <ul class="nav">
            <!-- Botones Módulo Home -->
            <li class="nav-item  ">
                <a class="nav-link" href="{{ route('home') }}">
                      <i class="material-icons">home</i>
                    <p>INICIO</p>
                </a>
            </li>
            <!-- Botones Módulo Registros -->
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#modRegistros">
                    <i class="material-icons">playlist_add</i>
                    <p> REGISTROS
                       <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="modRegistros">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('pacientes/')}}">
                              <span class="sidebar-mini"> P </span>
                              <span class="sidebar-normal"> Pacientes </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('doctores/')}}">
                              <span class="sidebar-mini"> DR </span>
                              <span class="sidebar-normal"> Doctores </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('medicamentos/')}}">
                              <span class="sidebar-mini"> MD </span>
                              <span class="sidebar-normal"> Medicamentos </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('proveedores/')}}">
                              <span class="sidebar-mini"> PR </span>
                              <span class="sidebar-normal"> Proveedores </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('vendedores/')}}">
                              <span class="sidebar-mini"> VD </span>
                              <span class="sidebar-normal"> Vendedores </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('tratamientos/')}}">
                              <span class="sidebar-mini"> TR </span>
                              <span class="sidebar-normal"> Tratamientos </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Fin Botones Registros -->

            <!-- Botones Módulo Pacientes -->
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#modPacientes">
                    <i class="material-icons">face</i>
                    <p> PACIENTES
                       <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="modPacientes">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('pacientes_info/antecedentes')}}">
                              <span class="sidebar-mini"> AN </span>
                              <span class="sidebar-normal"> Antecedentes </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('pacientes_info/his_citas')}}">
                              <span class="sidebar-mini"> HC </span>
                              <span class="sidebar-normal"> Historial Citas </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('pacientes_info/his_tratamientos')}}">
                              <span class="sidebar-mini"> HT </span>
                              <span class="sidebar-normal"> Historial Tratamientos </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('pacientes_info/responsables')}}">
                              <span class="sidebar-mini"> RS </span>
                              <span class="sidebar-normal"> Responsable </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Fin Botones Pacientes -->

            <!-- Botones Módulo Medicamentos -->
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#modMedic">
                    <i class="material-icons">shopping_cart</i>
                    <p> MEDICAMENTOS
                       <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="modMedic">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('medicamentos_cv/compras')}}">
                              <span class="sidebar-mini"> CM </span>
                              <span class="sidebar-normal"> Compra </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{url('medicamentos_cv/ventas')}}">
                              <span class="sidebar-mini"> VT </span>
                              <span class="sidebar-normal"> Venta </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Fin Botones Medicamentos -->

            <!-- Botones Módulo Citas -->
            <li class="nav-item  ">
                <a class="nav-link" href="{{url('citas/')}}">
                    <i class="material-icons">event_note</i>
                    <p>CITAS</p>
                </a>
            </li>
            <!-- Fin Botones Citas -->

            <!-- Botones Módulo Recetas -->
            <li class="nav-item  ">
                <a class="nav-link" href="{{url('recetas/')}}">
                    <i class="material-icons">note</i>
                    <p>RECETAS</p>
                </a>
            </li>
            <!-- Fin Botones Recetas -->

            <!-- Botones Módulo Pagos -->
            <li class="nav-item  ">
                <a class="nav-link" href="{{url('pagos/')}}">
                    <i class="material-icons">monetization_on</i>
                    <p>PAGOS</p>
                </a>
            </li>
            <!-- Fin Botones Pagos -->

            <!-- Botones Módulo Reportes -->
            <li class="nav-item  ">
                <a class="nav-link" href="{{url('reportes/')}}">
                    <i class="material-icons">insert_chart</i>
                    <p>REPORTES</p>
                </a>
            </li>
            <!-- Fin Botones Reportes -->

            <!-- Botón para cerrar sesión -->
            <li class="nav-item" style="margin-top:30px;">
              <a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault();
              document.getElementById('formCerrar').submit();">

              <i class="material-icons">person</i>
              <p>Cerrar Sesión</p>
            </a>
            <form id="formCerrar" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
    </div>
  </div>
  <!-- Fin Sidebar -->

  <!-- Contenedor Principal -->
  <div class="main-panel" style="background-color: #F5F5F5;">
      <!-- Inicio NavBar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
          <div class="container-fluid">
              <div class="navbar-wrapper">
                  <div class="navbar-minimize">
                      <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                          <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                          <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                      </button>
                  </div>
              </div>
              <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navPrin">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                  <span class="navbar-toggler-icon icon-bar"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end">
                  <ul class="navbar-nav">
                      <li class="nav-item dropdown">
                          <a class="nav-link" href="#" id="btnCerrar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <strong>{{ Auth::user()->name }}</strong>
                            <i class="material-icons">person</i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnCerrar">
                              <form method="POST" action="{{route('logout')}}">
                                  @csrf
                                  <button class="dropdown-item" style="width:100%;">Cerrar Sesión</button>
                              </form>
                          </div>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
      <!-- Fin NavBar -->

      <!-- Contenido de Módulos -->
      <div class="content" style="background-color: #F5F5F5;">
          <div class="container-fluid">
              <!-- Contenido de acuerdo al apartado seleccionado -->
              @yield('contenido')
          </div>
      </div>
      <!-- Fin Contentido de Módulos -->

      <!-- Footer -->
      <footer class="footer">
          <div class="container-fluid">
            <nav class="float-left">
              <ul>
                  <li>
                      <a href="https://www.umg.edu.gt/" target="_blank">
                      UMG
                      </a>
                  </li>
              </ul>
            </nav>
            <div class="copyright float-right">
              &copy;
              <script>
                document.write(new Date().getFullYear())
              </script>, UMG - INGENIERÍA.
            </div>
          </div>
      </footer>
  </div>
  <!-- Fin Contenedor Principal -->
</div>

</body>
   <!--   Scripts JS   -->
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="{{ asset('js/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('js/material.min.js') }}"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="{{asset('js/moment.min.js')}}"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="{{asset('js/moment.min.js')}}"></script>
    <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="{{asset('js/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
	<script src="{{asset('js/bootstrap-selectpicker.js')}}" type="text/javascript"></script>
    <!-- Chartist JS -->
    <script src="{{asset('js/plugins/chartist.min.js')}}"></script>
    <!--  Plugin Notificaciones -->
    <script src="{{asset('js/plugins/bootstrap-notify.js')}}"></script>
    <!--    Centro de Control para Material Kit: ripples, efectos parallax,  -->
    <script src="{{asset('js/material-dashboard.min.js?v=2.0.2')}}" type="text/javascript"></script>
  <script src="{{asset('js/material-kit.js?v=1.2.1')}}" type="text/javascript"></script>
    <script src="{{asset('js/layout/admin.js')}}"></script>

    <script type="text/javascript">

    $(document).ready(function(){
      materialKit.initFormExtendedDatetimepickers();

    });
  </script>
  @yield('scripts')

</html>
