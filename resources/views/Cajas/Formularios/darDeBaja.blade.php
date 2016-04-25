{!!Form::open(['route'=>['cajas.destroy',$caja->id],'method'=>'DELETE'])!!}
<button class="btn btn-danger" type="button" onClick="return swal({
title: '¿Esta seguro que desea dar de Baja?',
text: 'Ya no estara disponible!',   type: 'warning',
showCancelButton: true,   confirmButtonColor: '#DD6B55',
confirmButtonText: 'Si, dar de Baja!',
cancelButtonText: 'No, Cancelar!',   closeOnConfirm: true,
closeOnCancel: false }, function(isConfirm){
if (isConfirm) { submit();
swal('Deleted!', 'Registro dado de Baja', 'success');
} else {
swal({   title: 'El registro se mantiene igual',type:'info',
text: 'Se Cerrará en 2 Segundos',   timer: 2000,
showConfirmButton: false });} });">Dar de Baja</button>
{!!Form::close()!!}
