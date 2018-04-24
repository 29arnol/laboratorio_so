<?php include ('includes/conexion.php'); ?>

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
    <style type="text/css">
      .esp{
        width: 120%;
      }

      .centrar {
        display:block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
      } 
    </style> 
    <script type="text/javascript">

      <!---->
        $(document).ready(function() {
          $("#resultadoBusqueda").html('<p>NO HA REALIZADO NINGUNA BUSQUEDA.</p>');
        });
      <!---->

      function buscar() {
          var textoBusqueda = $("input#busqueda").val();
        
          if (textoBusqueda != "") {
              $.post("admin_consultar_equipos.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
                  $("#resultadoBusqueda").html(mensaje);
              }); 
          } else { 
              ("#resultadoBusqueda").html('');
        };
      };
    </script> 
  </head>

<body>
  <?php include ('bar/navbar_administracion.php'); ?>
  <h1>Consulta de equipos registrados</h1>

	<br><br>
<form accept-charset="utf-8" method="POST">
  <div class="container">
    <div class="col-sm-12">
      <label>buscar:</label>
      <input class="form-control" type="text" name="busqueda" id="busqueda" value="" placeholder="" maxlength="30" autocomplete="off" onKeyUp="buscar();" />
    
    <!--<div class="container">-->
      <!--<h2>Equipos Registrados</h2>
      <p>The .table-bordered class adds borders to a table:</p>--> 
      <div style="width: 1160px;" id="resultadoBusqueda"></div>
    <!--</div>-->
    </div>
  </div>
  <?php //include 'bar/footer.php'; ?>
</body>

</html>
