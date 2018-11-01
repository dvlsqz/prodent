<?php

Route::get('/', function () {
    return view('welcome');
});


// Auth::routes();
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('/login', 'Auth\LoginController@formLogin');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Rutas modulo de registro
Route::get('/home', 'HomeController@index')->name('home');
//Rutas modulo de registro
Route::resource('genero','GenerosController');
Route::resource('citas','CitasController');
Route::resource('pacientes','PacientesController');
Route::resource('medicamentos','MedicamentosController');
Route::resource('proveedores','ProveedoresController');
Route::resource('vendedores','VendedoresController');
Route::resource('tratamientos','TratamientosController');
Route::resource('doctores','DoctoresController');
//Rutas modulo de pacientes
Route::resource('pacientes_info/antecedentes','AntecedentesController');
Route::resource('pacientes_info/his_citas','HistorialCitasController');
Route::resource('pacientes_info/his_tratamientos','HistorialTratamientosController');
Route::resource('pacientes_info/responsables','ResponsablesController');
//Rutas modulo de compras y ventas
Route::resource('medicamentos_cv/compras','CompraController');
Route::resource('medicamentos_cv/ventas','ReciboController');
Route::get('views/medicamentos_cv/ventas/{id}', 'ReciboController@print');
//Rutas modulo de recetas
Route::resource('recetas','RecetasController');
Route::get('views/recetas/{id}', 'RecetasController@print');
//Rutas modulo de reportes
Route::resource('reportes', 'ReportesController');
Route::get('views/reportes/medicamentos_vencer', 'ReportesController@rpvmedicamentos');
Route::get('views/reportes/medicamentos', 'ReportesController@reportemedicamentos');
Route::get('views/reportes/medicamentosStockMinimo', 'ReportesController@smmedicamentos');
Route::get('views/reportes/medicamentosSinStock', 'ReportesController@semedicamentos');
//Rutas modulo de pagos
Route::resource('pagos','PagosController');
