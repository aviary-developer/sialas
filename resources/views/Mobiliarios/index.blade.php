@extends('welcome')
@section('layout')
@if(Session::has('mensaje'))
<?php $men=Session::get('mensaje');
echo "<script>swal('$men', 'Click al botón', 'success')<\script";?>
@endif
  @if($state == 1 || $state == null)
  <?php $vendido= 0; ?>
  <?php $desechado = 2; ?>
  <?php $reparacion = 3; ?>
  <?php $donado= 4; ?>
  @else 
      @if($state == 0)
      <?php $vendido= 1; ?>
      <?php $desechado = 2; ?>
      <?php $reparacion = 3; ?>
      <?php $donado= 4; ?>
      @endif
      @if($state == 2)
      <?php $vendido= 0; ?>
      <?php $desechado = 1; ?>
      <?php $reparacion = 3; ?>
      <?php $donado= 4; ?>
      @endif
      @if($state == 3)
      <?php $vendido= 0; ?>
      <?php $desechado = 2; ?>
      <?php $reparacion = 1; ?>
      <?php $donado= 4; ?>
      @endif
      @if($state == 4)
      <?php $vendido= 0; ?>
      <?php $desechado = 2; ?>
      <?php $reparacion = 3; ?>
      <?php $donado= 1; ?>
      @endif
  @endif
  


<div class="launcher">
  <div class="lfloat"></div>
  <div class="tooltip">
    <a href="#">
      <img src={!! asset('/img/WB/atr.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Atras</span>
  </div>
  <div class="tooltip">
    <a href={!! asset('/mobiliarios/create') !!}>
      <img src={!! asset('/img/WB/nue.svg') !!} alt="" class="circ"/>
    </a>
    <span class="tooltiptext">Nuevo</span>
  </div>
  <?php // iconos de estado *******************************************************************?>
  <div class="tooltip">
    <a href={!! asset('/mobiliarios?nombre='.$name.'&estado='.$vendido) !!}>
      @if($vendido==0)
        <img id= "im" src={!! asset('/img/WB/pre.svg') !!} alt="" class="circ"/>
      @else
        <img id= "im" src={!! asset('/img/WB/dat.svg') !!} alt="" class="circ"/>
      @endif
    </a>
    @if($vendido==0)
     
      <span class="tooltiptext" id="tt">Vendidos</span>
    
    @else
      <span class="tooltiptext" id="tt">En Uso</span>
    @endif
  </div>
  <div class="tooltip">
    <a href={!! asset('/mobiliarios?nombre='.$name.'&estado='.$desechado) !!}>
      @if($desechado==2)
        <img id= "im" src={!! asset('/img/WB/pre.svg') !!} alt="" class="circ"/>
      @else
        <img id= "im" src={!! asset('/img/WB/dat.svg') !!} alt="" class="circ"/>
      @endif
    </a>
    @if($desechado==2)
      <span class="tooltiptext" id="tt">Desechado</span>
    @else
      <span class="tooltiptext" id="tt">En Uso</span>
    @endif
  </div>
  <div class="tooltip">
    <a href={!! asset('/mobiliarios?nombre='.$name.'&estado='.$reparacion) !!}>
      @if($reparacion==3)
        <img id= "im" src={!! asset('/img/WB/pre.svg') !!} alt="" class="circ"/>
      @else
        <img id= "im" src={!! asset('/img/WB/dat.svg') !!} alt="" class="circ"/>
      @endif
    </a>
    @if($reparacion==3)
      <span class="tooltiptext" id="tt">Reparacion</span>
    @else
      <span class="tooltiptext" id="tt">En Uso</span>
    @endif
  </div>
  <div class="tooltip">
    <a href={!! asset('/mobiliarios?nombre='.$name.'&estado='.$donado) !!}>
      @if($donado==4)
        <img id= "im" src={!! asset('/img/WB/pre.svg') !!} alt="" class="circ"/>
      @else
        <img id= "im" src={!! asset('/img/WB/dat.svg') !!} alt="" class="circ"/>
      @endif
    </a>
    @if($donado==4)
      <span class="tooltiptext" id="tt">Donacion</span>
    @else
      <span class="tooltiptext" id="tt">En Uso</span>
    @endif
  </div>
  
 <?php // iconos de estado *******************************************************************?>

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
    <h2>Mobiliarios</h2>
     @if($state==1 || $state == null)
      <h3 id='txt'> |En Uso</h3>
    
      @elseif($state==0)
      <h3 id='txt'> |Vendidos</h3>
    @endif
   
    @if($state==2)
      <h3 id='txt'> |Desechados</h3>
    @endif
    @if($state==3)
      <h3 id='txt'> |Reparacion</h3>
    @endif
    @if($state==4)
      <h3 id='txt'> |Donados</h3>
    @endif
    <div class="sep"></div>
    {!!Form::open(['route'=>'mobiliarios.index','method'=>'GET','role'=>'search','class'=>'search'])!!}
    {!! Form::text('nombre',null,['placeholder'=>'Tipo de mobiliario']) !!}
    {!! Form::submit('Buscar') !!}
    {!! Form::close() !!}
  </div>
	<center>
		<table id="block">
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Proveedor</th>
				<th>Precio $</th>
				<th>Fecha de Adquisicion</th>
        <th>Acciones</th>
			</tr>
			<?php $a=1; ?>
			@foreach($mobiliarios as $mob)
			<tr>
				<td>{{$a}}</td>
				<td>{{$mob->nombre}}</td>
				<td>{{$mob->nombreProveedor($mob->proveedor_id)}}</td>
				<td>{{$mob->precio}}</td>
        <td>{{$mob->fecha_compra}}</td>
				<td>
					<div class="up">
						<img src={!! asset('/img/WB/mas.svg') !!} alt="" class="plus"/>
						<div class="image">
							<div class="tooltip">
								<a href={!! asset('/mobiliarios/'.$mob->id.'/edit') !!}>
									<img src={!! asset('/img/WB/edi.svg') !!} alt="" class="circ"/>
								</a>
								<span class="tooltiptextup">Editar</span>
							</div>

							<div class="tooltip">
								<a href={!! asset("/mobiliarios/".$mob->id) !!}>
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
		 <div id="act">
      {!! str_replace ('/?', '?', $mobiliarios->appends(Request::only(['nombre','estado']))->render ()) !!}
    </div>
	</center>
</div>
@stop
