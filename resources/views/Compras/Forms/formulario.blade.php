<div class="fila">
  <div>
    <div class=""></div>
    <div id='rbtnCredito' class="radiosg">
		 {!!Form::label('lcredito','Compra al Crédito:')!!}<br>
		 <div class="fila">
			 <div>
				 {!!Form :: radio ( "credito", 1,true,['id'=>'cred1'])!!}
				 <label for="cred1"><span></span>Si</label>
			 </div>
			 <div>
				 {!!Form :: radio ( "credito", 0,false,['id'=>'cred0'])!!}
				 <label for="cred0"><span></span>No</label>
			 </div>
		 </div>
	 </div>
    {!!Form::label("Presentaciones","Proveedor:")!!}
    <select  id="proveedoresVenta" name="proveedorVenta">
      @foreach($proveedores as $pro)
        <option value="{{$pro->id}}">
          {{$pro->nombre}}
        </option>
      @endforeach
    </select>
    {!!Form::label("Articulos","Productos:")!!}
    <input list="selectArticulosVenta" name="nombreArticulosVenta" id="articulos" onkeypress="enterCompras(this);">
    <datalist id="selectArticulosVenta">
      @foreach($productos as $pro)
        <option>
          {{$pro->nombre}}
        </option>
      @endforeach
    </datalist>
    {!!Form::label("Presentaciones","Presentación:")!!}
    <select  id="selectPresentacionesCompra" name="nombrePresentacionesCompra" onChange="precioArticulo();">
      <option disabled>Seleccione un producto</option>
    </select>
    <div></div>
    <div class = "fila">
      <div class="">
        {!!Form::label("Cantidad","Cantidad:")!!}
        {!!Form::number('cantidadArticuloVenta',null,['min'=>'1','id'=>'cantidadArticuloCompra', 'placeholder'=>'Ingrese Cantidad'])!!}
        {!!Form::label("Iva","IVA:")!!}
        {!!Form::number('iva',null,['min'=>'0','id'=>'ivavalor', 'placeholder'=>'IVA del producto'])!!}
      </div>
      <div class="">
        {!!Form::label("Cantidad","Precio Unitario:")!!}
        {!!Form::number('precioUnitario',null,['id'=>'precioUnitarioCompra', 'placeholder'=>'Precio Unitario'])!!}
        <center>
          <input name="btnInsertarVenta" id="btnInsertarVenta" type="button" value="Agregar" onClick="addProductoCompra()"/>
          <input name="correlativoVenta" id="correlativoVenta" type="hidden" value="0" />
          <input name="totalVenta" id="totalVenta" type="hidden" value="0" />
        </center>
      </div>
    </div>
  </div>
  <div class="der">
    <center>
      {!! Form::label('tab','Articulos') !!}
      <table name="tablaArticulosVenta" id="tblDatosCompra">
        <tr>
          <th colspan="2">Cantidad</th>
          <th>Producto</th>
          <th>P/U ($)</th>
          <th>IVA ($)</th>
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
          <input  name="inputTotalCompra" id="inputTotalCompra" value="0" type="number" disabled/>
        </div>
      </div>
      <input type="button" value="Registrar" onclick="registrarCompra();">
    </center>
  </div>
</div>
