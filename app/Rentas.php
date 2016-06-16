<?php

namespace sialas;

use Illuminate\Database\Eloquent\Model;
use DB;

class Rentas extends Model
{
    protected $table ='rentas';

    protected $fillable = ['pago','tramo','desde','hasta','porcentaje','exceso','cuota'];

    public static function renta($tipo_saldo,$salario){
      $tra="'IV'";
      if($tipo_saldo==1){
        $var="'Mensual'";
        $ult=DB::select('select * from rentas where pago='.$var.' and tramo='.$tra);
        foreach ($ult as $tr) {$max= $tr->desde;}
        if($salario>=$max){
          return (($salario-$tr->exceso)*$tr->porcentaje/100)+$tr->cuota;
        }else{
          $tramo=DB::select('select * from rentas where '.$salario.' between desde and hasta and pago='.$var);
          foreach ($tramo as $t) {
            return (($salario-$t->exceso)*$t->porcentaje/100)+$t->cuota;
          }
        }
      }elseif($tipo_saldo==2){
        $var="'Quincenal'";
        $ult=DB::select('select * from rentas where pago='.$var.' and tramo='.$tra);
        foreach ($ult as $tr) {$max= $tr->desde;}
        if($salario>=$max){
          return (($salario-$tr->exceso)*$tr->porcentaje/100)+$tr->cuota;
        }else{
          $tramo=DB::select('select * from rentas where '.$salario.' between desde and hasta and pago='.$var);
          foreach ($tramo as $t) {
            return (($salario-$t->exceso)*$t->porcentaje/100)+$t->cuota;
          }
        }
      }
      else{
        $var="'Semanal'";
        $ult=DB::select('select * from rentas where pago='.$var.' and tramo='.$tra);
        foreach ($ult as $tr) {$max= $tr->desde;}
        if($salario>=$max){
          return (($salario-$tr->exceso)*$tr->porcentaje/100)+$tr->cuota;
        }else{
          $tramo=DB::select('select * from rentas where '.$salario.' between desde and hasta and pago='.$var);
          foreach ($tramo as $t) {
            return (($salario-$t->exceso)*$t->porcentaje/100)+$t->cuota;
          }
        }
      }

    }
}
