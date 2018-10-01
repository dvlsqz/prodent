<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamentos extends Model
{
  protected $table='medicamento';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
   'codigo',
   'nombre',
   'fecha_cad',
   'stock',
   'sotck_minimo',
   'presentacion',
   'precio_costo',
   'precio_venta',
   'estado',
   'proveedor_id'
  ];
}
