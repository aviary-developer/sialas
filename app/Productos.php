<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $fillable = ['nombre','marca_id','categoria_id','nombre_img'];
}
