{!!Form::label("Cantidad","Cliente:")!!}
{!!Form::text('nombreCliente',null,['id'=>'nombreClienteVenta','class'=>'form-control', 'placeholder'=>'Nombre de Cliente','required'])!!}
{!!Form::label("Cantidad","No. de Factura:")!!}
{!!Form::number('numeroFactura',null,['required','min'=>'1','max'=>'6','id'=>'numeroFactura','class'=>'form-control', 'placeholder'=>'Número Factura','required','onKeyPress' => 'return vNumeroFactura( this, event,this.value);','readonly'])!!}
{!!Form::label("Articulos","Productos:")!!}
<select class="form-control" id="selectArticulosVenta" name="nombreArticulosVenta">
  <option value="0">[Seleccione un artículo]</option>
@foreach($productos as $pro)
  <option>
  {{$pro->nombre}}
</option>
@endforeach
</select>
{!!Form::label("Presentaciones","Presentación:")!!}
<select class="form-control" id="selectPresentacionesVenta" name="nombrePresentacionesVenta">
  <option>Unidad</option>
  <option>Caja</option>
</select>
{!!Form::label("Cantidad","Cantidad:")!!}
{!!Form::number('cantidadArticuloVenta',null,['required','min'=>'0','id'=>'cantidadArticuloVenta','class'=>'form-control', 'placeholder'=>'Ingrese Cantidad...'])!!}
<input name="btnInsertarVenta" id="btnInsertarVenta" type="button" value="Insertar producto" onClick="addVenta()"/>
<input name="correlativoVenta" id="correlativoVenta" type="hidden" value="0" />
<input name="totalVenta" id="totalVenta" type="hidden" value="0" />
<br/>

<table name="tablaArticulosVenta" id="tblDatosVenta">
  <tr>
    <th colspan="2">Cantidad</th>
    <th>Producto</th>
    <th>P/U ($)</th>
    <th>Total ($)</th>
    <th>Opción</th>
  </tr>
</table>
<label for="ex1">Total de productos:</label>
<input class="form-control" name="inputArticulosVenta" id="inputArticulosVenta" type="input" value="0"/>
<label for="ex1">Costo Total($):</label>
<input class="form-control" name="inputTotalVenta" id="inputTotalVenta" value="0" type="input"/>
