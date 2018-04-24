<?php 
  include ('includes/conexion.php'); 
  include ('bar/navbar_administracion.php'); 
 
  date_default_timezone_set('America/Bogota');
  $hora = date('h:i:s A');
  $fecha = date('Y-m-d');
?>

<!DOCTYPE html>
<html>
  <head>
    	<title>Laboratorio Salud Ocupacional</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


<style type="text/css">

  input.error {
    border:1px solid red;
    color: :#FB6565;
  }
  label.error {
    color:#CF0202;
    font-size: 13px;  
  }
</style>

<!---->
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

<!---->

  </head>
  <!----> 
  <?php ?>

  <!---->
  <?php 

  if (isset($_POST['Registrar'])) {
      $datos_complementarios = $_POST['iddc'];
      $paciente = $_POST['iddb'];
    $motivoEva = $_POST['motivoevaluacion'];
    $nomEmpresa = $_POST['nombreempresa'];
    $actEconomica = $_POST['actividadeconomica'];
    $cargo = $_POST['cargodesempena'];
    $ciudadEmp = $_POST['ciudad'];

    $nit = $_POST['nit'];
    $direccion_empresa = $_POST['direccion_empresa'];
    $telefono_empresa = $_POST['telefono_empresa'];

    $nombrestrab = $_POST['nombres'];
    $tipodocumento = $_POST['tipodocumento'];
    $identificacion = $_POST['numero_documento'];
    $direccion = $_POST['direccion'];
    $fechanac = $_POST['fechana'];
    $lugarnac = $_POST['lugarnacimiento'];
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];
    $hijos = $_POST['hijos'];
    $estcivil = $_POST['estcivil'];
    $celular = $_POST['celular'];
    $escolaridad = $_POST['escolaridad'];
    $eps = $_POST['eps'];
    $arl = $_POST['arl'];
    $afp = $_POST['afp'];
    $fecha_ing = $_POST['fecha'];
    $hora_ing = $_POST['hora'];

    $datos1 = "UPDATE `datos_complementarios` SET `nombres_apellidos`='$nombrestrab', `fk_tipo_documento`='$fk_tipo_documento', `numero_documento`='$identificacion', `fecha_nacimiento` = '$fechanac', `lugar_nacimiento`='$lugarnac', `genero`='$sexo' WHERE id = ".$datos_complementarios." ";

    // if ($query1){   
    // //Obtenemos El Ultimo ID Insertado
    // $ver = "SELECT * FROM datos_complementarios AS dc 
    // JOIN datos_basicos AS db ON dc.id = db.fk_d_complementario
    // WHERE dc.id = '' ";
    // $queryid = mysqli_query ($conexion,$ver);
    // $dataid = mysqli_fetch_array($queryid);
    // $idfk_datos_basicos = $dataid['id_historia'];
    // }else{
    //   echo "<script>alert('Error, Intente Nuevamente')</script>";
    // }

    $datos = "UPDATE `datos_basicos` SET `motivo_evaluacion` = '$motivoeva', `fecha`='$fecha_ing', `hora`='$hora_ing', `nombre_empresa`='$nomEmpresa', `actividad_economica`='actEconomica', `cargo_a_desempenar`='$cargo', `ciudad`='$ciudadEmp', `direccion_empresa`='$direccion_empresa', `numero_nit`='$nit', `telefono_empresa`='$telefono_empresa', `direccion`='$direccion', `edad`='$edad', `hijos`='$hijos', `estado_civil`='$estcivil', `celular`='$celular', `escolaridad`='$escolaridad', `eps`='$eps', `arl`='$arl', `afp`='$afp' WHERE fk_d_complementario = ".$datos_complementarios." "; 
    $query1 = mysqli_query($conexion,$datos);

    $audiometria = $_POST['audiometria'];
    $visiometria = $_POST['visiometria'];
    $espirometria = $_POST['espirometria'];
    $psicologia = $_POST['psicologia'];
    $enfermeria = $_POST['enfermeria'];
    $medico = $_POST['medico'];

    //-----------------
    // if ($query1){   
    //   //Obtenemos El Ultimo ID Insertado
    //   $ver = "SELECT * FROM datos_basicos ORDER BY `id_historia` DESC limit 0,1";
    //   $queryid = mysqli_query ($conexion,$ver);
    //   $dataid = mysqli_fetch_array($queryid);
    //   $idfk_datos_basicos = $dataid['id_historia'];
    // }else{
    //   echo "<script>alert('Error, Intente Nuevamente')</script>";
    // }
    //----------------- 

    //,'$audiometria','$visiometria','$espirometria','$psicologia','$enfermeria','$medico'
    $data = "UPDATE `datos_basicos_atencion` SET `audiometria`='$audiometria', `visiometria`='$visiometria', `espirometria`='espirometria', `psicologia`='$psicologia', `enfermeria`='$enfermeria', `medico`='$medico' WHERE id_datos_basicos = ".$paciente."";
    $query2 = mysqli_query($conexion,$data);

    if ($query1 && $query2 && $data) {
      /*echo '<script>
      $(document).ready(function(){
        $("#datossucces").modal("show");
      });</script>';*/
      echo "<script>alert('Datos Registrados Exitosamente')</script>";
      echo "<script>window.location = 'recepcion_foto.php'</script>";
    } else {
      echo "<script>alert('Error, Intente Nuevamente')</script>";
      echo "<script>window.location = 'recepcion.php'</script>";
      /*echo '<script>
       $(document).ready(function(){
        $("#datoserror").modal("show");
      });</script>'; */
    }
  }
  
  //valida si el usuario tiene una historia con motivo de evaluacion de ingreso 
  //$tipocon = $_POST['tipoconsulta'];
  $area = base64_decode($_REQUEST['area']); 
 
  if ($area==11) {
  $id = base64_decode($_REQUEST['documento']);
   $fecha_reg = base64_decode($_REQUEST['fecha_registro']);
  }else{
  $id = base64_decode($_REQUEST['paciente']);
  $fecha_reg = $_GET['registro'];

}

    $consultaregistro = "SELECT * FROM datos_basicos AS db 
    JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
    JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
    WHERE  db.id_historia = '$id' OR dc.numero_documento = '$id' AND db.fecha = '$fecha_reg'  ";
    $queryreg = mysqli_query($conexion,$consultaregistro);
    if (mysqli_num_rows($queryreg) > 0){  
        while ($datos = mysqli_fetch_array($queryreg)){
          $datos_complementario = $datos{'id'};
          $paciente = $datos{'id_historia'};
          $ultimo = $datos{'fecha'}; 
          //echo $ultimo;
          //datos cargados de el ultimo registro
          $motivoeva= $datos['motivo_evaluacion'];

          $nombreempresa= $datos['nombre_empresa'];
          $actividadeconomica= $datos['actividad_economica'];
          $cargoadesempenar= $datos['cargo_a_desempenar'];
          $nit= $datos['numero_nit'];
          $telefono_empresa= $datos['telefono_empresa'];
          $direccion_empresa= $datos['direccion_empresa'];

          $ciudad= $datos['ciudad'];
          $nombresapellidos= $datos['nombres_apellidos'];
          $numero_documento= $datos['numero_documento'];
          $direccion= $datos['direccion'];
          $fechanacimiento= $datos['fecha_nacimiento'];
          $lugarnacimiento= $datos['lugar_nacimiento'];
          $edad= $datos['edad'];
          $genero= $datos['genero'];
          $hijos= $datos['hijos'];
          $estadocivil= $datos['estado_civil'];
          $celular= $datos['celular'];
          $escolaridad= $datos['escolaridad'];
          $eps= $datos['eps'];
          $arl= $datos['arl'];
          $afp= $datos['afp'];    
 
  //-------------------------HISTORIAL DE EVALUACIONES DE PACIENTE---------------------------------
//if ($id){
  
   /* $cont = "SELECT *, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
        JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
        WHERE datos_basicos.motivo_evaluacion = 'Ingreso' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $ingreso = $re{'Total'};      
    }
    $cont = "SELECT *, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
        JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
        WHERE datos_basicos.motivo_evaluacion = 'Periodico' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $periodico = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id  
        WHERE datos_basicos.motivo_evaluacion = 'Retiro' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $retiro = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
        WHERE datos_basicos.motivo_evaluacion = 'Post incapacidad' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $postincapacidad = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
        WHERE datos_basicos.motivo_evaluacion = 'Reubicacion' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
     $reubicacion = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
        WHERE datos_basicos.motivo_evaluacion = 'Reingreso' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $reingreso = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
        WHERE datos_basicos.motivo_evaluacion = 'Otros' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $otros = $re{'Total'};     
    }*/
    //obtener fecha del ultimo registro del historial
   /* $consultaregistro = "SELECT * FROM datos_basicos AS db 
     JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
    WHERE db.id_historia = '$id' OR dc.numero_documento = '$id' ORDER BY db.fecha desc limit 1  ";
    $queryreg = mysqli_query($conexion,$consultaregistro);
    if (mysqli_num_rows($queryreg) > 0){  
        while ($datos = mysqli_fetch_array($queryreg)){
          $datos_complementario = $datos{'id'};
          $paciente = $datos{'id_historia'};
          $ultimo = $datos{'fecha'}; 
          //echo $ultimo;
          //datos cargados de el ultimo registro
          $motivoeva= $datos['motivo_evaluacion'];

          $nombreempresa= $datos['nombre_empresa'];
          $actividadeconomica= $datos['actividad_economica'];
          $cargoadesempenar= $datos['cargo_a_desempenar'];
          $nit= $datos['numero_nit'];
          $telefono_empresa= $datos['telefono_empresa'];
          $direccion_empresa= $datos['direccion_empresa'];

          $ciudad= $datos['ciudad'];
          $nombresapellidos= $datos['nombres_apellidos'];
          $numero_documento= $datos['numero_documento'];
          $direccion= $datos['direccion'];
          $fechanacimiento= $datos['fecha_nacimiento'];
          $lugarnacimiento= $datos['lugar_nacimiento'];
          $edad= $datos['edad'];
          $genero= $datos['genero'];
          $hijos= $datos['hijos'];
          $estadocivil= $datos['estado_civil'];
          $celular= $datos['celular'];
          $escolaridad= $datos['escolaridad'];
          $eps= $datos['eps'];
          $arl= $datos['arl'];
          $afp= $datos['afp'];    
      }
    }else{
      $ultimo = "No hay registros de fecha";
    }  
    //alerta historial clinico
      echo '<script>
   $(document).ready(function(){
    $("#historial").modal("show");
   });</script>'; 
*/
  //-----------------------------------------------------------  
    /*$consult="SELECT * FROM datos_basicos
    WHERE  numero_documento=".$id."   ";
    $query1 = mysqli_query($conexion,$consult);

    if (mysqli_num_rows($query1) > 0){

    while ($datos=mysqli_fetch_array($query1)) {




    } */?>
    <!--registro para paciente con historia clinica-->
  <body>
  <br>

  <div class="text-center">
    <label for="" class="text-primary">Registro de Datos:</label>
  </div>
  <br><br>
  <?php //if (mysqli_num_rows($queryreg) > 0){ ?>

<!---->
<!-- <script type="text/javascript" src="jvalidation/lib/jquery.js"></script> -->
<script type="text/javascript" src="jvalidation/dist/jquery.validate.js"></script>

<script>
$(function(){

/* Incluimos un método para validar el campo nombre */
jQuery.validator.addMethod("nombres", function(value, element) {
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
               motivoevaluacion: {required: true},
               nombreempresa: {required: true, minlength: 2, maxlength: 50},
               cargodesempena: {required: true, minlength: 2, maxlength: 50},

               nombres: {required: true, minlength: 2, maxlength: 50},
               //tipodocumento: {required: true},
               numero_documento: {required: true, digits: true, minlength: 4, maxlength:20},
               direccion: {required: true, minlength: 3, maxlength: 80},
               fechana: {required: true},
               lugarnacimiento: {required: true, minlength: 3, maxlength: 30},
               edad: {required: true, digits: true, minlength: 2, maxlength: 3, min: 14, max:115},
               celular: {required: true, digits: true, minlength: 5, maxlength: 20},
               sexo: {required: true},
               hijos: {required: true},
               estcivil: {required: true},
               escolaridad: {required: true},
               fecha: {required: true},
               hora: {required: true}

             },
             messages: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
             {
               //email: {required: 'Este campo es requerido', email: 'El formato de email es incorrecto', minlength: 'El mínimo permitido son 5 caracteres', maxlength: 'El máximo permitido son 80 caracteres'},
               motivoevaluacion: {required: 'Selecionar un motivo de evaluacion'},
               //nombreempresa: {required: 'Este campo es requerido',  minlength: 'El mínimo permitido son 2 caracteres', maxlength: 'El máximo permitido son 50 caracteres'},
               cargodesempena: {required: 'Este campo es requerido',  minlength: 'El mínimo permitido son 2 caracteres', maxlength: 'El máximo permitido son 50 caracteres'},

               nombres: {required: 'Este campo es requerido',  minlength: 'El mínimo permitido son 2 caracteres', maxlength: 'El máximo permitido son 50 caracteres'},
               //tipodocumento: {required: 'Seleccione un tipo de documento'},
               numero_documento: {required: 'Este campo es Requerido', digits: 'Sólo dígitos', minlength: 'El mínimo permitido son 4 caracteres', maxlength: 'El máximo permitido son 20 caracteres'},
               direccion: {required: 'Este campo es requerido', minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 20 caracteres'},
               fechana: {required: 'Elige una fecha'},
               lugarnacimiento: {required: 'Este campo es requerido',  minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 30 caracteres'},
               edad: {required: 'Este campo es requerido', digits: 'Sólo dígitos', minlength: 'El mínimo permitido son 2 caracteres', maxlength: 'El máximo permitido son 3 caracteres', min: 'Digite una edad mayor o igual a 14', max:'Digite una edad menor o igual a 115'},
               celular: {required: 'Este campo es requerido', digits: 'Sólo dígitos', minlength: 'El mínimo permitido son 5 caracteres', maxlength: 'El máximo permitido son 20 caracteres'},
               sexo: {required: 'Selecionar un genero'},
               hijos: {required: 'Selecionar una opcion'},
               estcivil: {required: 'Selecionar una opcion'},
               escolaridad: {required: 'Selecionar una opcion'},
               fecha: {required: 'Este campo es requerido'},
               hora: {required: 'Este campo es requerido'}

             }

         });
   });

});
</script>


<form class="form" action="" method="POST" role="form" id="formulario" name="form" >
    <!--<label for="io">Oido Derecho:</label>-->

<input type="text" name="iddc" value="<?php echo $datos_complementario; ?>" style="display: none;">
<input type="text" name="iddb" value="<?php echo $paciente; ?>" style="display: none;">

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading text-center">Motivo de la evaluación</div>
    <div class="panel-body">
        <div class="col-sm-12">
          <div class="text-center">
            <table class="table table-bordered">
              <tbody>
                <tr>
                <label for="motivoevaluacion" generated="true" class="error"></label> 
                <fieldset>
                <?php switch ($motivoeva) {
                 case 'Ingreso':
                  echo '<td><div class="text-center"><label>Ingreso</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Ingreso" onClick="comprobar(this)" checked>/   
                    <label>Periódico</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Periodico" onClick="comprobar(this)"> / 
                    <label>Retiro</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Retiro" onClick="comprobar(this)"> /
                    <label>Post Incapacidad</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Post incapacidad" onClick="comprobar(this)"> / 
                    <label>Reubicacion</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Reubicacion" onClick="comprobar(this)"> /
                    <label>Reingreso</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Reingreso" onClick="comprobar(this)">';
                    break;
                    case 'Periodico':
                    echo '<td><div class="text-center"><label>Ingreso</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Ingreso" onClick="comprobar(this)">/   
                    <label>Periódico</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Periodico" onClick="comprobar(this)" checked> / 
                    <label>Retiro</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Retiro" onClick="comprobar(this)"> /
                    <label>Post Incapacidad</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Post incapacidad" onClick="comprobar(this)"> / 
                    <label>Reubicacion</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Reubicacion" onClick="comprobar(this)"> /
                    <label>Reingreso</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Reingreso" onClick="comprobar(this)">';
                    break;
                    case 'Retiro':
                    echo '<td><div class="text-center"><label>Ingreso</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Ingreso" onClick="comprobar(this)">/   
                    <label>Periódico</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Periodico" onClick="comprobar(this)"> / 
                    <label>Retiro</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Retiro" onClick="comprobar(this)" checked> /
                    <label>Post Incapacidad</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Post incapacidad" onClick="comprobar(this)"> / 
                    <label>Reubicacion</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Reubicacion" onClick="comprobar(this)"> /
                    <label>Reingreso</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Reingreso" onClick="comprobar(this)">';
                    break;
                    case 'Post incapacidad':
                    echo '<td><div class="text-center"><label>Ingreso</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Ingreso" onClick="comprobar(this)">/   
                    <label>Periódico</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Periodico" onClick="comprobar(this)"> / 
                    <label>Retiro</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Retiro" onClick="comprobar(this)"> /
                    <label>Post Incapacidad</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Post incapacidad" onClick="comprobar(this)" checked> / 
                    <label>Reubicacion</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Reubicacion" onClick="comprobar(this)"> /
                    <label>Reingreso</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Reingreso" onClick="comprobar(this)">';
                    break;
                    case 'Reubicacion':
                    echo '<td><div class="text-center"><label>Ingreso</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Ingreso" onClick="comprobar(this)">/   
                    <label>Periódico</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Periodico" onClick="comprobar(this)"> / 
                    <label>Retiro</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Retiro" onClick="comprobar(this)"> /
                    <label>Post Incapacidad</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Post incapacidad" onClick="comprobar(this)"> / 
                    <label>Reubicacion</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Reubicacion" onClick="comprobar(this)" checked> /
                    <label>Reingreso</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Reingreso" onClick="comprobar(this)">';
                    break;
                    case 'Reingreso':
                    echo '<td><div class="text-center"><label>Ingreso</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Ingreso" onClick="comprobar(this)">/   
                    <label>Periódico</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Periodico" onClick="comprobar(this)"> / 
                    <label>Retiro</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Retiro" onClick="comprobar(this)"> /
                    <label>Post Incapacidad</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Post incapacidad" onClick="comprobar(this)"> / 
                    <label>Reubicacion</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Reubicacion" onClick="comprobar(this)"> /
                    <label>Reingreso</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Reingreso" onClick="comprobar(this)" checked>';
                    break;
                      }
                    ?>
                    <hr>
                    <div class="col-sm-6 form-inline">
                      <label>Otro:</label> <input class="form-control" type="text" id="mmotivoevaluacion" name="motivoevaluacion"> 
                    </div>
                    <div class="col-sm-6 form-inline">
                      <label>Ips Contratante:</label> <input class="form-control" type="text" id="mmotivoevaluacion" name="motivoevaluacion">
                    </div>
                    </div>  
                    <!--<input type="text" name="ipscontrantante" placeholder="Digitar IPS">-->
                  </td>
                  <?php //} ?> 
                </fieldset>
                </tr>
              </tbody>
            </table>
          </div>
        </div><!--finsm-->
    </div>
  </div>
</div>

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading text-center">Identificacion de la Empresa</div>
    <div class="panel-body">      
      <div class="col-sm-12">
        <br>
        <label>Nombre de la empresa:</label>
        <input class="form-control" type="text" name="nombreempresa" value='<?php echo $nombreempresa ?>'  >
      </div>

      <div class="col-sm-6"> 
        <br>
        <label>Actividad Económica:</label>
        <input class="form-control" type="text" name="actividadeconomica" value='<?php echo $actividadeconomica ?>' >
      </div>

      <div class="col-sm-6">
        <br> 
        <label>Numero Nit:</label>
        <input class="form-control" type="text" name="nit" value='<?php echo $nit ?>' >
      </div>
       

      <div class="col-sm-6">
        <br>   
        <label>Cargo a desempeñar:</label>
        <label for="cargodesempena" generated="true" class="error"></label> 
        <input class="form-control" type="text" name="cargodesempena" value='<?php echo $cargoadesempenar ?>'>
      </div>

      <div class="col-sm-6">
        <br> 
        <label>Ciudad:</label>
        <input class="form-control" type="text" name="ciudad" value='<?php echo $ciudad ?>' >
      </div>

      <div class="col-sm-6">
        <br> 
        <label>Direccion de la Empresa:</label>
        <input class="form-control" type="text" name="direccion_empresa" value='<?php echo $direccion_empresa ?>' >
      </div>

      <div class="col-sm-6">
        <br> 
        <label>Telefono de la Empresa:</label>
        <input class="form-control" type="text" name="telefono_empresa" value='<?php echo $telefono_empresa ?>' >
      </div>
    </div>  
  </div>      
</div>

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading text-center">Identificación del trabajador:</div>
    <div class="panel-body">

      <div class="col-sm-6">
        <br> 
        <label>Nombres y Apellidos:</label>
        <label for="nombres" generated="true" class="error"></label>
        <input class="form-control" type="text" name="nombres" id="nombres" value='<?php echo $nombresapellidos ?>' >
      </div>

      <div class="col-sm-6">
      <br>   
          <div>
            <label>Seleccione Tipo Documento:</label>
            <label for="tipodocumento" generated="true" class="error"></label>
            <select class="form-control" name="tipodocumento">
            <option value="">Seleccionar</option>
              <?php
              $tipo_doc ="SELECT * FROM `datos_basicos_tipo_documento` ";
              $querydoc = mysqli_query($conexion,$tipo_doc);
              while ($row2 = mysqli_fetch_array($querydoc)) {
              echo "<option value='".$row2['id']."'>".$row2['tipo_documento']."</option>";
              }
              ?>
            </select>
            <br/><br/>  
          </div>
      </div>

      <div class="col-sm-6">
      <br>   
        <label>Numero de Documento:</label>
        <label for="numero_documento" generated="true" class="error"></label>
        <input class="form-control" type="int" name="numero_documento" id="numero_documento" onkeypress="return esInteger(event)" value='<?php echo $numero_documento ?>' required>
      </div>

      <div class="col-sm-6">
      <br>       
        <label>Dirección:</label>
        <label for="direccion" generated="true" class="error"></label>
        <input class="form-control" type="text" name="direccion" value='<?php echo $direccion ?>'>
      </div>

      <div class="col-sm-6">
      <br>
        <label>Fecha de Nacimiento:</label>
        <label for="fechana" generated="true" class="error"></label>
        <input class="form-control" type="date" name="fechana" value='<?php echo $fechanacimiento ?>' required>
      </div>

      <div class="col-sm-6">
      <br>
        <label>Lugar de Nacimiento:</label>
         <label for="lugarnacimiento" generated="true" class="error"></label>
        <input class="form-control" type="text" name="lugarnacimiento" value='<?php echo $lugarnacimiento ?>' required> 
      </div> 

      <div class="col-sm-6">
      <br>
        <label>Edad:</label>
        <label for="edad" generated="true" class="error"></label>
        <input class="form-control" type="int" name="edad" onkeypress="return esInteger(event)" value='<?php echo $edad ?>' required>
        <br>
      </div>

      <div class="col-sm-6">
      <br> 
        <label>Celular:</label>
        <label for="celular" generated="true" class="error"></label>
        <input class="form-control" type="int" name="celular" value='<?php echo $celular ?>' onkeypress="return esInteger(event)">
      </div> 
  <!---->
  <div class="col-sm-12"> 
      <table class="table table-bordered">  
        <thead>
          <tr>
            <th class="text-center">Sexo:</th>
            <th class="text-center">Hijos:</th>
            <th class="text-center">Estado civil:</th>
          </tr>
        </thead>
      <tbody class="text-center">
        <tr>  
          <td>
            <label for="sexo" generated="true" class="error"></label>  
            <?php
            if ($genero == "masculino") {?>
            <label><input type="radio" name="sexo" value="masculino" checked> Masculino</label>
            <label><input  type="radio" name="sexo" value="femenino" > Femenino</label>
            <?php } else { ?>
            <input  type="radio" name="sexo" value="masculino">Masculino
            <input  type="radio" name="sexo" value="femenino" checked>Femenino
            <?php } ?>
          </td>        
  
          <td>
            <label for="hijos" generated="true" class="error"></label>
            <?php
            if ($hijos == "si") {?>
            <label><input type="radio" name="hijos" value="si" checked> Si tiene</label>
            <label><input  type="radio" name="hijos" value="no" > No tiene</label>
            <?php } else { ?>
            <label><input  type="radio" name="hijos" value="si"> Si tiene</label>
            <label><input  type="radio" name="hijos" value="no" checked> No tiene</label>
            <?php } ?>
          </td>        

          <td>
            <label for="estcivil" generated="true" class="error"></label>
            <?php switch ($estadocivil) {
            case 'Soltero':
              echo '<label><input type="radio" name="estcivil" value="Soltero" checked> Soltero
              <input type="radio" name="estcivil" value="Casado"> Casado
              <input type="radio" name="estcivil" value="Union libre"> Union Libre
              <input type="radio" name="estcivil" value="Separado"> Separado';
            break;
            case 'Casado':
              echo '<label><input type="radio" name="estcivil" value="Soltero"> Soltero
              <input type="radio" name="estcivil" value="Casado" checked> Casado
              <input type="radio" name="estcivil" value="Union libre"> Union Libre
              <input type="radio" name="estcivil" value="Separado"> Separado';
            break;  
            case 'Union libre':
              echo '<label><input type="radio" name="estcivil" value="Soltero"> Soltero
              <input type="radio" name="estcivil" value="Casado"> Casado
              <input type="radio" name="estcivil" value="Union libre" checked> Union Libre
              <input type="radio" name="estcivil" value="Separado"> Separado';
            break;
            case 'Separado':
              echo '<label><input type="radio" name="estcivil" value="Soltero"> Soltero
              <input type="radio" name="estcivil" value="Casado"> Casado
              <input type="radio" name="estcivil" value="Union libre"> Union Libre
              <input type="radio" name="estcivil" value="Separado" checked> Separado';
            break;  
            } ?>
          
            </td>  
        </tr>
      </tbody>
    </table>
  </div> 
    
      <div class="col-sm-12">
        <br><br>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center">Escolaridad:</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <label for="escolaridad" generated="true" class="error"></label>
              <fieldset>
                <td><div class="text-center"><label>
                 <?php switch ($escolaridad) {
                  case 'Analfabeta':
                    echo '<label><input type="radio" name="escolaridad" value="Analfabeta" checked> Analfabeta
                    / <input type="radio" name="escolaridad" value="Primaria Completa"> Primaria Completa
                    / <input type="radio" name="escolaridad" value="Primarica Incompleta"> Primarica Incompleta
                    / <input type="radio" name="escolaridad" value="Secundaria Completa"> Secundaria Completa
                    <hr>
                     <input type="radio" name="escolaridad" value="Secundaria Incompleta"> Secundaria Incompleta
                    / <input type="radio" name="escolaridad" value="Tecnico"> Tecnico
                    / <input type="radio" name="escolaridad" value="Tecnologo"> Tecnologo
                    / <input type="radio" name="escolaridad" value="Universitario"> Universitario
                    / <input type="radio" name="escolaridad" value="Post Grado"> Post Grado';
                    break;
                  case 'Primaria Completa':
                    echo '<label><input type="radio" name="escolaridad" value="Analfabeta"> Analfabeta
                    / <input type="radio" name="escolaridad" value="Primaria Completa" checked> Primaria Completa
                    / <input type="radio" name="escolaridad" value="Primarica Incompleta"> Primarica Incompleta
                    / <input type="radio" name="escolaridad" value="Secundaria Completa"> Secundaria Completa
                    <hr>
                     <input type="radio" name="escolaridad" value="Secundaria Incompleta"> Secundaria Incompleta
                    / <input type="radio" name="escolaridad" value="Tecnico"> Tecnico
                    / <input type="radio" name="escolaridad" value="Tecnologo"> Tecnologo
                    / <input type="radio" name="escolaridad" value="Universitario"> Universitario
                    / <input type="radio" name="escolaridad" value="Post Grado"> Post Grado';
                      break;  
                  case 'Primarica Incompleta':
                    echo '<label><input type="radio" name="escolaridad" value="Analfabeta"> Analfabeta
                    / <input type="radio" name="escolaridad" value="Primaria Completa"> Primaria Completa
                    / <input type="radio" name="escolaridad" value="Primarica Incompleta" checked> Primarica Incompleta
                    / <input type="radio" name="escolaridad" value="Secundaria Completa"> Secundaria Completa
                    <hr>
                     <input type="radio" name="escolaridad" value="Secundaria Incompleta"> Secundaria Incompleta
                    / <input type="radio" name="escolaridad" value="Tecnico"> Tecnico
                    / <input type="radio" name="escolaridad" value="Tecnologo"> Tecnologo
                    / <input type="radio" name="escolaridad" value="Universitario"> Universitario
                    / <input type="radio" name="escolaridad" value="Post Grado"> Post Grado';
                    break;
                  case 'Secundaria Completa':
                    echo '<label><input type="radio" name="escolaridad" value="Analfabeta"> Analfabeta
                    / <input type="radio" name="escolaridad" value="Primaria Completa"> Primaria Completa
                    / <input type="radio" name="escolaridad" value="Primarica Incompleta"> Primarica Incompleta
                    / <input type="radio" name="escolaridad" value="Secundaria Completa" checked> Secundaria Completa
                    <hr>
                     <input type="radio" name="escolaridad" value="Secundaria Incompleta"> Secundaria Incompleta
                    / <input type="radio" name="escolaridad" value="Tecnico"> Tecnico
                    / <input type="radio" name="escolaridad" value="Tecnologo"> Tecnologo
                    / <input type="radio" name="escolaridad" value="Universitario"> Universitario
                    / <input type="radio" name="escolaridad" value="Post Grado"> Post Grado';
                      break; 
                  case 'Secundaria Incompleta':
                    echo '<label><input type="radio" name="escolaridad" value="Analfabeta"> Analfabeta
                    / <input type="radio" name="escolaridad" value="Primaria Completa"> Primaria Completa
                    / <input type="radio" name="escolaridad" value="Primarica Incompleta"> Primarica Incompleta
                    / <input type="radio" name="escolaridad" value="Secundaria Completa"> Secundaria Completa
                    <hr>
                     <input type="radio" name="escolaridad" value="Secundaria Incompleta" checked> Secundaria Incompleta
                    / <input type="radio" name="escolaridad" value="Tecnico"> Tecnico
                    / <input type="radio" name="escolaridad" value="Tecnologo"> Tecnologo
                    / <input type="radio" name="escolaridad" value="Universitario"> Universitario
                    / <input type="radio" name="escolaridad" value="Post Grado"> Post Grado';
                  break;
                  case 'Tecnico':
                    echo '<label><input type="radio" name="escolaridad" value="Analfabeta"> Analfabeta
                    / <input type="radio" name="escolaridad" value="Primaria Completa"> Primaria Completa
                    / <input type="radio" name="escolaridad" value="Primarica Incompleta"> Primarica Incompleta
                    / <input type="radio" name="escolaridad" value="Secundaria Completa"> Secundaria Completa
                    <hr>
                     <input type="radio" name="escolaridad" value="Secundaria Incompleta"> Secundaria Incompleta
                    / <input type="radio" name="escolaridad" value="Tecnico" checked> Tecnico
                    / <input type="radio" name="escolaridad" value="Tecnologo"> Tecnologo
                    / <input type="radio" name="escolaridad" value="Universitario"> Universitario
                    / <input type="radio" name="escolaridad" value="Post Grado"> Post Grado';
                  break;
                  case 'Tecnologo':
                    echo '<label><input type="radio" name="escolaridad" value="Analfabeta"> Analfabeta
                    / <input type="radio" name="escolaridad" value="Primaria Completa"> Primaria Completa
                    / <input type="radio" name="escolaridad" value="Primarica Incompleta"> Primarica Incompleta
                    / <input type="radio" name="escolaridad" value="Secundaria Completa"> Secundaria Completa
                    <hr>
                     <input type="radio" name="escolaridad" value="Secundaria Incompleta"> Secundaria Incompleta
                    / <input type="radio" name="escolaridad" value="Tecnico"> Tecnico
                    / <input type="radio" name="escolaridad" value="Tecnologo" checked> Tecnologo
                    / <input type="radio" name="escolaridad" value="Universitario"> Universitario
                    / <input type="radio" name="escolaridad" value="Post Grado"> Post Grado';
                  break;
                  case 'Universitario':
                    echo '<label><input type="radio" name="escolaridad" value="Analfabeta"> Analfabeta
                    / <input type="radio" name="escolaridad" value="Primaria Completa"> Primaria Completa
                    / <input type="radio" name="escolaridad" value="Primarica Incompleta"> Primarica Incompleta
                    / <input type="radio" name="escolaridad" value="Secundaria Completa"> Secundaria Completa
                    <hr>
                     <input type="radio" name="escolaridad" value="Secundaria Incompleta"> Secundaria Incompleta
                    / <input type="radio" name="escolaridad" value="Tecnico"> Tecnico
                    / <input type="radio" name="escolaridad" value="Tecnologo"> Tecnologo
                    / <input type="radio" name="escolaridad" value="Universitario" checked> Universitario
                    / <input type="radio" name="escolaridad" value="Post Grado"> Post Grado';
                  break;
                  case 'Post Grado':
                    echo '<label><input type="radio" name="escolaridad" value="Analfabeta"> Analfabeta
                    / <input type="radio" name="escolaridad" value="Primaria Completa"> Primaria Completa
                    / <input type="radio" name="escolaridad" value="Primarica Incompleta"> Primarica Incompleta
                    / <input type="radio" name="escolaridad" value="Secundaria Completa"> Secundaria Completa
                    <hr>
                     <input type="radio" name="escolaridad" value="Secundaria Incompleta"> Secundaria Incompleta
                    / <input type="radio" name="escolaridad" value="Tecnico"> Tecnico
                    / <input type="radio" name="escolaridad" value="Tecnologo"> Tecnologo
                    / <input type="radio" name="escolaridad" value="Universitario"> Universitario
                    / <input type="radio" name="escolaridad" value="Post Grado" checked> Post Grado';
                  break;         
                } ?>
                </label></div></td>
              </fieldset>
            </tr>
          </tbody>
        </table>
      </div><!--finsm-->

      <div class="col-sm-6">
        <br>
        <label>EPS:</label>
        <input class="form-control" type="text" name="eps" value='<?php echo $eps ?>'>
      </div>

      <div class="col-sm-6">
        <br> 
        <label>ARL:</label>
        <input class="form-control" type="text" name="arl" value='<?php echo $arl ?>'>
      </div>

      <div class="col-sm-6">
        <br> 
        <label>AFP:</label>
        <input class="form-control" type="text" name="afp" value='<?php echo $afp ?>'>
      </div>

      <div class="col-sm-3">
        <br> 
        <label>Fecha (D/M/A):</label>
        <label for="fecha" generated="true" class="error"></label>
        <input class="form-control" type="date" name="fecha" value='<?PHP  echo $fecha ?>'><?php //echo $fecha ?>
      </div>

      <div class="col-sm-3">
        <br> 
        <label>Hora:</label>
        <label for="hora" generated="true" class="error"></label>
        <input class="form-control" type="text" name="hora" id="myWatch">
        <br>
      </div>
</div>
</div>
</div> 
    <div class="container">     
      <div class="panel panel-default">
        <div class="panel-heading text-center"><label>Citar Pacientes En:</label></div>
        <div class="panel-body">
          <div class="text-center">
            <label>Audiometria:</label> <input type="checkbox" name="audiometria" value="Esperando Atencion" checked> /
            <label>Visiometria:</label> <input type="checkbox" name="visiometria" value="Esperando Atencion" checked> /
            <label>Espirometria:</label> <input type="checkbox" name="espirometria" value="Esperando Atencion" checked> /
            <label>Psicología:</label> <input type="checkbox" name="psicologia" value="Esperando Atencion" checked> /
            <label>Enfermería:</label> <input type="checkbox" name="enfermeria" value="Esperando Atencion" checked> /
            <label>Medico:</label> <input type="checkbox" name="medico" value="Esperando Atencion" checked> 
          </div>  
        </div>
      </div>
    </div>

      <div class="row">
        <div class="text-center">
          <div class="col-sm-12">
            <br> 
            <input type="submit" id="btn" name="Registrar" value="Registrar" class="btn btn-success"><!--CHANGE NAME TO REGISTRAR-->
          </div>
        </div>
      </div>
      <br><br>

  </form> 

<?php  
  }
}
?>
  <!--datos guardados-->
  <div class="modal fade" id="datossucces" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='recepcion_foto.php';">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button onClick="window.location.href='recepcion_foto.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3>Alerta</h3>
        </div>
        <div class="modal-body">
          <h4>Datos Registrados Exitosamente.</h4>       
        </div>
        <div class="modal-footer">
          <a onClick="window.location.href='recepcion_foto.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
        </div>
      </div>
    </div>
  </div>

  <!--datos Error-->
  <div class="modal fade" id="datoserror" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='recepcion.php';">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button onClick="window.location.href='recepcion.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3>Alerta</h3>
        </div>
        <div class="modal-body">
          <h4>Error, Intente Nuevamente.</h4>       
        </div>
        <div class="modal-footer">
          <a onClick="window.location.href='recepcion.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
        </div>
      </div>
    </div>
  </div>


  <!--mensaje validacion si el paciente ingresa por primera ves-->
  <div class="modal fade" id="sindata" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button  type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3>Alerta</h3>
        </div>
        <div class="modal-body">
          <h4>Recuerde que la Información a Digitar Debe Ser Exacta.</h4>       
        </div>
        <div class="modal-footer">
          <a  data-dismiss="modal" class="btn btn-danger">Cerrar</a>
        </div>
      </div>
    </div>
  </div>

    <!--mensaje validacion motivo de evaluacion-->
  <div class="modal fade" id="validacionmotivoeva" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button  type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3>Alerta</h3>
        </div>
        <div class="modal-body">
          <h4>Debe Seleccionar Un Motivo De Evaluación.</h4>       
        </div>
        <div class="modal-footer">
          <a  data-dismiss="modal" class="btn btn-danger">Cerrar</a>
        </div>
      </div>
    </div>
  </div>


<!--ALerta historial del paciente-->
<?php if (isset($_POST['cedula'])) { ?>

<?php// }else{ ?>
<div class="modal fade" id="historial" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> Alerta.</h4>
      </div>
      <div class="modal-body">
        <h4 class="text-primary">Historial de Usuario con Identificación Nº <label class="text-danger"><?php echo $id; ?></label></h4>
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Ingreso: </strong></label> <?php echo $ingreso ?></p> 
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Periódicas: </strong></label> <?php echo $periodico ?></p> 
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Retiro: </strong></label> <?php echo $retiro ?></p>
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Post Incapacidad: </strong></label> <?php echo $postincapacidad ?></p>
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Reubicacion: </strong></label> <?php echo $reubicacion ?></p>
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Reingreso: </strong></label> <?php echo $reingreso ?></p> 
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Otros: </strong></label> <?php echo $otros ?></p>   
        <p><label>El Ultimo Registro de Evaluación Clínica Se Realizo el día: <strong style="color: red;"> <?php echo $ultimo ?> </strong></label> </p>
        <p><a target="_blank" href="#" style="color: red;"  class="">Ir a Consultas</a></p> 
      </div>
      <div class="modal-footer">
        <a  data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>

<?php 
}//diferente
//}//fin ifelse tipoconsulta
//}
//}
/*}else{
  echo "<script>alert('El usuario no cuenta con una historia clinica de ingreso ')</script>";
  echo "<script>window.location = 'recepcion.php'</script>";
}*/
?><!--fin tipocon-->



  <?php //include 'bar/footer.php'; ?>
</body>
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

</html>
