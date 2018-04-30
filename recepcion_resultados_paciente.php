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
  
<body>
  <form method="POST" target="_blank" action="recepcion_resultados.php"> 
    <div class="container">
      <div class="panel panel-default">
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
        <input class="form-control" type="text" name="busqueda" id="busqueda" value="" placeholder="" maxlength="30" autocomplete="off" onKeyUp="buscar();">

        <div id="resultadoBusqueda"></div>

      </div>
    </div>
  </form>
</body>

  <script type="text/javascript">
    $(document).ready(function(){ 
      $("#resultadoBusqueda").html('<p>NO HA REALIZADO NINGUNA BUSQUEDA.</p>');
    });
    function buscar() {
      var textoBusqueda = $("input#busqueda").val();
      
      if (textoBusqueda != " "){
        $.post("recepcion_resultados_datos.php", {valorBusqueda: textoBusqueda}, function(mensaje){
          $("#resultadoBusqueda").html(mensaje);
        }); 
      }else{ 
        $("#resultadoBusqueda").html('');
      };
    };
  </script> 
</html>
