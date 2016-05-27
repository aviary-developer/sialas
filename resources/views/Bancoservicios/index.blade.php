@extends('welcome')
@section('layout')


<div class="launcher">
  <div class="lfloat"></div>
  <div class="tooltip">
    <a href="#">
      <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Atras</span>
  </div>
  <div class="tooltip">
    <a href={!! asset('/bancoservicios/create') !!}>
      <img src={!! asset('/img/WB/nue.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Nuevo</span>
  </div>
 
  <div class="tooltip">
    <a href="#">
      <img src={!! asset('/img/WB/imp.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Reporte</span>
  </div>
  <div class="tooltip">
    <a href="#">
      <img src={!! asset('/img/WB/ayu.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Ayuda</span>
  </div>
</div>

<div class="panel">
	<div class="enc">
    <h2>Bancos</h2>
    <h3 id='txt'> |Servicios</h3>
  </div>
	<center>
		<table id="block">
			<tr>
				<th>Id</th>
				<th>Servicio</th>
				<th>Banco</th>
				<th>Cheque</th>
			</tr>
			<?php $a=1; ?>
			@foreach($bancAc as $ban)
			<tr>
				<td>{{$a}}</td>
				<td>{{$ban->servicio_id}}</td>
				<td>{{$ban->banco_id}}</td>
				<td>{{$ban->cheque}}</td>
				<td>
					<div class="up">
						<img src={!! asset('/img/WB/mas.svg') !!} alt="" class="plus"/>
						<div class="image">
							<!--<div class="tooltip">
								<a href={!! asset('/bancoservicios/'.$ban->id.'/edit') !!}>
									<img src={!! asset('/img/WB/edi.svg') !!} alt="" class="circ"/>
								</a>
								<span class="tooltiptextup">Editar</span>
							</div>-->

							<div class="tooltip"><
								@include('Bancoservicios.Formularios.darDeBaja')
								<span class="tooltiptextup">Papelera</span>
							</div>
							<div class="tooltip">
								<a href={!! asset("/tipos/".$ban->id) !!}>
									<img src={!! asset('/img/WB/ver.svg') !!} alt="" class="circ"/>
								</a>
								<span class="tooltiptextup">Ver</span>
							</div>
						</div>
					</div>
				</td>
			</tr>
			<?php $a=$a+1; ?>
			@endforeach
		</table>
		 
	</center>
</div>
@stop