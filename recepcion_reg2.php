 <?php 
  include ('includes/conexion.php'); 
  // include ('bar/navbar_recepcion.php'); 
 
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

  <?php 

  if (isset($_POST['Registrar2'])) {
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
    $expedicion = $_POST['fechaexpedicion'];
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


    $datos = "INSERT INTO `datos_complementarios`(`id`,`nombres_apellidos`, `fk_tipo_documento`, `numero_documento`, `fecha_expedicion`, `fecha_nacimiento`, `lugar_nacimiento`, `genero`) 
    VALUES ('NULL','$nombrestrab','$tipodocumento','$identificacion','$expedicion','$fechanac','$lugarnac', '$sexo')"; 
    $query1 = mysqli_query($conexion,$datos);


    //-----------------
    if ($query1){   
      //Obtenemos El Ultimo ID Insertado
      $ver = "SELECT * FROM datos_complementarios ORDER BY `id` DESC limit 0,1";
      $queryid = mysqli_query ($conexion,$ver);
      $dataid = mysqli_fetch_array($queryid);
      $idfk_dc = $dataid['id'];
    }else{
      echo "<script>alert('Error, Intente Nuevamente')</script>";
    }
    //-----------------

    $datos2 = "INSERT INTO `datos_basicos`(`id_historia`, `motivo_evaluacion`, `fecha`, `hora`, `nombre_empresa`, `actividad_economica`, `cargo_a_desempenar`, `ciudad`, `direccion_empresa`, `numero_nit`, `telefono_empresa`, `edad`, `direccion`,`hijos`, `estado_civil`, `celular`, `escolaridad`, `eps`, `arl`, `afp`, `fk_d_complementario`) 
    VALUES ('NULL','$motivoEva','$fecha_ing','$hora_ing','$nomEmpresa','$actEconomica','$cargo','$ciudadEmp', '$direccion_empresa','$nit','$telefono_empresa','$edad', '$direccion', '$hijos','$estcivil','$celular','$escolaridad','$eps','$arl','$afp','$idfk_dc')"; 
    $query2 = mysqli_query($conexion,$datos2);

    //-----------------
    if ($query2){   
      //Obtenemos El Ultimo ID Insertado
      $ver = "SELECT * FROM datos_basicos ORDER BY `id_historia` DESC limit 0,1";
      $queryid = mysqli_query ($conexion,$ver);
      $dataid = mysqli_fetch_array($queryid);
      $idfk_datos_basicos = $dataid['id_historia'];
    }else{
      echo "<script>alert('Error, Intente Nuevamente')</script>";
    }
    //----------------- 

    $audiometria = $_POST['audiometria'];
    $visiometria = $_POST['visiometria'];
    $espirometria = $_POST['espirometria'];
    $psicologia = $_POST['psicologia'];
    $enfermeria = $_POST['enfermeria'];
    $medico = $_POST['medico'];

    //,'$audiometria','$visiometria','$espirometria','$psicologia','$enfermeria','$medico'
    $data = "INSERT INTO `db_estado_atencion`(`id`,`audiometria`, `visiometria`, `espirometria`, `psicologia`, `enfermeria`, `medico`, `paciente`)
    VALUES(NULL,'$audiometria','$visiometria','$espirometria','$psicologia','$enfermeria','$medico','$idfk_datos_basicos')";
    $query3 = mysqli_query($conexion,$data);

    $data2 = "INSERT INTO `datos_basicos_atencion`(`id`, `id_datos_basicos`)
    VALUES(NULL,'$idfk_datos_basicos')";
    $query4 = mysqli_query($conexion,$data2);

    if ($query1 && $query2 && $query3 && $query4) {
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
?>
<!-- 
<script type="text/javascript" src="jvalidation/lib/jquery.js"></script> -->
<script type="text/javascript" src="jvalidation/dist/jquery.validate.js"></script>

<script>
$(function(){

/* Incluimos un método para validar el campo nombre */
jQuery.validator.addMethod("nombres", function(value, element) {
return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
}); 

/* Capturar el click del botón */
$("#btn2").on("click", function()
   {
    /* Validar el formulario */
    $("#formulario2").validate
         ({
             rules: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
             {
               //email: {required: true, email: true, minlength: 5, maxlength: 80},
               motivoevaluacion: {required: true},
               //nombreempresa: {required: true, minlength: 2, maxlength: 50},
               cargodesempena: {required: true, minlength: 2, maxlength: 50},

               nombres: {required: true, minlength: 2, maxlength: 50},
               //tipodocumento: {required: true},
               numero_documento: {required: true, digits: true, minlength: 4, maxlength:20},
               direccion: {required: true, minlength: 3, maxlength: 80},
               fechana: {required: true},
               fechaexpedicion: {required: true},
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
               fechaexpedicion: {required: 'Elige una fecha'},
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


<form  method="POST" id="formulario2" name="form">

<div class="container">
<div class="panel panel-default">
  <div class="panel-heading text-center">Motivo de Evaluacion</div>
    <div class="panel-body">
        <div class="col-sm-12">
          <div class="text-center">
            <table class="table table-bordered">
              <tbody>
                <tr>
                <fieldset>
                  <td>
                    <label for="motivoevaluacion" generated="true" class="error"></label> 
                    <div class="text-center"><label>Ingreso</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Ingreso"> /
                    <label>Periódico</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Periodico"> /
                    <label>Retiro</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Retiro"> /
                    <label>Post Incapacidad</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Post incapacidad"> / 
                    <label>Reubicacion</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Reubicacion"> /
                    <label>Reingreso</label> <input type="radio" id="motivoevaluacion" name="motivoevaluacion" value="Reingreso">
                    <hr>
                    <div class="col-sm-6 form-inline">
                      <label>Otro:</label> <input class="form-control" type="text" id="motivoevaluacion" name="mmotivoevaluacion"> 
                    </div>
                    <div class="col-sm-6 form-inline">
                      <label>Ips :</label> <input class="form-control" type="text" id="motivoevaluacion" name="mmotivoevaluacion"> </div>
                    </div>
                    <!--<input type="text" name="ipscontrantante" placeholder="Digitar IPS">-->
                  </td>
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
  <div class="panel-heading text-center">Identificacion Empresa</div>
    <div class="panel-body">      
      <div class="col-sm-12">
        <br>
        <label>Nombre de la Empresa:</label>
        <label for="nombreempresa" generated="true" class="error"></label> 
        <input class="form-control" type="text" name="nombreempresa" id="nombreempresa">
      </div>

      <div class="col-sm-6">
        <br> 
        <label>Numero Nit:</label>
        <input class="form-control" type="text" name="nit" >
      </div>

      <div class="col-sm-6"> 
        <br>
        <label>Actividad Económica:</label>
        <input class="form-control" type="text" name="actividadeconomica" >
      </div>
       
      <div class="col-sm-6">
        <br>   
        <label>Cargo a desempeñar:</label>
        <label for="cargodesempena" generated="true" class="error"></label> 
        <input class="form-control" type="text" name="cargodesempena" id="cargodesempena">
      </div>

      <div class="col-sm-6">
        <br> 
        <label>Ciudad:</label>
        <input class="form-control" type="text" name="ciudad" >
      </div>

      <div class="col-sm-6">
        <br> 
        <label>Direccion de la Empresa:</label>
        <input class="form-control" type="text" name="direccion_empresa" >
      </div>

      <div class="col-sm-6">
        <br> 
        <label>Telefono de la Empresa:</label>
        <input class="form-control" type="text" name="telefono_empresa">
      </div>
</div>
</div>
</div>

<div class="container">
<div class="panel panel-default">
  <div class="panel-heading text-center">Identificación del Trabajador:</div>
    <div class="panel-body">

      <div class="col-sm-6">
        <br> 
        <label>Nombres y Apellidos:</label>
        <label for="nombres" generated="true" class="error"></label> 
        <input class="form-control" type="text" name="nombres" id="nombres">
      </div>

      <div class="col-sm-6">
      <br>   
        <div>
          <label>Seleccione Tipo Documento:</label>
          <label for="tipodocumento" generated="true" class="error"></label> 
          <select class="form-control" name="tipodocumento" id="tipodocumento">
          <option value="">Seleccionar</option>
            <?php
            $tipo_doc ="SELECT * FROM `datos_basicos_tipo_documento` ";
            $querydoc = mysqli_query($conexion,$tipo_doc);
            while ($row2 = mysqli_fetch_array($querydoc)) {
            echo "<option value='".$row2['idtd']."'>".$row2['tipo_documento']."</option>";
            }
            ?>
          </select>
          <br/><br/>  
        </div>
      </div>

      <div class="col-sm-6">
      <br>   
        <label>Numero documento:</label>
        <label for="numero_documento" generated="true" class="error"></label> 
        <input class="form-control" type="int" name="numero_documento" id="numero_documento" onkeypress="return esInteger(event)" required>
      </div>

      <div class="col-sm-6">
      <br>       
        <label>Dirección:</label>
        <label for="direccion" generated="true" class="error"></label>
        <input class="form-control" type="text" name="direccion" id="direccion">
      </div>

      <div class="col-sm-3">
        <br>
        <label>Fecha Expedicion:</label>
        <label for="fechaexpedicion" generated="true" class="error"></label>
        <input class="form-control" type="date" name="fechaexpedicion" required>
      </div>

      <div class="col-sm-3">
      <br>
        <label>Edad:</label>
        <label for="edad" generated="true" class="error"></label>
        <input class="form-control" type="int" name="edad" onkeypress="return esInteger(event)" required>
      </div>

      <div class="col-sm-6">
      <br>
        <label>Lugar de nacimiento:</label>
        <label for="lugarnacimiento" generated="true" class="error"></label>
        <input class="form-control" type="text" name="lugarnacimiento" required> 
      </div> 

      <div class="col-sm-6">
        <br>
        <label>Fecha de nacimiento:</label>
        <label for="fechana" generated="true" class="error"></label>
        <input class="form-control" type="date" name="fechana" required>
        <br>
      </div>

      <div class="col-sm-6">
      <br> 
        <label>Celular:</label>
        <label for="celular" generated="true" class="error"></label>
        <input class="form-control" type="int" name="celular" onkeypress="return esInteger(event)">
      </div>  

      <div class="col-sm-12">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center">Sexo:</th>
              <th class="text-center">Hijos:</th>
              <th class="text-center">Estado Civil:</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr>
              <td>
                <label for="sexo" generated="true" class="error"></label> 
                <fieldset>    
                  <label><input type="radio" name="sexo" value="masculino"> Masculino
                  <input type="radio" name="sexo" value="femenino"> Femenino
                  </label>
                </fieldset>
              </td>  
              <td>
                <label for="hijos" generated="true" class="error"></label>
                <fieldset>
                  <label><input type="radio" name="hijos" value="si"> Si tiene
                  <input type="radio" name="hijos" value="no"> No tiene
                  </label>
                </fieldset>
              </td>
            
              <td>
                <label for="estcivil" generated="true" class="error"></label>
                <fieldset class="font_size_13"> 
                  <label><input type="radio" name="estcivil" value="Soltero"> Soltero /
                  <input type="radio" name="estcivil" value="Casado"> Casado /
                  <input type="radio" name="estcivil" value="Union libre"> Unión Libre /
                  <input type="radio" name="estcivil" value="Separado"> Separado 
                  </label>
                </fieldset>
              </td> 
            </tr>
          </tbody>
        </table>
      </div>

      <div class="col-sm-12">
        <br>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center" colspan="9">Escolaridad:</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <fieldset>
              <thead>
                <th>Analfabeta</th>
                <th>Primaria Completa</th>
                <th>Primaria Incompleta</th>
                <th>Secundaria Completa</th>
                <th>Secundaria Incompleta</th>
                <th>Técnico</th>
                <th>Tecnologo</th>
                <th>Universitario </th>
                <th>Post Grado</th>
                <label for="escolaridad" generated="true" class="error"></label> 
              </thead>
              <tbody>
                <tr class="text-center">
                                 
                  <td> 
                    <input type="radio" name="escolaridad" value="Analfabeta"> 
                  </td> 
                  <td> 
                    <input type="radio" name="escolaridad" value="Primaria Completa">
                  </td>
                  <td> 
                    <input type="radio" name="escolaridad" value="Primarica Incompleta"> 
                  </td>
                  <td>
                    <input type="radio" name="escolaridad" value="Secundaria Completa">
                  </td> 
                  <td>
                    <input type="radio" name="escolaridad" value="Secundaria Incompleta">
                  </td>
                  <td>
                    <input type="radio" name="escolaridad" value="Tecnico"> 
                  </td>
                  <td>
                    <input type="radio" name="escolaridad" value="Tecnologo">
                  </td> 
                  <td>
                    <input type="radio" name="escolaridad" value="Universitario">
                  </td>
                  <td> 
                    <input type="radio" name="escolaridad" value="Post Grado">
                  </td>
                </tr>
              </tbody>  
              </fieldset>
            </tr>
          </tbody>
        </table>
      </div><!--finsm-->

      <div class="col-sm-6">
        <br>
        <label>EPS:</label>
        <input class="form-control" type="text" name="eps">
      </div>

      <div class="col-sm-6">
        <br> 
        <label>ARL:</label>
        <input class="form-control" type="text" name="arl">
      </div>

      <div class="col-sm-6">
        <br> 
        <label>AFP:</label>
        <input class="form-control" type="text" name="afp">
      </div>

      <div class="col-sm-3">
        <br> 
        <label for="fecha" generated="true" class="error"></label>
        <label>Fecha:</label>
        <input class="form-control" type="text" name="fecha" value='<?php echo $fecha ?>'>
      </div>

      <div class="col-sm-3">
        <br>
        <label for="hora" generated="true" class="error"></label> 
        <label>Hora:</label>
        <input class="form-control" type="text" name="hora" id="myWatch">
        <br>
      </div>
    </div>
  </div>
</div>

    <div class="container">      
      <div class="panel panel-default">
        <div class="panel-heading text-center"><label>Citar Paciente En:</label></div>
        <div class="panel-body">
          <div class="text-center font_size_13" >
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
            <input type="submit" id="btn2" name="Registrar2" value="Registrar" class="btn btn-success">
          </div>
        </div>
      </div>
      <br><br>
  </form>