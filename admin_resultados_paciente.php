<?php 
  include('includes/conexion.php');
  include('bar/navbar_administracion.php'); 
  include('timedata.php');
?>

<!DOCTYPE html>
<html>
  <head>
  	<title>Laboratorio Salud Ocupacional</title>S
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript">
      <!---->
        $(document).ready(function() { 
          $("#resultadoBusqueda").html('<p>NO HA REALIZADO NINGUNA BUSQUEDA.</p>');
        });
      <!---->
      function buscar() {
          var textoBusqueda = $("input#busqueda").val();
        
          if (textoBusqueda != " ") {
              $.post("admin_resultados_datos.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
                  $("#resultadoBusqueda").html(mensaje);
              }); 
          }else{ 
              $("#resultadoBusqueda").html('');
        };
      };
    </script> 
  </head> 
<body>
  <br>
    <form method="POST" target="_blank" action="admin_resultado_enrutador.php"> 
      <div class="container">  
        <div class="panel panel-default col-sm-12">
          <div class="panel-body">          
                       
            <div class="col-sm-6">
              <label>Fecha:</label>
              <input class="form-control" type="date" name="fecha_registro" value="<?php echo $fecha ?>" required><br><br>
            </div>
            
            <div class="col-sm-6">  
              <label>N° Documento:</label>
              <input class="form-control col-sm-12" type="int" name="documento" onkeypress="return esInteger(event)" required>
            </div>

            <div class="col-sm-12 text-center">
              <br>
              <input type="submit" class="btn btn-info" name="Consultar" value="Consultar">
            </div>             
                      
          </div>
        </div>
      </div>
    </form>  

    <form accept-charset="utf-8" method="POST">
      <div class="container">
        <div class="col-sm-12">
          <label><span class="glyphicon glyphicon-search"></span> Busqueda Avanzada:</label>
          <input class="form-control" type="text" name="busqueda" id="busqueda" value="" placeholder="" maxlength="30" autocomplete="off" onKeyUp="buscar();"/>
            <div id="resultadoBusqueda"></div>
        </div>
      </div>
    </form>
      <?php //include 'bar/footer.php'; ?>
  </body>
</html>
