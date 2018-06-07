<?php 
include ('includes/conexion.php'); 
include ('bar/navbar_medico.php');

date_default_timezone_set('America/Bogota');
$hora = date('h:i:s A');
$fecha = date('Y-m-d');
?>
<!DOCTYPE html>
<html>
  <head>
  	<title>Laboratorio Salud Ocupacional</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

<body>
  <!---->
  <form method="POST" target="_blank" action="medico_listarexamen.php"> 
    <div class="container">  
      <div class="panel panel-default col-sm-12">
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
                      <label class="">Tipo Consulta:</label>   
                      <div class="form-group">        
                        <select name="tipoconsulta" class="form-control" >
                          <option value="2">Resultado</option>
                          <option value="1">Historia</option>
                        </select>
                      </div>
                    </div> 
                             
                    <div class="col-sm-4">
                      <label>Fecha Apertura:</label>
                      <input class="form-control" type="text" name="fecha_registro" value="<?php echo $fecha; ?>" required>
                    </div>

                    <div class="col-sm-4">  
                      <label>N° Documento:</label>
                      <input class="form-control" type="int" name="documento" onkeypress="return esInteger(event)" required>
                    </div>

                    <div class="col-sm-12 text-center">
                      <br>
                      <input type="submit" class="btn btn-info" name="Consultar" value="Consultar">
                    </div>
                  </div>
                </div>
              </div>             
            </div>        
          </div>
        </div>
      </div>
    </div>
  </form><br>

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


  <br><br><br>
 

    <?php //include 'bar/footer.php'; ?>
  </body>

  <script type="text/javascript">
    <!---->
      $(document).ready(function() { 
        $("#resultadoBusqueda").html('<p>NO HA REALIZADO NINGUNA BUSQUEDA.</p>');
      });
    <!---->
    function buscar() {
        var textoBusqueda = $("input#busqueda").val();
      
        if (textoBusqueda != " ") {
            $.post("medico_datosexamen.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
                $("#resultadoBusqueda").html(mensaje);
            }); 
        }else{ 
            $("#resultadoBusqueda").html('');
      };
    };
  </script>
</html>
