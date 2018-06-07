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
    <form accept-charset="utf-8" method="POST">
      <div class="container">
        <div class="col-sm-12">
          <label><span class="fa fa-search"></span> Buscar equipos prestados:</label>
          <input class="form-control" type="text" name="busqueda" id="busqueda" maxlength="30" autocomplete="off" onKeyUp="buscar();">
          <div id="resultadoBusqueda"></div>    
        </div>
      </div>  
    </form>
  </body>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#resultadoBusqueda").html('<p>NO HA REALIZADO NINGUNA BUSQUEDA.</p>');
    });

    function buscar() {
      var textoBusqueda = $("input#busqueda").val();
      
      if (textoBusqueda != " "){
        $.post("recepcion_resultadoequiposprestados.php", {valorBusqueda: textoBusqueda}, function(mensaje){
            $("#resultadoBusqueda").html(mensaje);
        }); 
      }else{ 
        ("#resultadoBusqueda").html('');
      };
    };
  </script> 
</html>
