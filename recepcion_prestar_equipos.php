<?php 
  include ('includes/conexion.php'); 
  include ('bar/navbar_recepcion.php');

  date_default_timezone_set('America/Bogota');
  //$hora = date('h:i:s A');
  $fecha = date('Y-m-d');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Laboratorio Salud Ocupacional</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
  </head>
<?php   
  if (isset($_POST['Registrar'])){

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

    if ($query){
      echo "<script>alert('Datos Registrados Exitosamente')</script>";
      echo "<script>window.location = 'recepcion_pacientes.php'</script>";
    }else{
      echo "<script>alert('Error, Intente Nuevamente')</script>";
      echo "<script>window.location = 'recepcion_pacientes.php'</script>";
    }
  }   

  $id = $_GET['id'];

  $consult="SELECT * FROM equipos_laboratorio WHERE id = ".$id."";
  $query = mysqli_query($conexion,$consult);

  while ($datos=mysqli_fetch_array($query)){
    $est= $datos['estado_disp'];

?> 

<body><br>
	<div class="container">
  	<div class="text-center">
  	    <label for="" class="text-primary">Prestar Equipos:</label>
  	</div><br>

  	<form method="POST" name="formulario" action=""> 
  	      
      <div class="col-sm-6">   
        <label>Nombre del Equipo:</label>
        <input class="form-control" type="text" name="nombre_equipo" value="<?php echo $datos['nombre_equipo'];?>" required>
      </div>

      <div class="col-sm-6"> 
        <label>Fecha:</label>
        <input class="form-control" type="text" name="fecha" value="<?php echo $fecha ?>" required>
      </div>

      <div class="col-sm-6"><br> 
        <label class="">Selecciona un estado:</label>        
        <select name="est" class="form-control ">
          <?php 
            $disponible = "SELECT * FROM equipo_disponible Where id_estado = $est"; 
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
        </select>
      </div>

      <div class="col-sm-6"><br>  
        <label>Hora Salida:</label>
        <input class="form-control" type="text" name="hora_salida" value="<?php echo $hora ?>" required>
      </div>

      <div class="col-sm-6"><br>   
        <label>Ficha Formativa:</label>
        <input class="form-control" type="text" name="ficha" required>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-inline"><br><br>
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

      <div class="col-sm-6"><br>   
        <label>Nombres y Apellidos Estudiante:</label>
        <input class="form-control" type="text" name="nombres_estudiante" required>
      </div>

      <div class="col-sm-6"><br>   
        <label>Nombres y Apellidos Instructor:</label>
        <input class="form-control" type="text" name="nombres_Instructor" required>
      </div>

      <div class="col-sm-12"><br>
        <label>Observaciones:</label>
        <td>
          <textarea  class="form-control" type="text" name="descripcion_equipo" rows="2"></textarea>
        </td>
      </div> 

      <div class="text-center">
        <div class="col-sm-12">
          <br><br>
          <input type="submit" name="Registrar" value="Registrar" class="btn btn-success">
        </div>
      </div> 
    </div>
  </form>
<?php  
  }//While 
?>
</body>
  <script type="text/javascript">
    function show(){
      var Digital=new Date()
      var hours=Digital.getHours()
      var minutes=Digital.getMinutes()
      var seconds=Digital.getSeconds()
      var dn="AM" 
      if (hours>12){
        dn="PM"
        hours=hours-12
      }
      if (hours==0)
      hours=12
      if (minutes<=9)
      minutes="0"+minutes
      if (seconds<=9)
      seconds="0"+seconds
      document.formulario.hora_salida.value=hours+":"+minutes+":"
      +seconds+" "+dn
      setTimeout("show()",1000)
    }
    show()

    function esInteger(e){
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
