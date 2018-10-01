<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
  protected $table='paciente';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
   'nombre',
   'apellido',
   'genero',
   'fecha_nac',
   'direccion',
   'telefono',
   'fecha_registro'

  ];
}
