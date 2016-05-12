@if(count($errors)>0)
<div class="row">
<div class="col-xs-6">
padding: 15px;
  margin-bottom: 20px;
  border: 1px solid transparent;
  border-radius: 4px;
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
  ">
	<?php $men="Hay un error";
	foreach ($errors->all() as $error){
		?>
		<li><?php echo $error?></li>
	<?php	
	}
echo "<script>swal('$men', 'Click al botón!', 'error')</script>";?>
</div>
</div>
</div>
@endif
