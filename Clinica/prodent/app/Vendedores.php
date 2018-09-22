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
   'telefono'
  ];
}
