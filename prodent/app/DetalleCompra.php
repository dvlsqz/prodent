<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
  protected $table='detalle_compra';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'cantidad',
    'precio',
    'subtotal',
    'medicamento_id',
    'compra_id',
    'proveedor_id'
  ];
}
