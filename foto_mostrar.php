<?php
/*	$name = "dfg";
	if(isset($_POST['image-content'])){
		//Ruta de Destino
		$ruta_destino = "fotografias/";
		//$tmpfile		=		$ruta_destino."".sha1(microtime()).'.png';
		$tmpfile =	$ruta_destino."".$name.'.png';
		$image_file	= fopen($tmpfile, 'w');
		fwrite($image_file, base64_decode(str_replace('data:image/png;base64,', '', $_POST['image-content'])));
		fclose($image_file);
		echo 1;
	}
	else{
		echo 2;
	}*/
?>