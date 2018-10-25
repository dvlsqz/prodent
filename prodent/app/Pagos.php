<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
  protected $table='cuenta';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'saldo',
    'fecha',
    'tratamiento_id'
  ];
}
