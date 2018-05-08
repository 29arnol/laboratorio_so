<?php 
  include ('includes/conexion.php'); 
  include ('bar/navbar_recepcion.php');

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
<?php
  
  $id = $_GET['id'];
  $consult="SELECT * FROM equipos_prestados WHERE id = ".$id."";
  $quer = mysqli_query($conexion,$consult);

  while ($datos=mysqli_fetch_array($quer)){
    $observaciones= $datos['observaciones'];
    $ficha = $datos['ficha_formativa'];
    $equipo = $datos['equipo'];
    $id_equipo = $datos['id_equipo'];  
  }

  $estado_dis = "SELECT * FROM equipos_laboratorio WHERE id = ".$id_equipo."";
  $query_est = mysqli_query($conexion, $estado_dis);

  while ($dat =mysqli_fetch_array($query_est)){
      $est= $dat['estado_disp'];   
  }  
 
  if (isset($_POST['Registrar'])){
  	
    $devuelto = $_POST['devuelto'];
    $hora_entrada = $_POST['hora_entrada'];
    $nombres_persona_entrega = $_POST['nombres_persona_entrega'];
    $observacion = $_POST['observaciones'];

    $datos = "UPDATE `equipos_prestados` SET `devuelto`='$devuelto',`hora_entrada`='$hora_entrada',`nombres_persona_entrega`='$nombres_persona_entrega',`observaciones`='$observacion' WHERE id='$id'"; 
    $query = mysqli_query($conexion,$datos);

    $estad_disp = $_POST['est'];

    $estadodisp = "UPDATE `equipos_laboratorio` SET `estado_disp`='$estad_disp'";
    $query_disp = mysqli_query($conexion, $estadodisp);

    if ($query){
      echo "<script>alert('Datos Registrados Exitosamente')</script>";
      echo "<script>window.location = 'recepcion_pacientes.php'</script>";
    }else{
      echo "<script>alert('Error, Intente Nuevamente')</script>";
      echo "<script>window.location = 'recepcion_pacientes.php'</script>";
    }
  }   
?> 

<body><br><br>
	<div class="container">
  	<div class="text-center">
	    <label for="" class="text-primary">Registrar retorno de Equipo: 
        <strong style="color: red;"><?php echo $equipo; ?></strong> Prestado por la 
        Ficha Numero: <strong style="color: red;">(<?php echo $ficha; ?>)</strong>:
      </label>
  	</div>

  	<form name="formulario" method="POST" action="">

      <div class="row">
    		<div class="col-sm-6"> 
  		    <label>Hora de Entrada:</label>
  		    <input class="form-control" type="text" name="hora_entrada" value="<?php echo $hora; ?>" required>
    		</div>
  	      
        <div class="col-sm-6">
          <label>Nombre Persona Entrega:</label>
          <input class="form-control" type="text" name="nombres_persona_entrega" required><br>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-6">
          <label class="">Selecciona un estado de devolucion:</label>    
          <select name="est" class="form-control">
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
          
        <div class="col-sm-6">
          <label>Retorno:</label>
          <fieldset>
            <label>
              <input type="radio" name="devuelto" value="Si"> Si  /
              <input type="radio" name="devuelto" value="No" checked> No 
            </label>
          </fieldset><br>
        </div>
      </div>
      
      <div class="row">
    	  <div class="col-sm-12">
    			<label>Observacion:</label>
          <textarea  class="form-control" type="text" name="observaciones" rows="4"><?php echo $observaciones; ?></textarea>
    		</div> 
      </div>
     
      <div class="col-sm-12">
        <div class="text-center"><br>
          <input type="submit" name="Registrar" value="Registrar" class="btn btn-success">
        </div>
      </div>
    </form> 
  </div>
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
      document.formulario.hora_entrada.value=hours+":"+minutes+":"
      +seconds+" "+dn
      setTimeout("show()",1000)
    }
    show()

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
