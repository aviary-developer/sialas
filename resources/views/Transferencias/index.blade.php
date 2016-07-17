@extends('welcome')
@section('layout')
@if(Session::has('mensaje'))
<?php $men=Session::get('mensaje');
echo "<script>swal('$men', 'Click al botón', 'success')<\script";?>
@endif

<div class="launcher">
  <div class="lfloat"></div>
  <div class="tooltip">
    <a href={!! asset('/transferencias') !!}>
      <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Atras</span>
  </div>
  <div class="tooltip">
    <a href={!! asset('/transferencias/create') !!}>
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
    <h2>Transferencias de Cajas</h2>
  </div>
	<center>
		<table id="block">
			<tr>
				<th>#</th>
				<th>fecha</th>
				<th>monto</th>
				<th>Caja Emisora</th>
        <th>Caja Destino</th>
        <th>Acciones</th>
			</tr>
			<?php $a=1; ?>
			@foreach($Transferencias as $tip)
			<tr>
				<td>{{$a}}</td>
				<td>{{$tip->fecha_transferencia}}</td>
				<td>{{$tip->monto}}</td>
        <td>{{$tip->nombreCajas($tip->cajita)}}</td>
        <td>{{$tip->nombreCajas($tip->caja_id)}}</td>

				<td>
					<div class="up">
						<img src={!! asset('/img/WB/mas.svg') !!} alt="" class="plus"/>
						<div class="image">
							<div class="tooltip">
								<a href={!! asset("/transferencias/".$tip->id) !!}>
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
