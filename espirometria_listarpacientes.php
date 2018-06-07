<?php 
  include ('includes/conexion.php');
  include ('bar/navbar_espirometria.php');
  include('timedata.php');
?>
<!DOCTYPE html>
<html>
  <head>
  	<title>Laboratorio Salud Ocupacional</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <form method="POST" target="_blank" action="espirometria_listarexamen.php"> 
      <div class="container">  
        <div class="panel panel-default">
          <div class="panel-body">
            <p class="text-center">
              <a class="text-info fontlistar" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              Consultar <i class="fas fa-caret-down"></i>
              </a>
            </p>
            <div class="collapse" id="collapseExample">
              <div class="card-body">
                <div class="container-fluid">      
                  <div class="row">                          
                    <div class="col-sm-4">
                    <label class="">Tipo de Consulta:</label>   
                      <div class="form-group">        
                        <select name="tipoconsulta" class="form-control" >
                          <option value="1">Historia</option>
                        </select>
                      </div>
                    </div> 
                             
                    <div class="col-sm-4">
                      <label>Fecha de Apertura:</label>
                      <input class="form-control" type="text" name="fecha_registro" value="<?php echo $fecha; ?>" required><br><br>
                    </div>

                    <div class="col-sm-4">  
                      <label>Numero Documento:</label>
                      <input class="form-control" type="int" name="documento" required>
                    </div>

                    <div class="col-sm-12 text-center">
                      <input type="submit" class="btn btn-info" name="Consultar" value="Consultar">
                    </div>                       
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form><br>  
    <!---->
    <div class="container">
      <div class="col-sm-12">
        <label>Busqueda Avanzada:</label>
        <input  class="form-control" type="text" name="busqueda" id="busqueda" placeholder="" maxlength="30" autocomplete="off" onKeyUp="buscar();"/>   
        <div id="resultadoBusqueda"></div>
      </div>
    </div>
  </body>
  <script type="text/javascript">
    $(document).ready(function() { 
      $("#resultadoBusqueda").html('<p>NO HA REALIZADO NINGUNA BUSQUEDA.</p>');
    });
    function buscar(){
        var textoBusqueda = $("input#busqueda").val();      
      if (textoBusqueda != " ") {
        $.post("espirometria_datosexamen.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
          $("#resultadoBusqueda").html(mensaje);
        }); 
      }else{ 
        $("#resultadoBusqueda").html('');
      };
    };
  </script> 
</html>