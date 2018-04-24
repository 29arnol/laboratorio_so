<?php include ('includes/conexion.php'); ?>

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
      .font{
        font-size: 18px;
      }
    </style>
    <?php include ('bar/navbar_higiene.php'); ?>
  </head>

  <?php

  $id = $_GET['id'];
  if (isset($_POST['registrar'])) {
  
  $idd=$_POST['idd'];
  $fecha_medicion = $_POST['fecha_medicion'];
  $area_medicion = $_POST['area_medicion'];
  $ubicacion = $_POST['ubicacion'];
  $trabajadores_directos = $_POST['trabajadores_directos'];
  $trabajadores_indirectos = $_POST['trabajadores_indirectos'];
  $total_trabajadores = $_POST['total_trabajadores'];
  $dias_laborales = $_POST['dias_laborales'];
  $horas_laborales = $_POST['horas_laborales'];
  $horas_exposicion = $_POST['horas_exposicion'];
  $fuente_principal = $_POST['fuente_principal'];
  $fuente_secundaria = $_POST['fuente_secundaria'];
  $controles_fuente_area = $_POST['controles_fuente_area'];
  $controles_descripcion = $_POST['controles_descripcion'];
  $tipo_ruido = $_POST['tipo_ruido'];
  $tipo_proteccion_personal = $_POST['tipo_proteccion_personal'];
  $marca_proteccion_personal = $_POST['marca_proteccion_personal'];
  $referencia_proteccion_personal = $_POST['referencia_proteccion_personal'];
  $nivel_reduccion_ruido = $_POST['nivel_reduccion_ruido'];
  $uso_epp = $_POST['uso_epp'];
  $descripcion_tarea = $_POST['descripcion_tarea'];
  $medicion_maximo_fast = $_POST['medicion_maximo_fast'];
  $medicion_minimo_fast = $_POST['medicion_minimo_fast'];
  $medicion_promedio_fast = $_POST['medicion_promedio_fast'];
  $medicion_maximo_slow = $_POST['medicion_maximo_slow'];
  $medicion_minimo_slow = $_POST['medicion_minimo_slow'];
  $medicion_promedio_slow = $_POST['medicion_promedio_slow'];
  $medicion_nota = $_POST['medicion_nota'];

  $insert = "INSERT INTO `higiene_medicion_ruido` (`id_ruido`,`fecha_medicion`,`area_medicion`,`ubicacion`,`trabajadores_directos`,`trabajadores_indirectos`,`trabajadores_total`,`dias_laborales`,`horas_laborales`,`horas_exposicion`,`ruido_principal`,`ruido_secundario`,`ruido_fuente_o_area`,`ruido_descripcion`,`tipo_ruido`,`proteccion_personal_tipo`,`proteccion_personal_marca`,`proteccion_personal_referencia`,`proteccion_personal_nivel_reduccion_ruido`,`proteccion_personal_uso`,`proteccion_personal_descripcion_tarea`,`fast_db_maximo`,`fast_db_minimo`,`fast_db_promedio`,`slow_db_maximo`,`slow_db_minimo`,`slow_db_promedio`,`nota`,`id_empresa`)
  VALUES ('null','$fecha_medicion','$area_medicion','$ubicacion','$trabajadores_directos','$trabajadores_indirectos','$total_trabajadores','$dias_laborales','$horas_laborales','$horas_exposicion','$fuente_principal','$fuente_secundaria','$controles_fuente_area','$controles_descripcion','$tipo_ruido','$tipo_proteccion_personal','$marca_proteccion_personal','$referencia_proteccion_personal','$nivel_reduccion_ruido','$uso_epp','$descripcion_tarea','$medicion_maximo_fast','$medicion_minimo_fast','$medicion_promedio_fast','$medicion_maximo_slow','$medicion_minimo_slow','$medicion_promedio_slow','medicion_nota','$idd')";
  $query_insert = mysqli_query($conexion,$insert);

  if ($query_insert) {
    echo "<script>alert('Datos Registrados Exitosamente')</script>";
    echo "<script>window.location = 'higiene_empresa_consultar.php'</script>";
  }else{
    echo "<script>alert('Error Insert, Intente Nuevamente')</script>";
    echo "<script>window.location = 'higiene_empresa_consultar.php'</script>"; 
  }


  }

  $data = "SELECT * FROM higiene_empresa WHERE id = ".$id." ";
  $query = mysqli_query($conexion,$data);

  if (mysqli_num_rows($query) > 0){ 

  while ($datos=mysqli_fetch_array($query)) {
  $empresa = $datos['nombre_empresa'];
  $nit = $datos['numero_nit'];
  $direccion = $datos['direccion'];
  $ciudad = $datos['ciudad'];
  $telefono = $datos['telefono'];
  $actividad_economica = $datos['actividad_economica'];



   ?>

  <body>

    <form class="form" action="" method="POST" role="form" name="calculadora">

<div class="container">

<h2 class="text-center text-success"><u>Registro De Mediciones Ambientales De Ruido:</u></h2>

<div class="container-fluid">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td colspan="4" class="text-center text-info"><label>DATOS DE LA EMPRESA</label></td>
        </tr>
        <tr>
          <td><label>Empresa:</label></td>
          <td><?php echo $empresa ?></td>
          <td><label>Nit:</label></td>
          <td><?php echo $nit ?></td>
        </tr>
        <tr>
          <td><label>Direccion:</label></td>
          <td><?php echo $direccion ?></td>
          <td><label>Ciudad:</label></td>
          <td><?php echo $ciudad ?></td>
        </tr>
        <tr>
          <td><label>Telefono:</label></td>
          <td><?php echo $telefono ?></td>
          <td><label>Actividad Economica</label></td>
          <td><?php echo $actividad_economica ?></td>
        </tr>
      </tbody>
    </table>
</div>

    <input class="form-control" type="text" name="idd" value="<?php echo $id ?>" style="display: none;">

  
      <div class=" col-sm-4">
        <label>Fecha de medicion:</label>
        <input class="form-control" type="date" name="fecha_medicion" >
        <br>
      </div>

      <div class=" col-sm-4">
        <label>Area de medicion:</label>
        <input class="form-control" type="text" name="area_medicion">
        <br>
      </div>

      <div class=" col-sm-4">
        <label>Ubicacion:</label>
        <input class="form-control" type="text" name="ubicacion">
        <br>
      </div>


    <hr><br><br>

    <div class="text-center text-info"><label>Numero de Trabajadores:</label></div>

    
      <div class=" col-sm-4">
        <label>Directos:</label>
        <input class="form-control" type="text" name="trabajadores_directos" id="item1" onKeyUp="Suma()">
        <br>
      </div>

      <div class=" col-sm-4">
        <label>Indirectos:</label>
        <input class="form-control" type="text" name="trabajadores_indirectos" id="item2" onKeyUp="Suma()">
        <br>
      </div>

      <div class=" col-sm-4">
        <label>Total:</label>
        <input class="form-control" type="text" name="total_trabajadores" readonly="readonly">
        <br>
      </div>
    
   
      <div class=" col-sm-4">
        <label>Dias Laborales:</label>
        <input class="form-control" type="text" name="dias_laborales">
        <br>
      </div>

      <div class=" col-sm-4">
        <label>Horas Laborales:</label>
        <input class="form-control" type="text" name="horas_laborales">
        <br>
      </div>

      <div class=" col-sm-4">
        <label>Horas de Exposicion:</label>
        <input class="form-control" type="text" name="horas_exposicion">
        <br>
      </div>

      <div class="text-center text-info"><label>Fuente del ruido:</label></div>

      <div class=" col-sm-6">
        <label>Principal:</label>
        <input class="form-control" type="text" name="fuente_principal">
        <br>
      </div>

      <div class=" col-sm-6">
        <label>Secundaria:</label>
        <input class="form-control" type="text" name="fuente_secundaria">
        <br>
      </div>

      <div class="text-center text-info"><label>Controles:</label></div>

      <div class=" col-sm-6">
        <label>Fuente o area:</label>
        <input class="form-control" type="text" name="controles_fuente_area">
        <br>
      </div>

      <div class=" col-sm-6">
        <label>Descripcion:</label>
        <input class="form-control" type="text" name="controles_descripcion">
        <br>
      </div>

      <div class="text-center text-info"><label>Tipos de ruido:</label></div>

      <div class="text-center col-sm-12">
        <label>Continuo</label> <input type="radio" name="tipo_ruido" value="Continuo"> /
        <label>Intermitente</label> <input type="radio" name="tipo_ruido" value="Intermitente"> /
        <label>Impacto</label> <input type="radio" name="tipo_ruido" value="Impacto">
        <br><br>
      </div>

      <div class="text-center text-info"><label>Caracteristicas de elemento de proteccion personal:</label></div>

        <div class=" col-sm-6">
          <label>Tipo:</label>
          <input class="form-control" type="text" name="tipo_proteccion_personal">
          <br>
        </div>

        <div class=" col-sm-6">
          <label>Marca:</label>
          <input class="form-control" type="text" name="marca_proteccion_personal">
          <br>
        </div>

        <div class=" col-sm-6">
          <label>Referencia:</label>
          <input class="form-control" type="text" name="referencia_proteccion_personal">
          <br>
        </div>

        <div class=" col-sm-6">
          <label>Nivel de Reduccion de Ruido:</label>
          <input class="form-control" type="text" name="nivel_reduccion_ruido">
          <br>
        </div>

        <div class=" col-sm-6">
          <label>Uso del Elemento de Proteccion Personal:</label>
          <textarea class="form-control" type="text" name="uso_epp" rows="3"></textarea>
          <br>
        </div>

        <div class=" col-sm-6">
          <label>Descripcion de la tarea:</label>
          <textarea class="form-control" type="text" name="descripcion_tarea" rows="3"></textarea>
          <br><br>
        </div>
 

    <div class="text-center text-info"><label>Medicion DB:</label></div><br>

    <div class="text-center text-info"><label>Fast:</label></div>

    <div class=" col-sm-4">
      <label>Maximo:</label>
      <input class="form-control" type="text" name="medicion_maximo_fast" id="fast_maximo" onKeyUp="Suma()">
      <br>
    </div>

    <div class=" col-sm-4">
      <label>Minimo:</label>
      <input class="form-control" type="text" name="medicion_minimo_fast" id="fast_minimo" onKeyUp="Suma()">
      <br>
    </div>

    <div class=" col-sm-4">
      <label>Promedio:</label>
      <input class="form-control" type="text" name="medicion_promedio_fast" >
      <br>
    </div>

    <div class="text-center text-info"><label>Slow:</label></div>

    <div class=" col-sm-4">
      <label>Maximo:</label>
      <input class="form-control" type="text" name="medicion_maximo_slow">
      <br>
    </div>

    <div class=" col-sm-4">
      <label>Minimo:</label>
      <input class="form-control" type="text" name="medicion_minimo_slow">
      <br>
    </div>

    <div class=" col-sm-4">
      <label>Promedio:</label>
      <input class="form-control" type="text" name="medicion_promedio_slow">
      <br>
    </div>

    <div class=" col-sm-12">
      <label>Nota:</label>
      <textarea class="form-control" type="text" name="medicion_nota" rows="3"></textarea>
      <br>
    </div>


    <div class="row">
      <div class="text-center">
        <div class="col-sm-12">
          <br> 
          <!--<input type="submit" name="Registrar" value="Registrar" class="btn btn-success">-->
        </div>
      </div>
    </div>
    <br><br>

    <div class=" col-sm-12 text-center">
      <input class="btn btn-success" type="submit" name="registrar" value="Registrar"><br><br>
    </div>

    </form>

<?php 
  }//rows
  }//while
?>
</div><!--Container-->
    <?php //include 'bar/footer.php'; ?>
  </body>
  <!---->
  <script>
  //Función que realiza la suma
  function Suma() {
    var item1 = document.calculadora.item1.value;
    var item2 = document.calculadora.item2.value;

    //var fast_maximo = document.calculadora.fast_maximo.value;
    //var fast_minimo = document.calculadora.fast_minimo.value;     
    try{
      //Calculamos el número escrito:
     item1 = (isNaN(parseInt(item1)))? 0 : parseInt(item1);
     item2 = (isNaN(parseInt(item2)))? 0 : parseInt(item2);

      document.calculadora.total_trabajadores.value = (item1+item2);

      /*fast_maximo = (isNaN(parseInt(fast_maximo)))? 0 : parseInt(fast_maximo);
      fast_minimo = (isNaN(parseInt(fast_minimo)))? 0 : parseInt(fast_minimo);

      document.calculadora.medicion_promedio_fast.value = (fast_maximo+fast_minimo);*/   
    }
    //Si se produce un error no hacemos nada
    catch(e) {}
  }
  </script>

</html>
