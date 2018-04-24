<?php 
	include ('bar/navbar_administracion.php');

    $tipocon = $_POST['tipoconsulta'];
    $documento = $_POST['documento'];
    $fecharegistro = $_POST['fecha_registro'];

    //$tipoconsulta = base64_encode($tipocon);
    $ndocumento = base64_encode($documento);
    $registro = base64_encode($fecharegistro); 

?>


<body onload="redirecciona();">
	<?php if ($tipocon==1) {  ?>
		<?php $area = base64_encode(11); ?>
		<form id="miformulario" action="administracion_recepcion_p.php">
		 	<input type="text" name="documento" value="<?php echo $ndocumento ?>" style="display: none;">
			<input type="text" name="fecha_registro" value="<?php echo $registro ?>" style="display: none;"> 
			<input type="text" name="area" value="<?php echo $area ?>" style="display: none;">
		</form>

	<?php }else if($tipocon==2){ ?>
		<?php $area = base64_encode(12); ?>
		<form id="miformulario" action="administracion_audiometria.php">
	 		<input type="text" name="documento" value="<?php echo $ndocumento ?>" style="display: none;">
			<input type="text" name="fecha_registro" value="<?php echo $registro ?>" style="display: none;"> 
			<input type="text" name="area" value="<?php echo $area ?>" style="display: none;">
		</form>

	<?php }else if($tipocon==3){ ?>
		<?php $area = base64_encode(13); ?>
		<form id="miformulario" action="administracion_visiometria.php">
	 		<input type="text" name="documento" value="<?php echo $ndocumento ?>" style="display: none;">
			<input type="text" name="fecha_registro" value="<?php echo $registro ?>" style="display: none;"> 
			<input type="text" name="area" value="<?php echo $area ?>" style="display: none;">
		</form>

	<?php }else if($tipocon==5){ ?>
		<?php $area = base64_encode(14); ?>
		<form id="miformulario" action="administracion_espirometria.php">
	 		<input type="text" name="documento" value="<?php echo $ndocumento ?>" style="display: none;">
			<input type="text" name="fecha_registro" value="<?php echo $registro ?>" style="display: none;"> 
			<input type="text" name="area" value="<?php echo $area ?>" style="display: none;">
		</form>

	<?php }else if($tipocon==6){ ?>
		<?php $area = base64_encode(15); ?>
		<form id="miformulario" action="administracion_psicologia.php">
	 		<input type="text" name="documento" value="<?php echo $ndocumento ?>" style="display: none;">
			<input type="text" name="fecha_registro" value="<?php echo $registro ?>" style="display: none;"> 
			<input type="text" name="area" value="<?php echo $area ?>" style="display: none;">
		</form>

	<?php }else if($tipocon==7){ ?>
		<?php $area = base64_encode(16); ?>
		<form id="miformulario" action="administracion_enfermeria.php">
	 		<input type="text" name="documento" value="<?php echo $ndocumento ?>" style="display: none;">
			<input type="text" name="fecha_registro" value="<?php echo $registro ?>" style="display: none;"> 
			<input type="text" name="area" value="<?php echo $area ?>" style="display: none;">
		</form>

	<?php }else if($tipocon==8){ ?>
		<?php $area = base64_encode(17); ?>
		<form id="miformulario" action="administracion_medico.php">
	 		<input type="text" name="documento" value="<?php echo $ndocumento ?>" style="display: none;">
			<input type="text" name="fecha_registro" value="<?php echo $registro ?>" style="display: none;"> 
			<input type="text" name="area" value="<?php echo $area ?>" style="display: none;">
		</form>
	<?php } ?>
</body>

<script>
	function redirecciona(){
		var miform= document.getElementById('miformulario');
		miform.submit();
	}
</script>


