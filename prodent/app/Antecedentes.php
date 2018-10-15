<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antecedentes extends Model
{
  protected $table='antecedentes';
  protected $primaryKey='id';

  public $timestamps =false;

  protected $fillable = [
    'descripcion',
    'tipo',
    'paciente_id'
  ];
}
