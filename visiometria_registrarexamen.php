<?php 
   include('includes/conexion.php'); 
   include('bar/navbar_visiometria.php'); 
   include('lectorfecha.php');
   include('bar/css/estilo.css');
   $ruta_destino = "fotografias/"; //ruta de las fotos de los paciente
   $img = 'images/visiometria/';//ruta imagenes guia  
?>

<!DOCTYPE html>
<html>
  <head>
  	<title>Laboratorio Salud Ocupacional</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="lib/main.js" type="text/javascript"></script>
  </head>

<?php 
    //Notificar solamente errores de ejecución
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    if (isset($_POST['Registrar'])) {
      //$identificacion = $_POST['cedula_id'];
      //$fecha = $_POST['fecha'];
      $historiaid = $_POST['historia']; 
      $ant_personales_v = $_POST['ant_personales_v'];
      $ant_personales_visiometria = $_POST['ant_personales_visiometria'];
      $ant_profesional_v = $_POST['ant_profesional_v'];
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

      $campo_visual = "INSERT INTO `visiometria_campovisual`(`id`, `antecedentepersonal`, `desc_antpersonal`, `antecedentelaboral`,`desc_antlaboral`,`prescripcionoptica`,`35_nasal_derecho`,`55_temporal_derecho`,`70_temporal_derecho`,`85_temporal_derecho`,`35_nasal_izquierdo`,`55_temporal_izquierdo`,`70_temporal_izquierdo`,`85_temporal_izquierdo`, `paciente_visiometria`)
        VALUES ('NULL','$ant_personales_v','$ant_personales_visiometria','$ant_profesional_v','$ant_profesional_visiometria','$prescripcion_optica','$ojo_derecho_35_nasal','$ojo_derecho_55_temporal','$ojo_derecho_70_temporal','$ojo_derecho_85_temporal','$ojo_izquierdo_35_nasal','$ojo_izquierdo_55_temporal','$ojo_izquierdo_70_temporal','$ojo_izquierdo_85_temporal','$historiaid')";
      $query1 = mysqli_query($conexion,$campo_visual);
      //-----------------
      if ($query1){   
        //Obtenemos El Ultimo ID Insertado
        $ver = "SELECT * FROM visiometria_campovisual ORDER BY `id` DESC limit 0,1";
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

      $vision_lejana = "INSERT INTO `visiometria_visionlejana`(`id`,`con_correccion_vl_aj`,`vision_lejana_ambos_ojos`,`con_correccion_vl_od`,`vision_lejana_ojo_derecho`,`con_correccion_vl_oi`,`vision_lejana_ojo_izquierdo`,`id_campo_visual`)
      VALUES ('NULL', '$cc_vl_ambos_ojos', '$vision_lejana_ambos_ojos', '$cc_vl_ojo_derecho', '$vision_lejana_ojo_derecho','$cc_vl_ojo_izquierdo', '$vision_lejana_ojo_izquierdo', '$idfk_campo_visual')";
      $query2 = mysqli_query($conexion,$vision_lejana);

      //-----------------
      if ($query2){   
        //Obtenemos El Ultimo ID Insertado
        $ver = "SELECT * FROM visiometria_visionlejana ORDER BY `id` DESC limit 0,1";
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

      $vision_proxima = "INSERT INTO `visiometria_visionproxima`(`id`,`con_correccion_vp_ao`,`vision_proxima_ambos_ojos`,`con_correccion_vp_od`,`vision_proxima_ojo_derecho`,`con_correccion_vp_oi`,`vision_proxima_ojo_izquierdo`,`id_vision_lejana`)
      VALUES ('NULL','$cc_vp_ambos_ojos','$vision_proxima_ambos_ojos','$cc_vp_ojo_derecho','$vision_proxima_ojo_derecho','$cc_vp_ojo_izquierdo','$vision_proxima_ojo_izquierdo','$idfk_vision_lejana')";
      $query3 = mysqli_query($conexion,$vision_proxima);

      //-----------------
      if ($query3){   
        //Obtenemos El Ultimo ID Insertado
        $ver = "SELECT * FROM visiometria_visionproxima ORDER BY `id` DESC limit 0,1";
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

      $percepciones_y_forias = "INSERT INTO `visiometria_percepcionforia`(`id`,`percepcion_profundidad`,`percepcion_color`,`foria_vertical_vision_lejana`,`foria_horizontal_vision_lejana`,`foria_horizontal_vision_proxima`,`resultado_visiometria`,`alteracion_visual`,`id_vision_proxima`)
      VALUES ('NULL','$percepcion_profundidad','$percepcion_color','$foria_vertical_lejana','$foria_horizontal_lejana','$foria_vision_proxima','$resultado_visiometria','$alteracion_visual','$idfk_vision_proxima')";
      $query4 = mysqli_query($conexion,$percepciones_y_forias);

      $estado = "Atencion Finalizada";
      $horafinal = $_POST['hora'];

      $data = "UPDATE `db_estado_atencion` SET `visiometria`= '$estado' WHERE paciente = '$historiaid'"; 
      $queryestado = mysqli_query($conexion,$data);

      $data1 = "UPDATE `datos_basicos_atencion` SET `final_timevisiometria`= '$horafinal' WHERE id_datos_basicos = '$historiaid'"; 
      $querytime = mysqli_query($conexion,$data1);


      if ($query1 && $query2 && $query3 && $query4 && $queryestado && $querytime){
        echo "<script>alert('Datos Registrados Exitosamente')</script>";
        echo "<script>window.location = 'visiometria_citas.php'</script>"; 
      }else{
        echo "<script>alert('Error query, Intente Nuevamente')</script>";
        echo "<script>window.location = 'visiometria_citas.php'</script>"; 
      }

    }
?>
    
<?php 
  $id = $_POST['cedula'];
  $fecharegistro = $_POST['fecha_registro'];

  $consult="SELECT * FROM datos_basicos AS db
  JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
  JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
  WHERE db.fecha ='$fecharegistro' AND dc.numero_documento=".$id."";
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
  
      //--------
      $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
        JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
        JOIN visiometria_campovisual ON visiometria_campovisual.paciente_visiometria = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Ingreso' AND datos_complementarios.numero_documento=".$id." ";
        $qcont = mysqli_query($conexion,$cont);
          while ($re = mysqli_fetch_array($qcont)){
        $ingreso = $re{'Total'};      
      }
      $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
      JOIN visiometria_campovisual ON visiometria_campovisual.paciente_visiometria = datos_basicos.id_historia
      WHERE datos_basicos.motivo_evaluacion = 'Periodico' AND datos_complementarios.numero_documento=".$id." ";
        $qcont = mysqli_query($conexion,$cont);
          while ($re = mysqli_fetch_array($qcont)){
        $periodico = $re{'Total'};     
      }
      $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN visiometria_campovisual ON visiometria_campovisual.paciente_visiometria = datos_basicos.id_historia 
      WHERE datos_basicos.motivo_evaluacion = 'Retiro' AND datos_complementarios.numero_documento=".$id." ";
        $qcont = mysqli_query($conexion,$cont);
          while ($re = mysqli_fetch_array($qcont)){
        $retiro = $re{'Total'};     
      }
      $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN visiometria_campovisual ON visiometria_campovisual.paciente_visiometria = datos_basicos.id_historia
      WHERE datos_basicos.motivo_evaluacion = 'Post incapacidad' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
          while ($re = mysqli_fetch_array($qcont)){
        $postincapacidad = $re{'Total'};     
      }
      $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN visiometria_campovisual ON visiometria_campovisual.paciente_visiometria = datos_basicos.id_historia  
      WHERE datos_basicos.motivo_evaluacion = 'Reubicacion' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
          while ($re = mysqli_fetch_array($qcont)){
       $reubicacion = $re{'Total'};      
      }
      $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN visiometria_campovisual ON visiometria_campovisual.paciente_visiometria = datos_basicos.id_historia 
      WHERE datos_basicos.motivo_evaluacion = 'Reingreso' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
          while ($re = mysqli_fetch_array($qcont)){
        $reingreso = $re{'Total'};      
      }
      $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN visiometria_campovisual ON visiometria_campovisual.paciente_visiometria = datos_basicos.id_historia 
      WHERE datos_basicos.motivo_evaluacion = 'Otros' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
          while ($re = mysqli_fetch_array($qcont)){
        $otros = $re{'Total'};     
      }
      //obtener fecha del ultimo registro del historial
      $consultaregistro = "SELECT * FROM datos_basicos
        JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
        JOIN visiometria_campovisual ON visiometria_campovisual.paciente_visiometria = datos_basicos.id_historia
       WHERE datos_complementarios.numero_documento = ".$id." ORDER BY datos_basicos.fecha desc limit 1 ";
      $queryreg = mysqli_query($conexion, $consultaregistro);
      if (mysqli_num_rows($queryreg) > 0){  
        while ($reg = mysqli_fetch_array($queryreg)){
          $ultimo = $reg{'fecha'}; 
          //echo $ultimo;    
        }
      }else{
        $ultimo = "No hay registros de fecha";
      }  
      //alerta historial clinico
?>
<script type="text/javascript" src="jvalidation/dist/jquery.validate.js"></script>
<body class="size_font text-dark">
<form class="form" action="" method="POST" role="form" id="formulario" name="formulario">
<input type="text" name="hora">
<input type="text" name="historia" value='<?php echo $historia; ?>' readonly="readonly" style="display: none;">
<div class="container">
  <div class="panel panel-default">
    <div class="container-fluid">
      <div class="panel-heading text-center">
        <h6>Datos <a href="#" data-toggle="modal" data-target="#historial">Paciente</a> - Empresa</h6>
      </div>
      <div class="panel-body">  

        <div class=" size_font">
          <table class="table table-bordered">
          <thead>
            <th class="text-center">Nombres-Apellidos:</th>
            <th class="text-center">Tipo Documento:</th>
            <th class="text-center">Numero Documento:</th>
            <th class="text-center">Fotografia</th>
          </thead>
            <tbody class="text-center">
              <tr>
                <td><?php echo $datos['nombres_apellidos']; ?></td>
                <td><?php echo $datos['tipo_documento'];?></td>
                <td><?php echo $datos['numero_documento']; ?></td>
                <td rowspan="3" style="width: 180px;">
                  <img class="img-responsive img-thumbnail paciente_datos" alt="Foto del Paciente" src=<?php echo $ruta_destino."".$historia.'.png'; ?> >
                </td> 
              </tr>
              <tr>
                <td><strong>Edad:</strong></td>
                <td><strong>Fecha Nacimiento:</strong></td>
                <td><strong>Genero:</strong></td>
              </tr>
              <tr>   
                <td><?php echo $datos['edad'];?></td>
                <td><?php echo $datos['fecha_nacimiento']; ?></td>
                <td><?php echo $datos['genero']; ?></td>
              </tr>
            </tbody>
          </table>
      
          <table class="table table-bordered">
            <thead>      
              <th class="text-center">Estado Civil:</th>
              <th class="text-center">Lugar Nacimiento:</th>
              <th class="text-center">Numero Celular:</th>
              <th class="text-center">Direccion</th>
              <th class="text-center">Motivo de Evaluacion:</th>
            </thead>
            <tbody class="text-center">
              <tr>   
                <td><?php echo $datos['estado_civil']; ?></td>
                <td><?php echo $datos['lugar_nacimiento']; ?></td>
                <td><?php echo $datos['celular']; ?></td>
                <td><?php echo $datos['direccion']; ?></td>  
                <td><?php echo $datos['motivo_evaluacion']; ?></td>
              </tr>
            </tbody>
          </table>

          <table class="table table-bordered">
            <thead>
              <th class="text-center">Nombre de la Empresa:</th>
              <th class="text-center">Actividad Economica:</th>
              <th class="text-center">Ciudad:</th>
              <th class="text-center">Direccion de la empresa</th>
              <th class="text-center">Numero de Nit</th>
              <th class="text-center">Telefono</th>
            </thead>
            <tbody class="text-center">
              <tr>
                <td><?php echo $datos['nombre_empresa']; ?></td>
                <td><?php echo $datos['actividad_economica']; ?></td>
                <td><?php echo $datos['ciudad']; ?></td>
                <td><?php echo $datos['direccion_empresa']; ?></td>
                <td><?php echo $datos['numero_nit'];?></td>
                <td><?php echo $datos['telefono_empresa']; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div><br>

  <div class="panel panel-default">
    <div class="panel-heading text-center"><h6>Antecedentes de Visiometria</h6></div>
    <div class="panel-body">
      <div class="container-fluid">
        <!-- <label for="">Personales:</label> -->
        <label for="ant_personales_visiometria" generated="true" class="error"></label><br>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <div class="input-group-text size_font">
              Personales: <div class="separator"></div> 
              Si <div class="separator"></div><input type="radio" name="ant_personales_v" value="Refiere">
              <div class="separator"></div>
              No <div class="separator"></div><input type="radio" name="ant_personales_v" value="No refiere">
              <div class="separator"></div> 
              <div class="separator"></div> 
            </div>
          </div>
          <textarea class="form-control" aria-label="Text input with checkbox" name="ant_personales_visiometria" rows="1" placeholder="antecedentes personales"></textarea>
        </div>

        <div class="input-group mb-3">
          <label for="ant_profesional_visiometria" generated="true" class="error"></label><br>
          <div class="input-group-prepend">
            <div class="input-group-text size_font">
              Profesionales: <div class="separator"></div> 
              Si <div class="separator"></div><input type="radio" name="ant_profesional_v" value="Refiere">
              <div class="separator"></div>
              No <div class="separator"></div><input type="radio" name="ant_profesional_v" value="No refiere"> 
            </div>
          </div>
          <textarea class="form-control" aria-label="Text input with checkbox" name="ant_profesional_visiometria" rows="1" placeholder="antecedentes profesionales"></textarea>
        </div>
      </div>
    </div>
  </div><br>

  <div class="panel panel-default">
    <div class="panel-heading text-center"><h6>CAMPO VISUAL</h6></div>
    <div class="panel-body">
      <div class="container-fluid">
        <div class="text-center">
          <fieldset>
            <label for="prescripcion_optica" generated="true" class="error"></label><br>
            <label class="fontlistar">Utiliza Prescripción Óptica:</label> 
            Si <input type="radio" name="prescripcion_optica" value="Si">  
            No <input type="radio" name="prescripcion_optica" value="No">
          </fieldset>
        </div>

        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center">Campo Visual</th>
              <th class="text-center">Ojo Derecho</th>
              <th class="text-center">Ojo Izquierdo</th>
            </tr>
          </thead>
          <tbody>
            <tr class="text-center">
              <td>35° Nasal</td>
              <td><input type="checkbox" name="ojo_derecho_35_nasal" value="X"></td>
              <td><input type="checkbox" name="ojo_izquierdo_35_nasal" value="X"></td>
            </tr>
            <tr class="text-center">
              <td>55° Temporal</td>
              <td><input type="checkbox" name="ojo_derecho_55_temporal" value="X"></td>
              <td><input type="checkbox" name="ojo_izquierdo_55_temporal" value="X"></td>
            </tr >
            <tr class="text-center">
              <td>70° Temporal</td>
              <td><input type="checkbox" name="ojo_derecho_70_temporal" value="X"></td>
              <td><input type="checkbox" name="ojo_izquierdo_70_temporal" value="X"></td>
            </tr>
            <tr class="text-center">
              <td>85° Temporal</td>
              <td><input type="checkbox" name="ojo_derecho_85_temporal" value="X"></td>
              <td><input type="checkbox" name="ojo_izquierdo_85_temporal" value="X"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>  
  </div><br>


  <div class="panel panel-default">
    <div class="panel-heading text-center">
      <a class="screenshot" rel="<?php echo $img ?>avvlao.png"><h6>AGUDEZA VISUAL VISION LEJANA AMBOS OJOS</h6></a>
    </div>
    <div class="panel-body">
      <div class="container-fluid">
        <div class="text-center">
          <fieldset>
            <label>Con correccion:</label> 
            Si <input type="radio" name="cc_vl_ambos_ojos" value="Si">  
            No <input type="radio" name="cc_vl_ambos_ojos" value="No">
          </fieldset>
        </div>
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
              <td><input type="radio" name="vision_lejana_ambos_ojos" value="20/200" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ambos_ojos" value="20/100" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ambos_ojos" value="20/70" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ambos_ojos" value="20/50" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ambos_ojos" value="20/40" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ambos_ojos" value="20/35" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ambos_ojos" value="20/30" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ambos_ojos" value="20/25" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ambos_ojos" value="20/22" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ambos_ojos" value="20/20" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ambos_ojos" value="20/18" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ambos_ojos" value="20/17" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ambos_ojos" value="20/15" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ambos_ojos" value="20/10" onClick="comprobar(this)"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div><br>

  <div class="panel panel-default">
    <div class="panel-heading text-center">
      <a class="screenshot" rel="<?php echo $img ?>avvlod.png"><h6>AGUDEZA VISUAL VISION LEJANA OJO DERECHO</h6></a>
    </div>
    <div class="panel-body">
      <div class="container-fluid"> 
        <div class="text-center">
          <fieldset>
            <label>Con correccion:</label> 
            Si <input type="radio" name="cc_vl_ojo_derecho" value="Si">  
            No <input type="radio" name="cc_vl_ojo_derecho" value="No">
          </fieldset>
        </div>
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
              <td><input type="radio" name="vision_lejana_ojo_derecho" value="20/200" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ojo_derecho" value="20/100" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ojo_derecho" value="20/70" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ojo_derecho" value="20/50" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ojo_derecho" value="20/40" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ojo_derecho" value="20/35" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ojo_derecho" value="20/30" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ojo_derecho" value="20/25" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ojo_derecho" value="20/22" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ojo_derecho" value="20/20" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ojo_derecho" value="20/18" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ojo_derecho" value="20/17" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ojo_derecho" value="20/15" onClick="comprobar(this)"></td>
              <td><input type="radio" name="vision_lejana_ojo_derecho" value="20/10" onClick="comprobar(this)"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div><br>

    <div class="panel panel-default">
      <div class="panel-heading text-center">
        <a class="screenshot" rel="<?php echo $img ?>avvloi.png"><h6>AGUDEZA VISUAL VISION LEJANA OJO IZQUIERDO</h6></a>
      </div>
      <div class="panel-body">
        <div class="container-fluid">
          <div class="text-center">
            <fieldset>
              <label>Con correccion:</label> 
              Si <input type="radio" name="cc_vl_ojo_izquierdo" value="Si"> 
              No <input type="radio" name="cc_vl_ojo_izquierdo" value="No">
            </fieldset>
          </div>
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
                <td><input type="radio" name="vision_lejana_ojo_izquierdo" value="20/200" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_lejana_ojo_izquierdo" value="20/100" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_lejana_ojo_izquierdo" value="20/70" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_lejana_ojo_izquierdo" value="20/50" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_lejana_ojo_izquierdo" value="20/40" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_lejana_ojo_izquierdo" value="20/35" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_lejana_ojo_izquierdo" value="20/30" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_lejana_ojo_izquierdo" value="20/25" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_lejana_ojo_izquierdo" value="20/22" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_lejana_ojo_izquierdo" value="20/20" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_lejana_ojo_izquierdo" value="20/18" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_lejana_ojo_izquierdo" value="20/17" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_lejana_ojo_izquierdo" value="20/15" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_lejana_ojo_izquierdo" value="20/10" onClick="comprobar(this)"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div><br>

    <div class="panel panel-default">
      <div class="panel-heading text-center">
        <a class="screenshot" rel="<?php echo $img ?>avcao.png"><h6>AGUDEZA VISUAL VISION PROXIMA AMBOS OJOS</h6></a>
      </div>
      <div class="panel-body">
        <div class="container-fluid">
          <div class="text-center">
            <fieldset>
              <label>Con correccion:</label> 
              Si <input type="radio" name="cc_vp_ambos_ojos" value="Si"> 
              No <input type="radio" name="cc_vp_ambos_ojos" value="No">
            </fieldset>
          </div>
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
                <td><input type="radio" name="vision_proxima_ambos_ojos" value="20/200" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ambos_ojos" value="20/100" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ambos_ojos" value="20/70" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ambos_ojos" value="20/50" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ambos_ojos" value="20/40" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ambos_ojos" value="20/35" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ambos_ojos" value="20/30" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ambos_ojos" value="20/25" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ambos_ojos" value="20/22" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ambos_ojos" value="20/20" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ambos_ojos" value="20/18" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ambos_ojos" value="20/17" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ambos_ojos" value="20/15" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ambos_ojos" value="20/10" onClick="comprobar(this)"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div><br>

    <div class="panel panel-default">
      <div class="panel-heading text-center">
        <a class="screenshot" rel="<?php echo $img ?>avodc.png"><h6>AGUDEZA VISUAL VISION PROXIMA OJO DERECHO</h6></a>
      </div>
      <div class="panel-body">
        <div class="container-fluid">
          <div class="text-center">
            <fieldset>
              <label>Con correccion:</label> 
              Si <input type="radio" name="cc_vp_ojo_derecho" value="Si"> 
              No <input type="radio" name="cc_vp_ojo_derecho" value="No">
            </fieldset>
          </div>
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
                <td><input type="radio" name="vision_proxima_ojo_derecho" value="20/200" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_derecho" value="20/100" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_derecho" value="20/70" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_derecho" value="20/50" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_derecho" value="20/40" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_derecho" value="20/35" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_derecho" value="20/30" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_derecho" value="20/25" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_derecho" value="20/22" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_derecho" value="20/20" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_derecho" value="20/18" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_derecho" value="20/17" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_derecho" value="20/15" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_derecho" value="20/10" onClick="comprobar(this)"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div><br>

    <div class="panel panel-default">
      <div class="panel-heading text-center">
        <a class="screenshot" rel="<?php echo $img ?>avoic.png"><h6>AGUDEZA VISUAL VISION PROXIMA OJO IZQUIERDO</h6></a>
      </div>
      <div class="panel-body">
        <div class="container-fluid">
          <div class="text-center">
            <fieldset>
              <label>Con correccion:</label> 
              Si <input type="radio" name="cc_vp_ojo_izquierdo" value="Si"> 
              No <input type="radio" name="cc_vp_ojo_izquierdo" value="No">
            </fieldset>
          </div>
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
                <td><input type="radio" name="vision_proxima_ojo_izquierdo" value="20/200" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_izquierdo" value="20/100" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_izquierdo" value="20/70" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_izquierdo" value="20/50" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_izquierdo" value="20/40" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_izquierdo" value="20/35" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_izquierdo" value="20/30" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_izquierdo" value="20/25" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_izquierdo" value="20/22" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_izquierdo" value="20/20" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_izquierdo" value="20/18" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_izquierdo" value="20/17" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_izquierdo" value="20/15" onClick="comprobar(this)"></td>
                <td><input type="radio" name="vision_proxima_ojo_izquierdo" value="20/10" onClick="comprobar(this)"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div><br>

    <div class="panel panel-default">
      <div class="panel-heading text-center">
        <a class="screenshot" rel="<?php echo $img ?>pdp.png"><h6>PERCEPCION DE PROFUNDIDAD</h6></a>
      </div>
      <div class="panel-body">
        <div class="container-fluid">
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
                <td><input type="radio" name="percepcion_profundidad" value="Abajo 400" onClick="comprobar(this)"></td>
                <td><input type="radio" name="percepcion_profundidad" value="Izquierda 200" onClick="comprobar(this)"></td>
                <td><input type="radio" name="percepcion_profundidad" value="Abajo 100" onClick="comprobar(this)"></td>
                <td><input type="radio" name="percepcion_profundidad" value="Superior 70" onClick="comprobar(this)"></td>
                <td><input type="radio" name="percepcion_profundidad" value="Superior 50" onClick="comprobar(this)"></td>
                <td><input type="radio" name="percepcion_profundidad" value="Izquierda 40" onClick="comprobar(this)"></td>
                <td><input type="radio" name="percepcion_profundidad" value="Derecha 30" onClick="comprobar(this)"></td>
                <td><input type="radio" name="percepcion_profundidad" value="Izquierda 25" onClick="comprobar(this)"></td>
                <td><input type="radio" name="percepcion_profundidad" value="Derecha 20" onClick="comprobar(this)"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div><br>

    <div class="panel panel-default">
      <div class="panel-heading text-center">
        <a class="screenshot" rel="<?php echo $img ?>pdc.png"><h6>PERCEPCION DEL COLOR</h6></a>
      </div>
      <div class="panel-body">
        <div class="container-fluid">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center">1</th>
                <th class="text-center">2</th>
                <th class="text-center">3</th>
                <th class="text-center">4</th>
                <th class="text-center">5</th>
                <th class="text-center">6</th>
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
                <td><input type="radio" name="percepcion_color" value="12" onClick="comprobar(this)"></td>
                <td><input type="radio" name="percepcion_color" value="5" onClick="comprobar(this)"></td>
                <td><input type="radio" name="percepcion_color" value="26" onClick="comprobar(this)"></td>
                <td><input type="radio" name="percepcion_color" value="6" onClick="comprobar(this)"></td>
                <td><input type="radio" name="percepcion_color" value="16" onClick="comprobar(this)"></td>
                <td><input type="radio" name="percepcion_color" value="Nada" onClick="comprobar(this)"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div><br>

    <div class="panel panel-default">
      <div class="panel-heading text-center">
        <a class="screenshot" rel="<?php echo $img ?>fvvl.png"><h6>FORIA VERTICAL VISION LEJANA</h6></a>
      </div>
      <div class="panel-body">
        <div class="container-fluid">
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
              </tr>
            </thead>
            <tbody class="text-center">
              <tr>
                <td><input type="radio" name="foria_vertical_lejana" value="1" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_vertical_lejana" value="2" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_vertical_lejana" value="3" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_vertical_lejana" value="4" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_vertical_lejana" value="5" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_vertical_lejana" value="6" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_vertical_lejana" value="7" onClick="comprobar(this)"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div><br>

    <div class="panel panel-default">
      <div class="panel-heading text-center">
        <a class="screenshot" rel="<?php echo $img ?>fhvl.png"><h6>FORIA HORIZONTAL VISION LEJANA</h6></a>
      </div>
      <div class="panel-body">
        <div class="container-fluid">
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
                <th class="text-center">15</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr>
                <td><input type="radio" name="foria_horizontal_lejana" value="1" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_horizontal_lejana" value="2" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_horizontal_lejana" value="3" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_horizontal_lejana" value="4" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_horizontal_lejana" value="5" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_horizontal_lejana" value="6" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_horizontal_lejana" value="7" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_horizontal_lejana" value="8" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_horizontal_lejana" value="9" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_horizontal_lejana" value="10" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_horizontal_lejana" value="11" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_horizontal_lejana" value="12" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_horizontal_lejana" value="13" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_horizontal_lejana" value="14" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_horizontal_lejana" value="15" onClick="comprobar(this)"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div><br>

    <div class="panel panel-default">
      <div class="panel-heading text-center">
        <a class="screenshot" rel="<?php echo $img ?>fhc.png"><h6>FORIA HORIZONTAL VISION PROXIMA</h6></a>
      </div>
      <div class="panel-body">
        <div class="container-fluid">
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
                <th class="text-center">15</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr>
                <td><input type="radio" name="foria_vision_proxima" value="1" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_vision_proxima" value="2" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_vision_proxima" value="3" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_vision_proxima" value="4" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_vision_proxima" value="5" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_vision_proxima" value="6" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_vision_proxima" value="7" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_vision_proxima" value="8" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_vision_proxima" value="9" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_vision_proxima" value="10" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_vision_proxima" value="11" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_vision_proxima" value="12" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_vision_proxima" value="13" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_vision_proxima" value="14" onClick="comprobar(this)"></td>
                <td><input type="radio" name="foria_vision_proxima" value="15" onClick="comprobar(this)"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div><br>

    <div class="panel panel-default">
      <div class="panel-heading text-center"><h6>DIAGNOSTICO</h6></div>
      <div class="panel-body">
        <div class="container-fluid">
          <div class="panel-default">
            <label for="resultado_visiometria" generated="true" class="error"></label><br>
            <textarea class="form-control" name="resultado_visiometria" rows="2"></textarea>
          </div>

          <div class="text-center">
            <fieldset>
              <label for="alteracion_visual" generated="true" class="error"></label><br>
              <label>Presenta alteración visual:</label> 
              Si <input type="radio" name="alteracion_visual" value="Si"> 
              No <input type="radio" name="alteracion_visual" value="No">
            </fieldset> 
          </div>
        </div> 
      </div>  
    </div><br>  

    <div class="text-center">
      <div class="col-sm-12">
        <input type="submit" name="Registrar" value="Registrar" class="btn btn-success" id="btn">
          <br><br>
      </div>
    </div>
</div><!--container--> 
</form>
<!--ALerta historial del paciente-->
<?php 
  //controlador funcion lectorfecha
  $fecha1 = explode("-",date($ultimo)); 
  $fecha2 = $fecha1[0].$fecha1[1].$fecha1[2]; 
  $fechaleida = cambioFecha($fecha2); 
?>
<div class="modal fade" id="historial" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="text-danger"><i class="fas fa-address-card"></i> Historial de Atenciones</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6 class="text-primary"><i class="fas fa-archive"></i> Historial de paciente con indentificacion numero: <label for="" class="text-danger"><?php echo $id; ?></label></h6>
        <h6><i class="fas fa-notes-medical"></i> Motivo de evaluaciones <strong class="text-danger">Ingreso: </strong> <span class="badge badge-secondary"><?php echo $ingreso ?></span></h6>
        <h6><i class="fas fa-notes-medical"></i> Motivo de evaluaciones <strong class="text-danger">Periodicas: </strong> <span class="badge badge-secondary"><?php echo $periodico ?></span></h6>
        <h6><i class="fas fa-notes-medical"></i> Motivo de evaluaciones <strong class="text-danger">Retiro: </strong> <span class="badge badge-secondary"><?php echo $retiro ?></span></h6>
        <h6><i class="fas fa-notes-medical"></i> Motivo de evaluaciones <strong class="text-danger">Post Incapacidad: </strong> <span class="badge badge-secondary"><?php echo $postincapacidad ?></span></h6>
        <h6><i class="fas fa-notes-medical"></i> Motivo de evaluaciones <strong class="text-danger">Reubicacion: </strong> <span class="badge badge-secondary"><?php echo $reubicacion ?></span></h6>
        <h6><i class="fas fa-notes-medical"></i> Motivo de evaluaciones <strong class="text-danger">Reingreso: </strong> <span class="badge badge-secondary"> <?php echo $reingreso ?></span></h6>
        <h6><i class="fas fa-notes-medical"></i> Motivo de evaluaciones <strong class="text-danger">Otros: </strong> <span class="badge badge-secondary"> <?php echo $otros ?></span></h6>

        <h6 class="size_font"><i class="fas fa-calendar-plus"></i> <label for="" class="text-dark">La ultima atencion en audiometria se realizó el dia: </label><strong class="text-danger"> <?php echo $fechaleida; ?></h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" ><a target="_blank" href="audiometria_listarpacientes.php" class="fontcolor"><i class="fas fa-search"></i> Consultar</a></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="hora.js"></script>

</body>

<?php 
  }//while
  }//rows
 ?>

<script type="text/javascript">
  //historial modal
  $(document).ready(function(){
    $("#historial").modal("show");
  });

  //DESELECCIONAR RADIO BUTTONS //<td><input type="radio" name="vision_lejana_ambos_ojos_20_200" value="20/200" onClick="comprobar(this)"></td>
  var aux= new Array();
  function comprobar(rad){
    var group= rad.name;
    var val= rad.value;
    if(!aux[group]){
      aux[group]= val;
    }else{
      if (aux[group]==val) {
        aux[group]=false;
        rad.checked=false;
      }else{
        aux[group]=val;
      }
    }
  }

  //validacion
  $(function(){ 
    /*Capturar el click del botón */
    $("#btn").on("click", function(){
      /* Validar el formulario */
      $("#formulario").validate({
        rules: /*Accedemos a los campos a través de su nombre: email, nombre, edad*/
        {
         ant_personales_visiometria: {minlength: 3, maxlength: 1000},
         ant_profesional_visiometria: {minlength: 3, maxlength: 1000},
         prescripcion_optica: {required: true},
         resultado_visiometria: {required: true, minlength: 4, maxlength: 1000},     //
         alteracion_visual: {required: true},
        },
        messages: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
        {
         ant_personales_visiometria:{minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
         ant_profesional_visiometria:{minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
         prescripcion_optica: {required: 'Este campo es requerido'},
         resultado_visiometria:{required: 'Este campo es requerido', minlength: 'El mínimo permitido son 4 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
         alteracion_visual: {required: 'Este campo es requerido'}
        }
      });
    });
  });
</script>
</html>
