<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

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
//Rutas modulo de recetas
Route::resource('recetas','RecetasController');
Route::get('views/recetas/{id}', 'RecetasController@print');
