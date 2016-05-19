    function addVenta(){
      var correlativo=$("#correlativoVenta").val();
      var total=$("#inputTotalVenta").val();
      var articulo=$("#articulos").val();
      if(articulo.val()==0){
        $("#cantidadArticuloVenta").val("");
        $("#existenciasActualesArticulos").val("");
        return swal("Debe seleccionar un artículo", "No Procesado!", "info");
      }
      else{
       var cantidad=parseInt($("#cantidadArticuloVenta").val());
       var tablaDatos= $("#tblDatosVenta");
       if(cantidad==""||!/^([0-9])*$/.test(cantidad)){
        swal({   title: 'La cantidad no es un numero\n o No es permitido',type:'error',  text: 'Se Cerrará en 2 Segundos',   timer: 2700,   showConfirmButton: false });
      }else{
        correlativo=parseInt(correlativo)+1;
        total=parseFloat(total)*parseFloat(cantidad);
        tablaDatos.append("<tr><td><input type='hidden' name='articulosVenta[]' value='"+
        articulo.text().trim()+"'/>"+articulo.text()+"</td><td>"+
        parseInt(cantidad)+
        "</td><td>"+articulo.val()+
        "</td><td>"+parseFloat(cantidad).toFixed(2)+
        "</td><td class='eliminarVenta' style='cursor:pointer;'>Eliminar</td><td><input type='hidden' name='preciosVenta[]' value='"+
        parseFloat(articulo.val())+
        "'/><input type='hidden' name='cantidadesVenta[]' value='"+parseInt(cantidad)+"'/><input type='hidden' name='precioPorArticulosVentas[]' value='"+parseFloat(articulo.val()*cantidad)+"'/></td></tr>");
        document.getElementById("correlativoVenta").value=correlativo;
        document.getElementById("inputArticulosVenta").value=correlativo;
        document.getElementById("inputTotalVenta").value=total.toFixed(2);
        reset_camposVenta();
      }
    }
}

function reset_camposVenta(){
 $("#cantidadArticuloVenta").val("");
}
$(document).on("click",".eliminarVenta",function(){
  var totalFila=parseFloat($(this).parents('tr').find('td:eq(2)').html());
  var cantidadEliminar=parseInt($(this).parents('tr').find('td:eq(1)').html());
  var parent = $(this).parents().get(0);
  $(parent).remove();
  var correlativo=$("#correlativoVenta").val();
  var total=parseFloat($("#inputTotalVenta").val());
  total=total-(totalFila*cantidadEliminar);
  correlativo=parseInt(correlativo)-1;
  document.getElementById("correlativoVenta").value=correlativo;
  document.getElementById("inputArticulosVenta").value=correlativo;
  document.getElementById("inputTotalVenta").value=total.toFixed(2);
});

function submitar(){
  document.forms["formVenta"].submit();
  $("#inputArticulosVenta").val("0");
  $("#inputTotalVenta").val("0");
}
