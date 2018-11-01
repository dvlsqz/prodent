<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialTratamientos extends Model
{
  protected $table='historial_tratamiento';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'fecha',
    'detalles',
    'tratamiento_id'
  ];
}
