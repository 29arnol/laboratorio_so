<?php 
  include('includes/conexion.php'); 
  include('bar/navbar_Audiometria.php'); 
  include('lectorfecha.php');
  include('bar/css/estilo.css'); 
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

    $datos = "INSERT INTO `audiometria_oidoderecho`(`id`, `antecedenteaudiometria`, `ant_personalquirurgico`,`ant_personalgeneral`, `desc_personalquirurgico`,`desc_personalgeneral`,`ant_familiarquirurgico`,`ant_familiargeneral`,`desc_familiarquirurgico`,`desc_familiargeneral`,`ant_audiometriaanterior`,`otoscopia_od`, `hallazgo_od`, `250`, `500`, `1000`, `2000`, `4000`, `8000`, `promedio_od`, `observaciones`, `retamizaje`, `evaluaciondiagnostica`, `interconsulta`, `controlanual`, `paciente_audiometria`) 
    VALUES ('NULL','$antecedentes','$per_quir','$per_gen','$per_descripcion_quir','$per_descripcion_gen','$fam_quir','$fam_gen','$fam_descripcion_quir','$fam_descripcion_gen','$ant_aud_anterior','$pasa_otoscopia','$hallazgo_der','$item1','$item2','$item3','$item4','$item5','$item6','$resultado','$observaciones','$retamizaje','$evaluacion_diagnostica','$interconsulta','$control','$historiaid')"; 
    $query = mysqli_query($conexion,$datos);
    //-----------------
    if ($query){   
      //Obtenemos El Ultimo ID Insertado
      $ver = "SELECT * FROM audiometria_oidoderecho ORDER BY `id` DESC limit 0,1";
      $queryid = mysqli_query($conexion,$ver);
      $dataid = mysqli_fetch_array($queryid);
      $idfk = $dataid['id'];
    }else{
      echo "<script>alert('Error, Intente Nuevamente')</script>";
    }
    //-----------------
    $datos_izq = "INSERT INTO `audiometria_oidoizquierdo`(`id`, `otoscopia_oi`, `hallazgo_oi`, `250_izq`, `500_izq`, `1000_izq`, `2000_izq`, `4000_izq`, `8000_izq`, `promedio_oi`, `id_audiometria_paciente` ) 
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
      echo "<script>window.location = 'audiometria_citas.php'</script>";
    } else {
      echo "<script>alert('Error, Intente Nuevamente')</script>";
      echo "<script>window.location = 'audiometria_citas.php'</script>";
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
    JOIN audiometria_oidoderecho ON  audiometria_oidoderecho.paciente_audiometria = datos_basicos.id_historia
    WHERE datos_basicos.motivo_evaluacion = 'Ingreso' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $ingreso = $re{'Total'};      
    }
    $cont = "SELECT *, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN audiometria_oidoderecho ON  audiometria_oidoderecho.paciente_audiometria = datos_basicos.id_historia
    WHERE datos_basicos.motivo_evaluacion = 'Periodico' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $periodico = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN audiometria_oidoderecho ON audiometria_oidoderecho.paciente_audiometria = datos_basicos.id_historia 
    WHERE datos_basicos.motivo_evaluacion = 'Retiro' AND datos_complementarios.numero_documento=".$id." ";
      $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $retiro = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
    JOIN audiometria_oidoderecho ON audiometria_oidoderecho.paciente_audiometria = datos_basicos.id_historia
    WHERE datos_basicos.motivo_evaluacion = 'Post incapacidad' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $postincapacidad = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN audiometria_oidoderecho ON audiometria_oidoderecho.paciente_audiometria = datos_basicos.id_historia 
    WHERE datos_basicos.motivo_evaluacion = 'Reubicacion' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
     $reubicacion = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos 
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN audiometria_oidoderecho ON audiometria_oidoderecho.paciente_audiometria = datos_basicos.id_historia
    WHERE datos_basicos.motivo_evaluacion = 'Reingreso' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $reingreso = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN audiometria_oidoderecho ON audiometria_oidoderecho.paciente_audiometria = datos_basicos.id_historia 
    WHERE datos_basicos.motivo_evaluacion = 'Otros' AND datos_complementarios.numero_documento=".$id." ";
    $qcont = mysqli_query($conexion,$cont);
    while ($re = mysqli_fetch_array($qcont)){
      $otros = $re{'Total'};     
    }
    //obtener fecha del ultimo registro del historial
    $consultaregistro = "SELECT * FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
    JOIN audiometria_oidoderecho ON audiometria_oidoderecho.paciente_audiometria = datos_basicos.id_historia
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
      <div class="panel-heading text-center">
        <label for="antecedentes_aud" generated="true" class="error"></label><br>
        <h6 class="panel-heading text-center">Antecedentes
          <input type="radio" name="antecedentes_aud" value="Si"> Si 
          <input type="radio" name="antecedentes_aud" value="No"> No
        </h6>
      </div>
      <div class="panel-body">
      <!--  -->
      <div class="col-sm-12">

        <label for="">Personales:</label>
        <label for="ant_quirurgico" generated="true" class="error"></label>
        <label for="antecendentes_per_quir" generated="true" class="error"></label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <div class="input-group-text size_font">
              Quirurgico: <div class="separator"></div> 
              Si <div class="separator"></div><input type="radio" name="ant_quirurgico" value="Si"><div class="separator"></div>
              No <div class="separator"></div><input type="radio" name="ant_quirurgico" value="No"> 
            </div>
          </div>
          <textarea class="form-control" aria-label="Text input with checkbox" name="antecendentes_per_quir" rows="1" placeholder="antecedentes personales quirugico"></textarea>
        </div>
        
        <label for="antecendentes_per_gen" generated="true" class="error"></label>
        <label for="ant_general" generated="true" class="error"></label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <div class="input-group-text size_font">
              Generales: <div class="separator"></div> 
              Si <div class="separator"></div><input type="radio" name="ant_general" value="Si">
              <div class="separator"></div>
              No <div class="separator"></div><input type="radio" name="ant_general" value="No"> 
            </div>
          </div>
          <textarea class="form-control" aria-label="Text input with checkbox" name="antecendentes_per_gen" rows="1" placeholder="antecedentes generales personales"></textarea>
        </div>
        <!--  -->
        <label for="">Familiares:</label>
        <label for="ant_quirurgico" generated="true" class="error"></label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <div class="input-group-text size_font">
              Quirurgico: <div class="separator"></div> 
              Si <div class="separator"></div><input type="radio" name="ant_quirurgico_fa" value="Si">
              <div class="separator"></div>
              No <div class="separator"></div><input type="radio" name="ant_quirurgico_fa" value="No">
            </div>
          </div>
          <textarea class="form-control" aria-label="Text input with checkbox" name="antecendentes_fa_quir" rows="1" placeholder="antecedentes quirurgicos familiares"></textarea>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <div class="input-group-text size_font">
              Generales: <div class="separator"></div> 
              Si <div class="separator"></div><input type="radio" name="ant_general_fa" value="Si">
              <div class="separator"></div>
              No <div class="separator"></div><input type="radio" name="ant_general_fa" value="No"> 
            </div>
          </div>
          <textarea class="form-control" aria-label="Text input with checkbox" name="antecendentes_fa_gen" rows="1" placeholder="antecedentes generales familiares"></textarea>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <div class="input-group-text size_font">
              Audiometria anterior: <div class="separator"></div>
            </div>
          </div>
          <textarea class="form-control" aria-label="Text input with checkbox" name="ant_aud_anterior" rows="1" placeholder="Antecedentes de audiometria anterior"></textarea>
        </div>
      </div>
      </div>
    </div><br>
    
    <div class="panel panel-default">
      <div class="panel-heading text-center"><h6>Otoscopia</h6></div>
      <div class="panel-body"> 
      <div class="col-sm-12">
        <table class="table table-bordered">    
          <thead>              
            <th style="width: 100px;">Oidos</th>
            <th style="width: 180px;" class="text-center">Pasa otoscopia</th>
            <th class="text-center">Hallazgos</th>
          </thead>
          <tbody>
            <tr class="text-center">
              <td style="padding-top: 40px; color: red;">Oido Derecho</td>
              <td style="padding-top: 20px;">
                  <label for="otoscopia_der" generated="true" class="error"></label><br>
                  Si <input type="radio" name="otoscopia_der" value="Si">
                  No <input  type="radio" name="otoscopia_der" value="No">
              </td>
              <td>
                <label for="hallazgo_der" generated="true" class="error"></label><br>
                <textarea class="form-control" type="text" name="hallazgo_der" rows="1"></textarea>
              </td>
            </tr>
            <tr>
           		<td style="padding-top: 40px; color: blue;">Oido Izquierdo</td>
              <td style="padding-top: 20px;">
                <div class="text-center">
                  <label for="otoscopia_izq" generated="true" class="error"></label><br>
                  Si  <input type="radio" name="otoscopia_izq" value="Si">
                  No  <input type="radio" name="otoscopia_izq" value="No"> 
                </div> 
              </td>
              <td>
                <label for="hallazgo_izq" generated="true" class="error"></label><br>
                <textarea class="col-sm-12 form-control" type="text" name="hallazgo_izq" rows="1"></textarea>
              </td>
            </tr>
          </tbody>
        </table>
      </div> 
      </div>
    </div><br>


    <div class="panel panel-default">
      <div class="panel-heading text-center"><h6>Audiometria Tamiz:</h6></div>
      <div class="panel-body">
        <div class="col-sm-12" >
          <span class="badge badge-danger">
            <div class="row">     
              <div class="form-inline container-fluid">
                
                <span class="input-group-text" id="basic-addon1" style="margin-right: 3.0em;">Oido Derecho:</span>

                <label for="item1" generated="true" class="error"></label><br>
                <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="250" name="item1" id="item1" onKeyUp="Suma()" onkeypress="return esInteger(event)">

                <label for="item2" generated="true" class="error"></label><br>
                <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="500" name="item2" id="item2" onKeyUp="Suma()" onkeypress="return esInteger(event)">

                <label for="item3" generated="true" class="error"></label><br>
                <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="1000" name="item3" id="item3" onKeyUp="Suma()" onkeypress="return esInteger(event)">

                <label for="item4" generated="true" class="error"></label><br>
                <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="2000" name="item4" id="item4" onKeyUp="Suma()" onkeypress="return esInteger(event)">

                <label for="item5" generated="true" class="error"></label><br>
                <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="4000" name="item5" id="item5" onKeyUp="Suma()" onkeypress="return esInteger(event)">

                <label for="item6" generated="true" class="error"></label><br>
                <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="8000" name="item6" id="item6" onKeyUp="Suma()" onkeypress="return esInteger(event)">

                <br>
                <input style="width:80px;" type="text" class="form-control" placeholder="" name="resultado" onkeypress="return esInteger(event)">
              </div>
            </div>
          </span>
        </div><br>
          
        <div class="col-sm-12">
          <span class="badge badge-info ">
            <div class="row">     
              <div class="form-inline container-fluid">

                <span class="input-group-text" id="basic-addon1" style="margin-right: 3.0em;">Oido Izquierdo:</span>

                <label for="item11" generated="true" class="error"></label><br>
                <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="250" name="item11" id="item11" onKeyUp="Suma()" onkeypress="return esInteger(event)">

                <label for="item12" generated="true" class="error"></label><br>
                <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="500" name="item12" id="item12" onKeyUp="Suma()" onkeypress="return esInteger(event)">

                <label for="item13" generated="true" class="error"></label><br>
                <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="1000" name="item13" id="item13" onKeyUp="Suma()" onkeypress="return esInteger(event)">

                <label for="item14" generated="true" class="error"></label><br>
                <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="2000" name="item14" id="item14" onKeyUp="Suma()" onkeypress="return esInteger(event)">

                <label for="item15" generated="true" class="error"></label><br>
                <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="4000" name="item15" id="item15" onKeyUp="Suma()" onkeypress="return esInteger(event)">

                <label for="item16" generated="true" class="error"></label><br>
                <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="8000" name="item16" id="item16" onKeyUp="Suma()" onkeypress="return esInteger(event)">
      
                <br>
                <input type="text" style="width:80px;" class="form-control" placeholder="" name="result" onkeypress="return esInteger(event)">
              </div>
            </div>
          </span>
        </div>
        <br>
      </div>
    </div> <br>    

    <div class="panel panel-default">
      <div class="panel-heading text-center"><h6>Observaciones:</h6></div>
      <div class="panel-body"> 
        <div class="col-sm-12">
          <label for="observaciones" generated="true" class="error"></label><br>    
          <textarea class="form-control" name="observaciones" rows="2" maxlength="2000"></textarea>
        </div>
        <br>
      </div> 
    </div><br>  

    <div class="panel panel-default">
      <div class="panel-heading text-center"><h6>Evaluación audiológica diagnóstica:</h6></div>
      <div class="panel-body">
        <label for="audiologica_diagnostica" generated="true" class="error"></label><br>
        <div class="col-sm-12">
          <textarea class="form-control" name="audiologica_diagnostica" rows="2"></textarea><br>
        </div>
      </div>  
    </div><br>

  <div class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body">
      <div class="form-inline">
        <div class="col-sm-4">
          <div class="text-center">
            <h6>Retamizaje:</h6>
            <label for="retamizaje" generated="true" class="error"></label><br>
            <fieldset class="text-center">
              Si <input type="radio" name="retamizaje" value="Si">
              No <input type="radio" name="retamizaje" value="No">
            </fieldset> 
          </div>
        </div>
        
        
        <div class="col-sm-4">
          <div class="text-center">
            <h6>Interconsulta con Otorrinolaringología:</h6>
            <label for="interconsulta" generated="true" class="error"></label><br>
            <fieldset class="text-center">
              Si <input type="radio" name="interconsulta" value="Si">
              No <input type="radio" name="interconsulta" value="No">
            </fieldset>
          </div>
        </div> 

        <div class="col-sm-4">
          <div class="text-center">
            <h6>Control 1 año:</h6>
            <label for="control" generated="true" class="error"></label><br>
            <fieldset>
              Si <input type="radio" name="control" value="Si">
              No <input type="radio" name="control" value="No" checked>
            </fieldset>
          </div>
        </div><br>

      </div>
    </div><br>
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
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='audiometria_validarpaciente.php';">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button onClick="window.location.href='audiometria_validarpaciente';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> ERROR.</h4>
      </div>
      <div class="modal-body">
        <h4 class="text-primary">El Usuario con Indentificacion Nº <label class="text-danger"><?php echo $id; ?></label> Incorrecto O no Registrado en el Sistema.</h4> <p>Cerciorarse de que la fecha de apertura de la historia clinica coincida con el dia en que se consulta el usuario</p>    
      </div>
      <div class="modal-footer">
        <a onClick="window.location.href='audiometria_validarpaciente.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>
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

</body>
<!---->
<script type="text/javascript">
  //Función que realiza la suma
  function Suma(){
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
     
      var oidoderecho = (item1+item2+item3+item4+item5+item6)/6;
      document.calculadora.resultado.value = oidoderecho.toFixed(2);

      var oidoizquierdo = (item11+item12+item13+item14+item15+item16)/6;
      document.calculadora.result.value = oidoizquierdo.toFixed(2);     
    }
    //Si se produce un error no hacemos nada
    catch(e){}
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
