<div class="fila">
  <div>
    {!!Form::label("Presentaciones","Proveedor:")!!}
    <select  id="proveedoresVenta" name="proveedorVenta">
      @foreach($proveedores as $pro)
        <option>
          {{$pro->nombre}}
        </option>
      @endforeach
    </select>
    {!!Form::label("Articulos","Productos:")!!}
    <input list="selectArticulosVenta" name="nombreArticulosVenta" id="articulos">
    <datalist id="selectArticulosVenta">
      @foreach($productos as $pro)
        <option>
          {{$pro->nombre}}
        </option>
      @endforeach
    </datalist>
    {!!Form::label("Cantidad","Cantidad:")!!}
    {!!Form::number('cantidadArticuloVenta',null,['required','min'=>'0','id'=>'cantidadArticuloVenta', 'placeholder'=>'Ingrese Cantidad...'])!!}
  </div>
  <div class="">
    {!!Form::label("Cantidad","No. de Factura:")!!}
    {!!Form::number('numeroFactura',null,['required','min'=>'1','max'=>'6','id'=>'numeroFactura', 'placeholder'=>'Número Factura','required'])!!}
    {!!Form::label("Presentaciones","Presentación:")!!}
    <select  id="selectPresentacionesVenta" name="nombrePresentacionesVenta">
      <option>Unidad</option>
      <option>Caja</option>
    </select>
    {!!Form::label("Cantidad","Precio Unitario:")!!}
    {!!Form::number('precioUnitario',null,['required','id'=>'precioUnitario', 'placeholder'=>'Precio Unitario'])!!}
  </div>
</div>
<input name="btnInsertarVenta" id="btnInsertarVenta" type="button" value="Insertar producto" onClick="addVenta()"/>
<input name="correlativoVenta" id="correlativoVenta" type="hidden" value="0" />
<input name="totalVenta" id="totalVenta" type="hidden" value="0" />
<br>
<table name="tablaArticulosVenta" id="tblDatosVenta">
  <tr>
    <th colspan="2">Cantidad</th>
    <th>Producto</th>
    <th>P/U ($)</th>
    <th>Total ($)</th>
    <th>Opción</th>
  </tr>
</table>
<br>
<div class="fila">
  <div>
    <label for="ex1">Número de productos:</label>
    <input  name="inputArticulosVenta" id="inputArticulosVenta" type="input" value="0"/>
  </div>
  <div>
    <label for="ex1">Costo Total ($):</label>
    <input  name="inputTotalVenta" id="inputTotalVenta" value="0" type="input"/>
  </div>
</div>
