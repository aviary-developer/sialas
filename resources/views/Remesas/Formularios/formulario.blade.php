
<div class="fila">
	<div>
		<div class="alerta-errores">
			@foreach ($errors->get('caja_id') as $error)
				<br>{{$error}}
			@endforeach
		 </div>
		 {!!Form::label("LCaja","Caja:")!!}
    <select  id="TransaCaja" name="cajaTipo">
      @foreach($TipoCaja as $ca)
        <option value="{{$ca->id}}">
          {{$ca->nombre}}
        </option>
      @endforeach
    </select>

		 <div class="alerta-errores">
			@foreach ($errors->get('banco_id') as $error)
				<br>{{$error}}
			@endforeach
		 </div>
		 {!!Form::label("LBanco","Banco:")!!}
		 <select>
		 	@foreach($TipoBanco as $ban)
		 	<option value="{{$ban->id}}">
		 		{{$ban->nombre}}
		 	</option>
		 	@endforeach
		 </select>


		 <div class="alerta-errores">
			@foreach ($errors->get('monto') as $error)
				<br>{{$error}}
			@endforeach
		 </div>
		 {!!Form::label("Lmonto","Monto: $")!!}
		 {!! Form::text('Monto',null,['placeholder'=>'Ingrese El Monto a Transferir']) !!}

		  <div class="alerta-errores">
			@foreach ($errors->get('transaccion') as $error)
				<br>{{$error}}
			@endforeach
		 </div>

 			<div>
	 {!!Form::label('llabel','Transacción:')!!}<br>
	 <div class="fila">
		 <div>
			 {!!Form :: radio ( "vradio", 1,true,['id'=>'efe1'])!!}
			 <label for="efe1"><span></span>Remesa</label>
		 </div>
		 <div>
			 {!!Form :: radio ( "vradio", 0,false,['id'=>'efe0'])!!}
			 <label for="efe0"><span></span>Retiro</label>
		 </div>
	 </div>
 </div>

	</div>
			
</div>
