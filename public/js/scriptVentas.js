function ff(){
  var listaDePresentaciones=$("#selectPresentaciones");
  var nombreArticulo=$("#articulos").val();
  if (nombreArticulo!=0) {
    var ruta="/sialas/public/productospresentaciones/"+nombreArticulo;
    $.get(ruta,function(res){
      listaDePresentaciones.empty();
      $(res).each(function(key,value){
        listaDePresentaciones.append("<option>"+value.nombre+"</option>");
      });
    });
  }
}
    function addVenta(){
      var correlativo=$("#correlativoVenta").val();
      var total=$("#inputTotalVenta").val();
      var articulo=$("#articulos").val();
      var precioUnitario=$("#precioUnitario").val();
      var presentacion=$("#selectPresentaciones").find('option:selected').val();
      if(articulo==0){
        $("#cantidadArticuloVenta").val("");
        $("#existenciasActualesArticulos").val("");
        $("#precioUnitario").val("");
        return swal("Debe seleccionar un artículo", "No Procesado!", "info");
      }
      else{
       var cantidad=parseInt($("#cantidadArticuloVenta").val());
       var tablaDatos= $("#tblDatosVenta");
       if(cantidad==""||!/^([0-9])*$/.test(cantidad)){
        swal({   title: 'La cantidad no es un numero\n o No es permitido',type:'error',  text: 'Se Cerrará en 2 Segundos',   timer: 2700,   showConfirmButton: false });
      }else{
        correlativo=parseInt(correlativo)+1;
        total=parseFloat(total)+parseFloat(cantidad*precioUnitario);
        tablaDatos.append("<tr><td>"+
        parseInt(cantidad)+
        "</td><td>"+presentacion+
        "</td><td><input type='hidden' name='productos[]' value='"+
        articulo+"'/><input type='hidden' name='preciosUnitarios[]' value='"+
        parseFloat(precioUnitario).toFixed(2)+
        "'/><input type='hidden' name='presentaciones[]' value='"+presentacion+
        "'/><input type='hidden' name='cantidades[]' value='"+parseInt(cantidad)+"'/>"
        +articulo+
        "</td><td>"+parseFloat(precioUnitario).toFixed(2)+
        "</td><td>"+parseFloat(precioUnitario*cantidad).toFixed(2)+
        "</td><td class='eliminarVenta' style='cursor:pointer;'>Eliminar</td></tr>");
        document.getElementById("correlativoVenta").value=correlativo;
        document.getElementById("inputArticulosVenta").value=correlativo;
        document.getElementById("inputTotalVenta").value=total.toFixed(2);
        reset_camposVenta();
      }
    }
}

function reset_camposVenta(){
 $("#cantidadArticuloVenta").val("");
 $("#precioUnitario").val("");
 $("#articulos").val("");
}
$(document).on("click",".eliminarVenta",function(){
  var totalFila=parseFloat($(this).parents('tr').find('td:eq(4)').html());
  var cantidadEliminar=$(this).parents('tr').find('td:eq(0)').html();
  var parent = $(this).parents().get(0);
  alert(cantidadEliminar);
  $(parent).remove();
  var correlativo=$("#correlativoVenta").val();
  var total=parseFloat($("#inputTotalVenta").val());
  total=total-(totalFila);
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

$(document).on("click",".agrUbi",function(){
  var idProducto=$(this).parents('tr').find('td:eq(0)').html();
  var presentacion=$(this).parents('tr').find('td:eq(2)').html();
  var idVenta=$('#venta_id').val();
  document.getElementById("temporalProducto").value=idProducto;
  document.getElementById("temporalPresentacion").value=presentacion;
  document.getElementById('modalUbi').click();/*alert("ID PRoducto: "+idProducto2+" ID VEnta:"+idVenta);*/
});

function addUbicacion(e){
  var ubicacion = $("#selectUbicaciones").val();
  var idProducto = $("#temporalProducto").val();
  var presentacion = $("#temporalPresentacion").val();
  var idCompra = $("#compra_id").val();
    var ruta="/sialas/public/ingresoUbicacion";
  	var token=$('#token').val();
  	$.ajax({
  		url:ruta,
  		headers:{'X-CSRF-TOKEN':token},
  		type:'POST',
  		dataType:'json',
  		data:{producto_id:idProducto,compra_id:idCompra,ubicacion_id:ubicacion,presentacion:presentacion}
  	});
    //location.reload();
};
