
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
<?php include ('includes/conexion.php'); 
	include ('bar/style_bar/estilo.css');
	date_default_timezone_set('America/Bogota');
	$hora = date('h:i:s A');
	$fecha = date('Y-m-d');
?>
<div style="font-size: 20px;" class="text-center"><label>Fecha: </label> <?php  echo date("Y-m-d | h:i:s A"); ?></div>
<?php 

 //consulta de pacientes
$consult = "SELECT * FROM datos_basicos AS db
JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
JOIN db_estado_atencion AS dba ON db.id_historia = dba.paciente
WHERE fecha = '$fecha' 
ORDER BY hora ASC";
$query = mysqli_query($conexion,$consult);

?>
		<script>				
					
			$(function(){ //---clases css hasclass addclass removeclass
				$('.txt').css({'background':'blue', 'text-align':'center', 'color':'white' });
				if($('#parrafo').hasClass('txt')) {//hasClass: rectifica si <p> tiene la clase estilo
					//alert('si tiene la clase txt');
					$('#parrafo').removeClass('txt');//removeClass elimina la clase txt en caso de no existir
				}else{
					//alert('no tiene la clase txt');//en caso de no tener la clase txt:
					//$('#parrafo').addClass('nuevo-estilo_txt');//addClass agrega una clase de nombre: nuevo-estilo_txt en reemplazo de la clase: txt
				}
			});
	
		</script>	

 <body>
       
    <form method="POST" action="">
    <div class="container">
    <div class="col-sm-12">  
	  <table class="table table-bordered table-sm">
	    <thead>
	      <tr class="size_font">
	        <th style="font-size: 12px;" class="text-center">Nombres-Apellidos</th>
	        <th style="font-size: 12px;" class="text-center">N° identidad</th>
	        <th style="font-size: 12px;" class="text-center">Hora</th>
	        <th style="font-size: 12px;" class="text-center">Fecha</th>
	        <th style="font-size: 12px;" class="text-center">Audiometria</th>
	        <th style="font-size: 12px;" class="text-center">Visiometria</th>
	        <th style="font-size: 12px;" class="text-center">Espirometria</th>
	        <th style="font-size: 12px;" class="text-center">Psicologia</th>
	        <th style="font-size: 12px;" class="text-center">Enfermeria</th>
	        <th style="font-size: 12px;" class="text-center">Medico</th>
	      </tr>
	    </thead>
	    <?php
   	if (mysqli_num_rows($query) > 0){

    	while ($datos=mysqli_fetch_array($query)) {
    		$nombrecompleto= $datos['nombres_apellidos'];
  			$numerodocumento=$datos['numero_documento'];
  			$fecha_ingreso= $datos['fecha'];
  			$hora_ingreso= $datos['hora'];
  			$audiometria= $datos['audiometria'];
  			$visiometria= $datos['visiometria'];
  			$espirometria= $datos['espirometria'];
  			$psicologia= $datos['psicologia'];
  			$enfermeria= $datos['enfermeria'];
  			$medico= $datos['medico'];
  			$id= $datos['id_historia'];
 ?>

	<?php 
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
	        <td class="text-center"><?php echo $nombrecompleto; ?></td>
	        <td class="text-center"><?php echo $numerodocumento; ?></td>
	        <td class="text-center"><?php echo $hora_ingreso ?></td>
	        <td class="text-center"><?php echo $fecha_ingreso ?></td> 
	        <?php if ($audiometria == 'Esperando Atencion') { ?>
	         <td class="text-center <?php echo $clase_audiometria ?>"><a style="color: #061EFA;" href="recepcion_pacientes.php?historia=<?php echo $id; ?>&&estado_atencion=Priorizar Esta Atencion&&priorizar=1 "><b class="<?php echo $clase_audiometria ?>"><?php echo $audiometria ?></b></a></td> 
	         <?php }else{?>
	         <td class="text-center <?php echo $clase_audiometria ?>"><b class=""><?php echo $audiometria ?> </b></td> 
	         <?php } ?>

	         <?php if ($visiometria == 'Esperando Atencion') { ?>
	         <td class="text-center <?php echo $clase_visiometria ?>"><a style="color: #061EFA;" href="recepcion_pacientes.php?historia=<?php echo $id; ?>&&estado_atencion=Priorizar Esta Atencion&&priorizar=2 "><b class="<?php echo $clase_visiometria ?>"><?php echo $visiometria ?></b></a></td> 
	         <?php }else{?>
	         <td class="text-center <?php echo $clase_visiometria ?>"><b class=""><?php echo $visiometria ?> </b></td> 
	         <?php } ?>

	         <?php if ($espirometria == 'Esperando Atencion') { ?>
	         <td class="text-center <?php echo $clase_espirometria ?>"><a style="color: #061EFA;" href="recepcion_pacientes.php?historia=<?php echo $id; ?>&&estado_atencion=Priorizar Esta Atencion&&priorizar=3 "><b class="<?php echo $clase_espirometria ?>"><?php echo $espirometria ?></b></a></td> 
	         <?php }else{?>
	         <td class="text-center <?php echo $clase_espirometria ?>"><b class=""><?php echo $espirometria ?> </b></td> 
	         <?php } ?>

	         <?php if ($psicologia == 'Esperando Atencion') { ?>
	         <td class="text-center <?php echo $clase_psicologia ?>"><a style="color: #061EFA;" href="recepcion_pacientes.php?historia=<?php echo $id; ?>&&estado_atencion=Priorizar Esta Atencion&&priorizar=4 "><b class="<?php echo $clase_psicologia ?>"><?php echo $psicologia ?></b></a></td> 
	         <?php }else{?>
	         <td class="text-center <?php echo $clase_psicologia ?>"><b class=""><?php echo $psicologia ?> </b></td> 
	         <?php } ?>

	         <?php if ($enfermeria == 'Esperando Atencion') { ?>
	         <td class="text-center <?php echo $clase_enfermeria ?>"><a style="color: #061EFA;" href="recepcion_pacientes.php?historia=<?php echo $id; ?>&&estado_atencion=Priorizar Esta Atencion&&priorizar=5 "><b class="<?php echo $clase_enfermeria ?>"><?php echo $enfermeria ?></b></a></td> 
	         <?php }else{?>
	         <td class="text-center <?php echo $clase_enfermeria ?>"><b class=""><?php echo $enfermeria ?> </b></td> 
	         <?php } ?>

	         <?php if ($medico == 'Esperando Atencion') { ?>
	         <td class="text-center <?php echo $clase_medico ?>"><a style="color: #061EFA;" href="recepcion_pacientes.php?historia=<?php echo $id; ?>&&estado_atencion=Priorizar Esta Atencion&&priorizar=6 "><b class="<?php echo $clase_medico ?>"><?php echo $medico ?></b></a></td> 
	         <?php }else{?>
	         <td class="text-center <?php echo $clase_medico ?>"><b class=""><?php echo $medico ?> </b></td> 
	         <?php } ?>

	      </tr>
	    </tbody>
	    <?php 
  	}//nums rows

    }else{
    	echo "<label Style='color: red;'>No hay Pacientes en espera.<label>";
    }

 ?>	
	  </table>
          
	
</div>
</div>
</form>
</html>