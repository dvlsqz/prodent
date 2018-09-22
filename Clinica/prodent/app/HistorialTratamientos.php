<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialTratamientos extends Model
{
  protected $table='historial_tratamiento';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'fecha_inicio',
    'fecha_culminacion',
    'abono',
    'estado',
    'detalles',
    'paciente_id',
    'tratamiento_id'
  ];
}
