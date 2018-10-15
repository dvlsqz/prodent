<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
  protected $table='proveedor';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'nombre',
    'direccion',
    'correo',
    'num_cuenta',
    'telefono1',
    'telefono2'
  ];
}
