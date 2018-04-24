<?php 
include ('includes/conexion.php'); 

$code = base64_decode($_REQUEST['cod']);
  if ($code==255) {
    include ('bar/navbar_administracion.php'); 
  }else if($code==522){
   	include ('bar/navbar_recepcion.php'); 
  }else{
  	include ('bar/navbar_visiometria.php'); 
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Laboratorio Salud Ocupacional</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<?php 
   if ($_POST == true) {
    $tipocon = $_POST['tipoconsulta'];
    $historia = $_POST['documento'];
    $fecharegistro = $_POST['fecha_registro'];
  }else{
    $tipocon = base64_decode($_REQUEST['tipoconsulta']);
    //$historia1 = $_GET['historia'];
    $historia = base64_decode($_REQUEST['paciente']);
    $fecharegistro = base64_decode($_REQUEST['registro']);
  }

    $consult = "SELECT * FROM datos_basicos AS db
     JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
    JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
    JOIN visiometria_campo_visual AS vcv ON db.id_historia = vcv.paciente_visiometria 
    JOIN visiometria_vision_lejana AS vvl ON vcv.id = vvl.id_campo_visual
    JOIN visiometria_vision_proxima AS vvp ON vvl.id = vvp.id_vision_lejana
    JOIN visiometria_percepciones_y_forias AS vpf ON vvp.id = vpf.id_vision_proxima
    /*JOIN visiometria_remisiones AS vr ON vpf.id = vr.id_percepciones_forias*/
    WHERE db.id_historia = '$historia' OR dc.numero_documento = '$historia' AND db.fecha = '$fecharegistro' ";
    $query = mysqli_query($conexion,$consult);

    if (mysqli_num_rows($query) > 0){
    while ($datos=mysqli_fetch_array($query)) {

      //datos personales
      $historia=$datos['id_historia'];

      $nombres_apellidos= $datos['nombres_apellidos'];
      $tipo_documento= $datos['tipo_documento'];
      $numero_documento= $datos['numero_documento'];
      $fecha_nacimiento= $datos['fecha_nacimiento'];
      $edad= $datos['edad'];
      $celular= $datos['celular'];
      $genero= $datos['genero'];
      $motivo_evaluacion= $datos['motivo_evaluacion'];
      $direccion = $datos['direccion'];
      $cargodesempenar= $datos['cargo_a_desempenar'];
      $actividad_economica= $datos['actividad_economica'];
      $nombre_empresa= $datos['nombre_empresa'];
      $ciudad= $datos['ciudad'];
      $direccion_empresa= $datos['direccion_empresa'];
      $numero_nit= $datos['numero_nit'];
      $telefono_empresa= $datos['telefono_empresa'];

      $lugar_nacimiento= $datos['lugar_nacimiento'];
      $estado_civil= $datos['estado_civil'];
      $ruta_destino =   "fotografias/"; //ruta de las fotos de los paciente

	      //CAMPO_VISUAL
	      $prescripcion_optica = $datos['prescripcion_optica'];

	      $ant_personales= $datos['visiometria_ant_personales'];
	      $visiometria_ant_profesionales = $datos['visiometria_ant_profesionales'];

	      $nasal_derecho_35 = $datos['35_nasal_derecho'];
	      $temporal_derecho_55 = $datos['55_temporal_derecho'];
	      $temporal_derecho_70 = $datos['70_temporal_derecho'];
	      $temporal_derecho_85 = $datos['85_temporal_derecho'];
	      
	      $nasal_izquierdo_35 = $datos['35_nasal_izquierdo'];
	      $temporal_izquierdo_55 = $datos['55_temporal_izquierdo'];
	      $temporal_izquierdo_70 = $datos['70_temporal_izquierdo'];
	      $temporal_izquierdo_85 = $datos['85_temporal_izquierdo'];

	      //vision_lejana
	      $vision_lejana_ambos_ojos = $datos['vision_lejana_ambos_ojos'];
	      $con_correccion_vl_aj= $datos['con_correccion_vl_aj'];

	      $vision_lejana_ojo_derecho = $datos['vision_lejana_ojo_derecho'];
	      $con_correccion_vl_od= $datos['con_correccion_vl_od'];

	      $vision_lejana_ojo_izquierdo = $datos['vision_lejana_ojo_izquierdo'];
	      $con_correccion_vl_oi= $datos['con_correccion_vl_oi'];

	      //vision_proxima
	      $con_correccion_vp_ao= $datos['con_correccion_vp_ao'];
	      $vision_proxima_ambos_ojos = $datos['vision_proxima_ambos_ojos'];

	      $con_correccion_vp_od= $datos['con_correccion_vp_od'];
	      $vision_proxima_ojo_derecho = $datos['vision_proxima_ojo_derecho'];

	      $con_correccion_vp_oi= $datos['con_correccion_vp_oi'];
	      $vision_proxima_ojo_izquierdo = $datos['vision_proxima_ojo_izquierdo'];

	      //percepciones y profundidades
	      $percepcion_profundidad = $datos['percepcion_profundidad'];
	      $percepcion_color = $datos['percepcion_color'];
	      $foria_vertical_vision_lejana = $datos['foria_vertical_vision_lejana'];
	      $foria_horizontal_vision_lejana = $datos['foria_horizontal_vision_lejana'];
	      $foria_horizontal_vision_proxima = $datos['foria_horizontal_vision_proxima'];
	      $resultado = $datos['resultado_visiometria'];
	      $alteracion_visual = $datos['alteracion_visual'];

?>
<body>
<br><br>
<div class="container">
 
<div class="panel panel-default">
  <div class="panel-heading text-center"><label>Datos  <a href="#" data-toggle="modal" data-target="#historial">Paciente</a> - Empresa</label></div>
    <div class="panel-body">    
      <img class="img-responsive img-thumbnail paciente_datos" alt="Foto del Paciente" src=<?php echo $ruta_destino."".$historia.'.png'; ?> >
      <div class="col-sm-6">
      <div class="tabla_paciente">
        <table class="table table-bordered">
        <thead>
          <th>Nombres-Apellidos:</th>
          <th>Tipo Documento:</th>
          <th>Numero Documento:</th>
        </thead>

          <tbody style="font-size: 13px;">
            <tr>
              <td><?php echo $nombres_apellidos ?></td>
              <td><?php echo $tipo_documento ?></td>
              <td><?php echo $numero_documento ?></td> 
            </tr>
            <thead>
              <th>Edad:</th>
              <th>Fecha Nacimiento:</th>
              <th>Genero:</th>
            </thead>
            <tr>   
              <td><?php echo $edad ?></td>
              <td><?php echo $fecha_nacimiento ?></td>
              <td><?php echo $genero ?></td>
            </tr>
            <thead>      
              <th>Estado Civil:</th>
              <th>Lugar Nacimiento:</th>
              <th>Numero Celular:</th>
            </thead>
            <tr>   
              <td><?php echo $estado_civil ?></td>
              <td><?php echo $lugar_nacimiento ?></td>
              <td><?php echo $celular ?></td>
            </tr>
            <thead> 
              <th>Direccion</th>
              <th colspan="3">Motivo de Evaluacion:</th>
            </thead>
            <tr>
              
              <td><?php echo $direccion ?></td>  
              <td colspan="3"><?php echo $motivo_evaluacion ?></td>
            </tr>
          </tbody>
        </table>
        </div>
      </div>


      <div class="col-sm-12"> 
        <table class="table table-bordered">
          <tbody style="font-size: 13px;">
          <thead>
            <th>Nombre de la Empresa:</th>
            <th>Actividad Economica:</th>
            <th>Ciudad:</th>
            <th>Direccion de la empresa</th>
            <th>Numero de Nit</th>
            <th>Telefono</th>
          </thead>
            <tr>
              <td><?php echo $nombre_empresa ?></td>
              <td><?php echo $actividad_economica ?></td>
              <td><?php echo $ciudad ?></td>
              <td><?php echo $direccion_empresa ?></td>
              <td><?php echo $numero_nit ?></td>
              <td><?php echo $telefono_empresa ?></td>
            </tr>

          </tbody>
        </table>
      </div>
      <!--  -->
    </div>
  </div>


<?php if ($tipocon == 1 ){ ?>

<div class="text-center"><label>Utiliza Prescripción Óptica:</label> <?php echo $prescripcion_optica ?></div>

<div class="col-sm-12">
	<div class="panel panel-default">
    	<div class="panel-heading">CAMPO VISUAL</div>
    	<div class="panel-body">    
		    <table class="table table-bordered text-center">
			    <thead>
			      <tr>
			        <th class="text-center">Campo Visual</th>
			        <th class="text-center">Ojo Derecho</th>
			        <th class="text-center">Ojo Izquierdo</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td><label>35° Nasal</label></td>
			        <td><label><?php echo $nasal_derecho_35 ?></label></td>
			        <td><label><?php echo $nasal_izquierdo_35 ?></label></td>
			      </tr>
			      <tr>
			        <td><label>55° Temporal</label></td>
			        <td><label><?php echo $temporal_derecho_55 ?></label></td>
			        <td><label><?php echo $temporal_izquierdo_55 ?></label></td>
			      </tr>
			      <tr>
			        <td><label>70° Temporal</label></td>
			        <td><label><?php echo $temporal_derecho_70 ?></label></td>
			        <td><label><?php echo $temporal_izquierdo_70 ?></label></td>
			      </tr>
			      <tr>
			      	<td><label>85° Temporal</label></td>
			      	<td><label><?php echo $temporal_derecho_85 ?></label></td>
			      	<td><label><?php echo $temporal_izquierdo_85 ?></label></td>
			      </tr>
			    </tbody>
			</table>
		</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">AGUDEZA VISUAL VISION LEJANA AMBOS OJOS</div>
	  	<div class="panel-body">
	  	<div class="text-center"><label>Correccion:</label> <?php echo $con_correccion_vl_aj ?></div>
			<table class="table table-bordered">
			    <thead>
			      	<tr>
				        <th class="text-center">1</th>
				        <th class="text-center">2</th>
				        <th class="text-center">3</th>
				        <th class="text-center">4</th>
				        <th class="text-center">5</th>
				        <th class="text-center">6</th>
				        <th class="text-center">7</th>
				        <th class="text-center">8</th>
				        <th class="text-center">9</th>
				        <th class="text-center">10</th>
				        <th class="text-center">11</th>
				        <th class="text-center">12</th>
				        <th class="text-center">13</th>
				        <th class="text-center">14</th>
			      	</tr>
			   		<tr>
				        <th class="text-center">20/200</th>
				        <th class="text-center">20/100</th>
				        <th class="text-center">20/70</th>
				        <th class="text-center">20/50</th>
				        <th class="text-center">20/40</th>
				        <th class="text-center">20/35</th>
				        <th class="text-center">20/30</th>
				        <th class="text-center">20/25</th>
				        <th class="text-center">20/22</th>
				        <th class="text-center">20/20</th>
				        <th class="text-center">20/18</th>
				        <th class="text-center">20/17</th>
				        <th class="text-center">20/15</th>
				        <th class="text-center">20/10</th>
			      	</tr>
			    </thead>
			    <tbody>
			      <tr class="text-center">
			      <?php 
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/200" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/100" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/70" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/50" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/40" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/35" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/30" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/25" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/22" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/20" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/18" ) {
			      	echo "<label>X</label> </td>";
			      }    
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/17" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/15" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/10" ) {
			      	echo "<label>X</label> </td>";
			      }   
			      ?>
			      </tr>
			    </tbody>
			</table>
	  	</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">AGUDEZA VISUAL VISION LEJANA OJO DERECHO</div>
	  	<div class="panel-body">
	  	<div class="text-center"><label>Correccion:</label> <?php echo $con_correccion_vl_od ?></div>
			<table class="table table-bordered">
			    <thead>
			      	<tr>
				        <th class="text-center">1</th>
				        <th class="text-center">2</th>
				        <th class="text-center">3</th>
				        <th class="text-center">4</th>
				        <th class="text-center">5</th>
				        <th class="text-center">6</th>
				        <th class="text-center">7</th>
				        <th class="text-center">8</th>
				        <th class="text-center">9</th>
				        <th class="text-center">10</th>
				        <th class="text-center">11</th>
				        <th class="text-center">12</th>
				        <th class="text-center">13</th>
				        <th class="text-center">14</th>
			      	</tr>
			   		<tr>
				        <th class="text-center">20/200</th>
				        <th class="text-center">20/100</th>
				        <th class="text-center">20/70</th>
				        <th class="text-center">20/50</th>
				        <th class="text-center">20/40</th>
				        <th class="text-center">20/35</th>
				        <th class="text-center">20/30</th>
				        <th class="text-center">20/25</th>
				        <th class="text-center">20/22</th>
				        <th class="text-center">20/20</th>
				        <th class="text-center">20/18</th>
				        <th class="text-center">20/17</th>
				        <th class="text-center">20/15</th>
				        <th class="text-center">20/10</th>
			      	</tr>
			    </thead>
			    <tbody>
			      <tr class="text-center">
			      <?php 
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/200" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/100" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/70" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/50" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/40" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/35" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/30" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/25" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/22" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/20" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/18" ) {
			      	echo "<label>X</label> </td>";
			      }    
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/17" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/15" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/10" ) {
			      	echo "<label>X</label> </td>";
			      }   
			      ?>
			      </tr>
			    </tbody>
			</table>
	  	</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">AGUDEZA VISUAL VISION LEJANA OJO IZQUIERDO</div>
	  	<div class="panel-body">
	  	<div class="text-center"><label>Correccion:</label> <?php echo $con_correccion_vl_oi ?></div>
			<table class="table table-bordered">
			    <thead>
			      	<tr>
				        <th class="text-center">1</th>
				        <th class="text-center">2</th>
				        <th class="text-center">3</th>
				        <th class="text-center">4</th>
				        <th class="text-center">5</th>
				        <th class="text-center">6</th>
				        <th class="text-center">7</th>
				        <th class="text-center">8</th>
				        <th class="text-center">9</th>
				        <th class="text-center">10</th>
				        <th class="text-center">11</th>
				        <th class="text-center">12</th>
				        <th class="text-center">13</th>
				        <th class="text-center">14</th>
			      	</tr>
			   		<tr>
				        <th class="text-center">20/200</th>
				        <th class="text-center">20/100</th>
				        <th class="text-center">20/70</th>
				        <th class="text-center">20/50</th>
				        <th class="text-center">20/40</th>
				        <th class="text-center">20/35</th>
				        <th class="text-center">20/30</th>
				        <th class="text-center">20/25</th>
				        <th class="text-center">20/22</th>
				        <th class="text-center">20/20</th>
				        <th class="text-center">20/18</th>
				        <th class="text-center">20/17</th>
				        <th class="text-center">20/15</th>
				        <th class="text-center">20/10</th>
			      	</tr>
			    </thead>
			    <tbody>
			      <tr class="text-center">
			      <?php 
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/200" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/100" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/70" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/50" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/40" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/35" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/30" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/25" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/22" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/20" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/18" ) {
			      	echo "<label>X</label> </td>";
			      }    
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/17" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/15" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/10" ) {
			      	echo "<label>X</label> </td>";
			      }   
			      ?>
			      </tr>
			    </tbody>
			</table>
	  	</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">AGUDEZA VISUAL VISION PROXIMA AMBOS OJOS</div>
	  	<div class="panel-body">
	  	<div class="text-center"><label>Correccion:</label> <?php echo $con_correccion_vp_ao ?></div>
			<table class="table table-bordered">
			    <thead>
			      	<tr>
				        <th class="text-center">1</th>
				        <th class="text-center">2</th>
				        <th class="text-center">3</th>
				        <th class="text-center">4</th>
				        <th class="text-center">5</th>
				        <th class="text-center">6</th>
				        <th class="text-center">7</th>
				        <th class="text-center">8</th>
				        <th class="text-center">9</th>
				        <th class="text-center">10</th>
				        <th class="text-center">11</th>
				        <th class="text-center">12</th>
				        <th class="text-center">13</th>
				        <th class="text-center">14</th>
			      	</tr>
			   		<tr>
				        <th class="text-center">20/200</th>
				        <th class="text-center">20/100</th>
				        <th class="text-center">20/70</th>
				        <th class="text-center">20/50</th>
				        <th class="text-center">20/40</th>
				        <th class="text-center">20/35</th>
				        <th class="text-center">20/30</th>
				        <th class="text-center">20/25</th>
				        <th class="text-center">20/22</th>
				        <th class="text-center">20/20</th>
				        <th class="text-center">20/18</th>
				        <th class="text-center">20/17</th>
				        <th class="text-center">20/15</th>
				        <th class="text-center">20/10</th>
			      	</tr>
			    </thead>
			    <tbody>
			      <tr class="text-center">
			      <?php 
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/200" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/100" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/70" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/50" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/40" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/35" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/30" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/25" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/22" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/20" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/18" ) {
			      	echo "<label>X</label> </td>";
			      }    
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/17" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/15" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/10" ) {
			      	echo "<label>X</label> </td>";
			      }   
			      ?>
			      </tr>
			    </tbody>
			</table>
	  	</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">AGUDEZA VISUAL VISION PROXIMA OJO DERECHO</div>
	  	<div class="panel-body">
	  	<div class="text-center"><label>Correccion:</label> <?php echo $con_correccion_vp_od ?></div>
			<table class="table table-bordered">
			    <thead>
			      	<tr>
				        <th class="text-center">1</th>
				        <th class="text-center">2</th>
				        <th class="text-center">3</th>
				        <th class="text-center">4</th>
				        <th class="text-center">5</th>
				        <th class="text-center">6</th>
				        <th class="text-center">7</th>
				        <th class="text-center">8</th>
				        <th class="text-center">9</th>
				        <th class="text-center">10</th>
				        <th class="text-center">11</th>
				        <th class="text-center">12</th>
				        <th class="text-center">13</th>
				        <th class="text-center">14</th>
			      	</tr>
			   		<tr>
				        <th class="text-center">20/200</th>
				        <th class="text-center">20/100</th>
				        <th class="text-center">20/70</th>
				        <th class="text-center">20/50</th>
				        <th class="text-center">20/40</th>
				        <th class="text-center">20/35</th>
				        <th class="text-center">20/30</th>
				        <th class="text-center">20/25</th>
				        <th class="text-center">20/22</th>
				        <th class="text-center">20/20</th>
				        <th class="text-center">20/18</th>
				        <th class="text-center">20/17</th>
				        <th class="text-center">20/15</th>
				        <th class="text-center">20/10</th>
			      	</tr>
			    </thead>
			    <tbody>
			      <tr class="text-center">
			      <?php 
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/200" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/100" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/70" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/50" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/40" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/35" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/30" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/25" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/22" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/20" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/18" ) {
			      	echo "<label>X</label> </td>";
			      }    
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/17" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/15" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/10" ) {
			      	echo "<label>X</label> </td>";
			      }   
			      ?>
			      </tr>
			    </tbody>
			</table>
	  	</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">AGUDEZA VISUAL VISION PROXIMA OJO IZQUIERDO</div>
	  	<div class="panel-body">
	  	<div class="text-center"><label>Correccion:</label> <?php echo $con_correccion_vp_oi ?></div>
			<table class="table table-bordered">
			    <thead>
			      	<tr>
				        <th class="text-center">1</th>
				        <th class="text-center">2</th>
				        <th class="text-center">3</th>
				        <th class="text-center">4</th>
				        <th class="text-center">5</th>
				        <th class="text-center">6</th>
				        <th class="text-center">7</th>
				        <th class="text-center">8</th>
				        <th class="text-center">9</th>
				        <th class="text-center">10</th>
				        <th class="text-center">11</th>
				        <th class="text-center">12</th>
				        <th class="text-center">13</th>
				        <th class="text-center">14</th>
			      	</tr>
			   		<tr>
				        <th class="text-center">20/200</th>
				        <th class="text-center">20/100</th>
				        <th class="text-center">20/70</th>
				        <th class="text-center">20/50</th>
				        <th class="text-center">20/40</th>
				        <th class="text-center">20/35</th>
				        <th class="text-center">20/30</th>
				        <th class="text-center">20/25</th>
				        <th class="text-center">20/22</th>
				        <th class="text-center">20/20</th>
				        <th class="text-center">20/18</th>
				        <th class="text-center">20/17</th>
				        <th class="text-center">20/15</th>
				        <th class="text-center">20/10</th>
			      	</tr>
			    </thead>
			    <tbody>
			      <tr class="text-center">
			      <?php 
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/200" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/100" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/70" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/50" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/40" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/35" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/30" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/25" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/22" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/20" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/18" ) {
			      	echo "<label>X</label> </td>";
			      }    
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/17" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/15" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/10" ) {
			      	echo "<label>X</label> </td>";
			      }   
			      ?>
			      </tr>
			    </tbody>
			</table>
	  	</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">PERCEPCION DE PROFUNDIDAD</div>
	  	<div class="panel-body">
			<table class="table table-bordered">
			    <thead>
			      	<tr>
				        <th class="text-center"><label>1</label></th>
				        <th class="text-center"><label>2</label></th>
				        <th class="text-center"><label>3</label></th>
				        <th class="text-center"><label>4</label></th>
				        <th class="text-center"><label>5</label></th>
				        <th class="text-center"><label>6</label></th>
				        <th class="text-center"><label>7</label></th>
				        <th class="text-center"><label>8</label></th>
				        <th class="text-center"><label>9</label></th>
			      	</tr>
			   		<tr>
				        <th class="text-center"><label>Abajo</label></th>
				        <th class="text-center"><label>Izquierda</label></th>
				        <th class="text-center"><label>Abajo</label></th>
				        <th class="text-center"><label>P. Superior</label></th>
				        <th class="text-center"><label>P. Superior</label></th>
				        <th class="text-center"><label>Izquierda</label></th>
				        <th class="text-center"><label>Derecha</label></th>
				        <th class="text-center"><label>Izquierda</label></th>
				        <th class="text-center"><label>Derecha</label></th>
				    </tr>
			      	<tr>
				        <th class="text-center"><label>400</label></th>
				        <th class="text-center"><label>200</label></th>
				        <th class="text-center"><label>100</label></th>
				        <th class="text-center"><label>70</label></th>
				        <th class="text-center"><label>50</label></th>
				        <th class="text-center"><label>40</label></th>
				        <th class="text-center"><label>30</label></th>
				        <th class="text-center"><label>25</label></th>
				        <th class="text-center"><label>20</label></th>
			      	</tr>			      	

			    </thead>
			    <tbody>
			      <tr class="text-center">
			      <?php 
			      echo "<td>";
			      if ($percepcion_profundidad == "Abajo 400" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($percepcion_profundidad == "Izquierda 200" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($percepcion_profundidad == "Abajo 100" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($percepcion_profundidad == "Superior 70" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($percepcion_profundidad == "Superior 50" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($percepcion_profundidad == "Izquierda 40" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($percepcion_profundidad == "Derecha 30" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($percepcion_profundidad == "Izquierda 25" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($percepcion_profundidad == "Derecha 20" ) {
			      	echo "<label>X</label> </td>";
			      }  
			      ?>
			      </tr>
			    </tbody>
			</table>
	  	</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">PERCEPCION DEL COLOR</div>
	  	<div class="panel-body">
			<table class="table table-bordered">
			    <thead>
			      	<tr>
				        <th class="text-center"><label>1</label></th>
				        <th class="text-center"><label>2</label></th>
				        <th class="text-center"><label>3</label></th>
				        <th class="text-center"><label>4</label></th>
				        <th class="text-center"><label>5</label></th>
				        <th class="text-center"><label>6</label></th>
			      	</tr>		      	
			    </thead>
			    <tbody>
			      <tr class="text-center">
			      <?php 
			      echo "<td>";
			      if ($percepcion_color == "12" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($percepcion_color == "5" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($percepcion_color == "26" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($percepcion_color == "6" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($percepcion_color == "16" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($percepcion_color == "Nada" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      
			      ?>
			      </tr>
			    </tbody>
			</table>
	  	</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">FORIA VERTICAL VISION LEJANA</div>
	  	<div class="panel-body">
			<table class="table table-bordered">
			    <thead>
			      	<tr>
				        <th class="text-center"><label>1</label></th>
				        <th class="text-center"><label>2</label></th>
				        <th class="text-center"><label>3</label></th>
				        <th class="text-center"><label>4</label></th>
				        <th class="text-center"><label>5</label></th>
				        <th class="text-center"><label>6</label></th>
				        <th class="text-center"><label>7</label></th>
			      	</tr>		      	
			    </thead>
			    <tbody>
			      <tr class="text-center">
			      <?php 
			      echo "<td>";
			      if ($foria_vertical_vision_lejana == "1" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($foria_vertical_vision_lejana == "2" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($foria_vertical_vision_lejana == "3" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_vertical_vision_lejana == "4" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_vertical_vision_lejana == "5" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_vertical_vision_lejana == "6" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_vertical_vision_lejana == "7" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      			      
			      ?>
			      </tr>
			    </tbody>
			</table>
	  	</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">FORIA HORIZONTAL VISION LEJANA</div>
	  	<div class="panel-body">
			<table class="table table-bordered">
			    <thead>
			      	<tr>
				        <th class="text-center"><label>1</label></th>
				        <th class="text-center"><label>2</label></th>
				        <th class="text-center"><label>3</label></th>
				        <th class="text-center"><label>4</label></th>
				        <th class="text-center"><label>5</label></th>
				        <th class="text-center"><label>6</label></th>
				        <th class="text-center"><label>7</label></th>
				        <th class="text-center"><label>8</label></th>
				        <th class="text-center"><label>9</label></th>
				        <th class="text-center"><label>10</label></th>
				        <th class="text-center"><label>11</label></th>
				        <th class="text-center"><label>12</label></th>
				        <th class="text-center"><label>13</label></th>
				        <th class="text-center"><label>14</label></th>
				        <th class="text-center"><label>15</label></th>
			      	</tr>		      	
			    </thead>
			    <tbody>
			      <tr class="text-center">
			      <?php 
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "1" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "2" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "3" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "4" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "5" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "6" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "7" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "8" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "9" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "10" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "11" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "12" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "13" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "14" ) {
			      	echo "<label>X</label> </td>";
			      } 			      			       
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "15" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      ?>
			      </tr>
			    </tbody>
			</table>
	  	</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">FORIA HORIZONTAL VISION PROXIMA</div>
	  	<div class="panel-body">
			<table class="table table-bordered">
			    <thead>
			      	<tr>
				        <th class="text-center"><label>1</label></th>
				        <th class="text-center"><label>2</label></th>
				        <th class="text-center"><label>3</label></th>
				        <th class="text-center"><label>4</label></th>
				        <th class="text-center"><label>5</label></th>
				        <th class="text-center"><label>6</label></th>
				        <th class="text-center"><label>7</label></th>
				        <th class="text-center"><label>8</label></th>
				        <th class="text-center"><label>9</label></th>
				        <th class="text-center"><label>10</label></th>
				        <th class="text-center"><label>11</label></th>
				        <th class="text-center"><label>12</label></th>
				        <th class="text-center"><label>13</label></th>
				        <th class="text-center"><label>14</label></th>
				        <th class="text-center"><label>15</label></th>
			      	</tr>		      	
			    </thead>
			    <tbody>
			      <tr class="text-center">
			      <?php 
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "1" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "2" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "3" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "4" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "5" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "6" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "7" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "8" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "9" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "10" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "11" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "12" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "13" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "14" ) {
			      	echo "<label>X</label> </td>";
			      } 			      			       
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "15" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      ?>
			      </tr>
			    </tbody>
			</table>
	  	</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">Resultado</div>
	  	<div class="panel-body text-center">
	  		<textarea  style="width: 1020px;" type="text" name="resultado_visiometria" rows="4" readonly="readonly"><?php echo $resultado ?></textarea>
	  		<br><br>
	  		<label>Alteracion Visual: </label> <?php echo $alteracion_visual ?>
	  	</div>
	</div>
</div>


<?php }else{ ?><!-- <<<<<<<<<<<<<<<< RESULTADO >>>>>>>>>>>>>>> -->




    <div class="text-center"><label>Utiliza Prescripción Óptica:</label> <?php echo $prescripcion_optica ?></div>

<div class="col-sm-12">
	<div class="panel panel-default">
    	<div class="panel-heading">CAMPO VISUAL</div>
    	<div class="panel-body">    
		    <table class="table table-bordered text-center">
			    <thead>
			      <tr>
			        <th class="text-center">Campo Visual</th>
			        <th class="text-center">Ojo Derecho</th>
			        <th class="text-center">Ojo Izquierdo</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td><label>35° Nasal</label></td>
			        <td><label><?php echo $nasal_derecho_35 ?></label></td>
			        <td><label><?php echo $nasal_izquierdo_35 ?></label></td>
			      </tr>
			      <tr>
			        <td><label>55° Temporal</label></td>
			        <td><label><?php echo $temporal_derecho_55 ?></label></td>
			        <td><label><?php echo $temporal_izquierdo_55 ?></label></td>
			      </tr>
			      <tr>
			        <td><label>70° Temporal</label></td>
			        <td><label><?php echo $temporal_derecho_70 ?></label></td>
			        <td><label><?php echo $temporal_izquierdo_70 ?></label></td>
			      </tr>
			      <tr>
			      	<td><label>85° Temporal</label></td>
			      	<td><label><?php echo $temporal_derecho_85 ?></label></td>
			      	<td><label><?php echo $temporal_izquierdo_85 ?></label></td>
			      </tr>
			    </tbody>
			</table>
		</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">AGUDEZA VISUAL VISION LEJANA AMBOS OJOS</div>
	  	<div class="panel-body">
	  	<div class="text-center"><label>Correccion:</label> <?php echo $con_correccion_vl_aj ?></div>
			<table class="table table-bordered">
			    <thead>
			      	<tr>
				        <th class="text-center">1</th>
				        <th class="text-center">2</th>
				        <th class="text-center">3</th>
				        <th class="text-center">4</th>
				        <th class="text-center">5</th>
				        <th class="text-center">6</th>
				        <th class="text-center">7</th>
				        <th class="text-center">8</th>
				        <th class="text-center">9</th>
				        <th class="text-center">10</th>
				        <th class="text-center">11</th>
				        <th class="text-center">12</th>
				        <th class="text-center">13</th>
				        <th class="text-center">14</th>
			      	</tr>
			   		<tr>
				        <th class="text-center">20/200</th>
				        <th class="text-center">20/100</th>
				        <th class="text-center">20/70</th>
				        <th class="text-center">20/50</th>
				        <th class="text-center">20/40</th>
				        <th class="text-center">20/35</th>
				        <th class="text-center">20/30</th>
				        <th class="text-center">20/25</th>
				        <th class="text-center">20/22</th>
				        <th class="text-center">20/20</th>
				        <th class="text-center">20/18</th>
				        <th class="text-center">20/17</th>
				        <th class="text-center">20/15</th>
				        <th class="text-center">20/10</th>
			      	</tr>
			    </thead>
			    <tbody>
			      <tr class="text-center">
			      <?php 
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/200" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/100" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/70" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/50" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/40" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/35" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/30" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/25" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/22" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/20" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/18" ) {
			      	echo "<label>X</label> </td>";
			      }    
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/17" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/15" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ambos_ojos == "20/10" ) {
			      	echo "<label>X</label> </td>";
			      }   
			      ?>
			      </tr>
			    </tbody>
			</table>
	  	</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">AGUDEZA VISUAL VISION LEJANA OJO DERECHO</div>
	  	<div class="panel-body">
	  	<div class="text-center"><label>Correccion:</label> <?php echo $con_correccion_vl_od ?></div>
			<table class="table table-bordered">
			    <thead>
			      	<tr>
				        <th class="text-center">1</th>
				        <th class="text-center">2</th>
				        <th class="text-center">3</th>
				        <th class="text-center">4</th>
				        <th class="text-center">5</th>
				        <th class="text-center">6</th>
				        <th class="text-center">7</th>
				        <th class="text-center">8</th>
				        <th class="text-center">9</th>
				        <th class="text-center">10</th>
				        <th class="text-center">11</th>
				        <th class="text-center">12</th>
				        <th class="text-center">13</th>
				        <th class="text-center">14</th>
			      	</tr>
			   		<tr>
				        <th class="text-center">20/200</th>
				        <th class="text-center">20/100</th>
				        <th class="text-center">20/70</th>
				        <th class="text-center">20/50</th>
				        <th class="text-center">20/40</th>
				        <th class="text-center">20/35</th>
				        <th class="text-center">20/30</th>
				        <th class="text-center">20/25</th>
				        <th class="text-center">20/22</th>
				        <th class="text-center">20/20</th>
				        <th class="text-center">20/18</th>
				        <th class="text-center">20/17</th>
				        <th class="text-center">20/15</th>
				        <th class="text-center">20/10</th>
			      	</tr>
			    </thead>
			    <tbody>
			      <tr class="text-center">
			      <?php 
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/200" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/100" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/70" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/50" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/40" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/35" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/30" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/25" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/22" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/20" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/18" ) {
			      	echo "<label>X</label> </td>";
			      }    
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/17" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/15" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_derecho == "20/10" ) {
			      	echo "<label>X</label> </td>";
			      }   
			      ?>
			      </tr>
			    </tbody>
			</table>
	  	</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">AGUDEZA VISUAL VISION LEJANA OJO IZQUIERDO</div>
	  	<div class="panel-body">
	  	<div class="text-center"><label>Correccion:</label> <?php echo $con_correccion_vl_oi ?></div>
			<table class="table table-bordered">
			    <thead>
			      	<tr>
				        <th class="text-center">1</th>
				        <th class="text-center">2</th>
				        <th class="text-center">3</th>
				        <th class="text-center">4</th>
				        <th class="text-center">5</th>
				        <th class="text-center">6</th>
				        <th class="text-center">7</th>
				        <th class="text-center">8</th>
				        <th class="text-center">9</th>
				        <th class="text-center">10</th>
				        <th class="text-center">11</th>
				        <th class="text-center">12</th>
				        <th class="text-center">13</th>
				        <th class="text-center">14</th>
			      	</tr>
			   		<tr>
				        <th class="text-center">20/200</th>
				        <th class="text-center">20/100</th>
				        <th class="text-center">20/70</th>
				        <th class="text-center">20/50</th>
				        <th class="text-center">20/40</th>
				        <th class="text-center">20/35</th>
				        <th class="text-center">20/30</th>
				        <th class="text-center">20/25</th>
				        <th class="text-center">20/22</th>
				        <th class="text-center">20/20</th>
				        <th class="text-center">20/18</th>
				        <th class="text-center">20/17</th>
				        <th class="text-center">20/15</th>
				        <th class="text-center">20/10</th>
			      	</tr>
			    </thead>
			    <tbody>
			      <tr class="text-center">
			      <?php 
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/200" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/100" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/70" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/50" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/40" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/35" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/30" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/25" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/22" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/20" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/18" ) {
			      	echo "<label>X</label> </td>";
			      }    
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/17" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/15" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_lejana_ojo_izquierdo == "20/10" ) {
			      	echo "<label>X</label> </td>";
			      }   
			      ?>
			      </tr>
			    </tbody>
			</table>
	  	</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">AGUDEZA VISUAL VISION PROXIMA AMBOS OJOS</div>
	  	<div class="panel-body">
	  	<div class="text-center"><label>Correccion:</label> <?php echo $con_correccion_vp_ao ?></div>
			<table class="table table-bordered">
			    <thead>
			      	<tr>
				        <th class="text-center">1</th>
				        <th class="text-center">2</th>
				        <th class="text-center">3</th>
				        <th class="text-center">4</th>
				        <th class="text-center">5</th>
				        <th class="text-center">6</th>
				        <th class="text-center">7</th>
				        <th class="text-center">8</th>
				        <th class="text-center">9</th>
				        <th class="text-center">10</th>
				        <th class="text-center">11</th>
				        <th class="text-center">12</th>
				        <th class="text-center">13</th>
				        <th class="text-center">14</th>
			      	</tr>
			   		<tr>
				        <th class="text-center">20/200</th>
				        <th class="text-center">20/100</th>
				        <th class="text-center">20/70</th>
				        <th class="text-center">20/50</th>
				        <th class="text-center">20/40</th>
				        <th class="text-center">20/35</th>
				        <th class="text-center">20/30</th>
				        <th class="text-center">20/25</th>
				        <th class="text-center">20/22</th>
				        <th class="text-center">20/20</th>
				        <th class="text-center">20/18</th>
				        <th class="text-center">20/17</th>
				        <th class="text-center">20/15</th>
				        <th class="text-center">20/10</th>
			      	</tr>
			    </thead>
			    <tbody>
			      <tr class="text-center">
			      <?php 
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/200" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/100" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/70" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/50" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/40" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/35" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/30" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/25" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/22" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/20" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/18" ) {
			      	echo "<label>X</label> </td>";
			      }    
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/17" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/15" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ambos_ojos == "20/10" ) {
			      	echo "<label>X</label> </td>";
			      }   
			      ?>
			      </tr>
			    </tbody>
			</table>
	  	</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">AGUDEZA VISUAL VISION PROXIMA OJO DERECHO</div>
	  	<div class="panel-body">
	  	<div class="text-center"><label>Correccion:</label> <?php echo $con_correccion_vp_od ?></div>
			<table class="table table-bordered">
			    <thead>
			      	<tr>
				        <th class="text-center">1</th>
				        <th class="text-center">2</th>
				        <th class="text-center">3</th>
				        <th class="text-center">4</th>
				        <th class="text-center">5</th>
				        <th class="text-center">6</th>
				        <th class="text-center">7</th>
				        <th class="text-center">8</th>
				        <th class="text-center">9</th>
				        <th class="text-center">10</th>
				        <th class="text-center">11</th>
				        <th class="text-center">12</th>
				        <th class="text-center">13</th>
				        <th class="text-center">14</th>
			      	</tr>
			   		<tr>
				        <th class="text-center">20/200</th>
				        <th class="text-center">20/100</th>
				        <th class="text-center">20/70</th>
				        <th class="text-center">20/50</th>
				        <th class="text-center">20/40</th>
				        <th class="text-center">20/35</th>
				        <th class="text-center">20/30</th>
				        <th class="text-center">20/25</th>
				        <th class="text-center">20/22</th>
				        <th class="text-center">20/20</th>
				        <th class="text-center">20/18</th>
				        <th class="text-center">20/17</th>
				        <th class="text-center">20/15</th>
				        <th class="text-center">20/10</th>
			      	</tr>
			    </thead>
			    <tbody>
			      <tr class="text-center">
			      <?php 
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/200" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/100" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/70" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/50" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/40" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/35" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/30" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/25" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/22" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/20" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/18" ) {
			      	echo "<label>X</label> </td>";
			      }    
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/17" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/15" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_derecho == "20/10" ) {
			      	echo "<label>X</label> </td>";
			      }   
			      ?>
			      </tr>
			    </tbody>
			</table>
	  	</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">AGUDEZA VISUAL VISION PROXIMA OJO IZQUIERDO</div>
	  	<div class="panel-body">
	  	<div class="text-center"><label>Correccion:</label> <?php echo $con_correccion_vp_oi ?></div>
			<table class="table table-bordered">
			    <thead>
			      	<tr>
				        <th class="text-center">1</th>
				        <th class="text-center">2</th>
				        <th class="text-center">3</th>
				        <th class="text-center">4</th>
				        <th class="text-center">5</th>
				        <th class="text-center">6</th>
				        <th class="text-center">7</th>
				        <th class="text-center">8</th>
				        <th class="text-center">9</th>
				        <th class="text-center">10</th>
				        <th class="text-center">11</th>
				        <th class="text-center">12</th>
				        <th class="text-center">13</th>
				        <th class="text-center">14</th>
			      	</tr>
			   		<tr>
				        <th class="text-center">20/200</th>
				        <th class="text-center">20/100</th>
				        <th class="text-center">20/70</th>
				        <th class="text-center">20/50</th>
				        <th class="text-center">20/40</th>
				        <th class="text-center">20/35</th>
				        <th class="text-center">20/30</th>
				        <th class="text-center">20/25</th>
				        <th class="text-center">20/22</th>
				        <th class="text-center">20/20</th>
				        <th class="text-center">20/18</th>
				        <th class="text-center">20/17</th>
				        <th class="text-center">20/15</th>
				        <th class="text-center">20/10</th>
			      	</tr>
			    </thead>
			    <tbody>
			      <tr class="text-center">
			      <?php 
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/200" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/100" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/70" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/50" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/40" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/35" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/30" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/25" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/22" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/20" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/18" ) {
			      	echo "<label>X</label> </td>";
			      }    
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/17" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/15" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($vision_proxima_ojo_izquierdo == "20/10" ) {
			      	echo "<label>X</label> </td>";
			      }   
			      ?>
			      </tr>
			    </tbody>
			</table>
	  	</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">PERCEPCION DE PROFUNDIDAD</div>
	  	<div class="panel-body">
			<table class="table table-bordered">
			    <thead>
			      	<tr>
				        <th class="text-center"><label>1</label></th>
				        <th class="text-center"><label>2</label></th>
				        <th class="text-center"><label>3</label></th>
				        <th class="text-center"><label>4</label></th>
				        <th class="text-center"><label>5</label></th>
				        <th class="text-center"><label>6</label></th>
				        <th class="text-center"><label>7</label></th>
				        <th class="text-center"><label>8</label></th>
				        <th class="text-center"><label>9</label></th>
			      	</tr>
			   		<tr>
				        <th class="text-center"><label>Abajo</label></th>
				        <th class="text-center"><label>Izquierda</label></th>
				        <th class="text-center"><label>Abajo</label></th>
				        <th class="text-center"><label>P. Superior</label></th>
				        <th class="text-center"><label>P. Superior</label></th>
				        <th class="text-center"><label>Izquierda</label></th>
				        <th class="text-center"><label>Derecha</label></th>
				        <th class="text-center"><label>Izquierda</label></th>
				        <th class="text-center"><label>Derecha</label></th>
				    </tr>
			      	<tr>
				        <th class="text-center"><label>400</label></th>
				        <th class="text-center"><label>200</label></th>
				        <th class="text-center"><label>100</label></th>
				        <th class="text-center"><label>70</label></th>
				        <th class="text-center"><label>50</label></th>
				        <th class="text-center"><label>40</label></th>
				        <th class="text-center"><label>30</label></th>
				        <th class="text-center"><label>25</label></th>
				        <th class="text-center"><label>20</label></th>
			      	</tr>			      	

			    </thead>
			    <tbody>
			      <tr class="text-center">
			      <?php 
			      echo "<td>";
			      if ($percepcion_profundidad == "Abajo 400" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($percepcion_profundidad == "Izquierda 200" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($percepcion_profundidad == "Abajo 100" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($percepcion_profundidad == "Superior 70" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($percepcion_profundidad == "Superior 50" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($percepcion_profundidad == "Izquierda 40" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($percepcion_profundidad == "Derecha 30" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($percepcion_profundidad == "Izquierda 25" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($percepcion_profundidad == "Derecha 20" ) {
			      	echo "<label>X</label> </td>";
			      }  
			      ?>
			      </tr>
			    </tbody>
			</table>
	  	</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">PERCEPCION DEL COLOR</div>
	  	<div class="panel-body">
			<table class="table table-bordered">
			    <thead>
			      	<tr>
				        <th class="text-center"><label>1</label></th>
				        <th class="text-center"><label>2</label></th>
				        <th class="text-center"><label>3</label></th>
				        <th class="text-center"><label>4</label></th>
				        <th class="text-center"><label>5</label></th>
				        <th class="text-center"><label>6</label></th>
			      	</tr>		      	
			    </thead>
			    <tbody>
			      <tr class="text-center">
			      <?php 
			      echo "<td>";
			      if ($percepcion_color == "12" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($percepcion_color == "5" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($percepcion_color == "26" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($percepcion_color == "6" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($percepcion_color == "16" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($percepcion_color == "Nada" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      
			      ?>
			      </tr>
			    </tbody>
			</table>
	  	</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">FORIA VERTICAL VISION LEJANA</div>
	  	<div class="panel-body">
			<table class="table table-bordered">
			    <thead>
			      	<tr>
				        <th class="text-center"><label>1</label></th>
				        <th class="text-center"><label>2</label></th>
				        <th class="text-center"><label>3</label></th>
				        <th class="text-center"><label>4</label></th>
				        <th class="text-center"><label>5</label></th>
				        <th class="text-center"><label>6</label></th>
				        <th class="text-center"><label>7</label></th>
			      	</tr>		      	
			    </thead>
			    <tbody>
			      <tr class="text-center">
			      <?php 
			      echo "<td>";
			      if ($foria_vertical_vision_lejana == "1" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($foria_vertical_vision_lejana == "2" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($foria_vertical_vision_lejana == "3" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_vertical_vision_lejana == "4" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_vertical_vision_lejana == "5" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_vertical_vision_lejana == "6" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_vertical_vision_lejana == "7" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      			      
			      ?>
			      </tr>
			    </tbody>
			</table>
	  	</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">FORIA HORIZONTAL VISION LEJANA</div>
	  	<div class="panel-body">
			<table class="table table-bordered">
			    <thead>
			      	<tr>
				        <th class="text-center"><label>1</label></th>
				        <th class="text-center"><label>2</label></th>
				        <th class="text-center"><label>3</label></th>
				        <th class="text-center"><label>4</label></th>
				        <th class="text-center"><label>5</label></th>
				        <th class="text-center"><label>6</label></th>
				        <th class="text-center"><label>7</label></th>
				        <th class="text-center"><label>8</label></th>
				        <th class="text-center"><label>9</label></th>
				        <th class="text-center"><label>10</label></th>
				        <th class="text-center"><label>11</label></th>
				        <th class="text-center"><label>12</label></th>
				        <th class="text-center"><label>13</label></th>
				        <th class="text-center"><label>14</label></th>
				        <th class="text-center"><label>15</label></th>
			      	</tr>		      	
			    </thead>
			    <tbody>
			      <tr class="text-center">
			      <?php 
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "1" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "2" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "3" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "4" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "5" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "6" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "7" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "8" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "9" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "10" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "11" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "12" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "13" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "14" ) {
			      	echo "<label>X</label> </td>";
			      } 			      			       
			      echo "<td>";
			      if ($foria_horizontal_vision_lejana == "15" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      ?>
			      </tr>
			    </tbody>
			</table>
	  	</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">FORIA HORIZONTAL VISION PROXIMA</div>
	  	<div class="panel-body">
			<table class="table table-bordered">
			    <thead>
			      	<tr>
				        <th class="text-center"><label>1</label></th>
				        <th class="text-center"><label>2</label></th>
				        <th class="text-center"><label>3</label></th>
				        <th class="text-center"><label>4</label></th>
				        <th class="text-center"><label>5</label></th>
				        <th class="text-center"><label>6</label></th>
				        <th class="text-center"><label>7</label></th>
				        <th class="text-center"><label>8</label></th>
				        <th class="text-center"><label>9</label></th>
				        <th class="text-center"><label>10</label></th>
				        <th class="text-center"><label>11</label></th>
				        <th class="text-center"><label>12</label></th>
				        <th class="text-center"><label>13</label></th>
				        <th class="text-center"><label>14</label></th>
				        <th class="text-center"><label>15</label></th>
			      	</tr>		      	
			    </thead>
			    <tbody>
			      <tr class="text-center">
			      <?php 
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "1" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "2" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "3" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "4" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "5" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "6" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "7" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "8" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "9" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "10" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "11" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "12" ) {
			      	echo "<label>X</label> </td>";
			      }
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "13" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "14" ) {
			      	echo "<label>X</label> </td>";
			      } 			      			       
			      echo "<td>";
			      if ($foria_horizontal_vision_proxima == "15" ) {
			      	echo "<label>X</label> </td>";
			      } 
			      ?>
			      </tr>
			    </tbody>
			</table>
	  	</div>
	</div>
</div>

<div class="col-sm-12">
	<div class="panel panel-default">
	  	<div class="panel-heading">Resultado</div>
	  	<div class="panel-body text-center">
	  		<textarea  style="width: 1020px;" type="text" name="resultado_visiometria" rows="4" readonly="readonly"><?php echo $resultado ?></textarea>
	  		<br><br>
	  		<label>Alteracion Visual: </label> <?php echo $alteracion_visual ?>
	  	</div>
	</div>
</div>

</div><!--container-->
<?php } //if

 }//while
}else{//numrows
    //echo "<script>alert('Error, Numero de identificacion incorrecto o no registrado')</script>";
    //echo "<script>window.location = 'medico.php'</script>";
  echo '<script>
   $(document).ready(function(){
    $("#mostrarmodal").modal("show");
   });</script>';  
  } 

  ?>
<?php if ($code==255) { ?>
 <!--Error de usuario no registrado o incorrecto Interfaz Admin-->
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='admin_resultados_paciente.php';">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button onClick="window.location.href='admin_resultados_paciente.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> ERROR.</h4>
      </div>
      <div class="modal-body">
        <h5 class="text-primary text-justify"><label>El Paciente con Indentificacion Nº <i class="text-danger"><?php echo $historia; ?></i> y fecha de atencion <i class="text-danger"><?php echo $fecharegistro; ?></i> Incorrecto o no presenta Registro historico en esta area del sistema, Verifique que el numero de documento y la fecha de atencion ingresada coincidan con los registros historicos del paciente.</label></h4>      
      </div>
      <div class="modal-footer">
        <a onClick="window.location.href='admin_resultados_paciente.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>
<?php }else if ($code == 522){ ?>
 <!--Error de usuario no registrado o incorrecto Interfaz Admin-->
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='recepcion_resultados_paciente.php';">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button onClick="window.location.href='recepcion_resultados_paciente.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> ERROR.</h4>
      </div>
      <div class="modal-body">
        <h5 class="text-primary text-justify"><label>El Paciente con Indentificacion Nº <i class="text-danger"><?php echo $historia; ?></i> y fecha de atencion <i class="text-danger"><?php echo $fecharegistro; ?></i>  Incorrecto o no presenta Registro historico en esta area del sistema, Verifique que el numero de documento y la fecha de atencion ingresada coincidan con los registros historicos del paciente.</label></h4>      
      </div>
      <div class="modal-footer">
        <a onClick="window.location.href='recepcion_resultados_paciente.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>
<?php }else{ ?>
<!--Error de usuario no registrado o incorrecto-->
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='visiometria_consult.php';">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button onClick="window.location.href='visiometria_consult.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> ERROR.</h4>
      </div>
      <div class="modal-body">
        <h5 class="text-primary text-justify"><label>El Paciente con Indentificacion Nº <i class="text-danger"><?php echo $historia; ?></i> y fecha de atencion <i class="text-danger"><?php echo $fecharegistro; ?></i> Incorrecto o no presenta Registro historico en esta area del sistema, Verifique que el numero de documento y la fecha de atencion ingresada coincidan con los registros historicos del paciente.</label></h4>      
      </div>
      <div class="modal-footer">
        <a onClick="window.location.href='visiometria_consult.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>

</body>
</html>