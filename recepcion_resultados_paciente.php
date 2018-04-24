<?php include ('includes/conexion.php'); ?>

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
              $.post("recepcion_resultados_datos.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
                  $("#resultadoBusqueda").html(mensaje);
              }); 
          }else{ 
              $("#resultadoBusqueda").html('');
        };
      };
    </script> 

  </head>
    <?php include ('bar/navbar_recepcion.php'); ?>
  
  <body>
<br>
  <!---->
  <form method="POST" target="_blank" action="recepcion_resultados.php"> 
    <div class="container">  
      <div class="panel panel-default col-sm-12">
        <div class="panel-body">

          <div class="col-sm-4">
            <label for="stylet_type">Tipo de documento:</label>
                <select name="tipodoc" class="form-control " id="tipodoc">
                  <option value="">Seleccionar</option>
                    <?php $documentotipo = "SELECT * FROM datos_basicos_tipo_documento"; 
                      $quer2 = mysqli_query($conexion,$documentotipo);

                      while ($dat = mysqli_fetch_array($quer2)) {
                        echo '<option value="'.$dat['idtd'].'">'.$dat['tipo_documento'].'</option>';
                      }
                    ?>
                </select>
            <br>
          </div>          
                     
            <div class="col-sm-4">
              <label>Fecha:</label>
              <input class="form-control" type="date" name="fecha_registro" required><br><br>
            </div>
            

            <div class="col-sm-4">  
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
    </div>
  </form>  
  <!--</div>-->  
  <!--</div>-->
  <!--</div>-->  
  <!---->
  <form accept-charset="utf-8" method="POST">
  <div class="container">
  <div class="col-sm-12">
    <label><span class="glyphicon glyphicon-search"></span> Busqueda Avanzada:</label>
    <input class="form-control" type="text" name="busqueda" id="busqueda" value="" placeholder="" maxlength="30" autocomplete="off" onKeyUp="buscar();" />
  
  <!--<div class="container">-->
    <!--<h2>Equipos Registrados</h2>
    <p>The .table-bordered class adds borders to a table:</p>--> 
    <div id="resultadoBusqueda"></div>
  <!--</div>-->
</div>
</div>
</form>

    <?php //include 'bar/footer.php'; ?>
  </body>

</html>
