<?php 
  include ('includes/conexion.php'); 
  include ('bar/navbar_espirometria.php');
  include ('timedata.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Laboratorio Salud Ocupacional</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<form method="POST" action="espirometria_registrarexamen.php"> 
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading text-center text-info">Validar Paciente</div>
        <div class="panel-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6"> 
                <label>Fecha Apertura De Registro:</label>
                <input class="form-control" type="date" name="fecha_registro" value="<?php echo $fecha; ?>"><br>
              </div>
              <div class="col-sm-6"> 
                <label>Numero Documento De Identidad:</label>
                <input class="form-control" type="int" name="cedula" onkeypress="return esInteger(event)">
                <br><br>
              </div>
            </div>
            <div class="text-center">  
              <input type="submit" class="btn btn-info" name="consulta_U" value="Aceptar">
            </div> 
          </div>
        </div>
      </div>
    </div>               
  </form>
</body>
<script type="text/javascript">

  var duracion = setTimeout(function(){
    $('#alerta').modal();
  }, 500);

  $('.carousel').carousel({
    interval: 3000 //changes the speed
  })
</script>
</html>