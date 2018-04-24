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

      
    </style>

  </head>
  <?php 
    //$tipocon = $_GET['tipoconsulta'];
    $id = $_GET['id_ruido'];
    $id_empresa = $_GET['empresa'];


    $consulta = "SELECT * FROM higiene_empresa 
   JOIN higiene_medicion_ruido ON id_ruido = ".$id." 
   WHERE id = '$id_empresa' ";
    $query = mysqli_query($conexion,$consulta);

    if (mysqli_num_rows($query)) {
      while ($datos=mysqli_fetch_array($query)) {
        $empresa = $datos['nombre_empresa'];
        $nit = $datos['numero_nit'];
        $direccion = $datos['direccion'];
        $ciudad = $datos['ciudad'];
        $telefono = $datos['telefono'];
        $actividad_economica = $datos['actividad_economica'];

        $fecha_medicion= $datos['fecha_medicion'];
        $area_medicion= $datos['area_medicion'];
        $ubicacion= $datos['ubicacion'];
        $trabajadores_directos= $datos['trabajadores_directos'];
        $trabajadores_indirectos= $datos['trabajadores_indirectos'];
        $trabajadores_total= $datos['area_medicion'];
        $dias_laborales= $datos['dias_laborales'];
        $horas_laborales= $datos['horas_laborales'];
        $horas_exposicion= $datos['horas_exposicion'];
        $ruido_principal= $datos['ruido_principal'];
        $ruido_secundario= $datos['ruido_secundario'];
        $ruido_fuente_o_area= $datos['ruido_fuente_o_area'];
        $ruido_descripcion= $datos['ruido_descripcion'];
        $tipo_ruido= $datos['tipo_ruido'];
       
        $proteccion_tipo= $datos['proteccion_personal_tipo'];
        $proteccion_marca= $datos['proteccion_personal_marca'];
        $proteccion_referencia= $datos['proteccion_personal_referencia'];
        $proteccion_reduccion_ruido= $datos['proteccion_personal_nivel_reduccion_ruido'];
        $proteccion_uso= $datos['proteccion_personal_uso'];
        $proteccion_descripcion_tarea= $datos['proteccion_personal_descripcion_tarea'];

        $fast_maximo = $datos['fast_db_maximo'];
        $fast_minimo = $datos['fast_db_minimo'];
        $fast_promedio = $datos['fast_db_promedio'];
        $slow_maximo = $datos['slow_db_maximo'];
        $slow_minimo = $datos['slow_db_minimo'];
        $slow_promedio = $datos['slow_db_promedio'];
        $nota = $datos['nota'];
   ?>

<body>
  <?php include ('bar/navbar_higiene.php'); ?>
  <!-- <div style="width: 1500px; margin: 0 auto;" > -->
  <div class="container">

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

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Fecha de Medicion</th>
          <th>Area de Medicion</th>
          <th>Ubicacion</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $fecha_medicion ?></td>
          <td><?php echo $area_medicion ?></td>
          <td><?php echo $ubicacion ?></td>
        </tr>
      </tbody>
    </table>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th colspan="3" class="text-center">Numero de Trabajadores</th>
        </tr>
        <tr>
          <th class="text-center">Directos</th>
          <th class="text-center">Indirectos</th>
          <th class="text-center">Total</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center">
          <td><?php echo $trabajadores_directos ?></td>
          <td><?php echo $trabajadores_indirectos ?></td>
          <td><?php echo $trabajadores_indirectos ?></td>
        </tr>
        <tr>
          <td colspan="3"></td>
        </tr>
        <tr>
          <th class="text-center">Dias Laborales</th>
          <th class="text-center">Horas Laborales</th>
          <th class="text-center">Horas de Exposicion</th>
        </tr>
        <tr class="text-center">
          <td><?php echo $dias_laborales ?></td>
          <td><?php echo $horas_laborales ?></td>
          <td><?php echo $horas_exposicion ?></td>
        </tr>
      </tbody>
    </table>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="text-info text-center" colspan="2"><label>Fuente del Ruido</label></th>
        </tr>
        <tr>
          <th class="text-center">Principal</th>
          <th class="text-center">Secundaria</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <tr>
          <td><?php echo $ruido_principal ?></td>
          <td><?php echo $ruido_secundario ?></td>
        </tr>
        <tr>
          <th class="text-info text-center" colspan="2"><label>Controles</label></th>
        </tr>
        <tr>
          <th class="text-center">Fuente o Area</th>
          <th class="text-center">Descripcion</th>
        </tr>
        <tr>
          <td><?php echo $ruido_fuente_o_area ?></td>
          <td><?php echo $ruido_descripcion ?></td>
        </tr>
        <tr>
          <td colspan="2" class="text-center"><label>Tipo de Ruido:</label> <?php echo $tipo_ruido ?></td>
        </tr>
      </tbody>
    </table>

    <table class="table table-bordered">
      <thead>
      <tr>
        <th class="text-info text-center" colspan="2"><label>Caracteristicas de Elemento de Proteccion Personal:</label></th>
      </tr>
        <tr>
          <th class="text-center">Tipo</th>
          <th class="text-center">Marca</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <tr>
          <td><?php echo $proteccion_tipo ?></td>
          <td><?php echo $proteccion_marca ?></td>
        </tr>
        <tr>
          <th class="text-center">Referencia</th>
          <th class="text-center">Nivel de Reduccion de Ruido</th>
        </tr>
        <tr>
          <td><?php echo $proteccion_referencia ?></td>
          <td><?php echo $proteccion_reduccion_ruido ?></td>
        </tr>
        <tr>
          <th class="text-center">Uso de Elemento de Poteccion Personal</th>
          <th class="text-center">Descripcion de la Tarea</th>
        </tr>
        <tr>
          <td><?php echo $proteccion_uso ?></td>
          <td><?php echo $proteccion_descripcion_tarea ?></td>
        </tr>
      </tbody>
    </table>

    <table class="table table-bordered">
      <thead>
      <tr>
        <th class="text-info text-center" colspan="3"><label>Medicion DB:</label></th>
      </tr>
      <tr>
        <th class="text-info text-center" colspan="3"><label>Fast:</label></th>
      </tr>
        <tr>
          <th class="text-center">Maximo</th>
          <th class="text-center">Minimo</th>
          <th class="text-center">Promedio</th>
        </tr>
      </thead>
      <tbody>
        <tr class="text-center">
          <td><?php echo $fast_maximo ?></td>
          <td><?php echo $fast_minimo ?></td>
          <td><?php echo $fast_promedio ?></td>
        </tr>
      <tr>
        <th class="text-info text-center" colspan="3"><label>Slow:</label></th>
      </tr>
      <tr>
        <th class="text-center">Maximo</th>
        <th class="text-center">Minimo</th>
        <th class="text-center">Promedio</th>
      </tr>
      <tr class="text-center">
        <td><?php echo $slow_maximo ?></td>
        <td><?php echo $slow_minimo ?></td>
        <td><?php echo $slow_promedio ?></td>
      </tr>
      <tr>
        <td colspan="3"><label>Nota:</label> <?php echo $nota ?></td>
      </tr>
      </tbody>
    </table>


  </div><!--Container-->


<?php 
    } 
  }
 ?>
    <?php //include 'bar/footer.php'; ?>
</body>


</html>
