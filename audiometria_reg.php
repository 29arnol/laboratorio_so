<?php 
  include ('includes/conexion.php'); 
  include ('bar/navbar_Audiometria.php'); 
  include('bar/style_bar/estilo.css'); 
?>

<!DOCTYPE html>
<html>
  <head>
  	<title>Audiometria Examen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="jvalidation/dist/jquery.validate.js"></script> 
  </head>

<?php
  //Notificar solamente errores de ejecución
  error_reporting(E_ERROR | E_WARNING | E_PARSE);

  if (isset($_POST['Registrar'])) {

    $antecedentes = $_POST['antecedentes_aud'];

    $per_quir = $_POST['ant_quirurgico'];
    $per_gen = $_POST['ant_general'];
    $per_descripcion_quir = $_POST['antecendentes_per_quir'];
    $per_descripcion_gen = $_POST['antecendentes_per_gen'];

    $fam_quir = $_POST['ant_quirurgico_fa'];
    $fam_gen = $_POST['ant_general_fa'];
    $fam_descripcion_quir = $_POST['antecendentes_fa_quir'];
    $fam_descripcion_gen = $_POST['antecendentes_fa_gen']; 

    $ant_aud_anterior = $_POST['ant_aud_anterior'];

    $pasa_otoscopia = $_POST['otoscopia_der'];
    $hallazgo_der = $_POST['hallazgo_der'];

    $item1 = $_POST['item1'];
    $item2 = $_POST['item2'];
    $item3 = $_POST['item3'];
    $item4 = $_POST['item4'];
    $item5 = $_POST['item5'];
    $item6 = $_POST['item6'];
    $resultado = $_POST['resultado'];

    $observaciones = $_POST['observaciones'];
    $retamizaje = $_POST['retamizaje'];
    $evaluacion_diagnostica = $_POST['audiologica_diagnostica'];
    $interconsulta = $_POST['interconsulta'];
    $control = $_POST['control'];

    //----------resultados oido izquierdo-------------

    $pasa_otoscopia_izq = $_POST['otoscopia_izq'];
    $hallazgo_izq = $_POST['hallazgo_izq'];
    $item11 = $_POST['item11'];
    $item12 = $_POST['item12'];
    $item13 = $_POST['item13'];
    $item14 = $_POST['item14'];
    $item15 = $_POST['item15'];
    $item16 = $_POST['item16'];
    $resultado_izq = $_POST['result'];

    $historiaid = $_POST['historia'];

    $datos = "INSERT INTO `audiometria_resultado_der`(`id`, `antecedentes_audiometria`, `ant_personal_quir`,`ant_personal_gen`, `descripcion_personal_quir`,`descripcion_personal_gen`,`ant_familiar_quir`,`ant_familiar_gen`,`descripcion_familiar_quir`,`descripcion_familiar_gen`,`ant_audiometria_anterior`,`pasa_otoscopia`, `hallazgo_der`, `250`, `500`, `1000`, `2000`, `4000`, `8000`, `resultado_promedio`, `observaciones`, `retamizaje`, `evaluacion_diagnostica`, `interconsulta`, `control_anual`, `paciente_audiometria`) 
    VALUES ('NULL','$antecedentes','$per_quir','$per_gen','$per_descripcion_quir','$per_descripcion_gen','$fam_quir','$fam_gen','$fam_descripcion_quir','$fam_descripcion_gen','$ant_aud_anterior','$pasa_otoscopia','$hallazgo_der','$item1','$item2','$item3','$item4','$item5','$item6','$resultado','$observaciones','$retamizaje','$evaluacion_diagnostica','$interconsulta','$control','$historiaid')"; 
    $query = mysqli_query($conexion,$datos);
    //-----------------
    if ($query){   
      //Obtenemos El Ultimo ID Insertado
      $ver = "SELECT * FROM audiometria_resultado_der ORDER BY `id` DESC limit 0,1";
      $queryid = mysqli_query($conexion,$ver);
      $dataid = mysqli_fetch_array($queryid);
      $idfk = $dataid['id'];
    }else{
      echo "<script>alert('Error, Intente Nuevamente')</script>";
    }
    //-----------------
    $datos_izq = "INSERT INTO `audiometria_resultado_izq`(`id`, `pasa_otoscopia_izq`, `hallazgo_izq`, `250_izq`, `500_izq`, `1000_izq`, `2000_izq`, `4000_izq`, `8000_izq`, `resultado_promedio_izq`, `id_audiometria_paciente` ) 
    VALUES ('NULL','$pasa_otoscopia_izq','$hallazgo_izq','$item11','$item12','$item13','$item14','$item15','$item16','$resultado_izq','$idfk')";
    $query_izq = mysqli_query($conexion,$datos_izq);


    $estado = "Atencion Finalizada";
    $horafinal = $_POST['horafinal'];

    $data = "UPDATE `db_estado_atencion` SET `audiometria`= '$estado' WHERE paciente = '$historiaid'"; 
    $query2 = mysqli_query($conexion,$data);

    $data1 = "UPDATE `datos_basicos_atencion` SET `final_timeaudiometria`= '$horafinal' WHERE id_datos_basicos = '$historiaid'"; 
    $query3 = mysqli_query($conexion,$data1);

    if ($query && $query_izq && $query2 && $query3) {
      echo "<script>alert('Datos Registrados Exitosamente')</script>";
      echo "<script>window.location = 'audiometria_pacientes.php'</script>";
    } else {
      echo "<script>alert('Error, Intente Nuevamente')</script>";
      echo "<script>window.location = 'audiometria_pacientes.php'</script>";
    }
  }  
?> 

<?php 
  $id = $_POST['cedula'];
  $fecharegistro = $_POST['fecha_registro'];

  $consult="SELECT * FROM datos_basicos AS db
  JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
  JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
  WHERE db.fecha ='$fecharegistro' AND  dc.numero_documento=".$id." ";
  $query = mysqli_query($conexion,$consult);
?> 
<?php 
if (mysqli_num_rows($query) > 0){
    
  	while ($datos=mysqli_fetch_array($query)) {
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
    JOIN audiometria_resultado_der ON  audiometria_resultado_der.paciente_audiometria = datos_basicos.id_historia
    WHERE datos_basicos.motivo_evaluacion = 'Ingreso' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $ingreso = $re{'Total'};      
    }
    $cont = "SELECT *, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN audiometria_resultado_der ON  audiometria_resultado_der.paciente_audiometria = datos_basicos.id_historia
    WHERE datos_basicos.motivo_evaluacion = 'Periodico' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $periodico = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN audiometria_resultado_der ON  audiometria_resultado_der.paciente_audiometria = datos_basicos.id_historia 
    WHERE datos_basicos.motivo_evaluacion = 'Retiro' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $retiro = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
    JOIN audiometria_resultado_der ON  audiometria_resultado_der.paciente_audiometria = datos_basicos.id_historia
    WHERE datos_basicos.motivo_evaluacion = 'Post incapacidad' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $postincapacidad = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN audiometria_resultado_der ON  audiometria_resultado_der.paciente_audiometria = datos_basicos.id_historia 
    WHERE datos_basicos.motivo_evaluacion = 'Reubicacion' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
     $reubicacion = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN audiometria_resultado_der ON  audiometria_resultado_der.paciente_audiometria = datos_basicos.id_historia
    WHERE datos_basicos.motivo_evaluacion = 'Reingreso' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $reingreso = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN audiometria_resultado_der ON  audiometria_resultado_der.paciente_audiometria = datos_basicos.id_historia 
    WHERE datos_basicos.motivo_evaluacion = 'Otros' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $otros = $re{'Total'};     
    }
    //obtener fecha del ultimo registro del historial
    $consultaregistro = "SELECT * FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN audiometria_resultado_der ON  audiometria_resultado_der.paciente_audiometria = datos_basicos.id_historia
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
   ?> 
    <!-- alerta historial clinico   -->
  <script>
    $(document).ready(function(){
      $("#historial").modal("show");
    });
  </script>
  
   
<script>
$(function(){
  /* Incluimos un método para validar el campo nombre */
  jQuery.validator.addMethod("nombres", function(value, element){
    return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
  }); 
  /* Capturar el click del botón */
  $("#btn").on("click", function(){
    /* Validar el formulario */
    $("#formulario").validate({
      rules: 
      {
         //email: {required: true, email: true, minlength: 5, maxlength: 80},
        antecedentes_aud: {required: true},
         ant_quirurgico: {required: true},
         ant_general: {required: true},
         antecendentes_per_quir: {minlength: 3, maxlength: 1000},
         antecendentes_per_gen: {minlength: 3, maxlength: 1000},
         ant_quirurgico_fa: {required: true},
         ant_general_fa: {required: true},
         antecendentes_fa_quir: {minlength: 3, maxlength: 1000},
         antecendentes_fa_gen: {minlength: 3, maxlength: 1000},
         ant_aud_anterior: {minlength: 3, maxlength: 1000},
         otoscopia_der: {required: true},
         hallazgo_der: {minlength: 3, maxlength: 1000},
         otoscopia_izq: {required: true},
         hallazgo_izq: {minlength: 3, maxlength: 1000},
         item1: {digits: true, min: 0, max: 120},
         item2: {digits: true, min: 0, max: 120},
         item3: {digits: true, min: 0, max: 120},
         item4: {digits: true, min: 0, max: 120},
         item5: {digits: true, min: 0, max: 120},
         item6: {digits: true, min: 0, max: 120},
         item11: {digits: true, min: 0, max: 120},
         item12: {digits: true, min: 0, max: 120},
         item13: {digits: true, min: 0, max: 120},
         item14: {digits: true, min: 0, max: 120},
         item15: {digits: true, min: 0, max: 120},
         item16: {digits: true, min: 0, max: 120},

         observaciones: {minlength: 3, maxlength: 1000},
         audiologica_diagnostica: {minlength: 3, maxlength: 1000},

         retamizaje: {required: true},
         interconsulta: {required: true},
         control: {required: true},
      },
      messages: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
      {
       antecedentes_aud: {required: 'Seleccione una opcion'},
       ant_quirurgico: {required: 'Seleccione una opcion'},
       ant_general: {required: 'Seleccione una opcion'},
       antecendentes_per_quir: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
       antecendentes_per_gen: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
       ant_quirurgico_fa: {required: 'Seleccione una opcion'}, 
       ant_general_fa: {required: 'Seleccione una opcion'}, 
       antecendentes_fa_quir: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
       antecendentes_fa_gen: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
       ant_aud_anterior: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
       otoscopia_der: {required: 'Seleccione'},
       hallazgo_der: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
       otoscopia_izq: {required: 'Seleccione'},
       hallazgo_izq: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
       item1: {digits: 'Sólo dígitos', min: 'El mínimo permitido son 3 caracteres', max: 'El máximo permitido son 120 caracteres'},
       item2: {digits: 'Sólo dígitos', min: 'El mínimo permitido son 3 caracteres', max: 'El máximo permitido son 120 caracteres'},
       item3: {digits: 'Sólo dígitos', min: 'El mínimo permitido son 3 caracteres', max: 'El máximo permitido son 120 caracteres'},
       item4: {digits: 'Sólo dígitos', min: 'El mínimo permitido son 3 caracteres', max: 'El máximo permitido son 120 caracteres'},
       item5: {digits: 'Sólo dígitos', min: 'El mínimo permitido son 3 caracteres', max: 'El máximo permitido son 120 caracteres'},
       item6: {digits: 'Sólo dígitos', min: 'El mínimo permitido son 3 caracteres', max: 'El máximo permitido son 120 caracteres'},
       item11: {digits: 'Sólo dígitos', min: 'El mínimo permitido son 3 caracteres', max: 'El máximo permitido son 120 caracteres'},
       item12: {digits: 'Sólo dígitos', min: 'El mínimo permitido son 3 caracteres', max: 'El máximo permitido son 120 caracteres'},
       item13: {digits: 'Sólo dígitos', min: 'El mínimo permitido son 3 caracteres', max: 'El máximo permitido son 120 caracteres'},
       item14: {digits: 'Sólo dígitos', min: 'El mínimo permitido son 3 caracteres', max: 'El máximo permitido son 120 caracteres'},
       item15: {digits: 'Sólo dígitos', min: 'El mínimo permitido son 3 caracteres', max: 'El máximo permitido son 120 caracteres'},
       item16: {digits: 'Sólo dígitos', min: 'El mínimo permitido son 3 caracteres', max: 'El máximo permitido son 120 caracteres'},

       observaciones: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
       audiologica_diagnostica: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 1000 caracteres'},
       retamizaje: {required: 'Seleccione'},
       interconsulta: {required: 'Seleccione'},
       control: {required: 'Seleccione'},
      }
    });
  });
});
</script>

    
<body>    
<form method="POST"  action="" name="calculadora" id="formulario">

  <div class="container">
  <input type="text" name="horafinal" id="myWatch">
  <input class="form-control" type="text" name="historia" value='<?php echo $historia; ?>' readonly="readonly" style="display: none;">

    <div class="panel panel-default">
      <div class="panel-heading text-center">
        <label>Datos  <a href="#" data-toggle="modal" data-target="#historial">Paciente</a> - Empresa</label>
      </div>
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
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading text-center">
        <label for="antecedentes_aud" generated="true" class="error"></label><br>
        <label>Antecedentes</label> 
        <input type="radio" name="antecedentes_aud" value="Si"> Si 
        <input type="radio" name="antecedentes_aud" value="No"> No
      </div>
      <div class="panel-body">
        <table class="table table-bordered"> 
          <thead>
            <th class="text-center">Personal</th>
            <th class="text-center">Descripcion</th>
          </thead>   
          <tbody>
            <tr>
              <td class="col-sm-2 text-center" style="padding-top: 10px;">
                <label for="ant_quirurgico" generated="true" class="error"></label><br>
                <label>Quirurgico: </label> 
                <input type="radio" name="ant_quirurgico" value="Si"> Si | 
                <input type="radio" name="ant_quirurgico" value="No"> No 
                <br><br>
                <label for="ant_general" generated="true" class="error"></label><br>
                <label> General: </label> 
                <input type="radio" name="ant_general" value="Si"> Si | 
                <input type="radio" name="ant_general" value="No"> No
              </td>
              <td>
                <label for="antecendentes_per_quir" generated="true" class="error"></label><br>
                <input type="text"  class="form-control col-sm-12" type="text" name="antecendentes_per_quir" placeholder="antecedentes quirurgicos personales">
                <br><br>
                <label for="antecendentes_per_gen" generated="true" class="error"></label><br>
                <input type="text"  class="form-control col-sm-12" type="text" name="antecendentes_per_gen" placeholder="antecedentes generales personales">
              </td>
            </tr>
            <thead>
              <th class="text-center">Familiar</th>
              <th class="text-center">Descripcion</th>
            </thead>
            </tr>
              <td class="col-sm-2 text-center" style="padding-top: 10px;">
                <label for="ant_quirurgico_fa" generated="true" class="error"></label><br>
                <label>Quirurgico: </label> 
                <input type="radio" name="ant_quirurgico_fa" value="Si"> Si | 
                <input type="radio" name="ant_quirurgico_fa" value="No"> No
                <br><br>
                <label for="ant_general_fa" generated="true" class="error"></label><br>
                <label> General: </label> <input type="radio" name="ant_general_fa" value="Si"> Si | 
                <input type="radio" name="ant_general_fa" value="No"> No 
              </td>
              <td>
                <label for="antecendentes_fa_quir" generated="true" class="error"></label><br>
                <input type="text"  class="form-control col-sm-12" type="text" name="antecendentes_fa_quir" placeholder="antecedentes quirurgicos familiares">
                <br><br>
                <label for="antecendentes_fa_gen" generated="true" class="error"></label><br>
                <input type="text"  class="form-control col-sm-12" type="text" name="antecendentes_fa_gen" placeholder="antecedentes generales familiares">
              </td>
            </tr>
          </tbody>
        </table>
        <div class="text-center text-info"><label>Antecendentes de Audiometria Anterior:</label></div>
        <div class="form-group">
          <label for="ant_aud_anterior" generated="true" class="error"></label><br>
          <textarea class="form-control" type="text" name="ant_aud_anterior" rows="4" placeholder="Antecedentes de audiometria anterior"></textarea><br>
        </div> 
      </div>
    </div>
    
    <div class="panel panel-default">
      <div class="panel-heading text-center"><label>Otoscopia</label></div>
      <div class="panel-body">  
        <table class="table table-bordered">    
          <thead>              
            <th style="width: 140px;">Oidos</th>
            <th style="width: 120px;" class="text-center">Pasa</th>
            <th style="width: 120px;" class="text-center">No Pasa</th>
            <th class="text-center">Hallazgos</th>
          </thead>
          <tbody>
            <tr>
              <td style="padding-top: 40px; color: red;">Oido Derecho</td>
              <td style="padding-top: 20px;">
                <div class="text-center">
                  <label for="otoscopia_der" generated="true" class="error"></label><br>
                  <input type="radio" name="otoscopia_der" value="Si"> Si
                </div>
              </td>
              <td style="padding-top: 20px;">
                <div class="text-center">
                  <label for="otoscopia_der" generated="true" class="error"></label><br>
                  <input  type="radio" name="otoscopia_der" value="No"> No
                </div>
              </td><br>
              <td>
                <label for="hallazgo_der" generated="true" class="error"></label><br>
                <textarea class="col-sm-12 form-control" type="text" name="hallazgo_der" rows="2"></textarea>
              </td>
            </tr>
            <tr>
           		<td style="padding-top: 40px; color: blue;">Oido Izquierdo</td>
              <td style="padding-top: 20px;">
                <div class="text-center">
                  <label for="otoscopia_izq" generated="true" class="error"></label><br>
                  <input type="radio" name="otoscopia_izq" value="Si"> Si
                </div> 
              </td>
              <td style="padding-top: 20px;">
                <div class="text-center">
                  <label for="otoscopia_izq" generated="true" class="error"></label><br>
                  <input type="radio" name="otoscopia_izq" value="No"> No
                </div>
              </td>
              <td>
                <label for="hallazgo_izq" generated="true" class="error"></label><br>
                <textarea class="col-sm-12 form-control" type="text" name="hallazgo_izq" rows="2"></textarea>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>


    <div class="panel panel-default">
      <div class="panel-heading text-center">Audiometria Tamiz:</div>
      <div class="panel-body">
        <div class="form-inline">
          <div class="text-center">
            <label for="" style="color: red; margin-right: 3.0em;">Oido Derecho:</label>
            <div class="form-group">
              <label for="item1" generated="true" class="error"></label><br>
              <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="250" name="item1" id="item1" onKeyUp="Suma()" onkeypress="return esInteger(event)">
            </div> 

            <div class="form-group">
              <label for="item2" generated="true" class="error"></label><br>
              <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="500" name="item2" id="item2" onKeyUp="Suma()" onkeypress="return esInteger(event)">
            </div>

            <div class="form-group">
              <label for="item3" generated="true" class="error"></label><br>
              <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="1000" name="item3" id="item3" onKeyUp="Suma()" onkeypress="return esInteger(event)">
            </div>

            <div class="form-group">
              <label for="item4" generated="true" class="error"></label><br>
              <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="2000" name="item4" id="item4" onKeyUp="Suma()" onkeypress="return esInteger(event)">
            </div>

            <div class="form-group">
              <label for="item5" generated="true" class="error"></label><br>
              <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="4000" name="item5" id="item5" onKeyUp="Suma()" onkeypress="return esInteger(event)">
            </div>

            <div class="form-group">
              <label for="item6" generated="true" class="error"></label><br>
              <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="8000" name="item6" id="item6" onKeyUp="Suma()" onkeypress="return esInteger(event)">
            </div>

            <div class="form-group">
              <br>
              <input style="width:150px;" type="text" class="form-control" placeholder="" name="resultado" onkeypress="return esInteger(event)">
            </div>
          </div>
          
          <div class="text-center">
            <br><br>
            <label for="io" style="color: blue; margin-right: 3.0em;">Oido Izquierdo:</label>

            <div class="form-group">
              <label for="item11" generated="true" class="error"></label><br>
              <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="250" name="item11" id="item11" onKeyUp="Suma()" onkeypress="return esInteger(event)">
            </div> 

            <div class="form-group">
              <label for="item12" generated="true" class="error"></label><br>
              <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="500" name="item12" id="item12" onKeyUp="Suma()" onkeypress="return esInteger(event)">
            </div>

            <div class="form-group">
              <label for="item13" generated="true" class="error"></label><br>
              <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="1000" name="item13" id="item13" onKeyUp="Suma()" onkeypress="return esInteger(event)">
            </div>

            <div class="form-group">
              <label for="item14" generated="true" class="error"></label><br>
              <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="2000" name="item14" id="item14" onKeyUp="Suma()" onkeypress="return esInteger(event)">
            </div>

            <div class="form-group">
              <label for="item15" generated="true" class="error"></label><br>
              <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="4000" name="item15" id="item15" onKeyUp="Suma()" onkeypress="return esInteger(event)">
            </div>

            <div class="form-group">
              <label for="item16" generated="true" class="error"></label><br>
              <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="8000" name="item16" id="item16" onKeyUp="Suma()" onkeypress="return esInteger(event)">
            </div>
            
            <div class="form-group">
              <br>
              <input type="text" style="width:150px;" class="form-control" placeholder="" name="result" onkeypress="return esInteger(event)">
            </div><br><br><br>
          </div>
        </div>
      </div>
    </div>     

    <div class="panel panel-default">
      <div class="panel-heading text-center"><label>Observaciones:</label></div>
      <div class="panel-body"> 
        <label for="observaciones" generated="true" class="error"></label><br>    
        <textarea class="col-sm-12 form-control" type="text" name="observaciones" rows="4" maxlength="2000"></textarea>
        <br>
      </div> 
    </div>  

    <div class="panel panel-default">
      <div class="panel-heading text-center"><label>Evaluación audiológica diagnóstica:</label></div>
      <div class="panel-body">
        <label for="audiologica_diagnostica" generated="true" class="error"></label><br>
        <textarea class="col-sm-12 form-control" type="text" name="audiologica_diagnostica" rows="2"></textarea>
      </div>  
    </div>

  <div class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body">
      <div class="col-sm-4">
        <div class="text-center">
          <table class="table table-bordered">    
            <thead> 
              <label>Retamizaje:</label>
            </thead>
            <tbody>
              <tr>
                <td>
                  <label for="retamizaje" generated="true" class="error"></label><br>
                  <div class="text-center"><input type="radio" name="retamizaje" value="Si"> Si
                </td>
                <td>
                  <label for="retamizaje" generated="true" class="error"></label><br>
                  <input type="radio" name="retamizaje" value="No"> No
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div><!--finsm-->

      <div class="col-sm-4">
        <div class="text-center">
          <table class="table table-bordered">    
            <thead>
              <tr>
            	<label>Interconsulta con Otorrinolaringología:</label>
            </thead>
            <tbody>
              <tr>
                <td>
                  <label for="interconsulta" generated="true" class="error"></label><br>
                  <div class="text-center"><input type="radio" name="interconsulta" value="Si"> Si
                </td>
                <td>
                  <label for="interconsulta" generated="true" class="error"></label><br>
                  <input type="radio" name="interconsulta" value="No"> No
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div><!--finsm-->

      <div class="col-sm-4">
        <div class="text-center">
          <table class="table table-bordered">    
            <thead>
            	<label>Control 1 año:</label>
            </thead>
            <tbody>
              <tr>
                <td>
                  <label for="control" generated="true" class="error"></label><br>
                  <div class="text-center"><input type="radio" name="control" value="Si"> Si
                </td>
                <td>
                  <label for="control" generated="true" class="error"></label><br>
                  <input type="radio" name="control" value="No" checked> No
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div><!--finsm-->
    </div>
  </div>

  <div class="text-center">
  	<br>
    <input type="submit" name="Registrar" value="Registrar" class="btn btn-success" id="btn">
  </div>
</div>
</form>

<br><br>
<?php 
}/*array_fin */

}else{

  echo '<script>
   $(document).ready(function(){
    $("#mostrarmodal").modal("show");
   });</script>';
  } 

?>

<!--Error de usuario no registrado o incorrecto-->
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='Audiometria.php';">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button onClick="window.location.href='Audiometria.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> ERROR.</h4>
      </div>
      <div class="modal-body">
        <h4 class="text-primary">El Usuario con Indentificacion Nº <label class="text-danger"><?php echo $id; ?></label> Incorrecto O no Registrado en el Sistema.</h4> <p>Cerciorarse de que la fecha de apertura de la historia clinica coincida con el dia en que se consulta el usuario</p>    
      </div>
      <div class="modal-footer">
        <a onClick="window.location.href='Audiometria.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
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
        <h4 class="text-primary">Historial de Atencion de Paciente con Indentificacion Nº <label class="text-danger"><?php echo $numero_documento; ?></label></h4>
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Ingreso: </strong></label> <?php echo $ingreso ?></p> 
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Periodicas: </strong></label> <?php echo $periodico ?></p> 
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Retiro: </strong></label> <?php echo $retiro ?></p>
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Post Incapacidad: </strong></label> <?php echo $postincapacidad ?></p>
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Reubicacion: </strong></label> <?php echo $reubicacion ?></p>
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Reingreso: </strong></label> <?php echo $reingreso ?></p> 
        <p><label>Motivo de Evaluaciones <strong style="color: red;">Otros: </strong></label> <?php echo $otros ?></p>   
        <p><label>El Ultimo Registro de Evaluacion Clinica Se Realizo el dia: <strong style="color: red;"> <?php echo $ultimo ?> </strong></label> </p>
        <p><span class="glyphicon glyphicon-list-alt"></span><a target="_blank" href="audiometria_con.php" style="color: red;"  class=""> Ir a Consultas</a></p> 
      </div>
      <div class="modal-footer">
        <a  data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>
</body>

<!---->
<script type="text/javascript">
  //Función que realiza la suma
  function Suma() {
    var item1 = document.calculadora.item1.value;
    var item2 = document.calculadora.item2.value;
    var item3 = document.calculadora.item3.value;
    var item4 = document.calculadora.item4.value;
    var item5 = document.calculadora.item5.value;
    var item6 = document.calculadora.item6.value;

    var item11 = document.calculadora.item11.value;
    var item12 = document.calculadora.item12.value;
    var item13 = document.calculadora.item13.value;
    var item14 = document.calculadora.item14.value;
    var item15 = document.calculadora.item15.value;
    var item16 = document.calculadora.item16.value;    
     
    try{
      //Calculamos el número escrito:
     item1 = (isNaN(parseInt(item1)))? 0 : parseInt(item1);
     item2 = (isNaN(parseInt(item2)))? 0 : parseInt(item2);
     item3 = (isNaN(parseInt(item3)))? 0 : parseInt(item3);
     item4 = (isNaN(parseInt(item4)))? 0 : parseInt(item4);
     item5 = (isNaN(parseInt(item5)))? 0 : parseInt(item5);
     item6 = (isNaN(parseInt(item6)))? 0 : parseInt(item6);

     item11 = (isNaN(parseInt(item11)))? 0 : parseInt(item11);
     item12 = (isNaN(parseInt(item12)))? 0 : parseInt(item12);
     item13 = (isNaN(parseInt(item13)))? 0 : parseInt(item13);
     item14 = (isNaN(parseInt(item14)))? 0 : parseInt(item14);
     item15 = (isNaN(parseInt(item15)))? 0 : parseInt(item15);
     item16 = (isNaN(parseInt(item16)))? 0 : parseInt(item16);
         
      document.calculadora.resultado.value = (item1+item2+item3+item4+item5+item6)/6;

      document.calculadora.result.value = (item11+item12+item13+item14+item15+item16)/6;     
    }
    //Si se produce un error no hacemos nada
    catch(e) {}
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

<script type="text/javascript">
  function esInteger(e){
    var charCode 
    charCode = e.keyCode 
    status = charCode 
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 44 && charCode != 46) {
      return false
    }
    return true
  }
</script>
<?php //include 'bar/footer.php'; ?>
</html>
