<?php 

  include ('includes/conexion.php'); 
	  
  if ($_GET){ 
  	$historia = $_GET['historia'];
    $estado = $_GET['estado'];
    $inicio = $_GET['iniciotime'];

    $data = "UPDATE `db_estado_atencion` SET `psicologia`= '$estado' WHERE paciente = '$historia'"; 
    $query2 = mysqli_query($conexion,$data);

    $data1 = "UPDATE `datos_basicos_atencion` SET `inicio_timepsicologia`= '$inicio' WHERE id_datos_basicos = '$historia'"; 
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
  	<title>Laboratorio Salud Ocupacional</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="code/highcharts.js"></script>
    <script src="code/modules/exporting.js"></script>
    <style type="text/css">

      .log_componentes{
        width: 45px; 
        margin-right: 4.0em;
      }
    </style>
  </head>
  <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> -->

<script type="text/javascript">

    function getTimeAJAX() {

        //GUARDAMOS EN UNA VARIABLE EL RESULTADO DE LA CONSULTA AJAX    

        var time = $.ajax({

            url: 'psicologia_pacientes_atender.php', //indicamos la ruta donde se genera la hora
                dataType: 'text',//indicamos que es de tipo texto plano
                async: false     //ponemos el parámetro asyn a falso
        }).responseText;

        //actualizamos el div que nos mostrará la hora actual
        document.getElementById("myWatch").innerHTML = "Pacientes En espera: "+time;
    }

    //con esta funcion llamamos a la función getTimeAJAX cada segundo para actualizar el div que mostrará la hora
    setInterval(getTimeAJAX,1000);

</script>


  <?php include ('bar/navbar_psicologia.php'); ?>

<body>
  <!---->
  <br>
  <br>
  <br>
  <div class="container">
  <br><br>
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <div id='myWatch'></div>
      </div>
    </div>
  </div>  
  </div>
  
</body>
</html>

