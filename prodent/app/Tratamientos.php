<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamientos extends Model
{
  protected $table='tratamiento';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'nombre',
    'tipo',
    'detalle',
    'fecha_inicio',
    'fecha_fin',
    'precio',
    'estado',
    'paciente_id'
  ];
}
