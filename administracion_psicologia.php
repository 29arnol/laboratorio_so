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

    <style type="text/css">

      .log_componentes{
        width: 45px; 
        margin-right: 4.0em;
      }
    </style>
  </head>
  <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> -->


<?php 

  $area = base64_decode($_REQUEST['area']);
  if ($area==15) {
    $id = base64_decode($_REQUEST['documento']);
    $fecha_reg = base64_decode($_REQUEST['fecha_registro']);
  }else{
    $id = base64_decode($_REQUEST['paciente']);
    $fecha_reg = $_GET['registro'];
  }

  if (isset($_POST['Actualizar'])) {

    $historia = $_POST['historia'];

    $orientacion = $_POST['orientacion'];
    $orientacion_hallazgo = $_POST['orientacion_hallazgo'];

    $atencion = $_POST['atencion'];
    $atencion_hallazgo = $_POST['atencion_hallazgo'];

    $sensopercepcion = $_POST['sensopercepcion'];
    $sensopercepcion_hallazgo = $_POST['sensopercepcion_hallazgo'];

    $memoria = $_POST['memoria'];
    $memoria_hallazgo = $_POST['memoria_hallazgo'];

    $pensamiento = $_POST['pensamiento'];
    $pensamiento_hallazgo = $_POST['pensamiento_hallazgo'];

    $lenguaje = $_POST['lenguaje'];
    $lenguaje_hallazgo = $_POST['lenguaje_hallazgo'];

    $concepto = $_POST['concepto'];


    $data = "UPDATE `psicologia_examen_estado_mental` SET `orientacion`='$orientacion',`orientacion_hallazgo`='$orientacion_hallazgo',`atencion_concentracion`='$atencion',`atencion_concentracion_hallazgo`='$atencion_hallazgo',`sensopercepcion`='$sensopercepcion',`sensopercepcion_hallazgo`='$sensopercepcion_hallazgo',`memoria`='$memoria',`memoria_hallazgo`='$memoria_hallazgo',`pensamiento`='$pensamiento',`pensamiento_hallazgo`='$pensamiento_hallazgo',`lenguaje`='$lenguaje',`lenguaje_hallazgo`='$lenguaje_hallazgo',`concepto`='$concepto' WHERE paciente_psicologia = ".$historia."";
    $query_data = mysqli_query($conexion,$data);

    if ($query_data) {
      echo "<script>alert('Datos Actualizados Exitosamente')</script>";
      echo "<script>window.location = 'administracion_search.php'</script>";
    }else{
      echo "<script>alert('Error query, Intente Nuevamente')</script>";
      echo "<script>window.location = 'administracion_search.php'</script>"; 
    }

  }
    //---------------------
    //$id = $_GET['historia'];
    //$fecharegistro = $_POST['fecha_registro'];

    $consult="SELECT * FROM datos_basicos AS db
    JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
    JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
    JOIN psicologia_examen_estado_mental AS peem ON db.id_historia = peem.paciente_psicologia
    WHERE db.id_historia='$id' OR dc.numero_documento = '$id' AND db.fecha = '$fecha_reg' ";
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

      $historia = $datos['id_historia'];

      //Examen Psicologico 
      $orientacion= $datos['orientacion'];
      $orientacion_hallazgo= $datos['orientacion_hallazgo'];
      $atencion_concentracion= $datos['atencion_concentracion'];
      $atencion_concentracion_hallazgo= $datos['atencion_concentracion_hallazgo'];
      $sensopercepcion= $datos['sensopercepcion'];
      $sensopercepcion_hallazgo= $datos['sensopercepcion_hallazgo'];
      $memoria= $datos['memoria'];
      $memoria_hallazgo= $datos['memoria_hallazgo'];
      $pensamiento= $datos['pensamiento'];
      $pensamiento_hallazgo= $datos['pensamiento_hallazgo'];
      $lenguaje= $datos['lenguaje'];
      $lenguaje_hallazgo= $datos['lenguaje_hallazgo'];
      $concepto= $datos['concepto'];

//--------
    $cont = "SELECT *, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
       JOIN psicologia_examen_estado_mental ON  psicologia_examen_estado_mental.paciente_psicologia = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Ingreso' AND datos_complementarios.numero_documento=".$numero_documento." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $ingreso = $re{'Total'};      
    }
    $cont = "SELECT *, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
      JOIN psicologia_examen_estado_mental ON  psicologia_examen_estado_mental.paciente_psicologia = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Periodico' AND datos_complementarios.numero_documento=".$numero_documento." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $periodico = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN psicologia_examen_estado_mental ON  psicologia_examen_estado_mental.paciente_psicologia = datos_basicos.id_historia 
        WHERE datos_basicos.motivo_evaluacion = 'Retiro' AND datos_complementarios.numero_documento=".$numero_documento." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $retiro = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN psicologia_examen_estado_mental ON  psicologia_examen_estado_mental.paciente_psicologia = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Post incapacidad' AND datos_complementarios.numero_documento=".$numero_documento." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $postincapacidad = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN psicologia_examen_estado_mental ON  psicologia_examen_estado_mental.paciente_psicologia = datos_basicos.id_historia  
        WHERE datos_basicos.motivo_evaluacion = 'Reubicacion' AND datos_complementarios.numero_documento=".$numero_documento." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
     $reubicacion = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
      JOIN psicologia_examen_estado_mental ON  psicologia_examen_estado_mental.paciente_psicologia = datos_basicos.id_historia 
        WHERE datos_basicos.motivo_evaluacion = 'Reingreso' AND datos_complementarios.numero_documento=".$numero_documento." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $reingreso = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN psicologia_examen_estado_mental ON  psicologia_examen_estado_mental.paciente_psicologia = datos_basicos.id_historia 
        WHERE datos_basicos.motivo_evaluacion = 'Otros' AND datos_complementarios.numero_documento=".$numero_documento." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $otros = $re{'Total'};     
    }
    //obtener fecha del ultimo registro del historial
    $consultaregistro = "SELECT * FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
     JOIN psicologia_examen_estado_mental ON psicologia_examen_estado_mental.paciente_psicologia = datos_basicos.id_historia
     WHERE datos_complementarios.numero_documento = ".$numero_documento." order by datos_basicos.fecha desc limit 1  ";
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
   });</script>';
  

    //}//fin if
    ?>

<body>
  <!---->
  <br>
  <div class="container">
  <br>


<form method="POST"  action="">

<input type="text" name="historia" value="<?php echo $historia ?>" style="display: none;">

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

<div class="panel panel-default">
  <div class="panel-heading text-center"><div class="text-info"><label>Examen Psicologico</label></div></div>
  <div class="panel-body">

  <table class="table table-bordered">
    <thead>
      <tr>
        <th class="text-center">Procesos</th>
        <th>Normal</th>
        <th>Difusion</th>
        <th class="text-center">Hallazgo</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <tr>
        <td style="width: 185px;"><label>Orientacion:</label></td>
        <td>
          <?php if ($orientacion == "Normal"){ ?>
            <input type="radio" name="orientacion" value="Normal" checked>
          <?php }else{ ?>
            <input type="radio" name="orientacion" value="Normal">
          <?php } ?>  
        </td>
        <td>
          <?php if ($orientacion == "Difusion"){ ?>
            <input type="radio" name="orientacion" value="Difusion" checked>
          <?php }else{ ?> 
            <input type="radio" name="orientacion" value="Difusion"> 
          <?php } ?>
        </td>
        <td><textarea style="width: 780px;" class="form-control" type="text" name="orientacion_hallazgo"><?php echo $orientacion_hallazgo ?></textarea></td>
      </tr>
      <tr>
        <td><label>Atencion Concentracion:</label></td>
        <td>
          <?php if ($atencion_concentracion=="Normal") { ?>
            <input type="radio" name="atencion" value="Normal" checked>
          <?php }else{ ?>
            <input type="radio" name="atencion" value="Normal">
          <?php } ?>  
        </td>
        <td>
          <?php if ($atencion_concentracion=="Difusion") { ?>
            <input type="radio" name="atencion" value="Difusion" checked>
          <?php }else{ ?>
            <input type="radio" name="atencion" value="Difusion">
          <?php } ?>  
        </td>
        <td><textarea style="width: 780px;" class="form-control" type="text" name="atencion_hallazgo"><?php echo $atencion_concentracion_hallazgo ?></textarea></td>
      </tr>
      <tr>
        <td><label>Sensopercepcion:</label></td>
        <td>
          <?php if ($sensopercepcion == "Normal") { ?>
            <input type="radio" name="sensopercepcion" value="Normal" checked>
          <?php }else{ ?>
            <input type="radio" name="sensopercepcion" value="Normal">
          <?php } ?>  
        </td>
        <td>
          <?php if ($sensopercepcion=="Difusion") { ?>
            <input type="radio" name="sensopercepcion" value="Difusion" checked>
          <?php }else{ ?> 
            <input type="radio" name="sensopercepcion" value="Difusion">
          <?php } ?>   
        </td>
        <td><textarea style="width: 780px;" class="form-control" type="text" name="sensopercepcion_hallazgo"><?php echo $sensopercepcion_hallazgo ?></textarea></td>
      </tr>
      <tr>
        <td><label>Memoria:</label></td>
        <td>
          <?php if ($memoria == "Normal") { ?>
            <input type="radio" name="memoria" value="Normal" checked>
          <?php }else{ ?>
            <input type="radio" name="memoria" value="Normal">
          <?php } ?>  
        </td>

        <td>
          <?php if ($memoria == "Difusion") { ?>
            <input type="radio" name="memoria" value="Difusion" checked>
          <?php }else{ ?> 
            <input type="radio" name="memoria" value="Difusion">
          <?php } ?> 
        </td>
        <td><textarea style="width: 780px;" class="form-control" type="text" name="memoria_hallazgo"><?php echo $memoria_hallazgo ?></textarea></td>
      </tr>
      <tr>
        <td><label>Pensamiento:</label></td>
        <td>
          <?php if ($pensamiento == "Normal") { ?>
            <input type="radio" name="pensamiento" value="Normal" checked>
          <?php }else{ ?>
            <input type="radio" name="pensamiento" value="Normal">
          <?php } ?>  
        </td>
        <td>
          <?php if ($pensamiento == "Difusion") { ?>
            <input type="radio" name="pensamiento" value="Difusion" checked>
          <?php }else{ ?>
            <input type="radio" name="pensamiento" value="Difusion">
          <?php } ?>  
        </td>
        <td><textarea style="width: 780px;" class="form-control" type="text" name="pensamiento_hallazgo"><?php echo $pensamiento_hallazgo ?></textarea></td>
      </tr>
      <tr>
        <td><label>Lenguaje:</label></td>
        <td>
          <?php if ($lenguaje == "Normal") { ?>
            <input type="radio" name="lenguaje" value="Normal" checked>
          <?php }else{ ?>
            <input type="radio" name="lenguaje" value="Normal">
          <?php } ?>    
        </td>
        <td>
          <?php if ($lenguaje == "Difusion") { ?>
            <input type="radio" name="lenguaje" value="Difusion" checked>
          <?php }else{ ?>
            <input type="radio" name="lenguaje" value="Difusion">
          <?php } ?>
        </td>  
        <td><textarea style="width: 780px;" class="form-control" type="text" name="lenguaje_hallazgo"><?php echo $lenguaje_hallazgo ?></textarea></td>
      </tr>
      <tr>
        <td><label>Concepto:</label></td>
        <td colspan="3"> <label>Normal:</label> 
          <?php if ($concepto == "Normal"){ ?>
            <input type="radio" name="concepto" value="Normal" checked> /  
          <?php }else{ ?>
            <input type="radio" name="concepto" value="Normal"> / 
          <?php } ?>
        <label>Anormal:</label>
          <?php if ($concepto == "Anormal") { ?>
            <input type="radio" name="concepto" value="Anormal" checked>
          <?php }else{ ?>
            <input type="radio" name="concepto" value="Anormal">
          <?php } ?>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</div>
  <div class="text-center">
    <br>
    <input type="submit" name="Actualizar" value="Actualizar" class="btn btn-info">
    <br><br>
  </div>

</form>
 
  </div>

<?php 
  }//while 

  }else{//rows
    echo '<script>
   $(document).ready(function(){
    $("#mostrarmodal").modal("show");
   });</script>';
  }

?>
  
</body>

<!--Error de usuario no registrado o incorrecto-->
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='administracion_search.php';">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button onClick="window.location.href='administracion_search.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> ERROR.</h4>
      </div>
      <div class="modal-body">
        <h4 class="text-primary">El Usuario con Indentificacion Nº <label class="text-danger"><?php echo $id; ?></label> No presenta Examen Registrado en el Sistema Concerniente al Area de Psicologia.</h4> <p>Cerciorarse de que el Paciente fue atendido en dicha fecha por el Area.</p>    
      </div>
      <div class="modal-footer">
        <a onClick="window.location.href='administracion_search.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>

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
        <p><span class="glyphicon glyphicon-list-alt"></span><a target="_blank" href="#.php" style="color: red;"  class=""> Ir a Consultas</a></p> 
      </div>
      <div class="modal-footer">
        <a  data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div> 
</html>

