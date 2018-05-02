<?php 
  include ('includes/conexion.php'); 
  include ('bar/navbar_recepcion.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Laboratorio Salud Ocupacional</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

<body><br>
  <div class="container">
    <div class="col-sm-12">
      <label>Buscar equipos registrados:</label>
      <input class="form-control" type="text" name="busqueda" id="busqueda" maxlength="30" autocomplete="on" onKeyUp="buscar();">
      <div style="width: 1160px;" id="resultadoBusqueda"></div>
    </div>
  </div>
</body>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#resultadoBusqueda").html('<p>NO HA REALIZADO NINGUNA BUSQUEDA.</p>');
    });

    function buscar() {
      var textoBusqueda = $("input#busqueda").val();
      
      if (textoBusqueda != "") {
        $.post("buscar.php", {valorBusqueda: textoBusqueda}, function(mensaje){
          $("#resultadoBusqueda").html(mensaje);
        }); 
      }else{ 
        ("#resultadoBusqueda").html('');
      };
    };
  </script> 
</html>
