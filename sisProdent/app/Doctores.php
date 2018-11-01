<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctores extends Model
{
  protected $table='doctor';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
   'nombre',
   'apellido',
   'direccion',
   'fecha_nac',
   'users_id',
   'genero_id'
  ];
}
