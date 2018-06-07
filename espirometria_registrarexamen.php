<?php 
  include ('includes/conexion.php'); 
  include ('bar/navbar_espirometria.php');
  $ruta_destino = "fotografias/"; //ruta de las fotos de los paciente
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Espirometria Examen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="jvalidation/dist/jquery.validate.js"></script>
  </head>

<?php
  // Notificar solamente errores de ejecución
  error_reporting(E_ERROR | E_WARNING | E_PARSE); 
  if (isset($_POST['Registrar'])) {

    $historia = $_POST['historia'];
    $diagnostico = $_POST['diagnostico'];
    $hist = $historia.".pdf";
    $fichero_subido_pdf = $_FILES['fichero_pdf']['name'];

    $data = "INSERT INTO `espirometria`(`id`,`examen_ruta`,`espirometria_paciente`,`esp_diagnostico`) 
    VALUES('NULL','$hist','$historia','$diagnostico')";
    $query_data = mysqli_query($conexion,$data);

    $estado = "Atencion Finalizada";
    $horafinal = $_POST['hora'];

    $data = "UPDATE `db_estado_atencion` SET `espirometria`= '$estado' WHERE paciente = '$historia'"; 
    $query2 = mysqli_query($conexion,$data);

    $data1 = "UPDATE `datos_basicos_atencion` SET `final_timeespirometria`= '$horafinal' WHERE id_datos_basicos = '$historia'"; 
    $query3 = mysqli_query($conexion,$data1);

    if ($query_data && $query2 && $query3) {
      $dir_subida = 'archivos/archivo_p/';
      $fichero_subido = $dir_subida . basename($_FILES['fichero_pdf']['name']);
      if (move_uploaded_file($_FILES['fichero_pdf']['tmp_name'], $fichero_subido))

      //RENOMBRAMOS EL ARCHIVO SUBIDO
      list($nombre, $ext) = explode(".", $fichero_subido_pdf);
      $nombre_actual = "$historia"."."."$ext" ;
      rename("archivos/archivo_p/$fichero_subido_pdf","archivos/archivo_p/$nombre_actual");

      echo "<script>alert('Datos Registrados Exitosamente')</script>";
      echo "<script>window.location = 'espirometria_citas.php'</script>";
    }else{
      echo "<script>alert('Error query, Intente Nuevamente')</script>";
      echo "<script>window.location = 'espirometria_citas.php'</script>"; 
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
  while ($datos=mysqli_fetch_array($query)) {
    //datos personales
    $historia=$datos['id_historia'];
   
    //--------
    $cont = "SELECT *, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia
      WHERE datos_basicos.motivo_evaluacion = 'Ingreso' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $ingreso = $re{'Total'};      
    }
    $cont = "SELECT *, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia
    WHERE datos_basicos.motivo_evaluacion = 'Periodico' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $periodico = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia
    WHERE datos_basicos.motivo_evaluacion = 'Retiro' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $retiro = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia
    WHERE datos_basicos.motivo_evaluacion = 'Post incapacidad' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $postincapacidad = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia
    WHERE datos_basicos.motivo_evaluacion = 'Reubicacion' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $reubicacion = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia 
    WHERE datos_basicos.motivo_evaluacion = 'Reingreso' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $reingreso = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia 
    WHERE datos_basicos.motivo_evaluacion = 'Otros' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $otros = $re{'Total'};     
    }
    //obtener fecha del ultimo registro del historial
    $consultaregistro = "SELECT * FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia
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
     });</script>';  
?>
<body>
<div class="container"><br>
<form enctype="multipart/form-data" method="POST" action="" id="formulario" name="formulario">
<div class="container">
<!--Captura de hora-->
<input type="text" name="hora" class="form-control">
<input type="text" name="historia" value="<?php echo $historia ?>" style="display: none;">

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
  <div class="panel-heading text-center"><label>Examen de Espirometria</label></div>
  <div class="panel-body">
    <div class="container-fluid">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label for="fichero_pdf" generated="true" class="error"></label><br>
          <span class="input-group-text">Cargar</span>
        </div>
        <div class="custom-file">
          <input type="file" name="fichero_pdf" onchange="control(this)" class="custom-file-input" id="inputGroupFile01">
          <label class="custom-file-label" for="inputGroupFile01">Subir archivo</label>
        </div>
      </div>

      <div class="input-group">
        <label for="diagnostico" generated="true" class="error"></label><br>
        <div class="input-group-prepend">
          <span class="input-group-text">Diagnostico</span>
        </div>
        <textarea class="form-control" aria-label="Diagnostico" name="diagnostico" rows="2"></textarea>
      </div>
    </div>
  </div>
</div>

  <div class="text-center">
    <br>
    <input type="submit" name="Registrar" value="Registrar" class="btn btn-success" id="btn">
    <br><br>
  </div>
</div>
</form>
<?php 
  }//while 
  }else{
    //alerta historial clinico
    echo '<script>
     $(document).ready(function(){
      $("#noregistro").modal("show");
     });</script>';  
  }
?>
  
</body>
<!--Error de usuario no registrado o incorrecto-->
<div class="modal fade" id="noregistro" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='espirometria_pacientes.php';">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button onClick="window.location.href='espirometria_pacientes.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> ERROR.</h4>
      </div>
      <div class="modal-body">
        <h4 class="text-primary">El Usuario con Indentificacion Nº <label class="text-danger"><?php echo $id; ?></label> Incorrecto O no Registrado en el Sistema.</h4> <p>Cerciorarse de que la fecha de apertura de la historia clinica coincida con el dia en que se consulta el usuario</p>    
      </div>
      <div class="modal-footer">
        <a onClick="window.location.href='espirometria_pacientes.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>

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
<script type="text/javascript" src="hora.js"></script>
<script>
  $(function(){
    /* Incluimos un método para validar el campo nombre */
    jQuery.validator.addMethod("texto", function(value, element) {
      return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
    }); 
    /* Capturar el click del botón */
    $("#btn").on("click", function(){
      /* Validar el formulario */
      $("#formulario").validate({
        rules: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
        {
          //email: {required: true, email: true, minlength: 5, maxlength: 80},
          fichero_pdf: {required: true},
          diagnostico: {required: true, minlength: 3, maxlength: 1000}
        },
         messages: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
        {
          fichero_pdf: {required: 'Selecionar un archivo'},
          diagnostico: {required: 'Este campo es requerido',minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'}
        }
      });
    });
  });
  //validar extension pdf
  function control(f){
    var ext=['pdf'];
    var v=f.value.split('.').pop().toLowerCase();
    for(var i=0,n;n=ext[i];i++){
      if(n.toLowerCase()==v)
        return
    }
    var t=f.cloneNode(true);
    t.value='';
    f.parentNode.replaceChild(t,f);
    alert('extensión no válida');
  }
//time
</script>
</html>

