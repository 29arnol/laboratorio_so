<?php include ('includes/conexion.php'); ?>

<?php 
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
  </head>
  <?php
//>>>>>>>>>>>>>>>>>>
      
  $id = $_GET['id'];

  $consult="SELECT * FROM equipos_laboratorio WHERE id = ".$id."";
  $query = mysqli_query($conexion,$consult);

  while ($datos=mysqli_fetch_array($query)) {
    $nombre= $datos['nombre_equipo'];
    $est= $datos['estado_disp'];

  }

//<<<<<<<<<<<<<<<<<<

  if (isset($_POST['Registrar'])) {

  	$equipo = $_POST['nombre_equipo'];
    $fecha = $_POST['fecha'];
    $estado_equipo = $_POST['estado_equipo'];
    $descripcion = $_POST['descripcion_equipo'];
    $ficha = $_POST['ficha'];
    $hora_salida = $_POST['hora_salida'];
    $nombres_estudiante = $_POST['nombres_estudiante'];
    $nombres_Instructor = $_POST['nombres_Instructor'];
    $descripcion_equipo = $_POST['descripcion_equipo'];
    $devuelto = $_POST['devuelto']; 
    

    $datos = "INSERT INTO `equipos_prestados`(`id`, `equipo`, `fecha`, `estado`, `devuelto`, `ficha_formativa`,`hora_salida`,`nombres_estudiante`,`nombres_instructor`,`observaciones`,`id_equipo`) 
    VALUES (NULL, '$equipo','$fecha','$estado_equipo','$devuelto','$ficha','$hora_salida','$nombres_estudiante','$nombres_Instructor','$descripcion_equipo','$id' )"; 
    $query = mysqli_query($conexion,$datos);

    $est_disp = $_POST['est']; 
    $estado_equipo = " UPDATE `equipos_laboratorio` SET `estado_disp`='$est_disp'";
    $query_est = mysqli_query($conexion, $estado_equipo);

    if ($query) {
      echo '<script>
      $(document).ready(function(){
        $("#datossucces").modal("show");
      });</script>';
      //echo "<script>alert('Datos Registrados Exitosamente')</script>";
    } else {
      //echo "<script>alert('Error, Intente Nuevamente')</script>";
      echo '<script>
       $(document).ready(function(){
        $("#datoserror").modal("show");
      });</script>'; 
    }
  }   
  ?> 

<body>
  <?php include ('bar/navbar_recepcion.php'); ?>
  <br>
  <div class="container">
      <div style="margin-top:-1%; padding-bottom: 2%;" class="row">
          <div class="col-sm-12">
            <div class="centrar" style="width: 100%; ">
              <ol class="breadcrumb">
                  <li style="font-family: verdana; font-size: 15px;"><a href="recepcion_consulta_equipos.php">Consultar Equipos</a>
                  </li>
                  <li style="font-family: verdana; font-size: 15px;" class="active">Prestar Equipos</li>
              </ol>
            </div>  
          </div>
      </div>          
  </div>

	<div class="container">
	<div class="text-center">
	    <label for="" class="text-primary">Prestar Equipos:</label>
	</div>
	</div>
	<br><br>
	<form class="" method="POST" action="">
		<div class="container">    
	      
    <div class="col-sm-6">   
      <label>Nombre del Equipo:</label>
      <input class="form-control" type="text" name="nombre_equipo" value="<?php echo $nombre ?>" required>
    </div>

    <div class="col-sm-6"> 
      <label>Fecha:</label>
      <input class="form-control" type="text" name="fecha" value="<?php echo $fecha ?>" required>
    </div>
<!---->
    <div class="col-sm-6">
    <br> 
      <label class="">Selecciona un estado:</label>
      <div class="">
        <div class=" ">        
          <select name="est" class="form-control ">
          <?php $disponible = "SELECT * FROM equipo_disponible Where id_estado = $est"; 
              $quer = mysqli_query($conexion,$disponible);
              while ($dat = mysqli_fetch_array($quer)) {
                echo '<option value="'.$dat['id_estado'].'">'.$dat['estado_eq'].'</option>';
              }
              $disp = "SELECT * FROM equipo_disponible Where id_estado != $est"; 
              $qry = mysqli_query($conexion,$disp);
              while ($data = mysqli_fetch_array($qry)) {
                echo '<option value="'.$data['id_estado'].'">'.$data['estado_eq'].'</option>';
              }
            ?>
            <!--<option value="">Prestado</option>
            <option value="">No Disponible</option>-->
          </select>
        </div>
      </div>
    </div>

<!---->
    <div class="col-sm-6"> 
    <br>  
      <label>Hora Salida:</label>
      <input class="form-control" type="text" name="hora_salida" value="<?php echo $hora ?>" required>
    </div>

    <div class="col-sm-6">
    <br>   
      <label>Ficha Formativa:</label>
      <input class="form-control" type="text" name="ficha" required>
    </div>

    <div class="row">
    <div class="col-sm-6">
    <div class="form-inline">
    <br><br>
      <fieldset>
        <label>Estado del Equipo: </label>
        <input type="radio" name="estado_equipo" value="Bueno" checked> Bueno
        <input type="radio" name="estado_equipo" value="Malo" disabled> Malo
      |

      | <label>Retorno:</label>
        <input type="radio" name="devuelto" value="Si" disabled> Si 
        <input type="radio" name="devuelto" value="No" checked> No 
      </fieldset>
      </div>
      </div>
    </div>

    <!--<div class="col-sm-3"> 
    <br>  
      <label>Hora Entrada:</label>
      <input class="form-control" type="text" name="hora_entrada">
    </div>-->

    <div class="col-sm-6">
    <br>   
      <label>Nombres y Apellidos Estudiante:</label>
      <input class="form-control" type="text" name="nombres_estudiante" required>
    </div>

    <div class="col-sm-6">
    <br>   
      <label>Nombres y Apellidos Instructor:</label>
      <input class="form-control" type="text" name="nombres_Instructor" required>
    </div>

    <!--<div class="col-sm-6"> 
    <br>  
      <label>Nombres Persona Que Entrega:</label>
      <input class="form-control" type="text" name="nombres_persona_entrega">
    </div>-->

    <div class="" >
      <div class="col-sm-6">
      <br>
        <label>Observaciones:</label>
        <td><textarea  class="form-control col-sm-12" type="text" name="descripcion_equipo" rows="2"></textarea></td>
      </div> 
    </div> 

	    </div>
	    </div>
	    </div><!--fin container-->

    <div class="container">
      <div class="text-center">
        <div class="col-sm-12">
          <br><br>
          <input type="submit" name="Registrar" value="Registrar" class="btn btn-success">
        </div>
      </div>
    </div>
    <br><br>

	    </div><!--fin centro-->
  	</form>

  <!--datos guardados-->
  <div class="modal fade" id="datossucces" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='recepcion_consulta_equipos.php';">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button onClick="window.location.href='recepcion_consulta_equipos.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3>Alerta</h3>
        </div>
        <div class="modal-body">
          <h4>Informe De Prestamo Registrado Exitosamente.</h4>       
        </div>
        <div class="modal-footer">
          <a onClick="window.location.href='recepcion_consulta_equipos.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
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
