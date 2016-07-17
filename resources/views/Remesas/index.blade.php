@extends('welcome')
@section('layout')
@if(Session::has('mensaje'))
<?php $men=Session::get('mensaje');
echo "<script>swal('$men', 'Click al botón', 'success')<\script";?>
@endif

<div class="launcher">
  <div class="lfloat"></div>
  <div class="tooltip">
    <a href={!! asset('/remesas') !!}>
      <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Atras</span>
  </div>
  <div class="tooltip">
    <a href={!! asset('/remesas/create') !!}>
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
    <h2>Remesas</h2>
  </div>
	<center>
		<table id="block">
			<tr>
				<th>#</th>
        <th>Transaccion</th>
        <th>Monto</th>
				<th>Caja</th>
				<th>Banco</th>
        <th>Acciones</th>
			</tr>
			<?php $a=1; ?>
			@foreach($r as $rs)
			<tr>
				<td>{{$a}}</td>
				<td>
          @if($rs->transaccion==0)<?php echo 'Retiro' ?>@endif
          @if($rs->transaccion==1)<?php echo 'Remesa'?>@endif
        </td>
        <td>{{$rs->monto}}</td>
				<td>{{$rs->nombreCajas($rs->caja_id)}}</td>
        <td>{{$rs->nombreBancos($rs->banco_id)}}</td>


      </td></center>
				<td>
					<div class="up">
						<img src={!! asset('/img/WB/mas.svg') !!} alt="" class="plus"/>
						<div class="image">

							<div class="tooltip">
								<a href={!! asset("/remesas/".$rs->id) !!}>
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
