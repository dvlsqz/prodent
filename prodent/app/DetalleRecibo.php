<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleRecibo extends Model
{
  protected $table='detalle_recibo';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'cantidad',
    'precio',
    'subtotal',
    'medicamento_id',
    'recibo_id',
    'tratamiento_id'
  ];
}
