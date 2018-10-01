<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialCitas extends Model
{
  protected $table='historial_cita';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'descripcion',
    'Paciente_id',
    'tratamiento_id',
    'agenda_id'
  ];
}
