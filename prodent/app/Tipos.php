<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipos extends Model
{
  protected $table='tipo';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'tipo'
  ];
}
