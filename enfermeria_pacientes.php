<?php 
  include ('includes/conexion.php'); 
  include ('bar/navbar_enfermeria.php'); 
	  
  if ($_GET){ 
  	$historia = $_GET['historia'];
    $estado = $_GET['estado'];
    $inicio = $_GET['iniciotime'];

    $data = "UPDATE `db_estado_atencion` SET `enfermeria`= '$estado' WHERE paciente = '$historia'"; 
    $query2 = mysqli_query($conexion,$data);

    $data1 = "UPDATE `datos_basicos_atencion` SET `inicio_timeenfermeria`= '$inicio' WHERE id_datos_basicos= '$historia'"; 
    $query3 = mysqli_query($conexion,$data1);

    if ($query2 && $query3) {
      echo "<script>alert('Atencion ejecutada')</script>";
    }else{
      echo "<script>alert('Error, Intente Nuevamente')</script>";
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
  	<title>Enfermeria Pacientes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-body">
          <div id='myWatch'></div>
        </div>
      </div>
    </div>
  </body>
  <script type="text/javascript">
    function getTimeAJAX() {
      //GUARDAMOS EN UNA VARIABLE EL RESULTADO DE LA CONSULTA AJAX    
      var time = $.ajax({
        url: 'enfermeria_pacientes_atender.php', //indicamos la ruta donde se genera la hora
        dataType: 'text',//indicamos que es de tipo texto plano
        async: false     //ponemos el parámetro asyn a falso
      }).responseText;
      //actualizamos el div que nos mostrará la hora actual
      document.getElementById("myWatch").innerHTML = "Pacientes En espera: "+time;
    }
    //con esta funcion llamamos a la función getTimeAJAX cada segundo para actualizar el div que mostrará la hora
    setInterval(getTimeAJAX,1000);
  </script>
</html>

