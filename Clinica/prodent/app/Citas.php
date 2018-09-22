<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
  protected $table='cita';
  protected $primaryKey='id';

  public $timestamps =false;
}
