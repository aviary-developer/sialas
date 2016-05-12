{!!Form::open(['url'=>['darAltaMobiliarios',$mob->id],'method'=>'POST'])!!}
<img src={!! asset('/img/WB/upp.svg') !!} alt="" class="circ" onclick="return swal({
title: '¿Esta seguro que desea restaurar?',
text: 'El registro volverá a estar disponible!',   type: 'warning',
showCancelButton: true,   confirmButtonColor: '#06c',
confirmButtonText: 'Si, restaurar!',
cancelButtonText: 'No, Cancelar!',   closeOnConfirm: true,
closeOnCancel: false }, function(isConfirm){
if (isConfirm) { submit();
swal('Deleted!', 'Registro Restaurado', 'success');
} else {
swal({   title: 'El registro se mantiene igual',type:'info',
text: 'Se Cerrará en 2 Segundos',   timer: 2000,
showConfirmButton: false });} });"/>
{!!Form::close()!!}