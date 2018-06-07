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
  <form method="POST" target="_blank" action="recepcion_resultadospaciente.php"> 
    <div class="container"><br>
      <div class="panel panel-default">
        <div class="panel-body">
          <p class="text-center">
            <a class="text-info fontlistar" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Consultar <i class="fas fa-caret-down"></i>
            </a>
          </p>
          <div class="collapse" id="collapseExample">
            <div class="card-body">
              <div class="row container-fluid">
                <div class="col-sm-4"><br>
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
                           
                <div class="col-sm-4"><br>
                  <label>Fecha:</label>
                  <input class="form-control" type="date" name="fecha_registro" required><br><br>
                </div>
              
              
                <div class="col-sm-4"><br> 
                  <label>Numero de Documento:</label>
                  <input class="form-control col-sm-12" type="int" name="documento" onkeypress="return esInteger(event)" required>
                </div>
              </div>

              <div class="col-sm-12 text-center">
                <input type="submit" class="btn btn-info" name="Consultar" value="Consultar">
              </div><br>
            </div>
          </div>   
        </div>                     
      </div>
    </div> 
  </form>  

  <div class="container">
    <div class="row">
      <label><span class="glyphicon glyphicon-search"></span><span class="fa fa-search"></span> Busqueda Avanzada:</label>
      <input class="form-control" type="text" name="busqueda" id="busqueda" value="" placeholder="" maxlength="30" autocomplete="off" onKeyUp="buscar();">
      <div id="resultadoBusqueda"></div>
    </div>
  </div>

</body>

  <script type="text/javascript">
    $(document).ready(function(){ 
      $("#resultadoBusqueda").html('<p class="size_font">NO HA REALIZADO NINGUNA BUSQUEDA.</p>');
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
