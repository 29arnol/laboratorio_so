<?php 
 include ('includes/conexion.php'); 
 include ('bar/navbar_visiometria.php'); 
 require('bar/style_bar/estilo.css'); 
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
  // Notificar solamente errores de ejecución
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

      $campo_visual = "INSERT INTO `visiometria_campo_visual`(`id`, `antecedentes_personales`, `visiometria_ant_personales`, `antecedentes_profesionales`,`visiometria_ant_profesionales`,`prescripcion_optica`,`35_nasal_derecho`,`55_temporal_derecho`,`70_temporal_derecho`,`85_temporal_derecho`,`35_nasal_izquierdo`,`55_temporal_izquierdo`,`70_temporal_izquierdo`,`85_temporal_izquierdo`, `paciente_visiometria`)
        VALUES ('NULL','$ant_personales_v','$ant_personales_visiometria','$ant_profesional_v','$ant_profesional_visiometria','$prescripcion_optica','$ojo_derecho_35_nasal','$ojo_derecho_55_temporal','$ojo_derecho_70_temporal','$ojo_derecho_85_temporal','$ojo_izquierdo_35_nasal','$ojo_izquierdo_55_temporal','$ojo_izquierdo_70_temporal','$ojo_izquierdo_85_temporal','$historiaid')";
      $query1 = mysqli_query($conexion,$campo_visual);

      //-----------------
      if ($query1){   
        //Obtenemos El Ultimo ID Insertado
        $ver = "SELECT * FROM visiometria_campo_visual ORDER BY `id` DESC limit 0,1";
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

      $vision_lejana = "INSERT INTO `visiometria_vision_lejana`(`id`,`con_correccion_vl_aj`,`vision_lejana_ambos_ojos`,`con_correccion_vl_od`,`vision_lejana_ojo_derecho`,`con_correccion_vl_oi`,`vision_lejana_ojo_izquierdo`,`id_campo_visual`)
      VALUES ('NULL', '$cc_vl_ambos_ojos', '$vision_lejana_ambos_ojos', '$cc_vl_ojo_derecho', '$vision_lejana_ojo_derecho','$cc_vl_ojo_izquierdo', '$vision_lejana_ojo_izquierdo', '$idfk_campo_visual')";
      $query2 = mysqli_query($conexion,$vision_lejana);

      //-----------------
      if ($query2){   
        //Obtenemos El Ultimo ID Insertado
        $ver = "SELECT * FROM visiometria_vision_lejana ORDER BY `id` DESC limit 0,1";
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

      $vision_proxima = "INSERT INTO `visiometria_vision_proxima`(`id`,`con_correccion_vp_ao`,`vision_proxima_ambos_ojos`,`con_correccion_vp_od`,`vision_proxima_ojo_derecho`,`con_correccion_vp_oi`,`vision_proxima_ojo_izquierdo`,`id_vision_lejana`)
      VALUES ('NULL','$cc_vp_ambos_ojos','$vision_proxima_ambos_ojos','$cc_vp_ojo_derecho','$vision_proxima_ojo_derecho','$cc_vp_ojo_izquierdo','$vision_proxima_ojo_izquierdo','$idfk_vision_lejana')";
      $query3 = mysqli_query($conexion,$vision_proxima);

      //-----------------
      if ($query3){   
        //Obtenemos El Ultimo ID Insertado
        $ver = "SELECT * FROM visiometria_vision_proxima ORDER BY `id` DESC limit 0,1";
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



      $percepciones_y_forias = "INSERT INTO `visiometria_percepciones_y_forias`(`id`,`percepcion_profundidad`,`percepcion_color`,`foria_vertical_vision_lejana`,`foria_horizontal_vision_lejana`,`foria_horizontal_vision_proxima`,`resultado_visiometria`,`alteracion_visual`,`id_vision_proxima`)
      VALUES ('NULL','$percepcion_profundidad','$percepcion_color','$foria_vertical_lejana','$foria_horizontal_lejana','$foria_vision_proxima','$resultado_visiometria','$alteracion_visual','$idfk_vision_proxima')";
      $query4 = mysqli_query($conexion,$percepciones_y_forias);

     
      $estado = "Atencion Finalizada";
      $horafinal = $_POST['horafinal'];

      $data = "UPDATE `db_estado_atencion` SET `visiometria`= '$estado' WHERE paciente = '$historiaid'"; 
      $queryestado = mysqli_query($conexion,$data);

      $data1 = "UPDATE `datos_basicos_atencion` SET `final_timevisiometria`= '$horafinal' WHERE id_datos_basicos = '$historiaid'"; 
      $querytime = mysqli_query($conexion,$data1);


      if ($query1 && $query2 && $query3 && $query4 && $queryestado && $querytime) {
        echo "<script>alert('Datos Registrados Exitosamente')</script>";
        echo "<script>window.location = 'visiometria_pacientes.php'</script>"; 
      } else {
        echo "<script>alert('Error query, Intente Nuevamente')</script>";
        echo "<script>window.location = 'visiometria_pacientes.php'</script>"; 
      }

    }
     ?>

    <script type="text/javascript" src="jvalidation/dist/jquery.validate.js"></script>



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
      $ruta_destino =   "fotografias/"; //ruta de las fotos de los paciente

            //--------
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
      JOIN visiometria_campo_visual ON  visiometria_campo_visual.paciente_visiometria = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Ingreso' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $ingreso = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
    JOIN visiometria_campo_visual ON  visiometria_campo_visual.paciente_visiometria = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Periodico' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $periodico = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN visiometria_campo_visual ON  visiometria_campo_visual.paciente_visiometria = datos_basicos.id_historia 
        WHERE datos_basicos.motivo_evaluacion = 'Retiro' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $retiro = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN visiometria_campo_visual ON visiometria_campo_visual.paciente_visiometria = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Post incapacidad' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $postincapacidad = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN visiometria_campo_visual ON visiometria_campo_visual.paciente_visiometria = datos_basicos.id_historia  
        WHERE datos_basicos.motivo_evaluacion = 'Reubicacion' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
     $reubicacion = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN visiometria_campo_visual ON visiometria_campo_visual.paciente_visiometria = datos_basicos.id_historia 
        WHERE datos_basicos.motivo_evaluacion = 'Reingreso' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $reingreso = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN visiometria_campo_visual ON visiometria_campo_visual.paciente_visiometria = datos_basicos.id_historia 
        WHERE datos_basicos.motivo_evaluacion = 'Otros' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $otros = $re{'Total'};     
    }
    //obtener fecha del ultimo registro del historial
    $consultaregistro = "SELECT 'fecha' FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN visiometria_campo_visual ON visiometria_campo_visual.paciente_visiometria = datos_basicos.id_historia
     WHERE datos_complementarios.numero_documento = ".$id." order by datos_basicos.fecha desc limit 1  ";
    $queryreg = mysqli_query($conexion,$consultaregistro);
    if (mysqli_num_rows($queryreg) > 0){  
        while ($reg = mysqli_fetch_array($queryreg)){
        $ultimo = $reg{'fecha'}; 
        //echo $ultimo;    
      }
    }else{
      $ultimo = "No hay registros de fecha";
    }  
    //alerta historial clinico
    
    echo '<script>
   $(document).ready(function(){
    $("#historial").modal("show");
   });</script>'

?>

<script type="text/javascript">

$(function(){

  /* Incluimos un método para validar el campo nombre */
  jQuery.validator.addMethod("nombres", function(value, element) {
    return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
  }); 

/* Capturar el click del botón */
$("#btn").on("click", function(){
  /* Validar el formulario */
  $("#formulario").validate({
   rules: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
   {
     //email: {required: true, email: true, minlength: 5, maxlength: 80},
     ant_personales_visiometria: {minlength: 3, maxlength: 1000},
     ant_profesional_visiometria: {minlength: 3, maxlength: 1000},
     prescripcion_optica: {required: true},
     resultado_visiometria: {required: true, minlength: 4, maxlength: 1000},     //
     alteracion_visual: {required: true},
   },
   messages: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
   {
     //email: {required: 'Este campo es requerido', email: 'El formato de email es incorrecto', minlength: 'El mínimo permitido son 5 caracteres', maxlength: 'El máximo permitido son 80 caracteres'},

     ant_personales_visiometria:{minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
     ant_profesional_visiometria:{minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
     prescripcion_optica: {required: 'Este campo es requerido'},
     resultado_visiometria:{required: 'Este campo es requerido', minlength: 'El mínimo permitido son 4 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
     alteracion_visual: {required: 'Este campo es requerido'}
     

     //--------

   }
    });
  });
});
</script>


<script type="text/javascript">

  function getTimeAJAX() {

      //GUARDAMOS EN UNA VARIABLE EL RESULTADO DE LA CONSULTA AJAX    

      var time = $.ajax({

          url: 'hora.php', //indicamos la ruta donde se genera la hora
              dataType: 'text',//indicamos que es de tipo texto plano
              async: false     //ponemos el parámetro asyn a falso
      }).responseText;

      //actualizamos el div que nos mostrará la hora actual
      document.getElementById("myWatch").value = ""+time;
  }

  //con esta funcion llamamos a la función getTimeAJAX cada segundo para actualizar el div que mostrará la hora
  setInterval(getTimeAJAX,1000);

</script>


<body>
<form class="form" action="" method="POST" role="form" id="formulario" name="form">

<div class="text-center text-info"><label>Registro Historia Visiometria:</label></div>

<div class="container">
<br><br>
<div class="col-sm-12">
  <div class="panel panel-default">
    <div class="panel-body">
      <!-- <div id='myWatch'></div> -->
      <input type="text" name="horafinal" id="myWatch">
    </div>
  </div>
</div> 

<input class="form-control" type="text" name="historia" value='<?php echo $historia; ?>' readonly="readonly" style="display: none;">

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


    <br>
    <div class="panel panel-default">
      <div class="panel-heading text-center"><label>Antecedentes de Visiometria</label></div>
      <div class="panel-body">
        <table class="table table-bordered">    
          <tbody>
            <tr>
              <td style="width: 220px;"><div style="padding-top: 10px;" class="form-inline">
                <label>Personales:</label>
                No Refiere <input type="checkbox" name="ant_personales_v" value="No Refiere" checked></div>
              </td>
              <td>
                <label for="ant_personales_visiometria" generated="true" class="error"></label><br>
                <textarea  class="col-sm-12" type="text" name="ant_personales_visiometria" rows="3"></textarea>
              </td>
            </tr>
            </tr>
              <td class=""><div style="padding-top: 10px;" class="form-inline">
                <label>Profesionales:</label>
                No Refiere <input type="checkbox" name="ant_profesional_v" value="No Refiere" checked></div>
              </td>
              <td>
                <label for="ant_profesional_visiometria" generated="true" class="error"></label><br>
                <textarea  class="col-sm-12" type="text" name="ant_profesional_visiometria" rows="3"></textarea>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="text-center">
      <label for="prescripcion_optica" generated="true" class="error"></label><br>
      <label>Utiliza Prescripción Óptica</label> 
      Si <input type="radio" name="prescripcion_optica" value="Si"> / 
      No <input type="radio" name="prescripcion_optica" value="No">
    </div><br>

    <div class="panel panel-default">
    <div class="panel-heading text-center"><label>CAMPO VISUAL</label></div>
      <div class="panel-body">
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
<?php $img = 'images/visiometria/'; ?>
    <div class="panel panel-default">
      <div class="panel-heading text-center"><a  class="screenshot" rel="<?php echo $img ?>avvlao.png"><label>AGUDEZA VISUAL VISION LEJANA AMBOS OJOS</label></a></div>
      <div class="panel-body">
        <div class="text-center">
        <label>Con Correccion:</label> Si <input type="radio" name="cc_vl_ambos_ojos" value="Si"> / No <input type="radio" name="cc_vl_ambos_ojos" value="No">
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

    <div class="panel panel-default">
      <div class="panel-heading text-center"><a class="screenshot" rel="<?php echo $img ?>avvlod.png"><label>AGUDEZA VISUAL VISION LEJANA OJO DERECHO</label></a></div>
      <div class="panel-body">
        <div class="text-center">
        <label>Con Correccion:</label> Si <input type="radio" name="cc_vl_ojo_derecho" value="Si"> / No <input type="radio" name="cc_vl_ojo_derecho" value="No">
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

    <div class="panel panel-default">
      <div class="panel-heading text-center"><a class="screenshot" rel="<?php echo $img ?>avvloi.png"><label>AGUDEZA VISUAL VISION LEJANA OJO IZQUIERDO</label></a></div>
      <div class="panel-body">
        <div class="text-center">
        <label>Con Correccion:</label> Si <input type="radio" name="cc_vl_ojo_izquierdo" value="Si"> / No <input type="radio" name="cc_vl_ojo_izquierdo" value="No">
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

    <div class="panel panel-default">
      <div class="panel-heading text-center"><a class="screenshot" rel="<?php echo $img ?>avcao.png"><label>AGUDEZA VISUAL VISION PROXIMA AMBOS OJOS</label></a></div>
      <div class="panel-body">
        <div class="text-center">
        <label>Con Correccion:</label> Si <input type="radio" name="cc_vp_ambos_ojos" value="Si"> / No <input type="radio" name="cc_vp_ambos_ojos" value="No">
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

    <div class="panel panel-default">
      <div class="panel-heading text-center"><a class="screenshot" rel="<?php echo $img ?>avodc.png"><label>AGUDEZA VISUAL VISION PROXIMA OJO DERECHO</label></a></div>
      <div class="panel-body">
        <div class="text-center">
        <label>Con Correccion:</label> Si <input type="radio" name="cc_vp_ojo_derecho" value="Si"> / No <input type="radio" name="cc_vp_ojo_derecho" value="No">
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

    <div class="panel panel-default">
      <div class="panel-heading text-center"><a class="screenshot" rel="<?php echo $img ?>avoic.png"><label>AGUDEZA VISUAL VISION PROXIMA OJO IZQUIERDO</label></a></div>
      <div class="panel-body">
        <div class="text-center">
        <label>Con Correccion:</label> Si <input type="radio" name="cc_vp_ojo_izquierdo" value="Si"> / No <input type="radio" name="cc_vp_ojo_izquierdo" value="No">
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

    <div class="panel panel-default">
      <div class="panel-heading text-center"><a class="screenshot" rel="<?php echo $img ?>pdp.png"><label>PERCEPCION DE PROFUNDIDAD</label></a></div>
      <div class="panel-body">
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

    <div class="panel panel-default">
      <div class="panel-heading text-center"><a class="screenshot" rel="<?php echo $img ?>pdc.png"><label>PERCEPCION DEL COLOR</label></a></div>
      <div class="panel-body">
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

    <div class="panel panel-default">
      <div class="panel-heading text-center"><a class="screenshot" rel="<?php echo $img ?>fvvl.png"><label>FORIA VERTICAL VISION LEJANA</label></a></div>
      <div class="panel-body">
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

    <div class="panel panel-default">
      <div class="panel-heading text-center"><a class="screenshot" rel="<?php echo $img ?>fhvl.png"><label>FORIA HORIZONTAL VISION LEJANA</label></a></div>
      <div class="panel-body">
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

    <div class="panel panel-default">
      <div class="panel-heading text-center"><a class="screenshot" rel="<?php echo $img ?>fhc.png"><label>FORIA HORIZONTAL VISION PROXIMA</label></a></div>
      <div class="panel-body">
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

    <div class="panel panel-default">
      <div class="panel-heading text-center"><label>DIAGNOSTICO</label></div>
      <div class="panel-body">
        <div class="panel-default">
          <label for="resultado_visiometria" generated="true" class="error"></label><br>
          <textarea  class="col-sm-12" type="text" name="resultado_visiometria" rows="4"></textarea>
        </div>

        <div class="text-center">
          <label>Presenta alteración visual:</label> 
          <label for="alteracion_visual" generated="true" class="error"></label><br>
          Si <input type="radio" name="alteracion_visual" value="Si"> / 
          No <input type="radio" name="alteracion_visual" value="No"> 
        </div> 
      </div>  
    </div>   

  <div class="text-center">
    <div class="col-sm-12">
      <input type="submit" name="Registrar" value="Registrar" class="btn btn-success" id="btn">
        <br><br>
    </div>
  </div>



</div><!--container--> 

</form>
<!--ALerta historial del paciente-->
 <div class="modal fade" id="historial" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> Alerta.</h4>
      </div>
      <div class="modal-body">
        <h4 class="text-primary">Historial de Atencion de Paciente con Indentificacion Nº <label class="text-danger"><?php echo $id; ?></label></h4>
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Ingreso: </strong></label> <?php echo $ingreso ?></p> 
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Periodicas: </strong></label> <?php echo $periodico ?></p> 
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Retiro: </strong></label> <?php echo $retiro ?></p>
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Post Incapacidad: </strong></label> <?php echo $postincapacidad ?></p>
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Reubicacion: </strong></label> <?php echo $reubicacion ?></p>
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Reingreso: </strong></label> <?php echo $reingreso ?></p> 
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Otros: </strong></label> <?php echo $otros ?></p>   
        <p><label>El Ultimo Registro de Evaluacion Clinica Se Realizo el dia: <strong style="color: red;"> <?php echo $ultimo ?> </strong></label> </p>
        <p><span class="glyphicon glyphicon-list-alt"></span><a target="_blank" href="visiometria_consult.php" style="color: red;"  class=""> Ir a Consultas</a></p> 
      </div>
      <div class="modal-footer">
        <a  data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>
</body>

<?php 
  }//while
  }//rows
 ?>

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

  //DESELECCIONAR RADIO BUTTONS //<td><input type="radio" name="vision_lejana_ambos_ojos_20_200" value="20/200" onClick="comprobar(this)"></td>
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
