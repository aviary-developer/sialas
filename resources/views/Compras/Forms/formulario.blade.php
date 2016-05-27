{!!Form::label("Presentaciones","Proveedor:")!!}
<select  id="proveedoresVenta" name="proveedorVenta">
  @foreach($proveedores as $pro)
    <option value="{{$pro->id}}">
      {{$pro->nombre}}
    </option>
  @endforeach
</select>
<div class="fila">
  <div>
    {!!Form::label("Articulos","Productos:")!!}
    <input list="selectArticulosVenta" name="nombreArticulosVenta" id="articulos" onkeypress="ff();" onfocus="ff();">
    <datalist id="selectArticulosVenta">
      @foreach($productos as $pro)
        <option>
          {{$pro->nombre}}
        </option>
      @endforeach
    </datalist>
    {!!Form::label("Presentaciones","Presentación:")!!}
    <select  id="selectPresentaciones" name="nombrePresentacionesVenta" onmouseover="ff();">
      <option disabled>Seleccione un producto</option>
    </select>
  </div>
  <div class="">
    {!!Form::label("Cantidad","Cantidad:")!!}
    {!!Form::number('cantidadArticuloVenta',null,['min'=>'1','id'=>'cantidadArticuloVenta', 'placeholder'=>'Ingrese Cantidad'])!!}
    {!!Form::label("Cantidad","Precio Unitario:")!!}
    {!!Form::number('precioUnitario',null,['id'=>'precioUnitario', 'placeholder'=>'Precio Unitario'])!!}
  </div>
</div>
<input name="btnInsertarVenta" id="btnInsertarVenta" type="button" value="Agregar" onClick="addVenta()"/>
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
    <input  name="inputArticulosVenta" id="inputArticulosVenta" type="number" value="0" disabled/>
  </div>
  <div>
    <label for="ex1">Costo Total ($):</label>
    <input  name="inputTotalVenta" id="inputTotalVenta" value="0" type="number" disabled/>
  </div>
</div>
