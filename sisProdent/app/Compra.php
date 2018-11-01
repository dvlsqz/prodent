<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
  protected $table='compra';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'num_lote',
    'fecha',
    'total',
    'detalles',
    'doctor_id',
    'forma_pago_id'
  ];
}
