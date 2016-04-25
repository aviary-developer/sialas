{!!Form::open(['url'=>['darAltaCaja',$caja->id],'method'=>'POST'])!!}
<button class="btn btn-danger" type="button" onClick="return swal({
title: '¿Esta seguro que desea dar de Alta?',
text: 'El registro volverá a estar disponible!',   type: 'warning',
showCancelButton: true,   confirmButtonColor: '#06c',
confirmButtonText: 'Si, dar de Alta!',
cancelButtonText: 'No, Cancelar!',   closeOnConfirm: true,
closeOnCancel: false }, function(isConfirm){
if (isConfirm) { submit();
swal('Deleted!', 'Registro dado de Alta', 'success');
} else {
swal({   title: 'El registro se mantiene igual',type:'info',
text: 'Se Cerrará en 2 Segundos',   timer: 2000,
showConfirmButton: false });} });">Dar de Alta</button>
{!!Form::close()!!}
