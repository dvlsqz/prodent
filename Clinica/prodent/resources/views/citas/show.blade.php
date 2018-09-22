@extends('layouts.admin')
@section('contenido')

  <script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("enfermedades");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }

		function showContent1() {
        element = document.getElementById("content1");
        check = document.getElementById("alergico");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
	</script>

  <div class="row">

            <div class="page-header"><h2></h2></div>
                    <div class="pull-left form-inline"><br>
                            <div class="btn-group">
                                <button class="btn btn-primary" data-calendar-nav="prev"><< Anterior</button>
                                <button class="btn" data-calendar-nav="today">Hoy</button>
                                <button class="btn btn-primary" data-calendar-nav="next">Siguiente >></button>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-warning" data-calendar-view="year">Año</button>
                                <button class="btn btn-warning active" data-calendar-view="month">Mes</button>
                                <button class="btn btn-warning" data-calendar-view="week">Semana</button>
                                <button class="btn btn-warning" data-calendar-view="day">Dia</button>
                            </div>

                    </div>
                        <div class="pull-right form-inline"><br>
                            <button class="btn btn-info" data-toggle='modal' data-target='#add_evento'>Añadir Evento</button>
                        </div>


  </div><hr>

@endsection
