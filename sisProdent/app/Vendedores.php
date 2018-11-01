<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedores extends Model
{
  protected $table='vendedor';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
   'nombre',
   'apellido',
   'correo',
   'direccion',
   'telefono',
   'proveedor_id'
  ];
}
