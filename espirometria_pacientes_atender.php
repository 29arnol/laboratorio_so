<?php 
	include ('includes/conexion.php'); 
	include ('timedata.php'); 

?>
<style type="text/css">
	.priorizar{
	  background-color: #F71808;
	  color: #FDFDFD;
	}

	.atendiendo{
	  background-color: #F8630D;
	  color: #FDFDFD;
	}

	.atendido{
	  background-color: #0DDF03;
	  color: #FDFDFD;
	}
	.esperando{
	  background-color: #F9FDF8;
	  color: black;
	}
	.size_font {
		font-size: 12px;
	}
</style>


<?php 
	//consulta de pacientes
	$consult = "SELECT * FROM datos_basicos AS db
	JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
	JOIN db_estado_atencion AS dbea ON db.id_historia = dbea.paciente
	WHERE db.fecha = '$fecha' ORDER BY hora ASC";
	$query = mysqli_query($conexion,$consult);

?>

 <body>
	<div style="font-size: 20px;" class="text-center">Fecha: <?php echo $time ?></div>       
    <form method="POST" action="">
	    <div class="col-sm-12">  
		  <table class="table table-bordered">
		    <thead>
		      <tr class="size_font">
		        <th>Nombres y Apellidos</th>
		        <th>N° identidad</th>
		        <th>Hora</th>
		        <th>Fecha</th>
		        <th>Atender</th>
		        <th>Audiometria</th>
		        <th>Vsiometria</th>
		        <th>Espirometria</th>
		        <th>Psicologia</th>
		        <th>Enfermeria</th>
		        <th>Medico</th>
		      </tr>
		    </thead>
		    <?php
		   	if (mysqli_num_rows($query) > 0){

		    	while ($datos=mysqli_fetch_array($query)) {
		    		$nombrecompleto= $datos['nombres_apellidos'];
		  			$numerodocumento=$datos['numero_documento'];
		  			$fecha_ingreso= $datos['fecha'];
		  			$hora= $datos['hora'];
		  			$audiometria= $datos['audiometria'];
		  			$visiometria= $datos['visiometria'];
		  			$espirometria= $datos['espirometria'];
		  			$psicologia= $datos['psicologia'];
		  			$enfermeria= $datos['enfermeria'];
		  			$medico= $datos['medico'];
		  			$id= $datos['id_historia'];

					if ($audiometria == 'Priorizar Esta Atencion'){
					  $clase_audiometria = 'priorizar';
					}else if ($audiometria == 'Atencion En Curso'){
					  $clase_audiometria = 'atendiendo';
					}else if ($audiometria == 'Atencion Finalizada'){
					  $clase_audiometria = 'atendido';
					}else{
						$clase_audiometria = 'esperando';
					}

					if ($visiometria == 'Priorizar Esta Atencion'){
					  $clase_visiometria = 'priorizar';
					}else if ($visiometria == 'Atencion En Curso'){
					  $clase_visiometria = 'atendiendo';
					}else if ($visiometria == 'Atencion Finalizada'){
					  $clase_visiometria = 'atendido';
					}else{
						$clase_visiometria = 'esperando';
					}

					if ($espirometria == 'Priorizar Esta Atencion'){
					  $clase_espirometria = 'priorizar';
					}else if ($espirometria == 'Atencion En Curso'){
					  $clase_espirometria = 'atendiendo';
					}else if ($espirometria == 'Atencion Finalizada'){
					  $clase_espirometria = 'atendido';
					}else{
						$clase_espirometria = 'esperando';
					}

					if ($psicologia == 'Priorizar Esta Atencion'){
					  $clase_psicologia = 'priorizar';
					}else if ($psicologia == 'Atencion En Curso'){
					  $clase_psicologia = 'atendiendo';
					}else if ($psicologia == 'Atencion Finalizada'){
					  $clase_psicologia = 'atendido';
					}else{
						$clase_psicologia = 'esperando';
					}

					if ($enfermeria == 'Priorizar Esta Atencion'){
					  $clase_enfermeria = 'priorizar';
					}else if ($enfermeria == 'Atencion En Curso'){
					  $clase_enfermeria = 'atendiendo';
					}else if ($enfermeria == 'Atencion Finalizada'){
					  $clase_enfermeria = 'atendido';
					}else{
						$clase_enfermeria = 'esperando';
					}

					if ($medico == 'Priorizar Esta Atencion'){
					  $clase_medico = 'priorizar';
					}else if ($medico == 'Atencion En Curso'){
					  $clase_medico = 'atendiendo';
					}else if ($medico == 'Atencion Finalizada'){
					  $clase_medico = 'atendido';
					}else{
						$clase_medico = 'esperando';
					}
			?>
				    <tbody class="size_font">
				      <tr>
				        <td><?php echo $nombrecompleto; ?></td>
				        <td><?php echo $numerodocumento; ?></td>
				        <td><?php echo $hora ?></td>
				        <td><?php echo $fecha_ingreso ?></td>
				         <td class="text-center"><a class="btn btn-info" style="color: white;" href="espirometria_pacientes.php?historia=<?php echo $id; ?>&&estado=Atencion En Curso&&iniciotime=<?php echo $horactual; ?>"><b>Atender</b></a></td> 
				        <td class="text-center <?php echo $clase_audiometria ?>"><?php echo $audiometria ?></td>
				        <td class="text-center <?php echo $clase_visiometria ?>"><?php echo $visiometria ?></td>
				        <td class="text-center <?php echo $clase_espirometria ?>"><?php echo $espirometria ?></td>
				        <td class="text-center <?php echo $clase_psicologia ?>"><?php echo $psicologia ?></td>
				        <td class="text-center <?php echo $clase_enfermeria ?>"><?php echo $enfermeria ?></td>
				        <td class="text-center <?php echo $clase_medico ?>"><?php echo $medico ?></td>
				      </tr>
				    </tbody>
			    <?php 
		  		}//nums rows

		    }else{
		    	echo "<label Style='color: red;'>No hay Pacientes En Espera, En Este Momento.<label>";
		    }
	 ?>		
	 		</div>
		  </table>	          
	
</form>
</body>
</html>