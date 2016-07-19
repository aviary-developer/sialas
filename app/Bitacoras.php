<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Bitacoras extends Model
{
    protected $fillable = ['id_usuario','detalle'];

    public static function bitacora($detalle){

        if(Auth::check()==1){
          Bitacoras::create([
          'id_usuario'=>Auth::user()->id,
          'detalle'=>$detalle,
        ]);
        }
      }

      public static function buscar(){
        return Bitacoras::orderBy('created_at')->paginate(8);
      }
}
