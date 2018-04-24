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
              $.post("buscar_prestados.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
                  $("#resultadoBusqueda").html(mensaje);
              }); 
          } else { 
              ("#resultadoBusqueda").html('');
        };
      };


    </script> 
  </head>

<body>
  <?php include ('bar/navbar_recepcion.php'); ?>
  <h1>welcome user recepcion</h1>

	<br><br>
<form accept-charset="utf-8" method="POST">
  <div class="col-sm-6">
    <label>buscar:</label>
    <input type="text" name="busqueda" id="busqueda" value="" placeholder="" maxlength="30" autocomplete="off" onKeyUp="buscar();" />
  </div>
  <div class="container">
    <!--<h2>Equipos Registrados</h2>
    <p>The .table-bordered class adds borders to a table:</p>--> 
  </div>
  <div id="resultadoBusqueda"></div>
</form>  

<!--<div class="container col-sm-8">
  <h2>Bordered Table</h2>
  <p>The .table-bordered class adds borders to a table:</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Referencia</th>
        <th>Nombre del Equipo</th>
        <th>Estado</th>
        <th>Descripcion</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
</div>-->
  	</form>

  <!--datos guardados-->
  <div class="modal fade" id="datossucces" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='recepcion_registro_equipos.php';">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button onClick="window.location.href='recepcion_registro_equipos.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3>Alerta</h3>
        </div>
        <div class="modal-body">
          <h4>Equipo Registrado Exitosamente.</h4>       
        </div>
        <div class="modal-footer">
          <a onClick="window.location.href='recepcion_registro_equipos.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
        </div>
      </div>
    </div>
  </div>

  <!--datos Error-->
  <div class="modal fade" id="datoserror" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='recepcion_registro_equipos.php';">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button onClick="window.location.href='recepcion_registro_equipos.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3>Alerta</h3>
        </div>
        <div class="modal-body">
          <h4>Error, Intente Nuevamente.</h4>       
        </div>
        <div class="modal-footer">
          <a onClick="window.location.href='recepcion_registro_equipos.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
        </div>
      </div>
    </div>
  </div>

  <!--identificacion ya registrada-->
  <div class="modal fade" id="idexiste" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='recepcion.php';">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button onClick="window.location.href='recepcion.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3>Alerta</h3>
        </div>
        <div class="modal-body">
          <h4>Error, El numero de identificacion ya esta registrado en el sistema.</h4>       
        </div>
        <div class="modal-footer">
          <a onClick="window.location.href='recepcion.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
        </div>
      </div>
    </div>
  </div>
  <?php //include 'bar/footer.php'; ?>
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
