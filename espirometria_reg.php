<?php 
  include ('includes/conexion.php'); 
  include ('bar/navbar_espirometria.php');
  $ruta_destino =   "fotografias/"; //ruta de las fotos de los paciente
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
    $horafinal = $_POST['horafinal'];

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
      echo "<script>window.location = 'espirometria_pacientes.php'</script>";
    }else{
      echo "<script>alert('Error query, Intente Nuevamente')</script>";
      echo "<script>window.location = 'espirometria_pacientes.php'</script>"; 
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
<div class="container">
<br>
<form enctype="multipart/form-data" method="POST"  action="" id="formulario" name="form">

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

    <input type="text" name="historia" value="<?php echo $historia ?>" style="display: none;">

 <div class="panel panel-default">
    <div class="panel-heading text-center"><label>Datos  <a href="#" data-toggle="modal" data-target="#historial">Paciente</a>-Empresa</label></div>
    <div class="panel-body">    
      <img class="img-responsive img-thumbnail paciente_datos" alt="Foto del Paciente" src=<?php echo $ruta_destino."".$historia.'.png'; ?> >
      <div class="tabla_paciente col-sm-6">
        <table class="table table-bordered">
          <thead>
            <th>Nombres-Apellidos:</th>
            <th>Tipo Documento:</th>
            <th>Numero Documento:</th>
          </thead>

          <tbody style="font-size: 13px;">
            <tr>
              <td><?php echo $datos['nombres_apellidos']; ?></td>
              <td><?php echo $datos['tipo_documento']; ?></td>
              <td><?php echo $datos['numero_documento']; ?></td> 
            </tr>
            <thead>
              <th>Edad:</th>
              <th>Fecha Nacimiento:</th>
              <th>Genero:</th>
            </thead>
            <tr>   
              <td><?php echo $datos['edad']; ?></td>
              <td><?php echo $datos['fecha_nacimiento']; ?></td>
              <td><?php echo $datos['genero']; ?></td>
            </tr>
            <thead>      
              <th>Estado Civil:</th>
              <th>Lugar Nacimiento:</th>
              <th>Numero Celular:</th>
            </thead>
            <tr>   
              <td><?php echo $datos['estado_civil']; ?></td>
              <td><?php echo $datos['lugar_nacimiento']; ?></td>
              <td><?php echo $datos['celular']; ?></td>
            </tr>
            <thead> 
              <th>Direccion</th>
              <th colspan="3">Motivo de Evaluacion:</th>
            </thead>
            <tr>
              <td><?php echo $datos['direccion']; ?></td>  
              <td colspan="3"><?php echo $datos['motivo_evaluacion']; ?></td>
            </tr>
          </tbody>
        </table>
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
              <td><?php echo $datos['nombre_empresa']; ?></td>
              <td><?php echo $datos['actividad_economica']; ?></td>
              <td><?php echo $datos['ciudad']; ?></td>
              <td><?php echo $datos['direccion_empresa']; ?></td>
              <td><?php echo $datos['numero_nit']; ?></td>
              <td><?php echo $datos['telefono_empresa']; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

    <div class="panel panel-default">
      <div class="panel-heading text-center"><label>Examen de Espirometria</label></div>
      <div class="panel-body">
        <div class="col-lg-6">  
          <label>Seleccionar archivo:</label>
          <label for="fichero_pdf" generated="true" class="error"></label><br>
          <input type="file" name="fichero_pdf" onchange="control(this)"><br>
        </div>
      </div>
    </div>


    <div class="panel panel-default">
      <div class="panel-heading text-center"><label>Examen de Espirometria</label></div>
      <div class="panel-body">  
          <label class="text-center">Diagnostico:</label>
          <label for="diagnostico" generated="true" class="error"></label><br>
          <textarea class="form-control col-sm-12" type="text" name="diagnostico" rows="2"></textarea>
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
        <p><span class="glyphicon glyphicon-list-alt"></span><a target="_blank" href="psicologia_consult.php" style="color: red;"  class=""> Ir a Consultas</a></p> 
      </div>
      <div class="modal-footer">
        <a  data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>

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
</script> 
<script type="text/javascript">
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
</html>

