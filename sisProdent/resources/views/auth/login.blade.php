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
        <nav class="navbar navbar-default navbar-black navbar-fixed-top navbar-color-on-scroll" color-on-scroll="100">
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
                    @if (Route::has('login'))
                        <ul class="nav navbar-nav navbar-right">
                            @auth
                                <li>
                                    <a href="{{ url('/home') }}" class="btn btn-rose btn-round">
                                        <i class="material-icons">home</i>Inicio
                                    </a>
                                </li>
                            @else
                                <li class="button-container">
                                    <a class="btn btn-rose btn-round" href="{{ url('/') }}">
                                        <i class="material-icons">person_pin</i> Inicio
                                    </a>
                                </li>
                            @endauth
                        </ul>
                    @endif
                </div>
            </div>
        </nav>

		<div class="page-header">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form method="POST" action="{{ route('login') }}">
								@csrf
								<div class="header header-primary text-center">
									<h4 class="card-title">Iniciar Sesión</h4>
								</div>
                                <p class="description text-center">Ingresa tus datos</p>
                                {{-- Mensaje de Error si no se autentica antes el usuario y desea acceder a otra ruta --}}
                                @if (session()->has('flash'))
                                    <div class="alert alert-info" style="height: 50px; width: 100%;">
                                            <div class="alert-icon">
                                                <i class="material-icons">info_outline</i>
                                            </div>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                            </button>
                                            <b>Info:</b> {{session('flash')}}
                                    </div>
                                @endif
								<div class="card-content">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} login username-field" name="email" value="{{ old('email') }}" placeholder="Email..." required>
                                        {{-- Mostrar mensaje de error --}}
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} login password-field " name="password"  placeholder="Password..." required/>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
									</div>
								</div>
								<div class="footer text-center">
									<button class="btn btn-default btn-wd btn-lg" style="margin-bottom:10px;">Ingresar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
        
	</body>
	
    <!--   Scripts JS   -->
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/material.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-tagsinput.js') }}"></script>
    <!--    Centro de Control para Material Kit: ripples, efectos parallax,  -->
    <script src="{{ asset('js/material-kit.js?v=1.2.1') }}" type="text/javascript"></script>
</html>