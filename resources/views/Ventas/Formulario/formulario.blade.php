<div class="fila">
  <div>
    {!!Form::label("LCliente","Cliente:")!!}
    <input list="selectClienteVenta" name="clienteVenta" id="cliente" onkeypress="clienteVenta();">
    <datalist id="selectClienteVenta">
      @foreach($clientes as $cli)
        <option>
          {{$cli->nombre}}
        </option>
      @endforeach
    </datalist>


    {!!Form::label("Articulos","Productos:")!!}
    <input list="selectArticulosVenta" name="nombreArticulosVenta" id="productos" onkeypress="enter(this);">
    <datalist id="selectArticulosVenta">
      @foreach($productos as $pro)
        <option>
          {{$pro->nombre}}
        </option>
      @endforeach
    </datalist>

    {!!Form::label("Presentaciones","Presentación:")!!}
    <select  id="selectPresentacionesVenta" name="nombrePresentacionesVenta" onchange="obtenerPrecioProducto()">
      <option disabled>Seleccione un producto</option>
    </select>

    <div></div>
    <div class = "fila">
      <div class="">
        {!!Form::label("Cantidad","Cantidad:")!!}
        {!!Form::number('cantidadProductoVenta',null,['min'=>'1','id'=>'cantidadProductoVenta', 'placeholder'=>'Ingrese Cantidad'])!!}
        {!!Form::label("Cantidad","Precio de Producto")!!}
        {!!Form::number('precioProductoUnitario',null,['id'=>'precioProductoUnitario', 'placeholder'=>'$0.00','readonly'=>'readonly'])!!}
        <center>
          <input name="agregarVenta" id="agregarVenta" type="button" value="Agregar" onClick="agregarProductoVenta()"/>
          <input name="correlativoHiddenVenta" id="correlativoHiddenVenta" type="hidden" value="0" />
          <input name="totalHiddenVenta" id="totalHiddenVenta" type="hidden" value="0" />
        </center>
      </div>
      <div class="">
          <center>
        </center>
      </div>
    </div>
  </div>
  <div class="der">
    <center>
      {!! Form::label('tab','Productos') !!}
      <table name="tablaProductosVenta" id="tblProductosVenta">
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
          <input  name="inputProductosVenta" id="inputProductosVenta" type="number" value="0" disabled/>
        </div>
        <div>
          <label for="ex1">Costo Total ($):</label>
          <input  name="inputTotalProductosVenta" id="inputTotalProductosVenta" value="0" type="number" disabled/>
        </div>

        <div>
          <label for="ex1"> Precio Promedio ($): </label>
          <input name="inputPromedioProductosVenta" id="inputPromedioProductosVenta" value="0" type="number" disabled/>
        </div>

      </div>
      <input name="registrarVenta" id="registrarVenta" type="button" value="Registrar" onClick="registrarVenta()"/>
    </center>
  </div>
</div>
