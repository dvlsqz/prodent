<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
  protected $table='recibo';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'serie',
    'fecha',
    'descuento',
    'total',
    'detalles',
    'estado',
    'paciente_id',
    'forma_pago_id'
  ];
}
