<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abastecer extends Model
{
  protected $table = 'absatecer';


  protected $primaryKey='id';
   protected $fillable = [
      'nombre_usuario',
      'contenido',
      'cantidad',
      'articulo'
   ];
}
