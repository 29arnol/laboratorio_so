<?php 
 include ('includes/conexion.php'); 
 include ('bar/navbar_administracion.php'); 
?>

<!DOCTYPE html>
<html>
  <head>
  	<title>Laboratorio Salud Ocupacional</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

  </head>
    <?php 

  $area = base64_decode($_REQUEST['area']);
  if ($area==13) {
    $id = base64_decode($_REQUEST['documento']);
    $fecha_reg = base64_decode($_REQUEST['fecha_registro']);
  }else{
    $id = base64_decode($_REQUEST['paciente']);
    $fecha_reg = $_GET['registro'];
  }
      //$id = base64_decode($_REQUEST['paciente']);

    if (isset($_POST['Actualizar'])) {
      $historia = $_POST['historia'];

      $ant_personales_visiometria = $_POST['ant_personales_visiometria'];
      $ant_profesional_visiometria = $_POST['ant_profesional_visiometria'];

      $prescripcion_optica = $_POST['prescripcion_optica'];
      $ojo_derecho_35_nasal = $_POST['ojo_derecho_35_nasal'];
      $ojo_izquierdo_35_nasal = $_POST['ojo_izquierdo_35_nasal'];
      $ojo_derecho_55_temporal = $_POST['ojo_derecho_55_temporal'];
      $ojo_izquierdo_55_temporal = $_POST['ojo_izquierdo_55_temporal'];

      $ojo_derecho_70_temporal = $_POST['ojo_derecho_70_temporal'];
      $ojo_izquierdo_70_temporal = $_POST['ojo_izquierdo_70_temporal'];
      $ojo_derecho_85_temporal = $_POST['ojo_derecho_85_temporal'];
      $ojo_izquierdo_85_temporal = $_POST['ojo_izquierdo_85_temporal'];

      $campo_visual = "UPDATE `visiometria_campo_visual` SET `visiometria_ant_personales`='$ant_personales_visiometria',`visiometria_ant_profesionales`='$ant_profesional_visiometria',`prescripcion_optica`='$prescripcion_optica',`35_nasal_derecho`='$ojo_derecho_35_nasal',`55_temporal_derecho`='$ojo_derecho_55_temporal',`70_temporal_derecho`='$ojo_derecho_70_temporal',`85_temporal_derecho`='$ojo_derecho_85_temporal',`35_nasal_izquierdo`='$ojo_izquierdo_35_nasal',`55_temporal_izquierdo`='$ojo_izquierdo_55_temporal',`70_temporal_izquierdo`='$ojo_izquierdo_70_temporal',`85_temporal_izquierdo`='$ojo_izquierdo_85_temporal' WHERE paciente_visiometria=".$id."";
      $query1 = mysqli_query($conexion,$campo_visual);

      //-----------------
      if ($query1){   
        //Obtenemos El Ultimo ID Insertado
        $ver = "SELECT * FROM visiometria_campo_visual WHERE paciente_visiometria = ".$id."";
        $queryid = mysqli_query ($conexion,$ver);
        $dataid = mysqli_fetch_array($queryid);
        $idfk_campo_visual = $dataid['id'];
      }else{
        echo "<script>alert('Error de id, Intente Nuevamente')</script>";
      }
      //----------------- 

      $cc_vl_ambos_ojos = $_POST['cc_vl_ambos_ojos'];
      $vision_lejana_ambos_ojos= $_POST['vision_lejana_ambos_ojos'];


      $cc_vl_ojo_derecho = $_POST['cc_vl_ojo_izquierdo'];
      $vision_lejana_ojo_derecho = $_POST['vision_lejana_ojo_derecho'];


      $cc_vl_ojo_izquierdo = $_POST['cc_vl_ojo_izquierdo'];
      $vision_lejana_ojo_izquierdo = $_POST['vision_lejana_ojo_izquierdo'];

      $vision_lejana = "UPDATE `visiometria_vision_lejana`SET `con_correccion_vl_aj`='$cc_vl_ambos_ojos',`vision_lejana_ambos_ojos`='$vision_lejana_ambos_ojos',`con_correccion_vl_od`='$cc_vl_ojo_derecho',`vision_lejana_ojo_derecho`='$vision_lejana_ojo_derecho',`con_correccion_vl_oi`='$cc_vl_ojo_izquierdo',`vision_lejana_ojo_izquierdo`='$vision_lejana_ojo_izquierdo' WHERE id_campo_visual= ".$idfk_campo_visual."";
      $query2 = mysqli_query($conexion,$vision_lejana);

      //-----------------
      if ($query2){   
        //Obtenemos El Ultimo ID Insertado
        $ver = "SELECT * FROM visiometria_vision_lejana WHERE id_campo_visual=".$idfk_campo_visual."";
        $queryid = mysqli_query ($conexion,$ver);
        $dataid = mysqli_fetch_array($queryid);
        $idfk_vision_lejana = $dataid['id'];
      }else{
        echo "<script>alert('Error de id, Intente Nuevamente')</script>";
      }
      //----------------- 

      $cc_vp_ambos_ojos = $_POST['cc_vp_ambos_ojos'];
      $vision_proxima_ambos_ojos = $_POST['vision_proxima_ambos_ojos'];


      $cc_vp_ojo_derecho = $_POST['cc_vp_ojo_derecho'];
      $vision_proxima_ojo_derecho = $_POST['vision_proxima_ojo_derecho'];

    
      $cc_vp_ojo_izquierdo = $_POST['cc_vp_ojo_izquierdo'];
      $vision_proxima_ojo_izquierdo = $_POST['vision_proxima_ojo_izquierdo'];

      $vision_proxima = "UPDATE `visiometria_vision_proxima` SET `con_correccion_vp_ao`='$cc_vp_ambos_ojos',`vision_proxima_ambos_ojos`='$vision_proxima_ambos_ojos',`con_correccion_vp_od`='$cc_vp_ojo_derecho',`vision_proxima_ojo_derecho`='$vision_proxima_ojo_derecho',`con_correccion_vp_oi`='$cc_vp_ojo_izquierdo',`vision_proxima_ojo_izquierdo`='$vision_proxima_ojo_izquierdo' WHERE id_vision_lejana = ".$idfk_vision_lejana."";
      $query3 = mysqli_query($conexion,$vision_proxima);

      //-----------here stop------
      if ($query3){   
        //Obtenemos El Ultimo ID Insertado
        $ver = "SELECT * FROM visiometria_vision_proxima WHERE id_vision_lejana = ".$idfk_vision_lejana."";
        $queryid = mysqli_query ($conexion,$ver);
        $dataid = mysqli_fetch_array($queryid);
        $idfk_vision_proxima = $dataid['id'];
      }else{
        echo "<script>alert('Error de id, Intente Nuevamente')</script>";
      }
      //----------------- 

      $percepcion_profundidad = $_POST['percepcion_profundidad'];
      $percepcion_color = $_POST['percepcion_color'];
      $foria_vertical_lejana = $_POST['foria_vertical_lejana'];
      $foria_horizontal_lejana = $_POST['foria_horizontal_lejana'];
      $foria_vision_proxima = $_POST['foria_vision_proxima'];

      $resultado_visiometria = $_POST['resultado_visiometria'];
      $alteracion_visual = $_POST['alteracion_visual'];

      $percepciones_y_forias = "UPDATE `visiometria_percepciones_y_forias` SET `percepcion_profundidad`='$percepcion_profundidad',`percepcion_color`='$percepcion_color',`foria_vertical_vision_lejana`='$foria_vertical_lejana',`foria_horizontal_vision_lejana`='$foria_horizontal_lejana',`foria_horizontal_vision_proxima`='$foria_vision_proxima',`resultado_visiometria`='$resultado_visiometria',`alteracion_visual`='$alteracion_visual' WHERE id_vision_proxima = ".$idfk_vision_proxima." ";
      $query4 = mysqli_query($conexion,$percepciones_y_forias);

            //-----------------
      if ($query4){   
        //Obtenemos El Ultimo ID Insertado
        $ver = "SELECT * FROM visiometria_percepciones_y_forias WHERE id_vision_proxima = ".$idfk_vision_proxima."";
        $queryid = mysqli_query ($conexion,$ver);
        $dataid = mysqli_fetch_array($queryid);
        $idfk_percepciones_forias = $dataid['id'];
      }else{
        echo "<script>alert('Error de id, Intente Nuevamente')</script>";
      }
      //----------------- 
      $remision_optometria = $_POST['remision_optometria'];
      $remision_optometria_desde = $_POST['remision_optometria_desde'];
      $remision_optometria_hacia = $_POST['remision_optometria_hacia'];
      $remision_optometria_motivo = $_POST['remision_optometria_motivo'];
      $remision_optometria_pendiente = $_POST['remision_optometria_pendiente'];

     $fecha_contraremision_optometria = $_POST['fecha_contraremision_optometria'];
     $resultado_remision_optometria = $_POST['resultado_remision_optometria'];
     $recomendaciones_remision_optometria = $_POST['recomendaciones_remision_optometria'];

      $remision_oftalmologia = $_POST['remision_oftalmologia'];
      $remision_oftalmologia_desde = $_POST['remision_oftalmologia_desde'];
      $remision_oftalmologia_hacia = $_POST['remision_oftalmologia_hacia'];
      $remision_oftalmologia_motivo = $_POST['remision_oftalmologia_motivo'];
      $remision_oftalmologia_pendiente = $_POST['remision_oftalmologia_pendiente'];


      $remisiones = "UPDATE `visiometria_remisiones`SET `remision_optometria` = '$remision_optometria',`desde_optometria`='remision_optometria_desde',`hacia_optometria`='$remision_optometria_hacia',`motivo_optometria`='$remision_optometria_motivo',`resultado_remision_optometria_pendiente`='$remision_optometria_pendiente',`fecha_contra_optometria`='fecha_contraremision_optometria',`resultado_contra_optometria`='$resultado_remision_optometria',`recomendaciones_contra_optometria`='$recomendaciones_remision_optometria',`remision_oftalmologia`='remision_oftalmologia',`desde_oftalmologia`='$remision_oftalmologia_desde',`hacia_oftalmologia`='$remision_oftalmologia_hacia',`motivo_oftalmologia`='remision_oftalmologia_motivo',`resultado_remision_oftalmologia_pendiente`='$remision_optometria_pendiente' WHERE id_percepciones_forias = ".$idfk_percepciones_forias."";
      $query5 = mysqli_query($conexion,$remisiones);


      if ($query1 && $query2 && $query3 && $query4 && $query5) {
        echo "<script>alert('Datos Registrados Exitosamente')</script>";
        echo "<script>window.location = 'administracion_search.php'</script>"; 
        /*echo '<script>
         $(document).ready(function(){
          $("#datossucces").modal("show");
        });</script>';*/
      } else {
        echo "<script>alert('Error query, Intente Nuevamente')</script>";
        echo "<script>window.location = 'administracion_search.php'</script>"; 
        /*echo '<script>
         $(document).ready(function(){
          $("#datoserror").modal("show");
        });</script>';*/
      }

    }
     ?>

    <?php 

    //$fecharegistro = $_POST['fecha_registro'];


    $consult="SELECT * FROM datos_basicos AS db
    JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
    JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
    JOIN visiometria_campo_visual AS vcv ON db.id_historia = vcv.paciente_visiometria
    JOIN visiometria_vision_lejana AS vvl ON vcv.id = vvl.id_campo_visual
    JOIN visiometria_vision_proxima AS vvp ON vvl.id = vvp.id_vision_lejana
    JOIN visiometria_percepciones_y_forias AS vpf ON vvp.id = vpf.id_vision_proxima
    JOIN visiometria_remisiones AS vr ON vpf.id = vr.id_percepciones_forias
     WHERE db.id_historia='$id' OR dc.numero_documento = '$id' AND db.fecha = '$fecha_reg'";
    $query = mysqli_query($conexion,$consult);



    if (mysqli_num_rows($query) > 0){
    //cuenta el numero de filas de la consulta
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
        $ant_personales_v= $datos['antecedentes_personales'];
        $ant_personales= $datos['visiometria_ant_personales'];
        $ant_profesional_v= $datos['antecedentes_profesionales'];
        $ant_profesionales = $datos['visiometria_ant_profesionales'];

        $prescripcion_optica = $datos['prescripcion_optica'];

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
        //remisiones
        $remision_optometria = $datos['remision_optometria'];
        $desde_optometria = $datos['desde_optometria'];
        $hacia_optometria = $datos['hacia_optometria'];
        $motivo_optometria = $datos['motivo_optometria'];
        $resultado_remision_optometria_p = $datos['resultado_remision_optometria_pendiente'];
        $fecha_contra_optometria = $datos['fecha_contra_optometria'];
        $resultado_contra_optometria = $datos['resultado_contra_optometria'];
        $recomendaciones_contra_optometria = $datos['recomendaciones_contra_optometria'];

        $remision_oftalmologia = $datos['remision_oftalmologia'];
        $desde_oftalmologia = $datos['desde_oftalmologia'];
        $hacia_oftalmologia = $datos['hacia_oftalmologia'];
        $motivo_oftalmologia = $datos['motivo_oftalmologia'];
        $resultado_remision_oftalmologia_p = $datos['resultado_remision_oftalmologia_pendiente'];
        $fecha_contra_oftalmologia = $datos['fecha_contra_oftalmologia'];
        $resultado_contra_oftalmologia = $datos['resultado_contra_oftalmologia'];
        $recomendaciones_contra_oftalmologia = $datos['recomendaciones_contra_oftalmologia'];

      ?>

<body>
<br>
<form class="form" action="" method="POST" role="form">

<div class="container">

<div class="text-center text-info"><label>Actualizacion Historia Visiometria:</label></div>

<input class="form-control" type="text" name="historia" value='<?php echo $historia; ?>' readonly="readonly" style  ="display: none;">


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


    <br>
    <div class="panel panel-default">
      <div class="panel-heading">Antecedentes de Visiometria</div>
      <div class="panel-body">
        <table class="table table-bordered">    
          <tbody>
            <tr>
              <td style="width: 202px;"><div style="padding-top: 10px;" class="form-inline"><label>Personales:</label>
              <?php if ($ant_personales_v == "No Refiere") { ?>
              No Refiere <input type="checkbox" name="ant_personales_visiometria" value="No Refiere" checked>
              <?php }else{ ?>
              No Refiere <input type="checkbox" name="ant_personales_visiometria" value="No Refiere">
              <?php } ?>
              </div></td>
                <td><textarea  class="col-sm-12" type="text" name="ant_personales_visiometria" rows="3"><?php echo $ant_personales ?></textarea></td>
            </tr>
            </tr>
              <td class=""><div style="padding-top: 10px;" class="form-inline"><label>Profesionales:</label>
              <?php if ($ant_profesional_v == "No Refiere") { ?>
         
              No Refiere <input type="checkbox" name="ant_profesional_visiometria" value="No Refiere" checked>
             <?php }else{ ?>
              No Refiere <input type="checkbox" name="ant_profesional_visiometria" value="No Refiere">
              <?php } ?>
              </div></td>
                <td><textarea  class="col-sm-12" type="text" name="ant_profesional_visiometria" rows="3"><?php echo $ant_profesionales ?></textarea></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="text-center"><label>Utiliza Prescripción Óptica</label> 
    <?php if ($prescripcion_optica == "Si") { ?>
      Si <input type="radio" name="prescripcion_optica" value="Si" checked> / 
      No <input type="radio" name="prescripcion_optica" value="No"> 
    <?php }else{ ?>
      Si <input type="radio" name="prescripcion_optica" value="Si"> / 
      No <input type="radio" name="prescripcion_optica" value="No" checked>
    <?php } ?>
    </div><br>

    <div class="panel panel-default">
    <div class="panel-heading">CAMPO VISUAL</div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Campo Visual</th>
              <th>Ojo Derecho</th>
              <th>Ojo Izquierdo</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>35° Nasal</td>
              <td>
                <?php if ($nasal_derecho_35 == "X") { ?>
                  <input type="checkbox" name="ojo_derecho_35_nasal" value="X" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="ojo_derecho_35_nasal" value="X">
                <?php } ?>  
              </td>
              <td>
                <?php if ($nasal_izquierdo_35 == "X") { ?>
                  <input type="checkbox" name="ojo_izquierdo_35_nasal" value="X" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="ojo_izquierdo_35_nasal" value="X">
                <?php } ?>  
              </td>
            </tr>
            <tr>
              <td>55° Temporal</td>
              <td>
                <?php if ($temporal_derecho_55=="X") {  ?>
                  <input type="checkbox" name="ojo_derecho_55_temporal" value="X" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="ojo_derecho_55_temporal" value="X">
                <?php } ?>  
              </td>
              <td>
                <?php if ($temporal_izquierdo_55=="X") { ?>
                  <input type="checkbox" name="ojo_izquierdo_55_temporal" value="X" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="ojo_izquierdo_55_temporal" value="X">
                <?php } ?>  
              </td>
            </tr>
            <tr>
              <td>70° Temporal</td>
              <td>
                <?php if ($temporal_derecho_70 == "X") { ?>
                  <input type="checkbox" name="ojo_derecho_70_temporal" value="X" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="ojo_derecho_70_temporal" value="X">
                <?php } ?>  
              </td>
              <td>
                <?php if ($temporal_izquierdo_70 == "X") { ?>
                  <input type="checkbox" name="ojo_izquierdo_70_temporal" value="X" checked>
                <?php }else{  ?>
                  <input type="checkbox" name="ojo_izquierdo_70_temporal" value="X">
                <?php } ?>
              </td>
            </tr>
            <tr>
              <td>85° Temporal</td>
              <td>
                <?php if ($temporal_derecho_85 == "X") { ?>
                  <input type="checkbox" name="ojo_derecho_85_temporal" value="X" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="ojo_derecho_85_temporal" value="X">
                <?php } ?>  
              </td>
              <td>
                <?php if ($temporal_izquierdo_85 == "X") { ?>
                  <input type="checkbox" name="ojo_izquierdo_85_temporal" value="X" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="ojo_izquierdo_85_temporal" value="X">
                <?php } ?>  
              </td>
            </tr>
          </tbody>
        </table>
      </div>  
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">AGUDEZA VISUAL VISION LEJANA AMBOS OJOS</div>
      <div class="panel-body">
        <div class="text-center">
        <label>Correccion:</label>
        <?php if ($con_correccion_vl_aj=="Si") { ?>
          Si <input type="radio" name="cc_vl_ambos_ojos" value="Si" checked> / 
          No <input type="radio" name="cc_vl_ambos_ojos" value="No">
        <?php }else{ ?> 
          Si <input type="radio" name="cc_vl_ambos_ojos" value="Si"> / 
          No <input type="radio" name="cc_vl_ambos_ojos" value="No" checked>
        <?php } ?>  
        </div>
        <table class="table table-bordered">
          <thead>
            <tr class="text-center">
              <th>1</th>
              <th>2</th>
              <th>3</th>
              <th>4</th>
              <th>5</th>
              <th>6</th>
              <th>7</th>
              <th>8</th>
              <th>9</th>
              <th>10</th>
              <th>11</th>
              <th>12</th>
              <th>13</th>
              <th>14</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr>
              <td>20/200</td>
              <td>20/100</td>
              <td>20/70</td>
              <td>20/50</td>
              <td>20/40</td>
              <td>20/35</td>
              <td>20/30</td>
              <td>20/25</td>
              <td>20/22</td>
              <td>20/20</td>
              <td>20/18</td>
              <td>20/17</td>
              <td>20/15</td>
              <td>20/10</td>
            </tr>
            <tr>

            
              <td>
                <?php if ($vision_lejana_ambos_ojos == "20/200") { ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/200" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/200" onClick="comprobar(this)">
                <?php } ?>
              </td>
              <td>
                <?php if ($vision_lejana_ambos_ojos == "20/100") { ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/100" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/100" onClick="comprobar(this)">
                <?php } ?>
              </td>
              <td>
                <?php if ($vision_lejana_ambos_ojos == "20/70") { ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/70" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/70" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_lejana_ambos_ojos == "20/50") { ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/50" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/50" onClick="comprobar(this)">
                <?php } ?>
              </td>
              <td>
                <?php if ($vision_lejana_ambos_ojos == "20/40") { ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/40" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/40" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_lejana_ambos_ojos == "20/35") { ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/35" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/35" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_lejana_ambos_ojos == "20/30") { ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/30" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/30" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_lejana_ambos_ojos == "20/25") { ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/25" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/25" onClick="comprobar(this)">
                <?php } ?>
              </td>
              <td>
                <?php if ($vision_lejana_ambos_ojos == "20/22") { ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/22" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/22" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_lejana_ambos_ojos == "20/20") { ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/20" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/20" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_lejana_ambos_ojos == "20/18") { ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/18" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/18" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_lejana_ambos_ojos == "20/17") { ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/17" onClick="comprobar(this)">
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/17" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_lejana_ambos_ojos == "20/15") { ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/15" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/15" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_lejana_ambos_ojos == "20/10") { ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/10" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ambos_ojos" value="20/10" onClick="comprobar(this)">
                <?php } ?>  
              </td>  
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">AGUDEZA VISUAL VISION LEJANA OJO DERECHO</div>
      <div class="panel-body">
        <div class="text-center">
        <label>CC:</label>
        <?php if ($con_correccion_vl_od == "Si") { ?>
          Si <input type="radio" name="cc_vl_ojo_derecho" value="Si" checked> / 
          No <input type="radio" name="cc_vl_ojo_derecho" value="No">
        <?php }else{ ?> 
          Si <input type="radio" name="cc_vl_ojo_derecho" value="Si"> / 
          No <input type="radio" name="cc_vl_ojo_derecho" value="No" checked>
        <?php } ?>  
        </div>
        <table class="table table-bordered">
          <thead>
            <tr class="text-center">
              <th>1</th>
              <th>2</th>
              <th>3</th>
              <th>4</th>
              <th>5</th>
              <th>6</th>
              <th>7</th>
              <th>8</th>
              <th>9</th>
              <th>10</th>
              <th>11</th>
              <th>12</th>
              <th>13</th>
              <th>14</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr>
              <td>20/200</td>
              <td>20/100</td>
              <td>20/70</td>
              <td>20/50</td>
              <td>20/40</td>
              <td>20/35</td>
              <td>20/30</td>
              <td>20/25</td>
              <td>20/22</td>
              <td>20/20</td>
              <td>20/18</td>
              <td>20/17</td>
              <td>20/15</td>
              <td>20/10</td>
            </tr>
            <tr>
              <td>
                <?php if ($vision_lejana_ojo_derecho == "20/200") { ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/200" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/200" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_lejana_ojo_derecho == "20/100") { ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/100" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/100" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_lejana_ojo_derecho == "20/70") { ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/70" onClick="comprobar(this)" checked>
                <?php }else{ ?> 
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/70" onClick="comprobar(this)">
                <?php } ?>   
              </td>
              <td>
                <?php if ($vision_lejana_ojo_derecho == "20/50") { ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/50" onClick="comprobar(this)" checked>
                <?php }else{ ?> 
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/50" onClick="comprobar(this)">
                <?php } ?>   
              </td>
              <td>
                <?php if ($vision_lejana_ojo_derecho == "20/40") { ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/40" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/40" onClick="comprobar(this)">
                <?php } ?> 
              </td>
              <td>
                <?php if ($vision_lejana_ojo_derecho == "20/35") { ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/35" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/35" onClick="comprobar(this)">
                <?php } ?> 
              </td>
              <td>
                <?php if ($vision_lejana_ojo_derecho == "20/30") { ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/30" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/30" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_lejana_ojo_derecho == "20/25") { ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/25" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/25" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_lejana_ojo_derecho == "20/22") { ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/22" onClick="comprobar(this)">
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/22" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_lejana_ojo_derecho == "20/20") { ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/20" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/20" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_lejana_ojo_derecho == "20/18") { ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/18" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/18" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_lejana_ojo_derecho == "20/17") { ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/17" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/17" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_lejana_ojo_derecho == "20/15") { ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/15" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/15" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_lejana_ojo_derecho == "20/10") { ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/10" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_derecho" value="20/10" onClick="comprobar(this)">
                <?php } ?>    
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">AGUDEZA VISUAL VISION LEJANA OJO IZQUIERDO</div>
      <div class="panel-body">
        <div class="text-center">
        <label>CC:</label> 
          <?php if ($con_correccion_vl_oi == "Si") { ?>
            Si <input type="radio" name="cc_vl_ojo_izquierdo" value="Si" checked> / 
            No <input type="radio" name="cc_vl_ojo_izquierdo" value="No">
          <?php }else{ ?>
            Si <input type="radio" name="cc_vl_ojo_izquierdo" value="Si"> / 
            No <input type="radio" name="cc_vl_ojo_izquierdo" value="No" checked>
          <?php } ?>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr class="text-center">
              <th>1</th>
              <th>2</th>
              <th>3</th>
              <th>4</th>
              <th>5</th>
              <th>6</th>
              <th>7</th>
              <th>8</th>
              <th>9</th>
              <th>10</th>
              <th>11</th>
              <th>12</th>
              <th>13</th>
              <th>14</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr>
              <td>20/200</td>
              <td>20/100</td>
              <td>20/70</td>
              <td>20/50</td>
              <td>20/40</td>
              <td>20/35</td>
              <td>20/30</td>
              <td>20/25</td>
              <td>20/22</td>
              <td>20/20</td>
              <td>20/18</td>
              <td>20/17</td>
              <td>20/15</td>
              <td>20/10</td>
            </tr>
            <tr>
              <td>
                <?php if ($vision_lejana_ojo_izquierdo == "20/200") { ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/200" onClick="comprobar(this)" checked>
                <?php }else{ ?>  
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/200" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_lejana_ojo_izquierdo == "20/100") { ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/100" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/100" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_lejana_ojo_izquierdo == "20/70") { ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/70" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/70" onClick="comprobar(this)">
                <?php } ?>
              </td>
              <td>
                <?php if ($vision_lejana_ojo_izquierdo == "20/50") { ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/50" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/50" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_lejana_ojo_izquierdo == "20/40") { ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/40" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/40" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_lejana_ojo_izquierdo == "20/35") { ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/35" onClick="comprobar(this)" checked>
                <?php }else{ ?> 
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/35" onClick="comprobar(this)">
                <?php } ?>   
              </td>
              <td>
                <?php if ($vision_lejana_ojo_izquierdo == "20/30") { ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/30" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/30" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_lejana_ojo_izquierdo == "20/25") { ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/25" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/25" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_lejana_ojo_izquierdo == "20/22") { ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/22" onClick="comprobar(this)" checked>
                <?php }else{ ?> 
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/22" onClick="comprobar(this)">
                <?php } ?> 
              </td>
              <td>
                <?php if ($vision_lejana_ojo_izquierdo == "20/20") { ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/20" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/20" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_lejana_ojo_izquierdo == "20/18") { ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/18" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/18" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_lejana_ojo_izquierdo == "20/17") { ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/17" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/17" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_lejana_ojo_izquierdo == "20/15") { ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/15" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/15" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_lejana_ojo_izquierdo == "20/10") { ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/10" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_lejana_ojo_izquierdo" value="20/10" onClick="comprobar(this)">
                <?php } ?>  
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">AGUDEZA VISUAL VISION PROXIMA AMBOS OJOS</div>
      <div class="panel-body">
        <div class="text-center">
        <label>CC:</label>
          <?php if ($con_correccion_vp_ao == "Si") { ?>
            Si <input type="radio" name="cc_vp_ambos_ojos" value="Si" checked> / 
            No <input type="radio" name="cc_vp_ambos_ojos" value="No">          
          <?php }else{ ?> 
            Si <input type="radio" name="cc_vp_ambos_ojos" value="Si"> / 
            No <input type="radio" name="cc_vp_ambos_ojos" value="No" checked>
          <?php } ?>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr class="text-center">
              <th>1</th>
              <th>2</th>
              <th>3</th>
              <th>4</th>
              <th>5</th>
              <th>6</th>
              <th>7</th>
              <th>8</th>
              <th>9</th>
              <th>10</th>
              <th>11</th>
              <th>12</th>
              <th>13</th>
              <th>14</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr>
              <td>20/200</td>
              <td>20/100</td>
              <td>20/70</td>
              <td>20/50</td>
              <td>20/40</td>
              <td>20/35</td>
              <td>20/30</td>
              <td>20/25</td>
              <td>20/22</td>
              <td>20/20</td>
              <td>20/18</td>
              <td>20/17</td>
              <td>20/15</td>
              <td>20/10</td>
            </tr>
            <tr>
              <td>
                <?php if ($vision_proxima_ambos_ojos == "20/200") { ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/200" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/200" onClick="comprobar(this)">
                <?php } ?>
              </td>
              <td>
                <?php if ($vision_proxima_ambos_ojos == "20/100") { ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/100" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/100" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_proxima_ambos_ojos == "20/70") { ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/70" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/70" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_proxima_ambos_ojos == "20/50") { ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/50" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/50" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_proxima_ambos_ojos == "20/40") { ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/40" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/40" onClick="comprobar(this)">
                <?php } ?>
              </td>
              <td>
                <?php if ($vision_proxima_ambos_ojos == "20/35") { ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/35" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/35" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_proxima_ambos_ojos == "20/30") { ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/30" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/30" onClick="comprobar(this)">
                <?php } ?>
              </td>
              <td>
                <?php if ($vision_proxima_ambos_ojos == "20/25") { ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/25" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/25" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_proxima_ambos_ojos == "20/22") { ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/22" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/22" onClick="comprobar(this)">
                <?php } ?>
              </td>
              <td>
                <?php if ($vision_proxima_ambos_ojos == "20/20") { ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/20" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/20" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_proxima_ambos_ojos == "20/18") { ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/18" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/18" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_proxima_ambos_ojos == "20/17") { ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/17" onClick="comprobar(this)" checked>
                <?php }else{ ?> 
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/17" onClick="comprobar(this)">
                <?php } ?>   
              </td>
              <td>
                <?php if ($vision_proxima_ambos_ojos == "20/15") { ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/15" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/15" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_proxima_ambos_ojos == "20/10") { ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/10" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ambos_ojos" value="20/10" onClick="comprobar(this)">
                <?php } ?>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">AGUDEZA VISUAL VISION PROXIMA OJO DERECHO</div>
      <div class="panel-body">
        <div class="text-center">
        <label>CC:</label>
          <?php if ($con_correccion_vp_od == "Si") { ?>
            Si <input type="radio" name="cc_vp_ojo_derecho" value="Si" checked> / 
            No <input type="radio" name="cc_vp_ojo_derecho" value="No">
          <?php }else{ ?> 
            Si <input type="radio" name="cc_vp_ojo_derecho" value="Si"> / 
            No <input type="radio" name="cc_vp_ojo_derecho" value="No" checked>
          <?php } ?>  
        </div>
        <table class="table table-bordered">
          <thead>
            <tr class="text-center">
              <th>1</th>
              <th>2</th>
              <th>3</th>
              <th>4</th>
              <th>5</th>
              <th>6</th>
              <th>7</th>
              <th>8</th>
              <th>9</th>
              <th>10</th>
              <th>11</th>
              <th>12</th>
              <th>13</th>
              <th>14</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr>
              <td>20/200</td>
              <td>20/100</td>
              <td>20/70</td>
              <td>20/50</td>
              <td>20/40</td>
              <td>20/35</td>
              <td>20/30</td>
              <td>20/25</td>
              <td>20/22</td>
              <td>20/20</td>
              <td>20/18</td>
              <td>20/17</td>
              <td>20/15</td>
              <td>20/10</td>
            </tr>
            <tr>
              <td>
                <?php if ($vision_proxima_ojo_derecho == "20/200") { ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/200" onClick="comprobar(this)" checked>
                <?php }else{ ?> 
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/200" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_proxima_ojo_derecho == "20/100") { ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/100" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/100" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_proxima_ojo_derecho == "20/70") { ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/70" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/70" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_proxima_ojo_derecho == "20/50") { ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/50" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/50" onClick="comprobar(this)">
                <?php } ?>   
              </td>
              <td>
                <?php if ($vision_proxima_ojo_derecho == "20/40") { ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/40" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/40" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_proxima_ojo_derecho == "20/35") { ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/35" onClick="comprobar(this)" checked>
                <?php }else{ ?>  
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/35" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_proxima_ojo_derecho == "20/30") { ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/30" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/30" onClick="comprobar(this)">
                <?php } ?>
              </td>
              <td>
                <?php if ($vision_proxima_ojo_derecho == "20/25") { ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/25" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/25" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_proxima_ojo_derecho == "20/22") { ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/22" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/22" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_proxima_ojo_derecho == "20/20") { ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/20" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/20" onClick="comprobar(this)">
                <?php } ?>   
              </td>
              <td>
                <?php if ($vision_proxima_ojo_derecho == "20/18") { ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/18" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/18" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_proxima_ojo_derecho == "20/17") { ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/17" onClick="comprobar(this)" checked>
                <?php }else{ ?>  
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/17" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_proxima_ojo_derecho == "20/15") { ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/15" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_derecho" value="20/15" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td><input type="radio" name="vision_proxima_ojo_derecho" value="20/10" onClick="comprobar(this)"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">AGUDEZA VISUAL VISION PROXIMA OJO IZQUIERDO</div>
      <div class="panel-body">
        <div class="text-center">
        <label>CC:</label> 
          <?php if ($con_correccion_vl_oi == "Si") { ?>
            Si <input type="radio" name="cc_vp_ojo_izquierdo" value="Si" checked> / 
            No <input type="radio" name="cc_vp_ojo_izquierdo" value="No">
          <?php }else{ ?>
            Si <input type="radio" name="cc_vp_ojo_izquierdo" value="Si"> / 
            No <input type="radio" name="cc_vp_ojo_izquierdo" value="No" checked>
          <?php } ?>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr class="text-center">
              <th>1</th>
              <th>2</th>
              <th>3</th>
              <th>4</th>
              <th>5</th>
              <th>6</th>
              <th>7</th>
              <th>8</th>
              <th>9</th>
              <th>10</th>
              <th>11</th>
              <th>12</th>
              <th>13</th>
              <th>14</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr>
              <td>20/200</td>
              <td>20/100</td>
              <td>20/70</td>
              <td>20/50</td>
              <td>20/40</td>
              <td>20/35</td>
              <td>20/30</td>
              <td>20/25</td>
              <td>20/22</td>
              <td>20/20</td>
              <td>20/18</td>
              <td>20/17</td>
              <td>20/15</td>
              <td>20/10</td>
            </tr>
            <tr>
              <td>
                <?php if ($vision_proxima_ojo_izquierdo == "20/200") { ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/200" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/200" onClick="comprobar(this)">
                <?php } ?>
              </td>
              <td>
                <?php if ($vision_proxima_ojo_izquierdo == "20/100") { ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/100" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/100" onClick="comprobar(this)">
                <?php } ?>
              </td>
              <td>
                <?php if ($vision_proxima_ojo_izquierdo == "20/70") { ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/70" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/70" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_proxima_ojo_izquierdo == "20/50") { ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/50" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/50" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_proxima_ojo_izquierdo == "20/40") { ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/40" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/40" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_proxima_ojo_izquierdo == "20/35") { ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/35" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/35" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_proxima_ojo_izquierdo == "20/30") { ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/30" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/30" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_proxima_ojo_izquierdo == "20/25") { ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/25" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/25" onClick="comprobar(this)">
                <?php } ?>    
              </td>
              <td>
                <?php if ($vision_proxima_ojo_izquierdo == "20/22") { ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/22" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/22" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_proxima_ojo_izquierdo == "20/20") { ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/20" onClick="comprobar(this)" checked>
                <?php }else{ ?> 
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/20" onClick="comprobar(this)">
                <?php } ?>   
              </td>
              <td>
                <?php if ($vision_proxima_ojo_izquierdo == "20/18") { ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/18" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/18" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_proxima_ojo_izquierdo == "20/17") { ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/17" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/17" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_proxima_ojo_izquierdo == "20/15") { ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/15" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/15" onClick="comprobar(this)">
                <?php } ?>  
              </td>
              <td>
                <?php if ($vision_proxima_ojo_izquierdo == "20/10") { ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/10" onClick="comprobar(this)" checked>
                <?php }else{ ?>
                  <input type="radio" name="vision_proxima_ojo_izquierdo" value="20/10" onClick="comprobar(this)">
                <?php } ?>
              </td>

            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">PERCEPCION DE PROFUNDIDAD</div>
      <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
                <th>8</th>
                <th>9</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr>
                <td>Abajo</td>
                <td>Izquierda</td>
                <td>Abajo</td>
                <td>P. Superior</td>
                <td>P. Superior</td>
                <td>Izquierda</td>
                <td>Derecha</td>
                <td>Izquierda</td>
                <td>Derecha</td>
              </tr>
              <tr>
                <td>400</td>
                <td>200</td>
                <td>100</td>
                <td>70</td>
                <td>50</td>
                <td>40</td>
                <td>30</td>
                <td>25</td>
                <td>20</td>
              </tr>
              <tr>
                <td>
                  <?php if ($percepcion_profundidad == "Abajo 400") { ?>
                    <input type="radio" name="percepcion_profundidad" value="Abajo 400" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="percepcion_profundidad" value="Abajo 400" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($percepcion_profundidad == "Izquierda 200") { ?>
                    <input type="radio" name="percepcion_profundidad" value="Izquierda 200" onClick="comprobar(this)" checked>
                  <?php }else{ ?> 
                    <input type="radio" name="percepcion_profundidad" value="Izquierda 200" onClick="comprobar(this)">
                  <?php } ?>   
                </td>
                <td>
                  <?php if ($percepcion_profundidad == "Abajo 100") { ?>
                    <input type="radio" name="percepcion_profundidad" value="Abajo 100" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="percepcion_profundidad" value="Abajo 100" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($percepcion_profundidad == "Superior 70") { ?>
                    <input type="radio" name="percepcion_profundidad" value="Superior 70" onClick="comprobar(this)" checked>
                  <?php }else{ ?>  
                    <input type="radio" name="percepcion_profundidad" value="Superior 70" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($percepcion_profundidad == "Superior 50") { ?>
                    <input type="radio" name="percepcion_profundidad" value="Superior 50" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="percepcion_profundidad" value="Superior 50" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($percepcion_profundidad == "Izquierda 40") { ?>
                    <input type="radio" name="percepcion_profundidad" value="Izquierda 40" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="percepcion_profundidad" value="Izquierda 40" onClick="comprobar(this)">
                  <?php } ?>
                </td>
                <td>
                  <?php if ($percepcion_profundidad == "Derecha 30") { ?>
                    <input type="radio" name="percepcion_profundidad" value="Derecha 30" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="percepcion_profundidad" value="Derecha 30" onClick="comprobar(this)">
                  <?php } ?>
                </td>
                <td>
                  <?php if ($percepcion_profundidad == "Izquierda 25") { ?>
                    <input type="radio" name="percepcion_profundidad" value="Izquierda 25" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="percepcion_profundidad" value="Izquierda 25" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($percepcion_profundidad == "Derecha 20") { ?>
                    <input type="radio" name="percepcion_profundidad" value="Derecha 20" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="percepcion_profundidad" value="Derecha 20" onClick="comprobar(this)">
                  <?php } ?>
                </td>
              </tr>
            </tbody>
          </table>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">PERCEPCION DEL COLOR</div>
      <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr>
                <td>12</td>
                <td>5</td>
                <td>26</td>
                <td>6</td>
                <td>16</td>
                <td>Nada</td>
              </tr>
              <tr>
                <td>
                  <?php if ($percepcion_color == "12") { ?>
                    <input type="radio" name="percepcion_color" value="12" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="percepcion_color" value="12" onClick="comprobar(this)">
                  <?php } ?>
                </td>
                <td>
                  <?php if ($percepcion_color == "5") { ?>
                    <input type="radio" name="percepcion_color" value="5" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="percepcion_color" value="5" onClick="comprobar(this)">
                  <?php } ?>
                </td>
                <td>
                  <?php if ($percepcion_color == "26") { ?>
                    <input type="radio" name="percepcion_color" value="26" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="percepcion_color" value="26" onClick="comprobar(this)">
                  <?php } ?>
                </td>
                <td>
                  <?php if ($percepcion_color == "6") { ?>
                    <input type="radio" name="percepcion_color" value="6" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="percepcion_color" value="6" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($percepcion_color == "16") { ?>
                    <input type="radio" name="percepcion_color" value="16" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="percepcion_color" value="16" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($percepcion_color == "Nada") { ?>
                    <input type="radio" name="percepcion_color" value="Nada" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="percepcion_color" value="Nada" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
              </tr>
            </tbody>
          </table>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">FORIA VERTICAL VISION LEJANA</div>
      <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr>
                <td>
                  <?php if ($foria_vertical_vision_lejana == "1") { ?>
                    <input type="radio" name="foria_vertical_lejana" value="1" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_vertical_lejana" value="1" onClick="comprobar(this)">
                  <?php } ?>
                </td>
                <td>
                  <?php if ($foria_vertical_vision_lejana == "2") { ?>
                    <input type="radio" name="foria_vertical_lejana" value="2" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_vertical_lejana" value="2" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($foria_vertical_vision_lejana == "3") { ?>
                    <input type="radio" name="foria_vertical_lejana" value="3" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_vertical_lejana" value="3" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($foria_vertical_vision_lejana == "4") { ?>
                    <input type="radio" name="foria_vertical_lejana" value="4" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_vertical_lejana" value="4" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($foria_vertical_vision_lejana == "5") { ?>
                    <input type="radio" name="foria_vertical_lejana" value="5" onClick="comprobar(this)">
                  <?php }else{  ?>
                    <input type="radio" name="foria_vertical_lejana" value="5" onClick="comprobar(this)">
                  <?php } ?>
                </td>
                <td>
                  <?php if ($foria_vertical_vision_lejana == "6") { ?>
                    <input type="radio" name="foria_vertical_lejana" value="6" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_vertical_lejana" value="6" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($foria_vertical_vision_lejana == "7") { ?>
                    <input type="radio" name="foria_vertical_lejana" value="7" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_vertical_lejana" value="7" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
              </tr>
            </tbody>
          </table>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">FORIA HORIZONTAL VISION LEJANA</div>
      <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
                <th>8</th>
                <th>9</th>
                <th>10</th>
                <th>11</th>
                <th>12</th>
                <th>13</th>
                <th>14</th>
                <th>15</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr>
                <td>
                  <?php if ($foria_horizontal_vision_lejana == "1") { ?>
                    <input type="radio" name="foria_horizontal_lejana" value="1" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_horizontal_lejana" value="1" onClick="comprobar(this)">
                  <?php } ?>    
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_lejana == "2") { ?>
                    <input type="radio" name="foria_horizontal_lejana" value="2" onClick="comprobar(this)" checked>
                  <?php }else{ ?> 
                    <input type="radio" name="foria_horizontal_lejana" value="2" onClick="comprobar(this)">
                  <?php } ?>   
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_lejana == "3") { ?>
                    <input type="radio" name="foria_horizontal_lejana" value="3" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_horizontal_lejana" value="3" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_lejana == "4") { ?>
                    <input type="radio" name="foria_horizontal_lejana" value="4" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_horizontal_lejana" value="4" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_lejana == "5") { ?>
                    <input type="radio" name="foria_horizontal_lejana" value="5" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_horizontal_lejana" value="5" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_lejana == "6") { ?>
                    <input type="radio" name="foria_horizontal_lejana" value="6" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_horizontal_lejana" value="6" onClick="comprobar(this)">
                  <?php } ?>    
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_lejana == "7") { ?>
                    <input type="radio" name="foria_horizontal_lejana" value="7" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_horizontal_lejana" value="7" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_lejana == "8") { ?>
                    <input type="radio" name="foria_horizontal_lejana" value="8" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_horizontal_lejana" value="8" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_lejana == "9") { ?>
                    <input type="radio" name="foria_horizontal_lejana" value="9" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_horizontal_lejana" value="9" onClick="comprobar(this)">
                  <?php } ?>    
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_lejana == "10") { ?>
                    <input type="radio" name="foria_horizontal_lejana" value="10" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_horizontal_lejana" value="10" onClick="comprobar(this)">
                  <?php } ?>    
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_lejana == "11") { ?>
                    <input type="radio" name="foria_horizontal_lejana" value="11" onClick="comprobar(this)" checked>
                  <?php }else{ ?> 
                    <input type="radio" name="foria_horizontal_lejana" value="11" onClick="comprobar(this)">
                  <?php } ?>   
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_lejana == "12") { ?>
                    <input type="radio" name="foria_horizontal_lejana" value="12" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_horizontal_lejana" value="12" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_lejana == "13") { ?>
                    <input type="radio" name="foria_horizontal_lejana" value="13" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_horizontal_lejana" value="13" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_lejana == "14") { ?>
                    <input type="radio" name="foria_horizontal_lejana" value="14" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_horizontal_lejana" value="14" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_lejana == "15") { ?>
                    <input type="radio" name="foria_horizontal_lejana" value="15" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_horizontal_lejana" value="15" onClick="comprobar(this)">
                  <?php } ?>
                </td>
              </tr>
            </tbody>
          </table>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">FORIA HORIZONTAL VISION PROXIMA</div>
      <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
                <th>8</th>
                <th>9</th>
                <th>10</th>
                <th>11</th>
                <th>12</th>
                <th>13</th>
                <th>14</th>
                <th>15</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr>
                <td>
                  <?php if ($foria_horizontal_vision_proxima == "1") { ?>
                    <input type="radio" name="foria_vision_proxima" value="1" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_vision_proxima" value="1" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_proxima == "2") { ?>
                    <input type="radio" name="foria_vision_proxima" value="2" onClick="comprobar(this)" checked>
                  <?php }else{ ?> 
                    <input type="radio" name="foria_vision_proxima" value="2" onClick="comprobar(this)">
                  <?php } ?>   
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_proxima == "3") { ?>
                    <input type="radio" name="foria_vision_proxima" value="3" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_vision_proxima" value="3" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_proxima == "4") { ?>
                    <input type="radio" name="foria_vision_proxima" value="4" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_vision_proxima" value="4" onClick="comprobar(this)">
                  <?php } ?>    
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_proxima == "5") { ?>
                    <input type="radio" name="foria_vision_proxima" value="5" onClick="comprobar(this)" checked>
                  <?php }else{ ?> 
                    <input type="radio" name="foria_vision_proxima" value="5" onClick="comprobar(this)">
                  <?php } ?> 
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_proxima == "6") { ?>
                    <input type="radio" name="foria_vision_proxima" value="6" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_vision_proxima" value="6" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_proxima == "7") { ?>
                    <input type="radio" name="foria_vision_proxima" value="7" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_vision_proxima" value="7" onClick="comprobar(this)">
                  <?php } ?> 
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_proxima == "8") { ?>
                    <input type="radio" name="foria_vision_proxima" value="8" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_vision_proxima" value="8" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_proxima == "9") { ?>
                    <input type="radio" name="foria_vision_proxima" value="9" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_vision_proxima" value="9" onClick="comprobar(this)">
                  <?php } ?>
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_proxima == "10") { ?>
                    <input type="radio" name="foria_vision_proxima" value="10" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_vision_proxima" value="10" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_proxima == "11") { ?>
                    <input type="radio" name="foria_vision_proxima" value="11" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_vision_proxima" value="11" onClick="comprobar(this)">
                  <?php } ?>
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_proxima == "12") { ?>
                    <input type="radio" name="foria_vision_proxima" value="12" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_vision_proxima" value="12" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_proxima == "13") { ?>
                    <input type="radio" name="foria_vision_proxima" value="13" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_vision_proxima" value="13" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_proxima == "14") { ?>
                    <input type="radio" name="foria_vision_proxima" value="14" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_vision_proxima" value="14" onClick="comprobar(this)">
                  <?php } ?>
                </td>
                <td>
                  <?php if ($foria_horizontal_vision_proxima == "15") { ?>
                    <input type="radio" name="foria_vision_proxima" value="15" onClick="comprobar(this)" checked>
                  <?php }else{ ?>
                    <input type="radio" name="foria_vision_proxima" value="15" onClick="comprobar(this)">
                  <?php } ?>  
                </td>
              </tr>
            </tbody>
          </table>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">Diagnostico</div>
      <div class="panel-body">
        <div class="container-fluid">
          <div class="panel-default">
            <label>Resultado:</label>
            <textarea  class="col-sm-12" type="text" name="resultado_visiometria" rows="4"><?php echo $resultado ?></textarea>
          </div>


          <table class="table table-bordered">
            <tbody>
              <tr>
                <td><label>Presenta alteración visual:</label> 
                  <?php if ($alteracion_visual == "Si") { ?>
                    Si <input type="radio" name="alteracion_visual" value="Si" checked> / 
                    No <input type="radio" name="alteracion_visual" value="No"> 
                  <?php }else{ ?>
                    Si <input type="radio" name="alteracion_visual" value="Si"> / 
                    No <input type="radio" name="alteracion_visual" value="No" checked> 
                  <?php } ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>  
      </div>  
    </div>   
  <br>

<div class="panel panel-default">
  <div class="panel-heading">  
    <div class="text-center"><label class="text-info">Remisión a Optometría:</label>
    <?php if ($remision_optometria=="Si") { ?>
      Si <input type="radio" name="remision_optometria" value="Si" checked> / 
      NO <input type="radio" name="remision_optometria" value="No">
    <?php }else{ ?> 
      Si <input type="radio" name="remision_optometria" value="Si"> / 
      NO <input type="radio" name="remision_optometria" value="No" checked>
    <?php } ?>
    </div>
  </div>
  <div class="panel-body">

    <div class="col-sm-6">
      <label>Desde:</label>
      <input class="form-control" type="text" name="remision_optometria_desde" value="<?php echo $desde_optometria ?>">
    </div>

    <div class="col-sm-6">
      <label>Hacia:</label>
      <input class="form-control" type="text" name="remision_optometria_hacia" value="<?php echo $hacia_optometria ?>">
      <br>
    </div>

    <th class="text-center">Motivo:</th>
      <td><textarea class="form-control col-sm-12" type="text" name="remision_optometria_motivo" rows="3"><?php echo $motivo_optometria ?></textarea></td>
      <br><br>
      <div class="text-center"><label class="text-danger">Resultado de Remisión a Optometría Pendiente</label>
      <?php if ($resultado_remision_optometria_p == "Si") { ?>
        Si <input type="radio" name="remision_optometria_pendiente" value="Si" checked> / 
        NO <input type="radio" name="remision_optometria_pendiente" value="No">
      <?php }else{ ?> 
        Si <input type="radio" name="remision_optometria_pendiente" value="Si"> / 
        NO <input type="radio" name="remision_optometria_pendiente" value="No" checked>
      <?php } ?>
      </div>
  </div>
</div>


<div class="text-center"><a type="" data-toggle="collapse" data-target="#demo">Contraremision Optometría</a></div>
<div id="demo" class="collapse">
  <br>
  <div class="form-inline">
    <label>Fecha Contra-Remision_optometria:</label>
    <input class="form-control" type="date" name="fecha_contraremision_optometria" value="fecha_contra_optometria"><br><br>
  </div>    
  <br>

  <label>Resultado:</label>
  <textarea class="form-control" type="text" name="resultado_remision_optometria" rows="4"><?php echo $resultado_contra_optometria ?></textarea>
  <br> 
  <label>Recomendaciones:</label>
  <textarea class="form-control" type="text" name="recomendaciones_remision_optometria" rows="4"><?php echo $recomendaciones_contra_optometria ?></textarea>
</div>   
<br>

<div class="panel panel-default">
  <div class="panel-heading">  
    <div class="text-center"><label class="text-info">Remisión a Oftalmología:</label>
      <?php if ($remision_oftalmologia == "Si") { ?>
        Si <input type="radio" name="remision_oftalmologia" value="Si" checked> / 
        NO <input type="radio" name="remision_oftalmologia" value="No">
      <?php } ?> 
        Si <input type="radio" name="remision_oftalmologia" value="Si"> / 
        NO <input type="radio" name="remision_oftalmologia" value="No" checked>
    </div>
  </div>
  <div class="panel-body">

    <div class="col-sm-6">
      <label>Desde:</label>
      <input class="form-control" type="text" name="remision_oftalmologia_desde" value="<?php echo $desde_oftalmologia ?>">
    </div>

    <div class="col-sm-6">
      <label>Hacia:</label>
      <input class="form-control" type="text" name="remision_oftalmologia_hacia" value="<?php echo $hacia_oftalmologia ?>">
      <br>
    </div>

    <th class="text-center">Motivo:</th>
      <td><textarea class="form-control col-sm-12" type="text" name="remision_oftalmologia_motivo" rows="3"><?php echo $motivo_oftalmologia ?></textarea></td>
      <br><br>
      <div class="text-center"><label class="text-danger">Resultado de Remisión a Oftalmología Pendiente</label>
        <?php if ($resultado_remision_oftalmologia_p == "Si") { ?>
          Si <input type="radio" name="remision_oftalmologia_pendiente" value="Si" checked> / 
          NO <input type="radio" name="remision_oftalmologia_pendiente" value="No">
        <?php }else{ ?> 
          Si <input type="radio" name="remision_oftalmologia_pendiente" value="Si"> / 
          NO <input type="radio" name="remision_oftalmologia_pendiente" value="No" checked>
        <?php } ?>
      </div>
  </div>
</div>


  <div class="text-center">
    <div class="col-sm-12">
      <br> 
      <input type="submit" name="Actualizar" value="Actualizar" class="btn btn-success">
    </div>
  </div>

</div>
</div><!--container--> 
</form>
  </body>
  <?php 
    }//while
    }else{//rows
    echo '<script>
    $(document).ready(function(){
      $("#mostrarmodal").modal("show");
    });</script>';
    }
   ?>
<!--Error de usuario no registrado o incorrecto-->
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='administracion_search.php';">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button onClick="window.location.href='administracion_search.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> ERROR.</h4>
      </div>
      <div class="modal-body">
        <h4 class="text-primary">El Usuario con Indentificacion Nº <label class="text-danger"><?php echo $id; ?></label> No presenta Examen Registrado en el Sistema Concerniente al Area de Visiometria.</h4> <p>Cerciorarse de que el Paciente fue atendido en dicha fecha por el Area.</p>    
      </div>
      <div class="modal-footer">
        <a onClick="window.location.href='administracion_search.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>
  <script type="text/javascript">
    function esInteger(e) {
      var charCode 
      charCode = e.keyCode 
      status = charCode 
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
          return false
      }
      return true
    }
  </script>

<script>//DESELECCIONAR RADIO BUTTONS //<td><input type="radio" name="vision_lejana_ambos_ojos_20_200" value="20/200" onClick="comprobar(this)"></td>
var aux= new Array();

function comprobar(rad) {
   var group= rad.name;
   var val= rad.value;
   if(!aux[group]) {
      aux[group]= val;
   } else {
      if (aux[group]==val) {
         aux[group]=false;
         rad.checked=false;
      } else {
         aux[group]=val;
      }
   }
}
</script>
    <?php //include 'bar/footer.php'; ?>
</html>
