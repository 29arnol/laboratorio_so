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
  <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> -->


<?php 

  if (isset($_POST['submit'])) {

    //$numero_documento = $_POST['numero_documento'];
    //$fecha = $_POST['fecha'];
    $historia = $_POST['historia'];
    $diagnostico = $_POST['diagnostico'];
    $hist = $historia.".pdf";
    $fichero_subido_pdf = $_FILES['fichero_pdf']['name'];

    $data = "UPDATE `espirometria` SET `examen_ruta`='$hist', `esp_diagnostico`='$diagnostico' WHERE `espirometria_paciente` = ".$historia." ";
    $query_data = mysqli_query($conexion,$data);

    if ($query_data) {
    $dir_subida = 'archivos/archivo_p/';
    $fichero_subido = $dir_subida . basename($_FILES['fichero_pdf']['name']);
    if (move_uploaded_file($_FILES['fichero_pdf']['tmp_name'], $fichero_subido))

    //RENOMBRAMOS EL ARCHIVO SUBIDO
    list($nombre, $ext) = explode(".", $fichero_subido_pdf);
    $nombre_actual = "$historia"."."."$ext" ;
    rename("archivos/archivo_p/$fichero_subido_pdf","archivos/archivo_p/$nombre_actual");

      echo "<script>alert('Datos Actualizados Exitosamente')</script>";
      echo "<script>window.location = 'administracion_search.php'</script>";
    }else{
      echo "<script>alert('Error query, Intente Nuevamente')</script>";
      echo "<script>window.location = 'administracion_search.php'</script>"; 
    }

  }
    //---------------------
    //$id = base64_decode($_REQUEST['paciente']);

    //$fecharegistro = $_POST['fecha_registro'];

    $area = base64_decode($_REQUEST['area']);
    if ($area==14) {
      $id = base64_decode($_REQUEST['documento']);
      $fecha_reg = base64_decode($_REQUEST['fecha_registro']);
    }else{
      $id = base64_decode($_REQUEST['paciente']);
      $fecha_reg = $_GET['registro'];
    }

    $consult="SELECT * FROM datos_basicos  AS db
    JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
    JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
    JOIN espirometria AS esp ON db.id_historia = esp.espirometria_paciente
    WHERE  db.id_historia='$id' OR dc.numero_documento = '$id' AND db.fecha = '$fecha_reg' ";
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

      $examen_ruta = $datos['examen_ruta']; //archivo pdf

//--------
    $cont = "SELECT *, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
       JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Ingreso' AND datos_complementarios.numero_documento=".$numero_documento." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $ingreso = $re{'Total'};      
    }
    $cont = "SELECT *, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
      JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Periodico' AND datos_complementarios.numero_documento=".$numero_documento." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $periodico = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Retiro' AND datos_complementarios.numero_documento=".$numero_documento." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $retiro = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
      JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Post incapacidad' AND datos_complementarios.numero_documento=".$numero_documento." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $postincapacidad = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Reubicacion' AND datos_complementarios.numero_documento=".$numero_documento." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
     $reubicacion = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
      JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia 
        WHERE datos_basicos.motivo_evaluacion = 'Reingreso' AND datos_complementarios.numero_documento=".$numero_documento." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $reingreso = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia 
        WHERE datos_basicos.motivo_evaluacion = 'Otros' AND datos_complementarios.numero_documento=".$numero_documento." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $otros = $re{'Total'};     
    }
    //obtener fecha del ultimo registro del historial
    $consultaregistro = "SELECT * FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
     JOIN espirometria ON  espirometria.espirometria_paciente = datos_basicos.id_historia
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
  <!---->
      <div style="margin-top:-1%; padding-bottom: 2%;" class="row">
          <div class="col-sm-12">
            <div class="centrar" style="width: 100%; ">
              <ol class="breadcrumb">
                  <li style="font-family: verdana; font-size: 15px;"><a href="audiometria.php">Consultar Numero de Documento</a>
                  </li>
                  <li style="font-family: verdana; font-size: 15px;" class="active">Registro de Historia</li>
              </ol>
            </div>  
          </div>
      </div>          
  <!---->

 <!--  <script type="text/javascript" src="jvalidation/lib/jquery.js"></script> -->
<!--   <script type="text/javascript" src="jvalidation/dist/jquery.validate.js"></script> -->

  <!---->
<script>
$(function(){

/* Incluimos un método para validar el campo nombre */
jQuery.validator.addMethod("texto", function(value, element) {
return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
}); 


/* Capturar el click del botón */
$("#btn").on("click", function()
   {
    /* Validar el formulario */
    $("#formulario").validate
         ({
             rules: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
             {
               //email: {required: true, email: true, minlength: 5, maxlength: 80},
               fichero_pdf: {required: true},


             },

             messages: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
             {

               fichero_pdf: {required: 'Selecionar un archivo'},


             }

         });
   });

});
</script>

<form enctype="multipart/form-data" method="POST"  action="" id="formulario" name="form">

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
  <div class="panel-heading text-center"><label>Examen de Espirometria</label></div>
  <div class="panel-body">
    <div class="col-lg-12">

      <style type="text/css">
    .d{
      width:1100px;
      height:1175px;
    }
  </style>
<?php $ruta = 'archivos/archivo_p/'.$examen_ruta; ?>

<!--1135 style="width:1100px; height:1175px;" frameborder="4"-->
<?php echo "<iframe src='$ruta' class='d' id='frame' > 
    
  </iframe> "; ?>


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
      <textarea class="form-control col-sm-12" type="text" name="diagnostico" rows="2"><?php echo $datos['esp_diagnostico']; ?></textarea>
    </div>
  </div>

  <div class="text-center">
    <br>
    <input type="submit" name="submit" value="Actualizar" class="btn btn-success" id="btn" onclick="validar( this.form.fichero_pdf.value)">
    <br><br>
  </div>


  </div>

</form>


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
        <h4 class="text-primary">El Usuario con Indentificacion Nº <label class="text-danger"><?php echo $id; ?></label> No presenta Examen Registrado en el Sistema Concerniente al Area de Espirometria.</h4> <p>Cerciorarse de que el Paciente fue atendido en dicha fecha por el Area.</p>    
      </div>
      <div class="modal-footer">
        <a onClick="window.location.href='administracion_search.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>

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

</html>

