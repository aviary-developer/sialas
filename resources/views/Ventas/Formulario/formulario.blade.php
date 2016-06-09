<div class="fila">
  <div>
    

    {!!Form::label("LCliente","Cliente:")!!}
    <select  id="selectClientes" name="nombreClientesVenta" onmouseover="ff();">
      <option disabled>Seleccione un cliente</option>
    </select>

    {!!Form::label("LProducto","Producto:")!!}
    <select  id="selectProductos" name="nombreArticulosVenta" onmouseover="ff();">
      <option disabled>Seleccione un Producto</option>
    </select>
    
    <div></div>
    <div class = "fila">
      <div class="">
        {!!Form::label("Cantidad","Cantidad:")!!}
        {!!Form::number('cantidad',null,['min'=>'1','id'=>'cantidad', 'placeholder'=>'Ingrese Cantidad'])!!}
        <center>
          <input name="btnInsertarVenta" id="btnInsertarVenta" type="button" value="Agregar" onClick="addVenta()"/>
          <input name="correlativoVenta" id="correlativoVenta" type="hidden" value="0" />
          <input name="totalVenta" id="totalVenta" type="hidden" value="0" />
        </center>
      </div>
      <div class="">
        {!!Form::label("LPrecio","Precio Unitario:")!!}
        {!!Form::number('precio',null,['id'=>'precio', 'placeholder'=>'Precio Unitario'])!!}
        <center>
          {!!Form::submit('Guardar')!!}
        </center>
      </div>
    </div>
  </div>
  <div class="der">
    <center>
      {!! Form::label('tab','Articulos') !!}
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
    </center>
  </div>
</div>