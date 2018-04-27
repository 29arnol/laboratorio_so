<?php 
	session_start();
	if(isset($_SESSION['usuario']) and $_SESSION['rol']==1){
		$nombres = $_SESSION['nombre_completo'];
		$nick = $nombres;    
	}else{
	  	session_destroy();
	  	header('Location: index.php'); 
	}

	include ('includes/conexion.php'); 
	include ('bar/style_bar/estilo.css');

	date_default_timezone_set('America/Bogota');
	$hora = date('h:i:s A');
	$fecha = date('Y-m-d');

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
    	<div style="font-size: 20px;" class="text-center">
			<label>Fecha: </label> <?php  echo date("Y-m-d | h:i:s A"); ?>
		</div>  
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
			
			switch ($audiometria) {
			 	case 'Priorizar Esta Atencion':
			 		$clase_audiometria = 'priorizar';
			 	break;
			 	case 'Atencion En Curso':
			 		$clase_audiometria = 'atendiendo';
			 	break;
			 	case 'Atencion Finalizada':
			 		$clase_audiometria = 'atendido';
			 	break;
			 	default:
			 		$clase_audiometria = 'esperando';
			 	break;
			} 

			switch ($visiometria) {
				case 'Priorizar Esta Atencion':
					$clase_visiometria = 'priorizar';
				break;
				case 'Atencion En Curso':
					$clase_visiometria = 'atendiendo';
				break;
				case 'Atencion Finalizada':
					$clase_visiometria = 'atendido';
				break;
				default:
					$clase_visiometria = 'esperando';
				break;
			}

			switch ($espirometria){
				case 'Priorizar Esta Atencion':
					$clase_espirometria = 'priorizar';
				break;
				case 'Atencion En Curso':
					$clase_espirometria = 'atendiendo';
				break;
				case 'Atencion Finalizada':
					$clase_espirometria = 'atendido';
				break;
				default:
					$clase_espirometria = 'esperando';
				break;
			}

			switch ($psicologia) {
				case 'Priorizar Esta Atencion':
					$clase_psicologia = 'priorizar';
				break;
				case 'Atencion En Curso':
					$clase_psicologia = 'atendiendo';
				break;
				case 'Atencion Finalizada':
					$clase_psicologia = 'atendido';
				break;
				default:
					$clase_psicologia = 'esperando';
				break;
			}

			switch ($enfermeria) {
				case 'Priorizar Esta Atencion':
					$clase_enfermeria = 'priorizar';
				break;
				case 'Atencion En Curso':
					$clase_enfermeria = 'atendiendo';
				break;
				case 'Atencion Finalizada':
					$clase_enfermeria = 'atendido';
				break;
				default:
					$clase_enfermeria = 'esperando';
				break;
			}

			switch ($medico) {
				case 'Priorizar Esta Atencion':
					$clase_medico = 'priorizar';
				break;
				case 'Atencion En Curso':
					$clase_medico = 'atendiendo';
				break;
				case 'Atencion Finalizada':
					$clase_medico = 'atendido';
				break;
				default:
					$clase_medico = 'esperando';
				break;
			}

?>
		    <tbody class="size_font">
		      <tr>
		        <td class="text-center"><?php echo $nombrecompleto; ?></td>
		        <td class="text-center"><?php echo $numerodocumento; ?></td>
		        <td class="text-center"><?php echo $hora_ingreso ?></td>
		        <td class="text-center"><?php echo $fecha_ingreso ?></td> 
		        <?php if ($audiometria == 'Esperando Atencion') { ?>
		         <td class="text-center <?php echo $clase_audiometria ?>">
		         	<a style="color: #061EFA;" href="recepcion_pacientes.php?historia=<?php echo $id; ?>&&estado_atencion=Priorizar Esta Atencion&&priorizar=1 ">
		         		<b class="<?php echo $clase_audiometria ?>"><?php echo $audiometria ?></b>
		         	</a>
		         </td> 
		         <?php }else{?>
			         <td class="text-center <?php echo $clase_audiometria ?>">
			         	<b class=""><?php echo $audiometria ?></b>
			         </td> 
		         <?php } ?>

		         <?php if ($visiometria == 'Esperando Atencion') { ?>
			         <td class="text-center <?php echo $clase_visiometria ?>">
			         	<a style="color: #061EFA;" href="recepcion_pacientes.php?historia=<?php echo $id; ?>&&estado_atencion=Priorizar Esta Atencion&&priorizar=2 "><b class="<?php echo $clase_visiometria ?>"><?php echo $visiometria ?></b>
			         	</a>
			         </td> 
		         <?php }else{?>
			         <td class="text-center <?php echo $clase_visiometria ?>">
			         	<b class=""><?php echo $visiometria ?> </b>
			         </td> 
		         <?php } ?>

		         <?php if ($espirometria == 'Esperando Atencion') { ?>
		         <td class="text-center <?php echo $clase_espirometria ?>">
		         	<a style="color: #061EFA;" href="recepcion_pacientes.php?historia=<?php echo $id; ?>&&estado_atencion=Priorizar Esta Atencion&&priorizar=3 ">
		         		<b class="<?php echo $clase_espirometria ?>"><?php echo $espirometria ?></b>
		         	</a>
		         </td> 
		         <?php }else{?>
		         <td class="text-center <?php echo $clase_espirometria ?>">
		         	<b class=""><?php echo $espirometria ?> </b>
		         </td> 
		         <?php } ?>

		         <?php if ($psicologia == 'Esperando Atencion') { ?>
		         <td class="text-center <?php echo $clase_psicologia ?>">
		         	<a style="color: #061EFA;" href="recepcion_pacientes.php?historia=<?php echo $id; ?>&&estado_atencion=Priorizar Esta Atencion&&priorizar=4 ">
		         		<b class="<?php echo $clase_psicologia ?>"><?php echo $psicologia ?></b>
		         	</a>
		         </td> 
		         <?php }else{?>
		         <td class="text-center <?php echo $clase_psicologia ?>">
		         	<b class=""><?php echo $psicologia ?> </b>
		         </td> 
		         <?php } ?>

		         <?php if ($enfermeria == 'Esperando Atencion') { ?>
		         <td class="text-center <?php echo $clase_enfermeria ?>">
		         	<a style="color: #061EFA;" href="recepcion_pacientes.php?historia=<?php echo $id; ?>&&estado_atencion=Priorizar Esta Atencion&&priorizar=5 ">
		         		<b class="<?php echo $clase_enfermeria ?>"><?php echo $enfermeria ?></b>
		         	</a>
		         </td> 
		         <?php }else{?>
		         <td class="text-center <?php echo $clase_enfermeria ?>">
		         	<b class=""><?php echo $enfermeria ?> </b>
		         </td> 
		         <?php } ?>

		         <?php if ($medico == 'Esperando Atencion') { ?>
		         <td class="text-center <?php echo $clase_medico ?>">
		         	<a style="color: #061EFA;" href="recepcion_pacientes.php?historia=<?php echo $id; ?>&&estado_atencion=Priorizar Esta Atencion&&priorizar=6 ">
		         		<b class="<?php echo $clase_medico ?>"><?php echo $medico ?></b>
		         	</a>
		         </td> 
		         <?php }else{?>
		         <td class="text-center <?php echo $clase_medico ?>">
		         	<b class=""><?php echo $medico ?> </b>
		         </td> 
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