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
<br>

  <?php

  $area = base64_decode($_REQUEST['area']);
  if ($area==12) {
    $id = base64_decode($_REQUEST['documento']);
    $fecha_reg = base64_decode($_REQUEST['fecha_registro']);
  }else{
    $id = base64_decode($_REQUEST['paciente']);
    $fecha_reg = $_GET['registro'];
  }

    //$id = base64_decode($_REQUEST['paciente']);

  if (isset($_POST['Actualizar'])) {

    $antecedentes = $_POST['antecedentes_aud'];

    //antecedentes personales
    $per_quir = $_POST['ant_quirurgico'];
    $per_gen = $_POST['ant_general'];
    $per_descripcion_quir = $_POST['antecendentes_per_quir'];
    $per_descripcion_gen = $_POST['antecendentes_per_gen'];

    //antecedentes familiares
    $fam_quir = $_POST['ant_quirurgico_fa'];
    $fam_gen = $_POST['ant_general_fa'];
    $fam_descripcion_quir = $_POST['antecendentes_fa_quir'];
    $fam_descripcion_gen = $_POST['antecendentes_fa_gen']; 

    //antecedentes audiometria anterior
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

    $historia = $_POST['historia'];


    $datos_der = "UPDATE `audiometria_resultado_der` SET `antecedentes_audiometria` = '$antecedentes', `ant_personal_quir`='$per_quir',`ant_personal_gen`='$per_gen', `descripcion_personal_quir`='$per_descripcion_quir',`descripcion_personal_gen`='$per_descripcion_gen',`ant_familiar_quir`='$fam_quir',`ant_familiar_gen`='$fam_gen',`descripcion_familiar_quir`='$fam_descripcion_quir',`descripcion_familiar_gen`='$fam_descripcion_gen',`ant_audiometria_anterior`='$ant_aud_anterior',`pasa_otoscopia`='$pasa_otoscopia',`hallazgo_der`='$hallazgo_der', `250`='$item1', `500`='$item2', `1000`='$item3', `2000`='$item4', `4000`='$item5', `8000`='$item6', `resultado_promedio`='$resultado', `observaciones`='$observaciones', `retamizaje`='$retamizaje', `evaluacion_diagnostica`='$evaluacion_diagnostica', `interconsulta`='$interconsulta', `control_anual`='$control'
    WHERE paciente_audiometria = '$historia' "; 
    $query_der = mysqli_query($conexion,$datos_der);

    if ($query_der){   
      $ver = "SELECT * FROM audiometria_resultado_der WHERE paciente_audiometria = ".$id."";
      $queryid = mysqli_query ($conexion,$ver);
      $dataid = mysqli_fetch_array($queryid);
      $idfk = $dataid['id'];
    }else{
      echo "<script>alert('Error de id, Intente Nuevamente')</script>";
    }

    //-----------------
    $datos_izq = "UPDATE `audiometria_resultado_izq` SET `pasa_otoscopia_izq`='$pasa_otoscopia_izq', `hallazgo_izq`='$hallazgo_izq', `250_izq`='$item11', `500_izq`='$item12', `1000_izq`='$item13', `2000_izq`='$item14', `4000_izq`='$item15', `8000_izq`='$item16', `resultado_promedio_izq`='$resultado_izq' WHERE id_audiometria_paciente = ".$idfk." "; 
    $query_izq = mysqli_query($conexion,$datos_izq);

    if ($query_der && $query_izq) {
      //echo "<script>alert('Datos Registrados Exitosamente')</script>";
      //echo "<script>window.location = 'Audiometria.php'</script>";
      echo '<script>
       $(document).ready(function(){
        $("#datossucces").modal("show");
      });</script>';
    } else {
      //echo "<script>alert('Error, Intente Nuevamente')</script>";
      //echo "<script>window.location = 'Audiometria.php'</script>";
      echo '<script>
       $(document).ready(function(){
        $("#datoserror").modal("show");
      });</script>'; 
    }
  }   
  ?> 
  <!-- Validar  Caracteres 1000-->


    <?php 
      //$fecharegistro = $_POST['fecha_registro'];
//---------------
      $consult="SELECT * FROM datos_basicos AS db 
      JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
      JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
      JOIN audiometria_resultado_der AS ard ON db.id_historia = ard.paciente_audiometria
      JOIN audiometria_resultado_izq AS ari ON ard.id = ari.id_audiometria_paciente
      WHERE db.id_historia='$id' OR dc.numero_documento = '$id' AND db.fecha = '$fecha_reg' ";
      $query = mysqli_query($conexion,$consult);
    ?> 
    <?php //if ($query) { 
      if (mysqli_num_rows($query) > 0){
    	//cuenta el numero de filas de la consulta
      
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


      //antecedentes audiometria
      $antecedentesaud=$datos['antecedentes_audiometria'];
      //antecedentes personales
      $antpersonalquir=$datos['ant_personal_quir'];
      $antpersonalgen=$datos['ant_personal_gen'];      
      $descripcionpersonalquir=$datos['descripcion_personal_quir'];
      $descripcionpersonalgen=$datos['descripcion_personal_gen'];
      //antecedentes Familiares
      $antfamiliarquir=$datos['ant_familiar_quir'];
      $antfamiliargen=$datos['ant_familiar_gen'];
      $descripcionfamiliarquir=$datos['descripcion_familiar_quir'];
      $descripcionfamiliargen=$datos['descripcion_familiar_gen'];
      //antecedentes Audiometria Anterior
      $ant_aud_anterior=$datos['ant_audiometria_anterior'];
      //otoscopia
      $pasa_der=$datos['pasa_otoscopia'];
      $hallazgo_der=$datos['hallazgo_der'];
      $pasa_izq=$datos['pasa_otoscopia_izq'];
      $hallazgo_izq=$datos['hallazgo_izq'];
      //
      $Promedio_der=$datos['resultado_promedio'];
      $Promedio_izq=$datos['resultado_promedio_izq'];
      $observaciones=$datos['observaciones'];
      $retamizaje = $datos['retamizaje'];
      $evaluacion_diag = $datos['evaluacion_diagnostica'];
      $interconsulta_o = $datos['interconsulta'];
      $control = $datos['control_anual'];
      //valores examen tamiz oido der
      $item1 = $datos['250'];
      $item2 = $datos['500'];
      $item3 = $datos['1000'];
      $item4 = $datos['2000'];
      $item5 = $datos['4000'];
      $item6 = $datos['8000'];
      //valores examen tamiz oido izq
      $item11 = $datos['250_izq'];
      $item12 = $datos['500_izq'];
      $item13 = $datos['1000_izq'];
      $item14 = $datos['2000_izq'];
      $item15 = $datos['4000_izq'];
      $item16 = $datos['8000_izq'];


    $cont = "SELECT *, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
       JOIN audiometria_resultado_der ON  audiometria_resultado_der.paciente_audiometria = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Ingreso' AND datos_complementarios.numero_documento=".$numero_documento." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $ingreso = $re{'Total'};      
    }
    $cont = "SELECT *, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
      JOIN audiometria_resultado_der ON  audiometria_resultado_der.paciente_audiometria = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Periodico' AND datos_complementarios.numero_documento=".$numero_documento." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $periodico = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN audiometria_resultado_der ON  audiometria_resultado_der.paciente_audiometria = datos_basicos.id_historia 
        WHERE datos_basicos.motivo_evaluacion = 'Retiro' AND datos_complementarios.numero_documento=".$numero_documento." ";
      $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $retiro = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
      JOIN audiometria_resultado_der ON  audiometria_resultado_der.paciente_audiometria = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Post incapacidad' AND datos_complementarios.numero_documento=".$numero_documento." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $postincapacidad = $re{'Total'};     
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN audiometria_resultado_der ON  audiometria_resultado_der.paciente_audiometria = datos_basicos.id_historia 
        WHERE datos_basicos.motivo_evaluacion = 'Reubicacion' AND datos_complementarios.numero_documento=".$numero_documento." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
     $reubicacion = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id 
      JOIN audiometria_resultado_der ON  audiometria_resultado_der.paciente_audiometria = datos_basicos.id_historia
        WHERE datos_basicos.motivo_evaluacion = 'Reingreso' AND datos_complementarios.numero_documento=".$numero_documento." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $reingreso = $re{'Total'};      
    }
    $cont = "SELECT datos_basicos.motivo_evaluacion, COUNT(motivo_evaluacion) AS Total FROM datos_basicos
      JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
      JOIN audiometria_resultado_der ON  audiometria_resultado_der.paciente_audiometria = datos_basicos.id_historia 
        WHERE datos_basicos.motivo_evaluacion = 'Otros' AND datos_complementarios.numero_documento=".$numero_documento." ";
    $qcont = mysqli_query($conexion,$cont);
        while ($re = mysqli_fetch_array($qcont)){
      $otros = $re{'Total'};     
    }
    //obtener fecha del ultimo registro del historial
    $consultaregistro = "SELECT * FROM datos_basicos
    JOIN datos_complementarios ON datos_basicos.fk_d_complementario = datos_complementarios.id
     JOIN audiometria_resultado_der ON  audiometria_resultado_der.paciente_audiometria = datos_basicos.id_historia
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
    <!---->
  <script>
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
               antecedentes_aud: {required: true},
               ant_quirurgico: {required: true},
               ant_general: {required: true},
               antecendentes_per_quir: {minlength: 3, maxlength: 600},
               antecendentes_per_gen: {minlength: 3, maxlength: 600},
               ant_quirurgico_fa: {required: true},
               ant_general_fa: {required: true},
               antecendentes_fa_quir: {minlength: 3, maxlength: 600},
               antecendentes_fa_gen: {minlength: 3, maxlength: 600},
               ant_aud_anterior: {minlength: 3, maxlength: 600},
               otoscopia_der: {required: true},
               hallazgo_oi_der: {minlength: 3, maxlength: 500},
               otoscopia_izq: {required: true},
               hallazgo_izq: {minlength: 3, maxlength: 500},
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

               observaciones: {minlength: 3, maxlength: 700},
               audiologica_diagnostica: {minlength: 3, maxlength: 700},

               retamizaje: {required: true},
               interconsulta: {required: true},
               control: {required: true},




             },
             messages: /* Accedemos a los campos a través de su nombre: email, nombre, edad */
             {
               //email: {required: 'Este campo es requerido', email: 'El formato de email es incorrecto', minlength: 'El mínimo permitido son 5 caracteres', maxlength: 'El máximo permitido son 80 caracteres'},
               antecedentes_aud: {required: 'Seleccione una opcion'},
               ant_quirurgico: {required: 'Seleccione una opcion'},
               ant_general: {required: 'Seleccione una opcion'},
               antecendentes_per_quir: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 600 caracteres'},
               antecendentes_per_gen: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 600 caracteres'},
               ant_quirurgico_fa: {required: 'Seleccione una opcion'}, 
               ant_general_fa: {required: 'Seleccione una opcion'}, 
               antecendentes_fa_quir: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 600 caracteres'},
               antecendentes_fa_gen: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 600 caracteres'},
               ant_aud_anterior: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 600 caracteres'},
               otoscopia_der: {required: 'Seleccione'},
               hallazgo_oi_der: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 500 caracteres'},
               otoscopia_izq: {required: 'Seleccione'},
               hallazgo_izq: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 500 caracteres'},
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

               observaciones: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 700 caracteres'},
               audiologica_diagnostica: {minlength: 'El mínimo permitido son 3 caracteres', maxlength: 'El máximo permitido son 700 caracteres'},
               retamizaje: {required: 'Seleccione'},
               interconsulta: {required: 'Seleccione'},
               control: {required: 'Seleccione'},


             }

         });
   });

});
</script>

<!---->
<body>    
<form method="POST"  action="" name="calculadora" id="formulario">
<div class="text-center text-info"><label>Actualizar Historia de Audiometria:</label></div>

<div class="container">

<input class="form-control" type="text" name="historia" value='<?php echo $historia; ?>' readonly="readonly" style  ="display: none;">



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

  <div class="col-sm-12">
        <br><br>
        <div class="text-center text-info"><label>Antecedentes</label> 
          <?php
            if ($antecedentesaud == "Si") {?>
            <label for="antecedentes_aud" generated="true" class="error"></label><br>
            <input type="radio" name="antecedentes_aud" value="Si" checked> Si 
            <input type="radio" name="antecedentes_aud" value="No"> No
            <?php } else { ?>
            <label for="antecedentes_aud" generated="true" class="error"></label><br>
            <input type="radio" name="antecedentes_aud" value="Si"> Si 
            <input type="radio" name="antecedentes_aud" value="No" checked> No
          <?php } ?>
        </div>
      <table class="table table-bordered"> 
        <thead>
          <th class="text-center">Personal</th>
          <th class="text-center">Descripcion</th>
        </thead>   
        <tbody>
          <tr>
            <td class="col-sm-2 text-center" style="padding-top: 10px;">
            <label>Quirugico: </label> 
            <?php if ($antpersonalquir == "Si") {?> 
              <label for="ant_quirurgico" generated="true" class="error"></label><br>
              <input type="radio" name="ant_quirurgico" value="Si" checked> Si | <input type="radio" name="ant_quirurgico" value="No"> No <br><br>
            <?php }else{ ?>
              <label for="ant_quirurgico" generated="true" class="error"></label><br>
              <input type="radio" name="ant_quirurgico" value="Si"> Si | <input type="radio" name="ant_quirurgico" value="No" checked> No <br><br>
            <?php } ?>
            </td>
            <td>
              <label for="antecendentes_per_quir" generated="true" class="error"></label><br>
              <textarea class="form-control" type="text" name="antecendentes_per_quir" placeholder="antecedentes quirurgicos personales" maxlength="990" ><?php echo $descripcionpersonalquir ?></textarea><br>
            </td>
          </tr>
          <tr> 
            <td>
              <label> General: </label> 
            <?php if ($antpersonalgen == "Si") { ?>
              <label for="ant_general" generated="true" class="error"></label><br>
              <input type="radio" name="ant_general" value="Si" checked> Si | <input type="radio" name="ant_general" value="No"> No
            <?php }else{ ?>
              <label for="ant_general" generated="true" class="error"></label><br>
              <input type="radio" name="ant_general" value="Si"> Si | <input type="radio" name="ant_general" value="No" checked> No
              <?php } ?>
            </td> 
            <td>
              <label for="ant_quirurgico" generated="true" class="error"></label><br>
              <textarea type="text" class="form-control col-sm-12" name="antecendentes_per_gen" placeholder="antecedentes generales personales" maxlength="990"><?php echo $descripcionpersonalgen ?></textarea>
            </td>

        </tr>
            <thead>
              <th class="text-center">Familiar</th>
              <th class="text-center">Descripcion</th>
            </thead>
          </tr>
          <tr>
            <td class="col-sm-2 text-center" style="padding-top: 10px;">
            <label>Quirugico: </label>
            <?php if ($antfamiliarquir = "Si") { ?>
              <label for="ant_quirurgico_fa" generated="true" class="error"></label><br>
              <input type="radio" name="ant_quirurgico_fa" value="Si" checked> Si | <input type="radio" name="ant_quirurgico_fa" value="No" > No
            <?php }else{ ?>
              <label for="ant_quirurgico_fa" generated="true" class="error"></label><br>
              <input type="radio" name="ant_quirurgico_fa" value="Si"> Si | <input type="radio" name="ant_quirurgico_fa" value="No" checked> No
            <?php } ?>
            </td>
            <td>
              <label for="antecendentes_fa_quir" generated="true" class="error"></label><br>
              <textarea type="text" class="form-control col-sm-12" name="antecendentes_fa_quir" placeholder="antecedentes quirurgicos familiares" maxlength="990"><?php echo $descripcionfamiliarquir ?></textarea>
            </td>
          </tr>
          <tr>
            <td>
            <label> General: </label> 
            <?php if ($antfamiliargen=="Si") { ?>
              <label for="ant_general_fa" generated="true" class="error"></label><br>
              <input type="radio" name="ant_general_fa" value="Si" checked> Si | <input type="radio" name="ant_general_fa" value="No"> No 
            <?php }else{ ?>
              <label for="ant_general_fa" generated="true" class="error"></label><br>
              <input type="radio" name="ant_general_fa" value="Si"> Si | <input type="radio" name="ant_general_fa" value="No" checked> No
            <?php } ?>   
            </td>
            <td>
              <label for="antecendentes_fa_gen" generated="true" class="error"></label><br>
              <textarea type="text" class="form-control col-sm-12" name="antecendentes_fa_gen" placeholder="antecedentes generales familiares" maxlength="990"><?php echo $descripcionfamiliargen ?></textarea>
            </td>
          </tr>
        </tbody>
      </table>
      </div>


    <div class="col-sm-12"> 
    <div class="text-center text-info"><label>Antecendentes de Audiometria Anterior:</label></div>
    <div class="form-group">
      <label for="ant_aud_anterior" generated="true" class="error"></label><br>
      <textarea class="col-sm-12" type="text" name="ant_aud_anterior" rows="4" placeholder="Antecedentes de audiometria anterior" maxlength="2490"><?php echo $ant_aud_anterior ?></textarea><br>
    </div> 
    </div> 
  
    

   <div class="col-sm-12">
      <br><br>
      <div class="text-center text-info"><label>Otoscopia</label></div>
        <table class="table table-bordered">    
        <thead>
          
          <th style="width: 140px;">Oidos</th>
            <th style="width: 120px;" class="text-center">Pasa</th>
            <th class="text-center">Hallazgos</th>
          
        </thead>
        <tbody>
        <tr>
          <td style="padding-top: 20px; color: red;">Oido Derecho</td>
          <td style="padding-top: 20px;"><div class="text-center">
            <?php if ($pasa_der=="Si") { ?>
              <label for="otoscopia_der" generated="true" class="error"></label><br>
              <input type="radio" name="otoscopia_der" value="Si" checked> Si
              <input  type="radio" name="otoscopia_der" value="No"> No
            <?php }else{ ?>
              <input type="radio" name="otoscopia_der" value="Si"> Si
              <input  type="radio" name="otoscopia_der" value="No" checked> No
            <?php } ?>
          </div></td><br>
          <td>
            <label for="hallazgo_der" generated="true" class="error"></label><br>
            <textarea class="col-sm-12" type="text" name="hallazgo_der" rows="2" maxlength="990"><?php echo $hallazgo_der ?></textarea>
          </td>
        </tr>
        <tr>
       		<td style="padding-top: 20px; color: blue;">Oido Izquierdo</td>
          <td style="padding-top: 20px;"><div class="text-center">
            <?php if ($pasa_izq="Si") { ?>
              <label for="otoscopia_izq" generated="true" class="error"></label><br>
              <input type="radio" name="otoscopia_izq" value="Si" checked> Si
              <input type="radio" name="otoscopia_izq" value="No"> No
            <?php }else{ ?>
              <label for="otoscopia_izq" generated="true" class="error"></label><br>
              <input type="radio" name="otoscopia_izq" value="Si"> Si
              <input type="radio" name="otoscopia_izq" value="No" checked> No
            <?php } ?>  
          </div></td>
          <td>
            <label for="hallazgo_izq" generated="true" class="error"></label><br>
            <textarea class="col-sm-12" type="text" name="hallazgo_izq" rows="2" maxlength="990"><?php echo $hallazgo_izq ?></textarea>
          </td>
        </tr>
        </tbody>
      </table>
  </div><!--finsm-->
</div><!--container-->
<br><br>

<div class=" col-sm-12">
  <div class="form-group"> 
      <div class="text-center text-info"><label>Audiometria Tamiz: </label></div>
      <br>
    </div>  
</div> <!--container-->

<div class="form-inline">
  <div class="text-center" style="">

     <label for="" style="color: red; margin-right: 3.0em;">Oido Derecho:</label>

    <div class="form-group">
      <label for="item1" generated="true" class="error"></label><br>
      <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="250" name="item1" id="item1" onKeyUp="Suma()" onkeypress="return esInteger(event)" value="<?php echo $item1 ?>" max="120">
    </div> 

    <div class="form-group">
      <label for="item2" generated="true" class="error"></label><br>
      <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="500" name="item2" id="item2" onKeyUp="Suma()" onkeypress="return esInteger(event)" value="<?php echo $item2 ?>" max="120">
    </div>

    <div class="form-group">
      <label for="item3" generated="true" class="error"></label><br>
      <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="1000" name="item3" id="item3" onKeyUp="Suma()" onkeypress="return esInteger(event)" value="<?php echo $item3 ?>" max="120">
    </div>

    <div class="form-group">
      <label for="item4" generated="true" class="error"></label><br>
      <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="2000" name="item4" id="item4" onKeyUp="Suma()" onkeypress="return esInteger(event)" value="<?php echo $item4 ?>" max="120">
    </div>

    <div class="form-group">
      <label for="item5" generated="true" class="error"></label><br>
      <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="4000" name="item5" id="item5" onKeyUp="Suma()" onkeypress="return esInteger(event)" value="<?php echo $item5 ?>" max="120">
    </div>

    <div class="form-group">
      <label for="item6" generated="true" class="error"></label><br>
      <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="8000" name="item6" id="item6" onKeyUp="Suma()" onkeypress="return esInteger(event)" value="<?php echo $item6 ?>" max="120">
    </div>

    <div class="form-group">
      <label for="resultado" generated="true" class="error"></label><br>
      <input type="text" class="form-control" placeholder="" name="resultado" value="<?php echo $Promedio_der ?>" onkeypress="return esInteger(event)">
    </div>

  </div>
  
  <div class="text-center" style="">
<br><br>
    <label for="io" style="color: blue; margin-right: 3.0em;">Oido Izquierdo:</label>

    <div class="form-group">
      <label for="item11" generated="true" class="error"></label><br>
      <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="250" name="item11" id="item11" onKeyUp="Suma()" onkeypress="return esInteger(event)" value="<?php echo $item11 ?>" max="120">
    </div> 

    <div class="form-group">
      <label for="item12" generated="true" class="error"></label><br>
      <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="500" name="item12" id="item12" onKeyUp="Suma()" onkeypress="return esInteger(event)" value="<?php echo $item12 ?>" max="120">
    </div>

    <div class="form-group">
      <label for="item13" generated="true" class="error"></label><br>
      <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="1000" name="item13" id="item13" onKeyUp="Suma()" onkeypress="return esInteger(event)" value="<?php echo $item13 ?>" max="120">
    </div>

    <div class="form-group">
      <label for="item14" generated="true" class="error"></label><br>
      <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="2000" name="item14" id="item14" onKeyUp="Suma()" onkeypress="return esInteger(event)" value="<?php echo $item14 ?>" max="120">
    </div>

    <div class="form-group">
      <label for="item15" generated="true" class="error"></label><br>
      <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="4000" name="item15" id="item15" onKeyUp="Suma()" onkeypress="return esInteger(event)" value="<?php echo $item15 ?>" max="120">
    </div>

    <div class="form-group">
      <label for="item16" generated="true" class="error"></label><br>
      <input style="width:80px; margin-right: 3.0em;" type="number" class="form-control" placeholder="8000" name="item16" id="item16" onKeyUp="Suma()" onkeypress="return esInteger(event)" value="<?php echo $item16 ?>" max="120">
    </div>
    
    <div class="form-group">
      <label for="result" generated="true" class="error"></label><br>
      <input type="text" class="form-control" placeholder="" name="result" value="<?php echo $Promedio_izq ?>">
    </div><br><br><br>

    </div><!--inline-->
     </div><!--fin centro-->

    <div class="container"> 
      <div class="form-group col-sm-12">
        <label>Observaciones:</label>
        <label for="observaciones" generated="true" class="error"></label><br>
        <textarea class="col-sm-12" type="text" name="observaciones" rows="4" maxlength="2000"><?php echo $observaciones ?></textarea>
        <br>
      </div> 
    </div>  

    <div class="container"> 
      <div class=" col-sm-12">
        <br>
        <label>Evaluación audiológica diagnóstica:</label>
        <label for="audiologica_diagnostica" generated="true" class="error"></label><br>
        <textarea class="col-sm-12" type="text" name="audiologica_diagnostica" rows="2"><?php echo $evaluacion_diag ?></textarea>
        <!--<input class="form-control" type="text" name="audiologica_diagnostica">-->
        <br>
      </div>  
    </div>
    <!---->
  	
  <!--<div class=" col-sm-6">
  	<br><br><br>
    <label>Retamizaje:</label>
    <input class="form-control" type="text" name="retamizaje" >
    <br>
  </div>-->
  <div class="container">
  <br><br>
    <div class="col-sm-4">
      <div class="text-center">
        <table class="table table-bordered">    
        <thead>
          <tr>
            <th class="text-center">Retamizaje:</th>
          </tr>  
        </thead>
        <tbody>
        <tr>
          <td>
            <div class="text-center">
              <?php if ($retamizaje == "Si") { ?>
                <input type="radio" name="retamizaje" value="Si" checked> Si /
                <input type="radio" name="retamizaje" value="No"> No
              <?php }else{ ?>
                <input type="radio" name="retamizaje" value="Si"> Si /
                <input type="radio" name="retamizaje" value="No" checked> No
              <?php } ?>
            </div>  
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
        	 <th class="text-center">Interconsulta con Otorrinolaringología:</th>
          </tr> 
        </thead>
        <tbody>
          <tr>
            <td><div class="text-center">
              <?php if ($interconsulta_o == "Si") { ?>
                <input type="radio" name="interconsulta" value="Si" checked> Si
                <input type="radio" name="interconsulta" value="No"> No
              <?php }else{ ?>
                <input type="radio" name="interconsulta" value="Si"> Si
                <input type="radio" name="interconsulta" value="No" checked> No              
              <?php } ?>  
            </div></td>
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
        	 <th class="text-center">Control 1 año:</th>
          </tr> 
        </thead>
        <tbody>
        <tr>
          <td><div class="text-center">
            <?php if ($control == "Si") { ?>
              <input type="radio" name="control" value="Si" checked> Si
              <input type="radio" name="control" value="No"> No
            <?php }else{ ?>
              <input type="radio" name="control" value="Si"> Si
              <input type="radio" name="control" value="No" checked> No
            <?php } ?>  
          </div></td>
        </tr>
        </tbody>
      </table>
    </div>
  </div><!--finsm-->
  </td><!--fin container-->

  	<div class="text-center">
  	<br><br><br>
    	<input type="submit" name="Actualizar" value="Actualizar" class="btn btn-success" id="btn">
    </div>
  </div>

</form>
<br><br>
<?php }/*array_fin */?>
<?php 
}else{
    //echo "<script>alert('Error, Usuario con Indentificacion Nº $id Incorrecto O no Registrado en el Sistema.')</script>";
    //echo "<script>window.location = 'Audiometria.php'</script>";
  echo '<script>
   $(document).ready(function(){
    $("#mostrarmodal").modal("show");
   });</script>';
  } 

?>

<!--</form>-->  


<?php //include 'bar/footer.php'; ?>

<!--Error de usuario no registrado o incorrecto-->
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='administracion_search.php';">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button onClick="window.location.href='administracion_search.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> ERROR.</h4>
      </div>
      <div class="modal-body">
        <h4 class="text-primary">El Usuario con Indentificacion Nº <label class="text-danger"><?php echo $id; ?></label> No presenta Examen Registrado en el Sistema Concerniente al Area de Audiometria.</h4> <p>Cerciorarse de que el Paciente fue atendido en dicha fecha por el Area.</p>    
      </div>
      <div class="modal-footer">
        <a onClick="window.location.href='administracion_search.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>



<!--datos guardados-->
<div class="modal fade" id="datossucces" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='administracion_search.php';">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button onClick="window.location.href='administracion_search.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-success"><span class="glyphicon glyphicon-alert"></span> ALERTA.</h4>
      </div>
      <div class="modal-body">
        <h4 class="text-success"><span class="glyphicon glyphicon-floppy-saved"></span> Datos Actualizados Exitosamente.</h4>       
      </div>
      <div class="modal-footer">
        <a onClick="window.location.href='administracion_search.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>

<!--datos Error-->
<div class="modal fade" id="datoserror" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='administracion_search.php';">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button onClick="window.location.href='administracion_search.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> ALERTA.</h3>
      </div>
      <div class="modal-body">
        <h4 class="text-danger"> Error de Actualizacion, Intente Nuevamente.</h4>       
      </div>
      <div class="modal-footer">
        <a onClick="window.location.href='administracion_search.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
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

</html>
