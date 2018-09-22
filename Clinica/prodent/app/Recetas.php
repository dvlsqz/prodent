<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recetas extends Model
{
  protected $table='receta';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'prescripción',
    'indicaciones',
    'fecha',
    'paciente_id',
    'medicamento_id',
    'doctor_id'
  ];
}
