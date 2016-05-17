{!!Form::open(['route'=>['distribuidores.destroy',$distribuidor->id],'method'=>'DELETE'])!!}
<img src={!! asset('/img/WB/del.svg') !!} alt="" class="circ" onclick="return swal({
title: '¿Esta seguro de enviar a papelera?',
text: 'Ya no estara disponible!',   type: 'warning',
showCancelButton: true,   confirmButtonColor: '#DD6B55',
confirmButtonText: 'Si, enviar!',
cancelButtonText: 'No, Cancelar!',   closeOnConfirm: true,
closeOnCancel: false }, function(isConfirm){
if (isConfirm) {
  submit();
  swal('Deleted!', 'Registro enviado', 'success');
} else {
swal({   title: 'El registro se mantiene',type:'info',
text: 'Se Cerrará en 2 Segundos',   timer: 2000,
showConfirmButton: false });} });"/>
{!!Form::close()!!}
