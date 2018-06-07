<!DOCTYPE html>
<html>
  <head>
    <title>LSST REGISTRAR EXAMEN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
<?php 
include('includes/conexion.php'); 
include('bar/navbar_psicologia.php'); 
include('lectorfecha.php');
include('bar/css/estilo.css');
  // Notificar solamente errores de ejecución
 // error_reporting(E_ERROR | E_WARNING | E_PARSE);
  if (isset($_POST['Registrar'])){
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

    $data = "INSERT INTO `psicologia_estadomental`(`id`,`orientacion`,`orientacionhallazgo`,`atencionconcentracion`,`concentracionhallazgo`,`sensopercepcion`,`sensopercepcionhallazgo`,`memoria`,`memoriahallazgo`,`pensamiento`,`pensamientohallazgo`,`lenguaje`,`lenguajehallazgo`,`concepto`,`paciente_psicologia`) 
    VALUES('Null','$orientacion','$orientacion_hallazgo','$atencion','$atencion_hallazgo','$sensopercepcion','$sensopercepcion_hallazgo','$memoria','$memoria_hallazgo','$pensamiento','$pensamiento_hallazgo','$lenguaje','$lenguaje_hallazgo','$concepto','$historia')";
    $query_data = mysqli_query($conexion,$data);

    $estado = "Atencion Finalizada";
    $horafinal = $_POST['hora'];

    $data = "UPDATE `db_estado_atencion` SET `psicologia`= '$estado' WHERE paciente = '$historia'"; 
    $query2 = mysqli_query($conexion,$data);

    $data1 = "UPDATE `datos_basicos_atencion` SET `final_timepsicologia`= '$horafinal' WHERE id_datos_basicos = '$historia'"; 
    $query3 = mysqli_query($conexion,$data1);

    if($query_data){
      echo "<script>alert('Datos Registrados Exitosamente')</script>";
      echo "<script>window.location = 'psicologia_citas.php'</script>";
    }else{
      echo "<script>alert('Error query, Intente Nuevamente')</script>";
      echo "<script>window.location = 'psicologia_citas.php'</script>"; 
    }
  }
    //---------------------
    $id = $_POST['cedula'];
    $fecharegistro = $_POST['fecha_registro'];

    $consult="SELECT * FROM datos_basicos AS db
    JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
    JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
    WHERE db.fecha ='$fecharegistro' AND dc.numero_documento=".$id."";
    $query = mysqli_query($conexion,$consult);

    if (mysqli_num_rows($query) > 0){

    while ($datos=mysqli_fetch_array($query)){
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

    $cont = "SELECT *, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN psicologia_estadomental ON  psicologia_estadomental.paciente_psicologia = datos_basicos.id_historia
      WHERE datos_basicos.motivo_evaluacion = 'Ingreso' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $ingreso = $re{'Total'};      
    }
    $cont = "SELECT *, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN psicologia_estadomental ON psicologia_estadomental.paciente_psicologia = datos_basicos.id_historia
      WHERE datos_basicos.motivo_evaluacion = 'Periodico' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $periodico = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN psicologia_estadomental ON psicologia_estadomental.paciente_psicologia = datos_basicos.id_historia 
    WHERE datos_basicos.motivo_evaluacion = 'Retiro' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $retiro = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
    JOIN psicologia_estadomental ON psicologia_estadomental.paciente_psicologia = datos_basicos.id_historia
    WHERE datos_basicos.motivo_evaluacion = 'Post incapacidad' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $postincapacidad = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN psicologia_estadomental ON psicologia_estadomental.paciente_psicologia = datos_basicos.id_historia  
    WHERE datos_basicos.motivo_evaluacion = 'Reubicacion' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
     $reubicacion = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN psicologia_estadomental ON psicologia_estadomental.paciente_psicologia = datos_basicos.id_historia 
    WHERE datos_basicos.motivo_evaluacion = 'Reingreso' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $reingreso = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN psicologia_estadomental ON psicologia_estadomental.paciente_psicologia = datos_basicos.id_historia 
    WHERE datos_basicos.motivo_evaluacion = 'Otros' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $otros = $re{'Total'};     
    }
    //obtener fecha del ultimo registro del historial
    $consultaregistro = "SELECT * FROM datos_basicos
     JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
     JOIN psicologia_estadomental ON psicologia_estadomental.paciente_psicologia = datos_basicos.id_historia
     WHERE datos_complementarios.numero_documento = ".$id." ORDER BY datos_basicos.fecha desc limit 1";
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

<script type="text/javascript" src="jvalidation/dist/jquery.validate.js"></script>
<body>
  <!---->
<div class="container">
<form method="POST"  action="" id="formulario" name="formulario">
<input type="text" name="historia" value="<?php echo $historia ?>" style="display: none;">
<input type="text" name="hora" id="myWatch">

<div class="panel panel-default">
  <div class="container-fluid">
    <div class="panel-heading text-center">
      <h6>Datos <a href="#" data-toggle="modal" data-target="#historial">Paciente</a> - Empresa</h6>
    </div>
    <div class="panel-body">  

      <div class="size_font">
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
  <div class="panel-heading text-center"><h6>Examen Psicologico<h6></div>
  <div class="panel-body">
    <div class="container-fluid">
      <div class="row">
        <label for="" class="text-dark">Orientacion:</label>
        <label for="orientacion" generated="true" class="error"></label><div class="separator"></div>
        <label for="orientacion_hallazgo" generated="true" class="error"></label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text size_font">
              Normal: <div class="separator"></div><input type="radio" name="orientacion" value="Normal"><div class="separator"></div>
              Difusion: <div class="separator"></div><input type="radio" name="orientacion" value="Difusion">
            </span>
          </div>
          <textarea name="orientacion_hallazgo" class="form-control size_font" aria-label="With textarea"></textarea>
        </div>
      </div><br>

      <div class="row">
        <label for="" class="text-dark">Atencion Concentracion:</label>
        <label for="atencion" generated="true" class="error"></label><div class="separator"></div>
        <label for="atencion_hallazgo" generated="true" class="error"></label> 
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text size_font">
              Normal: <div class="separator"></div><input type="radio" name="atencion" value="Normal"><div class="separator"></div>
              Difusion: <div class="separator"></div><input type="radio" name="atencion" value="Difusion">
            </span>
          </div>
          <textarea class="form-control size_font" type="text" name="atencion_hallazgo"></textarea><br>
        </div>
      </div><br>

      <div class="row">
        <label for="" class="text-dark">Sensopercepcion:</label>
        <label for="sensopercepcion" generated="true" class="error"></label><div class="separator"></div>
        <label for="sensopercepcion_hallazgo" generated="true" class="error"></label> 
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text size_font">
              Normal: <div class="separator"></div><input type="radio" name="sensopercepcion" value="Normal"><div class="separator"></div>
              Difusion: <div class="separator"></div><input type="radio" name="sensopercepcion" value="Difusion">
            </span>
          </div>
          <textarea class="form-control size_font" type="text" name="sensopercepcion_hallazgo"></textarea><br>
        </div>
      </div><br>

      <div class="row">
        <label for="" class="text-dark">Memoria:</label>
        <label for="memoria" generated="true" class="error"></label><div class="separator"></div>
        <label for="memoria_hallazgo" generated="true" class="error"></label> 
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text size_font">
              Normal: <div class="separator"></div><input type="radio" name="memoria" value="Normal">
              <div class="separator"></div>
              Difusion: <div class="separator"></div><input type="radio" name="memoria" value="Difusion">
            </span>
          </div>
          <textarea class="form-control size_font" type="text" name="memoria_hallazgo"></textarea><br>
        </div>
      </div><br>

      <div class="row">
        <label for="" class="text-dark">Pensamiento:</label>
        <label for="pensamiento" generated="true" class="error"></label><div class="separator"></div>
        <label for="pensamiento_hallazgo" generated="true" class="error"></label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text size_font">
              Normal: <div class="separator"></div><input type="radio" name="pensamiento" value="Normal">
              <div class="separator"></div>
              Difusion: <div class="separator"></div><input type="radio" name="pensamiento" value="Difusion">
            </span>
          </div>
          <textarea class="form-control size_font" type="text" name="pensamiento_hallazgo"></textarea><br>
        </div>
      </div><br>

      <div class="row">
        <label for="" class="text-dark">Lenguaje:</label>
        <label for="lenguaje" generated="true" class="error"></label><div class="separator"></div>
        <label for="lenguaje_hallazgo" generated="true" class="error"></label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text size_font">
              Normal: <div class="separator"></div><input type="radio" name="lenguaje" value="Normal">
              <div class="separator"></div>
              Difusion: <div class="separator"></div><input type="radio" name="lenguaje" value="Difusion">
            </span>
          </div>
          <textarea class="form-control size_font" type="text" name="lenguaje_hallazgo"></textarea><br>
        </div>
      </div><br>
      
      <div class="text-center">
        <label for="" class="text-dark">Concepto:</label>
        <label for="concepto" generated="true" class="error"></label>
        <fieldset>
          Normal: <input type="radio" name="concepto" value="Normal"> 
          Anormal: <input type="radio" name="concepto" value="Anormal">
        </fieldset>
      </div>
    </div>
  </div>
</div>
<div class="text-center"><br>
  <input type="submit" name="Registrar" value="Registrar" class="btn btn-success" id="btn"><br><br>
</div>
</form>
 
</div>

<?php 
    }//while 
  }
?>
  
</body>

<?php 
  //controlador funcion lectorfecha
  $fecha1 = explode("-",date($ultimo)); 
  $fecha2 = $fecha1[0].$fecha1[1].$fecha1[2]; 
  $fechaleida = cambioFecha($fecha2); 
?>

<!-- Modal -->
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

        <h6 class="size_font"><i class="fas fa-calendar-plus"></i> <label for="" class="text-dark">La ultima atencion en audiometria se realizó el dia: </label><strong class="text-danger"> <?php echo $fechaleida ?></h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" ><a target="_blank" href="audiometria_listarpacientes.php" class="fontcolor"><i class="fas fa-search"></i> Consultar</a></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!---->
<script src="hora.js"></script>
<script src="jvalidation/validaciones/psicologia.js"></script>



 
</html>

