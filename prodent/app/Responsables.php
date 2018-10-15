<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsables extends Model
{
  protected $table='responsable';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'nombre',
    'apellido',
    'parentesco',
    'fecha_nac',
    'direccion',
    'telefono',
    'paciente_id',
    'genero_id'
  ];
}
