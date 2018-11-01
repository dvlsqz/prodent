<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="{{asset('imagenes/medical-24_icon-icons.com_73920.ico')}}" />
        <!-- CSS Files -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/material-icons.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/material-kit.css?v=1.2.1') }}" rel="stylesheet"/>
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        <title>{{ config('app.name', 'SProdent') }}</title>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-transparent navbar-fixed-top navbar-color-on-scroll" color-on-scroll="100">
            <div class="container">
                <!-- Toogle para dispositivos móviles -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">SProdent</a>
                </div>
    
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        @auth
                            <li>
                                <a href="{{ url('/home') }}" class="btn btn-rose btn-round">
                                    <i class="material-icons">home</i>Inicio
                                </a>
                            </li>
                        @else
                            <li class="button-container">
                                <a class="btn btn-rose btn-round" href="{{ route('login') }}">
                                    <i class="material-icons">person_pin</i> Iniciar Sesión
                                </a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <!--  Fondo  -->
        <div class="page-header header-filter bg-header" data-parallax="true" style="background-image: url('{{asset('imagenes/sprodentt.png')}}');">
            <div class="container">
                <div class="row">
                    <div class="col-xs-10 col-sm-8">
                        <h1 class="title">SProdent</h1>
                        <h4>Clínica Dental SProdent.</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenedor Principal -->
        <div class="main main-raised">
            <div class="container">
                <div class="row" style="margin-top:50px; margin-bottom: 50px;">
                    <div class="col-xs-12 col-md-12">
                        <h4 class="title text-center">Descripción</h4>
                        <p class="description-p">Clínica SProdent ofrece servicios dentales a toda la población, atendido por el Doctor Mardoqueo Rabanales.</p>
                        <hr />
                    </div>
                    <div class="col-xs-12 col-md-12">
                        <h4 class="title text-center">Misión</h4>
                        <p class="description-p">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero quaerat a distinctio ea harum, culpa dicta doloremque ab quos! Corporis blanditiis omnis nostrum natus esse magni cumque ipsa iusto quam.
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat suscipit eligendi, delectus quasi voluptatibus iste molestias. Mollitia rerum esse aspernatur numquam nostrum voluptatibus pariatur ipsam sunt nobis enim. Necessitatibus, libero.
                        </p>
                        <hr />
                    </div>
                    <div class="col-xs-12 col-md-12">
                        <h4 class="title text-center">Visión</h4>
                        <p class="description-p">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quisquam, id, facilis blanditiis modi cumque sunt cum nam iure tenetur, ratione voluptatum commodi consequatur repudiandae temporibus nobis nihil quis qui impedit.
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor, illum quas culpa perspiciatis reiciendis libero rem ea saepe magnam fugiat nemo distinctio debitis ducimus ab accusantium sit dolores! Dicta, molestiae.
                        </p>
                        <br>
                    </div>
                </div>
            </div>
        </div>   

        <!-- Footer Principal -->
        <footer class="footer">
            <div class="container">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="https://www.umg.edu.gt" target="_blank">
                                UMG
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> UMG - INGENIERÍA
                </div>
            </div>
        </footer>
    </body>
    <!--   Scripts JS   -->
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/material.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-tagsinput.js') }}"></script>
    <!--    Centro de Control para Material Kit: ripples, efectos parallax,  -->
    <script src="{{ asset('js/material-kit.js?v=1.2.1') }}" type="text/javascript"></script>
</html>
