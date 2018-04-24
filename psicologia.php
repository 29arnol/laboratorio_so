<?php include ('includes/conexion.php'); ?>
<?php 
/*date_default_timezone_set('America/Bogota');
$hora = date('h:i:s A');
$fecha = date('Y-m-d');*/
?>
<?php 
    
    if ($_GET){ 
    $numero_doc = $_GET['numero_doc'];
    $fecha_ingreso = $_GET['fecha_ingreso'];
    $estado_atencion = $_GET['estado_atencion'];

    $data = "UPDATE `datos_basicos` SET `audiometria`= '$estado_atencion' WHERE numero_documento = '$numero_doc' AND fecha = '$fecha_ingreso' "; 
    $query2 = mysqli_query($conexion,$data);
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

