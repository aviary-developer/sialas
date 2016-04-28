function activo (vis,ocu,bot,img){
  var host = "http://"+window.location.host;
  if (document.getElementById(vis).style.display == "none") {
    document.getElementById(vis).style.display = "table";
    document.getElementById(ocu).style.display = "none";
    document.getElementById(bot).innerHTML = "Papelera";
    document.getElementById(img).src = host+"/sialas/public/img/WB/pre.svg";
    document.getElementById('txt').innerHTML = "|Activos";
  }else{
    document.getElementById(vis).style.display = "none";
    document.getElementById(ocu).style.display = "table";
    document.getElementById(bot).innerHTML = "Activos";
    document.getElementById(img).src = host+"/sialas/public/img/WB/dat.svg";
    document.getElementById('txt').innerHTML = "|Papelera";
  }
}

function msj(){
  return swal({
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
  showConfirmButton: false });} });
}
