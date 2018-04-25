<?php 
  include ('includes/conexion.php');
  include ('bar/navbar_Recepcion.php');  
	  
  if ($_GET){
    $priorizar = $_GET['priorizar'];
    $historia = $_GET['historia'];
    $estado_atencion = $_GET['estado_atencion'];

    switch ($priorizar) {
      case '1':
        $data = "UPDATE `db_estado_atencion` SET `audiometria`= '$estado_atencion' WHERE paciente = '$historia'"; 
        $query2 = mysqli_query($conexion,$data);
      break;

      case '2':
        $data = "UPDATE `db_estado_atencion` SET `visiometria`= '$estado_atencion' WHERE paciente = '$historia'"; 
        $query2 = mysqli_query($conexion,$data);
      break;

      case '3':
        $data = "UPDATE `db_estado_atencion` SET `espirometria`= '$estado_atencion' WHERE paciente = '$historia'"; 
        $query2 = mysqli_query($conexion,$data);
      break;

      case '4':
        $data = "UPDATE `db_estado_atencion` SET `psicologia`= '$estado_atencion' WHERE paciente = '$historia'"; 
        $query2 = mysqli_query($conexion,$data);
      break;

      case '5':
        $data = "UPDATE `db_estado_atencion` SET `enfermeria`= '$estado_atencion' WHERE paciente = '$historia'"; 
        $query2 = mysqli_query($conexion,$data);
      break;

      case '6':
        $data = "UPDATE `db_estado_atencion` SET `medico`= '$estado_atencion' WHERE paciente = '$historia'"; 
        $query2 = mysqli_query($conexion,$data);
      break;
      
    }

    /*if ($priorizar == 1) {
      $data = "UPDATE `db_estado_atencion` SET `audiometria`= '$estado_atencion' WHERE paciente = '$historia'"; 
      $query2 = mysqli_query($conexion,$data);  
    }
    if ($priorizar == 2) {
      $data = "UPDATE `db_estado_atencion` SET `visiometria`= '$estado_atencion' WHERE paciente = '$historia'"; 
      $query2 = mysqli_query($conexion,$data);
    }
    if ($priorizar == 3) {
      $data = "UPDATE `db_estado_atencion` SET `espirometria`= '$estado_atencion' WHERE paciente = '$historia'"; 
      $query2 = mysqli_query($conexion,$data);
    }
    if ($priorizar == 4) {
      $data = "UPDATE `db_estado_atencion` SET `psicologia`= '$estado_atencion' WHERE paciente = '$historia'"; 
      $query2 = mysqli_query($conexion,$data);
    }
    if ($priorizar == 5) {
      $data = "UPDATE `db_estado_atencion` SET `enfermeria`= '$estado_atencion' WHERE paciente = '$historia'"; 
      $query2 = mysqli_query($conexion,$data);
    }
    if ($priorizar == 6) {
      $data = "UPDATE `db_estado_atencion` SET `medico`= '$estado_atencion' WHERE paciente = '$historia'"; 
      $query2 = mysqli_query($conexion,$data);
    }*/
  }
?>

<!DOCTYPE html>
<html>
  <head>
  	<title>Laboratorio Salud Ocupacional</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

<script type="text/javascript">
  function getTimeAJAX() {
    //GUARDAMOS EN UNA VARIABLE EL RESULTADO DE LA CONSULTA AJAX    
    var time = $.ajax({
      url: 'recepcion_pacientes_cita_asignada.php', //indicamos la ruta donde se genera la hora
      dataType: 'text',//indicamos que es de tipo texto plano
      async: false     //ponemos el parámetro asyn a falso
    }).responseText;
    //actualizamos el div que nos mostrará la hora actual
    document.getElementById("myWatch").innerHTML = "Pacientes En espera: "+time;
  }
  //con esta funcion llamamos a la función getTimeAJAX cada segundo para actualizar el div que mostrará la hora
  setInterval(getTimeAJAX,1000);
</script>

<body>
  <br>
  <div class="container">
    <div class="row"> 
      <div class="panel panel-default">
        <div class="panel-body">
          <div id='myWatch'></div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

