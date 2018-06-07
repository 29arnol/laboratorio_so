<?php 
  include('includes/conexion.php');
  include('bar/navbar_enfermeria.php'); 
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
  <!---->
  <form method="POST" target="_blank" action="enfermeria_result.php"> 
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
              <div class="row">                          
                <div class="col-sm-4"><br>
                  <label class="">Tipo Consulta:</label>   
                  <div class="form-group">        
                    <select name="tipoconsulta" class="form-control">
                      <option value="1">Historia</option>
                    </select>
                  </div>
                </div> 
                         
                <div class="col-sm-4"><br>
                  <label>Fecha Apertura:</label>
                  <input class="form-control" type="text" name="fecha_registro" value="<?php echo $fecha; ?>" required><br><br>
                </div>
                
                <div class="col-sm-4"><br>  
                  <label>N° Documento:</label>
                  <input class="form-control" type="int" name="documento" onkeypress="return esInteger(event)" required>
                </div>

                <div class="col-sm-12 text-center">
                  <input type="submit" class="btn btn-info" name="Consultar" value="Consultar">
                  <br><br>
                </div>                   
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form> 

  <div class="container">
    <div class="col-sm-12">
      <label>Busqueda Avanzada:</label>
      <input  class="form-control" type="text" name="busqueda" id="busqueda" maxlength="30" autocomplete="off" onKeyUp="buscar();"/>
      <div  id="resultadoBusqueda"></div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function() { 
      $("#resultadoBusqueda").html('<p>NO HA REALIZADO NINGUNA BUSQUEDA.</p>');
    });

    function buscar() {
      var textoBusqueda = $("input#busqueda").val(); 
      if (textoBusqueda != " ") {
        $.post("enfermeria_datosexamen.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
          $("#resultadoBusqueda").html(mensaje);
      }); 
      }else{ 
        $("#resultadoBusqueda").html('');
      };
    };
  </script>
</html>