<?php 
include ('includes/conexion.php'); 
include ('bar/navbar_psicologia.php'); 
require('bar/style_bar/estilo.css');
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
  // Notificar solamente errores de ejecución
  error_reporting(E_ERROR | E_WARNING | E_PARSE);

  if (isset($_POST['Registrar'])) {

    //$numero_documento = $_POST['numero_documento'];
    //$fecha = $_POST['fecha'];
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


    $data = "INSERT INTO `psicologia_examen_estado_mental`(`id`,`orientacion`,`orientacion_hallazgo`,`atencion_concentracion`,`atencion_concentracion_hallazgo`,`sensopercepcion`,`sensopercepcion_hallazgo`,`memoria`,`memoria_hallazgo`,`pensamiento`,`pensamiento_hallazgo`,`lenguaje`,`lenguaje_hallazgo`,`concepto`,`paciente_psicologia`) 
    VALUES('Null','$orientacion','$orientacion_hallazgo','$atencion','$atencion_hallazgo','$sensopercepcion','$sensopercepcion_hallazgo','$memoria','$memoria_hallazgo','$pensamiento','$pensamiento_hallazgo','$lenguaje','$lenguaje_hallazgo','$concepto','$historia')";
    $query_data = mysqli_query($conexion,$data);

    $estado = "Atencion Finalizada";
    $horafinal = $_POST['horafinal'];

    $data = "UPDATE `db_estado_atencion` SET `psicologia`= '$estado' WHERE paciente = '$historia'"; 
    $query2 = mysqli_query($conexion,$data);

    $data1 = "UPDATE `datos_basicos_atencion` SET `final_timepsicologia`= '$horafinal' WHERE id_datos_basicos = '$historia'"; 
    $query3 = mysqli_query($conexion,$data1);


    if ($query_data) {
      echo "<script>alert('Datos Registrados Exitosamente')</script>";
      echo "<script>window.location = 'psicologia.php'</script>";
    }else{
      echo "<script>alert('Error query, Intente Nuevamente')</script>";
      echo "<script>window.location = 'psicologia.php'</script>"; 
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
    $cont = "SELECT *, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN psicologia_examen_estado_mental ON  psicologia_examen_estado_mental.paciente_psicologia = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Ingreso' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $ingreso = $re{'Total'};      
    }
    $cont = "SELECT *, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN psicologia_examen_estado_mental ON  psicologia_examen_estado_mental.paciente_psicologia = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Periodico' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $periodico = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN psicologia_examen_estado_mental ON  psicologia_examen_estado_mental.paciente_psicologia = datos_basicos.id_historia 
        WHERE datos_basicos.motivo_evaluacion = 'Retiro' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $retiro = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
    JOIN psicologia_examen_estado_mental ON  psicologia_examen_estado_mental.paciente_psicologia = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Post incapacidad' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $postincapacidad = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN psicologia_examen_estado_mental ON  psicologia_examen_estado_mental.paciente_psicologia = datos_basicos.id_historia  
        WHERE datos_basicos.motivo_evaluacion = 'Reubicacion' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
     $reubicacion = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN psicologia_examen_estado_mental ON  psicologia_examen_estado_mental.paciente_psicologia = datos_basicos.id_historia 
        WHERE datos_basicos.motivo_evaluacion = 'Reingreso' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $reingreso = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN psicologia_examen_estado_mental ON  psicologia_examen_estado_mental.paciente_psicologia = datos_basicos.id_historia 
        WHERE datos_basicos.motivo_evaluacion = 'Otros' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $otros = $re{'Total'};     
    }
    //obtener fecha del ultimo registro del historial
    $consultaregistro = "SELECT * FROM datos_basicos
     JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
     JOIN psicologia_examen_estado_mental ON psicologia_examen_estado_mental.paciente_psicologia = datos_basicos.id_historia
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

    //}//fin if 
    ?>
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
  <!---->
  <div class="container">
  <br>

  <script type="text/javascript" src="jvalidation/dist/jquery.validate.js"></script>
  <!---->
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
       orientacion: {required: true},
       orientacion_hallazgo:{required: true, maxlength: 1000},
       atencion: {required: true},
       atencion_hallazgo:{required: true, maxlength: 1000},
       sensopercepcion: {required: true},
       sensopercepcion_hallazgo:{required: true, maxlength: 1000},
       memoria: {required: true},
       memoria_hallazgo:{required: true, maxlength: 1000},
       pensamiento: {required: true},
       pensamiento_hallazgo:{required: true, maxlength: 1000},
       lenguaje: {required: true},
       lenguaje_hallazgo:{required: true, maxlength: 1000},
       concepto: {required: true},

     },

     messages: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
     {

       orientacion: {required: 'Seleccione'},
       orientacion_hallazgo:{required: 'Este campo es requerido', maxlength: 'El máximo permitido son 1000 caracteres'},
       atencion: {required: 'Seleccione'},
       atencion_hallazgo:{required: 'Este campo es requerido', maxlength: 'El máximo permitido son 1000 caracteres'},
       sensopercepcion: {required: 'Seleccione'},
       sensopercepcion_hallazgo:{required: 'Este campo es requerido', maxlength: 'El máximo permitido son 1000 caracteres'},
       memoria: {required: 'Seleccione'},
       memoria_hallazgo:{required: 'Este campo es requerido', maxlength: 'El máximo permitido son 1000 caracteres'},
       pensamiento: {required: 'Seleccione'},
       pensamiento_hallazgo:{required: 'Este campo es requerido', maxlength: 'El máximo permitido son 1000 caracteres'},
       lenguaje: {required: 'Seleccione'},
       lenguaje_hallazgo:{required: 'Este campo es requerido', maxlength: 'El máximo permitido son 1000 caracteres'},
       concepto: {required: 'Seleccione una opcion'},

     }
    });
  });
});
</script>

<form method="POST"  action="" id="formulario" name="form">

<input type="text" name="historia" value="<?php echo $historia ?>" style="display: none;">

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
  </div>  

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
        <td style="width: 185px;">
          <label for="orientacion" generated="true" class="error"></label><br>  
          <label>Orientacion:</label>
        </td>
        <td>
          <br>
          <input type="radio" name="orientacion" value="Normal">
        </td>
        <td>
          <br>
          <input type="radio" name="orientacion" value="Difusion">
        </td>
        <td>
          <label for="orientacion_hallazgo" generated="true" class="error"></label><br>  
          <textarea style="width: 780px;" class="form-control" type="text" name="orientacion_hallazgo"></textarea>
        </td>
      </tr>
      <tr>
        <td>
          <label for="atencion" generated="true" class="error"></label><br> 
          <label>Atencion Concentracion:</label>
        </td>
        <td>
          <br>
          <input type="radio" name="atencion" value="Normal">
        </td>
        <td>
          <br>
          <input type="radio" name="atencion" value="Difusion">
        </td>
        <td>
          <label for="atencion_hallazgo" generated="true" class="error"></label><br>  
          <textarea style="width: 780px;" class="form-control" type="text" name="atencion_hallazgo"></textarea>
        </td>
      </tr>
      <tr>
        <td>
          <label for="sensopercepcion" generated="true" class="error"></label><br> 
          <label>Sensopercepcion:</label>
        </td>
        <td>
          <br>
          <input type="radio" name="sensopercepcion" value="Normal">
        </td>
        <td>
          <br>
          <input type="radio" name="sensopercepcion" value="Difusion">
        </td>
        <td>
          <label for="sensopercepcion_hallazgo" generated="true" class="error"></label><br>  
          <textarea style="width: 780px;" class="form-control" type="text" name="sensopercepcion_hallazgo"></textarea>
        </td>
      </tr>
      <tr>
        <td>
          <label for="memoria" generated="true" class="error"></label><br> 
          <label>Memoria:</label></td>
        <td>
          <br>
          <input type="radio" name="memoria" value="Normal"></td>
        <td>
          <br>
          <input type="radio" name="memoria" value="Difusion">
        </td>
        <td>
          <label for="memoria_hallazgo" generated="true" class="error"></label><br>  
          <textarea style="width: 780px;" class="form-control" type="text" name="memoria_hallazgo"></textarea>
        </td>
      </tr>
      <tr>
        <td>
          <label for="pensamiento" generated="true" class="error"></label><br> 
          <label>Pensamiento:</label>
        </td>
        <td>
          <br>
          <input type="radio" name="pensamiento" value="Normal">
        </td>
        <td>
          <br>
          <input type="radio" name="pensamiento" value="Difusion">
        </td>
        <td>
          <label for="pensamiento_hallazgo" generated="true" class="error"></label><br>  
          <textarea style="width: 780px;" class="form-control" type="text" name="pensamiento_hallazgo"></textarea>
        </td>
      </tr>
      <tr>
        <td>
          <label for="lenguaje" generated="true" class="error"></label><br> 
          <label>Lenguaje:</label>
        </td>
        <td>
          <br>
          <input type="radio" name="lenguaje" value="Normal">
        </td>
        <td>
          <br>
          <input type="radio" name="lenguaje" value="Difusion">
        </td>
        <td>
          <label for="lenguaje_hallazgo" generated="true" class="error"></label><br>  
          <textarea style="width: 780px;" class="form-control" type="text" name="lenguaje_hallazgo"></textarea>
        </td>
      </tr>
      <tr>
        <td>
          <br>
          <label>Concepto:</label>
        </td>
        <td colspan="3"> 
          <label for="concepto" generated="true" class="error"></label><br> 
          <label>Normal:</label> 
          <input type="radio" name="concepto" value="Normal"> / 
          <label>Anormal:</label>
          <input type="radio" name="concepto" value="Anormal">
        </td>
      </tr>
    </tbody>
  </table>
</div>
</div>
  <div class="text-center">
    <br>
    <input type="submit" name="Registrar" value="Registrar" class="btn btn-success" id="btn">
    <br><br>
  </div>

</form>
 
  </div>

<?php 
    }//while 
  }
?>
  
</body>

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

