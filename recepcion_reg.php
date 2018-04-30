<?php 
  include ('includes/conexion.php'); 
  include ('bar/navbar_recepcion.php'); 
 
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
    <script type="text/javascript" src="jvalidation/dist/jquery.validate.js"></script> 
  </head>
<?php 
  if (isset($_POST['Registroselectivo'])) {

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
    $fechanac = $_POST['fechana'];
    $lugarnac = $_POST['lugarnacimiento'];
    $sexo = $_POST['sexo'];
    $direccion = $_POST['direccion'];
    $edad = $_POST['edad'];
    $hijos = $_POST['hijos'];
    $estcivil = $_POST['estcivil'];
    $celular = $_POST['celular'];
    $escolaridad = $_POST['escolaridad'];
    $eps = $_POST['eps'];
    $arl = $_POST['arl'];
    $afp = $_POST['afp'];
    $fecha_ing = $_POST['fecha'];
    $hora_ing = $_POST['hora'];

    $idfk_dc = $_POST['idfkc'];

    $datos2 = "INSERT INTO `datos_basicos`(`id_historia`, `motivo_evaluacion`, `fecha`, `hora`, `nombre_empresa`, `actividad_economica`, `cargo_a_desempenar`, `ciudad`, `direccion_empresa`, `numero_nit`, `telefono_empresa`, `edad`, `direccion`,`hijos`, `estado_civil`, `celular`, `escolaridad`, `eps`, `arl`, `afp`, `fk_d_complementario`) 
    VALUES ('NULL','$motivoEva','$fecha_ing','$hora_ing','$nomEmpresa','$actEconomica','$cargo','$ciudadEmp', '$direccion_empresa','$nit','$telefono_empresa','$edad', '$direccion', '$hijos','$estcivil','$celular','$escolaridad','$eps','$arl','$afp','$idfk_dc')"; 
    $query2 = mysqli_query($conexion,$datos2);

    if ($query2){   
      //Obtenemos El Ultimo ID Insertado
      $ver = "SELECT * FROM datos_basicos ORDER BY `id_historia` DESC limit 0,1";
      $queryid = mysqli_query ($conexion,$ver);
      $dataid = mysqli_fetch_array($queryid);
      $idfk_datos_basicos = $dataid['id_historia'];
    }else{
      echo "<script>alert('Error 'Get', Intente Nuevamente ')</script>";
    }
    //----------------- 
    $audiometria = $_POST['audiometria'];
    $visiometria = $_POST['visiometria'];
    $espirometria = $_POST['espirometria'];
    $psicologia = $_POST['psicologia'];
    $enfermeria = $_POST['enfermeria'];
    $medico = $_POST['medico'];

    $data = "INSERT INTO `db_estado_atencion`(`id`,`audiometria`, `visiometria`, `espirometria`, `psicologia`, `enfermeria`, `medico`, `paciente`)
    VALUES(NULL,'$audiometria','$visiometria','$espirometria','$psicologia','$enfermeria','$medico','$idfk_datos_basicos')";
    $query3 = mysqli_query($conexion,$data);

    $data2 = "INSERT INTO `datos_basicos_atencion`(`id`, `id_datos_basicos`)
    VALUES(NULL,'$idfk_datos_basicos')";
    $query4 = mysqli_query($conexion,$data2);

    if ($query2 && $query3 && $query4) {
      echo "<script>alert('Datos Registrados Exitosamente')</script>";
      echo "<script>window.location = 'recepcion_foto.php'</script>";
    }else{
      echo "<script>alert('Error, Intente Nuevamente')</script>";
      echo "<script>window.location = 'recepcion.php'</script>";
    }
  }
?>
<script>
  $(function(){
    $("#btn").on("click", function(){
      /* Validar el formulario */
      $("#formulario").validate({
        rules:{/* Accedemos a los campos a través de su nombre: email, nombre, edad */
         email: {required: true, email: true, minlength: 5, maxlength: 80},
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
        messages:{ /* Accedemos a los campos a través de su nombre: email, nombre, edad */
         email: {required: 'Este campo es requerido', email: 'El formato de email es incorrecto', minlength: 'El mínimo permitido son 5 caracteres', maxlength: 'El máximo permitido son 80 caracteres'},
         motivoevaluacion: {required: 'Selecionar un motivo de evaluacion'},
         nombreempresa: {required: 'Este campo es requerido',  minlength: 'El mínimo permitido son 2 caracteres', maxlength: 'El máximo permitido son 50 caracteres'},
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
<?php
  $documento = $_POST['cedula'];
  //order by db.fecha desc limit 1 
  $consult="SELECT * FROM datos_basicos AS db
  JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
  JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
  WHERE  dc.numero_documento='$documento'";
  $queryc = mysqli_query($conexion,$consult);

  if (mysqli_num_rows($queryc) > 0){

    while ($datos=mysqli_fetch_array($queryc)) {
      //datos cargados de el ultimo registro
      $datos_complementarios = $datos['id'];
      $motivoeva= $datos['motivo_evaluacion'];

      $nombreempresa= $datos['nombre_empresa'];
      $actividadeconomica= $datos['actividad_economica'];
      $cargoadesempenar= $datos['cargo_a_desempenar'];
      $nit= $datos['numero_nit'];
      $telefono_empresa= $datos['telefono_empresa'];
      $direccion_empresa= $datos['direccion_empresa'];

      $ciudad= $datos['ciudad'];
      $nombresapellidos= $datos['nombres_apellidos'];
      $tipo_doc= $datos['idtd'];
      $numero_documento= $datos['numero_documento'];
      $expedicion = $datos['fecha_expedicion'];
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
    //}//while
?>  
<body>
<form  method="POST" name="formulario" id="formulario"><!--registro para paciente con historia clinica-->
  <input type="text" name="idfkc" value="<?php echo $datos_complementarios ?>" style="display: none;"> 
  <div class="container">
    <div class="text-center"><br>
      <h3 class="text-primary"></h3>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading text-center">Motivo de Evaluacion</div>
      <div class="panel-body">
        <div class="col-sm-12">
          <table class="table table-bordered">
            <thead>
              <th class="text-center">Ingreso</th>
              <th class="text-center">Periódico</th>
              <th class="text-center">Retiro</th>
              <th class="text-center">Post Incapacidad</th>
              <th class="text-center">Reubicacion</th>
              <th class="text-center">Reingreso</th>
              <th class="text-center">Otro:</th>
            </thead>
            <tbody>
              <tr class="text-center">
                <label for="motivoevaluacion" generated="true" class="error"></label> 
              	<td><input type="radio" id="1" name="motivoevaluacion" value="Ingreso"></td>
              	<td><input type="radio" id="2" name="motivoevaluacion" value="Periodico"></td>
              	<td><input type="radio" id="3" name="motivoevaluacion" value="Retiro"></td>
              	<td><input type="radio" id="4" name="motivoevaluacion" value="Post incapacidad"></td>             
              	<td><input type="radio" id="5" name="motivoevaluacion" value="Reubicacion"></td>              	
              	<td><input type="radio" id="6" name="motivoevaluacion" value="Reingreso"></td>
                <td><input type="checkbox" id="otro" name="otro" value="Ingreso" onchange="activar()"></td>  
              </tr>
              <tr>
                <td colspan="7">
                  <input class="form-control" type="text" id="otromotivo" name="motivoevaluacion" disabled="disabled">
                </td>
              </tr>
            </tbody>
          </table>
        </div><!--finsm-->
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading text-center">Identificacion de la Empresa</div>
      <div class="panel-body">      
        <div class="col-sm-12"><br>
          <label>Nombre de la empresa:</label>
          <input class="form-control" type="text" name="nombreempresa" value='<?php echo $nombreempresa ?>'  >
        </div>

        <div class="col-sm-6"><br>
          <label>Actividad Económica:</label>
          <input class="form-control" type="text" name="actividadeconomica" value='<?php echo $actividadeconomica ?>' >
        </div>

        <div class="col-sm-6"><br> 
          <label>Numero Nit:</label>
          <input class="form-control" type="text" name="nit" value='<?php echo $nit ?>' >
        </div>
         

        <div class="col-sm-6"><br>   
          <label>Cargo a desempeñar:</label>
          <label for="cargodesempena" generated="true" class="error"></label> 
          <input class="form-control" type="text" name="cargodesempena" value='<?php echo $cargoadesempenar ?>'>
        </div>

        <div class="col-sm-6"><br> 
          <label>Ciudad:</label>
          <input class="form-control" type="text" name="ciudad" value='<?php echo $ciudad ?>' >
        </div>

        <div class="col-sm-6"><br> 
          <label>Direccion de la Empresa:</label>
          <input class="form-control" type="text" name="direccion_empresa" value='<?php echo $direccion_empresa ?>' >
        </div>

        <div class="col-sm-6"><br> 
          <label>Telefono de la Empresa:</label>
          <input class="form-control" type="text" name="telefono_empresa" value='<?php echo $telefono_empresa ?>' >
        </div>
      </div>  
    </div>      

    <div class="panel panel-default">
      <div class="panel-heading text-center">Identificación del trabajador:</div>
      <div class="panel-body">
        <div class="col-sm-6"><br> 
          <label>Nombres y Apellidos:</label>
          <label for="nombres" generated="true" class="error"></label>
          <input class="form-control" type="text" name="nombres" id="nombres" value='<?php echo $nombresapellidos ?>' >
        </div>

        <div class="col-sm-6"><br>   
          <div>
            <label>Seleccione Tipo Documento:</label>
            <label for="tipodocumento" generated="true" class="error"></label>
            <select class="form-control" name="tipodocumento">
              <?php
                $tipo_doc ="SELECT * FROM `datos_basicos_tipo_documento` WHERE idtd = '$tipo_doc' ";
                $querydoc = mysqli_query($conexion,$tipo_doc);
                while ($row2 = mysqli_fetch_array($querydoc)) {
                  echo "<option value='".$row2['id']."'>".$row2['tipo_documento']."</option>";
                }
              ?>
            </select>
            <br><br>  
          </div>
        </div>

        <div class="col-sm-6"><br>   
          <label>Numero de Documento:</label>
          <label for="numero_documento" generated="true" class="error"></label>
          <input class="form-control" type="int" name="numero_documento" id="numero_documento" onkeypress="return esInteger(event)" value='<?php echo $numero_documento ?>' required>
        </div>

        <div class="col-sm-6"><br>       
          <label>Dirección:</label>
          <label for="direccion" generated="true" class="error"></label>
          <input class="form-control" type="text" name="direccion" value='<?php echo $direccion ?>'>
        </div>

        <div class="col-sm-3"><br>
          <label>Fecha Expedicion:</label>
          <label for="fechaexpedicion" generated="true" class="error"></label>
          <input class="form-control" type="date" name="fechaexpedicion" value='<?php echo $expedicion ?>' required>
        </div>

        <div class="col-sm-3"><br>
          <label>Edad:</label>
          <label for="edad" generated="true" class="error"></label>
          <input class="form-control" type="int" name="edad" onkeypress="return esInteger(event)" value='<?php echo $edad ?>' required>
        </div>

        <div class="col-sm-6"><br>
          <label>Lugar de Nacimiento:</label>
           <label for="lugarnacimiento" generated="true" class="error"></label>
          <input class="form-control" type="text" name="lugarnacimiento" value='<?php echo $lugarnacimiento ?>' required> 
        </div> 

        <div class="col-sm-6"><br>
          <label>Fecha de Nacimiento:</label>
          <label for="fechana" generated="true" class="error"></label>
          <input class="form-control" type="date" name="fechana" value='<?php echo $fechanacimiento ?>' required>
          <br>
        </div>

        <div class="col-sm-6"><br> 
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
                    case 'Soltero': ?>
                      <label><input type="radio" name="estcivil" value="Soltero" checked> Soltero
                      <input type="radio" name="estcivil" value="Casado"> Casado
                      <input type="radio" name="estcivil" value="Union libre"> Union Libre
                      <input type="radio" name="estcivil" value="Separado"> Separado
                  <?php break;
                    case 'Casado': ?>
                      <label><input type="radio" name="estcivil" value="Soltero"> Soltero
                      <input type="radio" name="estcivil" value="Casado" checked> Casado
                      <input type="radio" name="estcivil" value="Union libre"> Union Libre
                      <input type="radio" name="estcivil" value="Separado"> Separado
                  <?php break;  
                    case 'Union libre': ?>
                      <label><input type="radio" name="estcivil" value="Soltero"> Soltero
                      <input type="radio" name="estcivil" value="Casado"> Casado
                      <input type="radio" name="estcivil" value="Union libre" checked> Union Libre
                      <input type="radio" name="estcivil" value="Separado"> Separado
                  <?php break;
                    case 'Separado': ?>
                      <label><input type="radio" name="estcivil" value="Soltero"> Soltero
                      <input type="radio" name="estcivil" value="Casado"> Casado
                      <input type="radio" name="estcivil" value="Union libre"> Union Libre
                      <input type="radio" name="estcivil" value="Separado" checked> Separado
                  <?php break;  
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
                <th class="text-center" colspan="9">Escolaridad:</th>
              </tr>
              <tr>
              	<th>Analfabeta</th>
              	<th>Primaria Completa</th>
              	<th>Primaria Incompleta</th>
              	<th>Secundaria Completa</th>
              	<th>Secundaria Incompleta</th>
              	<th>Tecnico</th>
              	<th>Tecnologo</th>
              	<th>Universitario</th>
              	<th>Post Grado</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr>
                <label for="escolaridad" generated="true" class="error"></label>
                <fieldset>
                  <div class="text-center">
                    <?php switch ($escolaridad) {
                     case 'Analfabeta':?>
                      <td><input type="radio" name="escolaridad" value="Analfabeta" checked></td>
                      <td><input type="radio" name="escolaridad" value="Primaria Completa"></td>
                      <td><input type="radio" name="escolaridad" value="Primarica Incompleta"></td>
                      <td><input type="radio" name="escolaridad" value="Secundaria Completa"></td>
                      <td><input type="radio" name="escolaridad" value="Secundaria Incompleta"></td>
                      <td><input type="radio" name="escolaridad" value="Tecnico"></td>
                      <td><input type="radio" name="escolaridad" value="Tecnologo"></td>
                      <td><input type="radio" name="escolaridad" value="Universitario"></td>
                      <td><input type="radio" name="escolaridad" value="Post Grado"></td>
                    <?php break; 
                     case 'Primaria Completa': ?>
                      <td><input type="radio" name="escolaridad" value="Analfabeta"></td>
                      <td><input type="radio" name="escolaridad" value="Primaria Completa" checked></td>
                      <td><input type="radio" name="escolaridad" value="Primarica Incompleta"></td>
                      <td><input type="radio" name="escolaridad" value="Secundaria Completa"></td>
                      <td><input type="radio" name="escolaridad" value="Secundaria Incompleta"></td>
                      <td><input type="radio" name="escolaridad" value="Tecnico"></td>
                      <td><input type="radio" name="escolaridad" value="Tecnologo"></td>
                      <td><input type="radio" name="escolaridad" value="Universitario"></td>
                      <td><input type="radio" name="escolaridad" value="Post Grado"></td>
                    <?php  break;  
                     case 'Primarica Incompleta': ?>
                      <td><input type="radio" name="escolaridad" value="Analfabeta"></td>
                      <td><input type="radio" name="escolaridad" value="Primaria Completa"></td>
                      <td><input type="radio" name="escolaridad" value="Primarica Incompleta" checked></td>
                      <td><input type="radio" name="escolaridad" value="Secundaria Completa"></td>
                      <td><input type="radio" name="escolaridad" value="Secundaria Incompleta"></td>
                      <td><input type="radio" name="escolaridad" value="Tecnico"></td>
                      <td><input type="radio" name="escolaridad" value="Tecnologo"></td>
                      <td><input type="radio" name="escolaridad" value="Universitario"></td>
                      <td><input type="radio" name="escolaridad" value="Post Grado"></td>
                    <?php break; 
                     case 'Secundaria Completa': ?>
                      <td><input type="radio" name="escolaridad" value="Analfabeta"></td>
                      <td><input type="radio" name="escolaridad" value="Primaria Completa"></td>
                      <td><input type="radio" name="escolaridad" value="Primarica Incompleta"></td>
                      <td><input type="radio" name="escolaridad" value="Secundaria Completa" checked></td>
                      <td><input type="radio" name="escolaridad" value="Secundaria Incompleta"></td>
                      <td><input type="radio" name="escolaridad" value="Tecnico"></td>
                      <td><input type="radio" name="escolaridad" value="Tecnologo"></td>
                      <td><input type="radio" name="escolaridad" value="Universitario"></td>
                      <td><input type="radio" name="escolaridad" value="Post Grado"></td>
                    <?php  break;  
                    case 'Secundaria Incompleta': ?>
                      <td><input type="radio" name="escolaridad" value="Analfabeta"></td>
                      <td><input type="radio" name="escolaridad" value="Primaria Completa"></td>
                      <td><input type="radio" name="escolaridad" value="Primarica Incompleta"></td>
                      <td><input type="radio" name="escolaridad" value="Secundaria Completa"></td>
                      <td><input type="radio" name="escolaridad" value="Secundaria Incompleta" checked></td>
                      <td><input type="radio" name="escolaridad" value="Tecnico"></td>
                      <td><input type="radio" name="escolaridad" value="Tecnologo"></td>
                      <td><input type="radio" name="escolaridad" value="Universitario"></td>
                      <td><input type="radio" name="escolaridad" value="Post Grado"></td>
                    <?php break;
                    case 'Tecnico': ?>
                      <td><input type="radio" name="escolaridad" value="Analfabeta"></td>
                      <td><input type="radio" name="escolaridad" value="Primaria Completa"></td>
                      <td><input type="radio" name="escolaridad" value="Primarica Incompleta"></td>
                      <td><input type="radio" name="escolaridad" value="Secundaria Completa"></td>
                      <td><input type="radio" name="escolaridad" value="Secundaria Incompleta"></td>
                      <td><input type="radio" name="escolaridad" value="Tecnico" checked></td>
                      <td><input type="radio" name="escolaridad" value="Tecnologo"></td>
                      <td><input type="radio" name="escolaridad" value="Universitario"></td>
                      <td><input type="radio" name="escolaridad" value="Post Grado"></td>
                    <?php break;
                    case 'Tecnologo': ?>
                      <td><input type="radio" name="escolaridad" value="Analfabeta"></td>
                      <td><input type="radio" name="escolaridad" value="Primaria Completa"></td>
                      <td><input type="radio" name="escolaridad" value="Primarica Incompleta"></td>
                      <td><input type="radio" name="escolaridad" value="Secundaria Completa"></td>                
                      <td><input type="radio" name="escolaridad" value="Secundaria Incompleta"></td>
                      <td><input type="radio" name="escolaridad" value="Tecnico"></td>
                      <td><input type="radio" name="escolaridad" value="Tecnologo" checked></td>
                      <td><input type="radio" name="escolaridad" value="Universitario"></td>
                      <td><input type="radio" name="escolaridad" value="Post Grado"></td>
                    <?php break;
                    case 'Universitario': ?>
                      <td><input type="radio" name="escolaridad" value="Analfabeta"></td>
                      <td><input type="radio" name="escolaridad" value="Primaria Completa"></td>
                      <td><input type="radio" name="escolaridad" value="Primarica Incompleta"></td>
                      <td><input type="radio" name="escolaridad" value="Secundaria Completa"></td>
                      <td><input type="radio" name="escolaridad" value="Secundaria Incompleta"></td>
                      <td><input type="radio" name="escolaridad" value="Tecnico"></td>
                      <td><input type="radio" name="escolaridad" value="Tecnologo"></td>
                      <td><input type="radio" name="escolaridad" value="Universitario" checked></td>
                      <td><input type="radio" name="escolaridad" value="Post Grado"></td>
                    <?php break;
                    case 'Post Grado': ?>
                      <td><input type="radio" name="escolaridad" value="Analfabeta"></td>
                      <td><input type="radio" name="escolaridad" value="Primaria Completa"></td>
                      <td><input type="radio" name="escolaridad" value="Primarica Incompleta"></td>
                      <td><input type="radio" name="escolaridad" value="Secundaria Completa"></td>
                      <td><input type="radio" name="escolaridad" value="Secundaria Incompleta"></td>
                      <td><input type="radio" name="escolaridad" value="Tecnico"></td>
                      <td><input type="radio" name="escolaridad" value="Tecnologo"></td>
                      <td><input type="radio" name="escolaridad" value="Universitario"></td>
                      <td><input type="radio" name="escolaridad" value="Post Grado" checked></td>
                    <?php  break;         
                  } ?>
                  </div>
                </fieldset>
              </tr>
            </tbody>
          </table>
        </div><!--finsm-->

        <div class="col-sm-6"><br>
          <label>EPS:</label>
          <input class="form-control" type="text" name="eps" value='<?php echo $eps ?>'>
        </div>

        <div class="col-sm-6"><br> 
          <label>ARL:</label>
          <input class="form-control" type="text" name="arl" value='<?php echo $arl ?>'>
        </div>

        <div class="col-sm-6"><br> 
          <label>AFP:</label>
          <input class="form-control" type="text" name="afp" value='<?php echo $afp ?>'>
        </div>

        <div class="col-sm-3"><br> 
          <label>Fecha (D/M/A):</label>
          <label for="fecha" generated="true" class="error"></label>
          <input class="form-control" type="date" name="fecha" value='<?PHP  echo $fecha ?>'><?php //echo $fecha ?>
        </div>

        <div class="col-sm-3"><br> 
          <label>Hora:</label>
          <label for="hora" generated="true" class="error"></label>
            <input class="form-control" type="text" name="hora" id="myWatch"><br>
        </div>
      </div>
    </div>
    
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
  
  <div class="row">
    <div class="col-sm-12">
      <div class="text-center"><br> 
        <input type="submit" id="btn" name="Registroselectivo" value="Registrar" class="btn btn-success">
      </div>
    </div>
  </div>

</div>  
</form>
<?php 
}//while

}else{//row*Formulario para pacientes que son ingresados por primera vez al base de datos:  

  if (isset($_POST['Registrocompleto'])) {

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
    VALUES('NULL','$nombrestrab','$tipodocumento','$identificacion','$expedicion','$fechanac','$lugarnac', '$sexo')"; 
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

    $data = "INSERT INTO `db_estado_atencion`(`id`,`audiometria`, `visiometria`, `espirometria`, `psicologia`, `enfermeria`, `medico`, `paciente`)
    VALUES(NULL,'$audiometria','$visiometria','$espirometria','$psicologia','$enfermeria','$medico','$idfk_datos_basicos')";
    $query3 = mysqli_query($conexion,$data);

    $data2 = "INSERT INTO `datos_basicos_atencion`(`id`, `id_datos_basicos`)
    VALUES(NULL,'$idfk_datos_basicos')";
    $query4 = mysqli_query($conexion,$data2);

    if ($query1 && $query2 && $query3 && $query4){
      echo "<script>alert('Datos Registrados Exitosamente')</script>";
      echo "<script>window.location = 'recepcion_foto.php'</script>";
    }else{
      echo "<script>alert('Error, Intente Nuevamente')</script>";
      echo "<script>window.location = 'recepcion.php'</script>";
    }
  }
?>

<script>
  $(function(){
    /* Incluimos un método para validar el campo nombre */
    jQuery.validator.addMethod("nombres", function(value, element) {
      return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
    }); 
    /* Capturar el click del botón */
    $("#btn2").on("click", function(){
      /* Validar el formulario */
      $("#formulario2").validate({
        rules:{ /* Accedemos a los campos a través de su nombre: email, nombre, edad */
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
        messages:{ /* Accedemos a los campos a través de su nombre: email, nombre, edad */
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

<form  method="POST" id="formulario2" name="formulario">
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading text-center">Motivo de Evaluacion</div>
      <div class="panel-body">
        <div class="col-sm-12">
          <label for="motivoevaluacion" generated="true" class="error"></label> 
          <table class="table table-bordered">
            <thead>
              <th class="text-center">Ingreso</th>
              <th class="text-center">Periódico</th>
              <th class="text-center">Retiro</th>
              <th class="text-center">Post Incapacidad</th>
              <th class="text-center">Reubicacion</th>
              <th class="text-center">Reingreso</th>
              <th class="text-center">Otro:</th>
            </thead>
            <tbody>
              <tr class="text-center">
                <td><input type="radio" id="1" name="motivoevaluacion" value="Ingreso"></td>
                <td><input type="radio" id="2" name="motivoevaluacion" value="Periodico"></td>
                <td><input type="radio" id="3" name="motivoevaluacion" value="Retiro"></td>
                <td><input type="radio" id="4" name="motivoevaluacion" value="Post incapacidad"></td>             
                <td><input type="radio" id="5" name="motivoevaluacion" value="Reubicacion"></td>                
                <td><input type="radio" id="6" name="motivoevaluacion" value="Reingreso"></td>
                <td><input type="checkbox" id="otro" name="otro" value="Ingreso" onchange="activar()"></td>  
              </tr>
              <tr>
                <td colspan="7">
                  <input class="form-control" type="text" id="otromotivo" name="motivoevaluacion" disabled="disabled">
                </td>
              </tr>
            </tbody>
          </table>
        </div><!--finsm-->
      </div>
    </div>

  	<div class="panel panel-default">
  	  <div class="panel-heading text-center">Identificacion Empresa</div>
  	  <div class="panel-body">      
	      <div class="col-sm-12"><br>
	        <label>Nombre de la Empresa:</label>
	        <label for="nombreempresa" generated="true" class="error"></label> 
	        <input class="form-control" type="text" name="nombreempresa" id="nombreempresa">
	      </div>

	      <div class="col-sm-6"><br> 
	        <label>Numero Nit:</label>
	        <input class="form-control" type="text" name="nit" >
	      </div>

	      <div class="col-sm-6"><br>
	        <label>Actividad Económica:</label>
	        <input class="form-control" type="text" name="actividadeconomica" >
	      </div>
	       
	      <div class="col-sm-6"><br>   
	        <label>Cargo a desempeñar:</label>
	        <label for="cargodesempena" generated="true" class="error"></label> 
	        <input class="form-control" type="text" name="cargodesempena" id="cargodesempena">
	      </div>

	      <div class="col-sm-6"><br> 
	        <label>Ciudad:</label>
	        <input class="form-control" type="text" name="ciudad" >
	      </div>

	      <div class="col-sm-6"><br> 
	        <label>Direccion de la Empresa:</label>
	        <input class="form-control" type="text" name="direccion_empresa" >
	      </div>

	      <div class="col-sm-6"><br> 
	        <label>Telefono de la Empresa:</label>
	        <input class="form-control" type="text" name="telefono_empresa">
	      </div>
    	</div>
    </div>

	  <div class="panel panel-default">
	  	<div class="panel-heading text-center">Identificación del Trabajador:</div>
	    <div class="panel-body">

	      <div class="col-sm-6"><br> 
	        <label>Nombres y Apellidos:</label>
	        <label for="nombres" generated="true" class="error"></label> 
	        <input class="form-control" type="text" name="nombres" id="nombres">
	      </div>

	      <div class="col-sm-6"><br>   
	        <label>Seleccione Tipo Documento:</label>
	        <label for="tipodocumento" generated="true" class="error"></label> 
	        <select class="form-control" name="tipodocumento" id="tipodocumento">
	          <option value="">Seleccionar</option>
	          <?php
	            $tipo_doc ="SELECT * FROM `datos_basicos_tipo_documento` ";
	            $querydoc = mysqli_query($conexion,$tipo_doc);
	            while ($row2 = mysqli_fetch_array($querydoc)){
	            	echo "<option value='".$row2['idtd']."'>".$row2['tipo_documento']."</option>";
	            }
	          ?>
	        </select><br><br>  
	      </div>

	      <div class="col-sm-6"><br>   
	        <label>Numero documento:</label>
	        <label for="numero_documento" generated="true" class="error"></label> 
	        <input class="form-control" type="int" name="numero_documento" id="numero_documento" onkeypress="return esInteger(event)" required>
	      </div>

	      <div class="col-sm-6"><br>       
	        <label>Dirección:</label>
	        <label for="direccion" generated="true" class="error"></label>
	        <input class="form-control" type="text" name="direccion" id="direccion">
	      </div>

	      <div class="col-sm-3"><br>
	        <label>Fecha Expedicion:</label>
	        <label for="fechaexpedicion" generated="true" class="error"></label>
	        <input class="form-control" type="date" name="fechaexpedicion" required>
	      </div>

	      <div class="col-sm-3"><br>
	        <label>Edad:</label>
	        <label for="edad" generated="true" class="error"></label>
	        <input class="form-control" type="int" name="edad" onkeypress="return esInteger(event)" required>
	      </div>

	      <div class="col-sm-6"><br>
	        <label>Lugar de nacimiento:</label>
	        <label for="lugarnacimiento" generated="true" class="error"></label>
	        <input class="form-control" type="text" name="lugarnacimiento" required> 
	      </div> 

	      <div class="col-sm-6"><br>
	        <label>Fecha de nacimiento:</label>
	        <label for="fechana" generated="true" class="error"></label>
	        <input class="form-control" type="date" name="fechana" required><br>
	      </div>

	      <div class="col-sm-6"><br> 
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
	                  <label>
	                  	<input type="radio" name="sexo" value="masculino"> Masculino
	                  	<input type="radio" name="sexo" value="femenino"> Femenino
	                  </label>
	                </fieldset>
	              </td> 

	              <td>
	                <label for="hijos" generated="true" class="error"></label>
	                <fieldset>
	                  <label>
	                  	<input type="radio" name="hijos" value="si"> Si tiene
	                  	<input type="radio" name="hijos" value="no"> No tiene
	                  </label>
	                </fieldset>
	              </td>
	            
	              <td>
	                <label for="estcivil" generated="true" class="error"></label>
	                <fieldset class="font_size_13"> 
	                  <label>
	                  	<input type="radio" name="estcivil" value="Soltero"> Soltero /
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

	      <div class="col-sm-12"><br>
	        <table class="table table-bordered">
	          <thead>
	            <tr>
	              <th class="text-center" colspan="9">Escolaridad:</th>
	              <label for="escolaridad" generated="true" class="error"></label> 
	            </tr>
	            <tr>
                <th>Analfabeta</th>
                <th>Primaria Completa</th>
                <th>Primaria Incompleta</th>
                <th>Secundaria Completa</th>
                <th>Secundaria Incompleta</th>
                <th>Técnico</th>
                <th>Tecnologo</th>
                <th>Universitario </th>
                <th>Post Grado</th>
	            </tr>
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
	        </table>
	      </div><!--finsm-->

	      <div class="col-sm-6"><br>
	        <label>EPS:</label>
	        <input class="form-control" type="text" name="eps">
	      </div>

	      <div class="col-sm-6">
	        <br> 
	        <label>ARL:</label>
	        <input class="form-control" type="text" name="arl">
	      </div>

	      <div class="col-sm-6"><br> 
	        <label>AFP:</label>
	        <input class="form-control" type="text" name="afp">
	      </div>

	      <div class="col-sm-3"><br> 
	        <label for="fecha" generated="true" class="error"></label>
	        <label>Fecha:</label>
	        <input class="form-control" type="text" name="fecha" value='<?php echo $fecha ?>'>
	      </div>

	      <div class="col-sm-3"><br>
	        <label for="hora" generated="true" class="error"></label> 
	        <label>Hora:</label>
	        <input class="form-control" type="text" name="hora" id="myWatch">
	        <br>
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
  		  <div class="col-sm-12"><br> 
  		    <input type="submit" id="btn2" name="Registrocompleto" value="Registrar" class="btn btn-success">
  		  </div>
  		</div>
  	</div><br><br>
  </form>
</body>
<?php }//if > 0 ?>

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

<?php// }else{ ?>
<!-- <div class="modal fade" id="historial" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" >
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
</div> -->


<?php //include ('recepcion_reg2.php');  ?>
<!---->
<script type="text/javascript">
	//--Funcion Hora tiemporeal y fecha 
    /*function getTimeAJAX() {
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
    setInterval(getTimeAJAX,1000);*/


/*By George Chiang (WA's JavaScript tutorial)

Credit must stay intact for use*/
function show(){
  var Digital=new Date()
  var hours=Digital.getHours()
  var minutes=Digital.getMinutes()
  var seconds=Digital.getSeconds()
  var dn="AM" 
  if (hours>12){
    dn="PM"
    hours=hours-12
  }
  if (hours==0)
  hours=12
  if (minutes<=9)
  minutes="0"+minutes
  if (seconds<=9)
  seconds="0"+seconds
  document.formulario.hora.value=hours+":"+minutes+":"
  +seconds+" "+dn
  setTimeout("show()",1000)
}
show()



    //--control motivo de evaluacion
	function activar(){
		if (document.getElementById('otro').checked==false){
			document.getElementById('otromotivo').disabled=true;
			document.getElementById('1').disabled=false;
			document.getElementById('2').disabled=false;
			document.getElementById('3').disabled=false;
			document.getElementById('4').disabled=false;
			document.getElementById('5').disabled=false;
			document.getElementById('6').disabled=false;
		}
		if (document.getElementById('otro').checked==true){
			document.getElementById('otromotivo').disabled=false;
			document.getElementById('1').disabled=true;
			document.getElementById('2').disabled=true;
			document.getElementById('3').disabled=true;
			document.getElementById('4').disabled=true;
			document.getElementById('5').disabled=true;
			document.getElementById('6').disabled=true;

		}
	}

	//--solo numeros
  function esInteger(e) {
    var charCode 
    charCode = e.keyCode 
    status = charCode 
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      return false
    }
      return true
  }

	//--DESELECCIONAR RADIO BUTTONS 
  var aux= new Array();
  function comprobar(rad){
    var group= rad.name;
    var val= rad.value;
    if(!aux[group]) {
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
</script>

</html>
