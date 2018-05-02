<?php
  include ('includes/conexion.php'); 
  include ('bar/navbar_recepcion.php');

  $documento = $_POST['documento'];
  $fecharegistro = $_POST['fecha_registro'];
  $tipodoc = $_POST['tipodoc'];

  $consulta = "SELECT * FROM datos_basicos AS db
  JOIN datos_complementarios AS dc ON db.fk_d_complementario
  WHERE dc.numero_documento = '$documento' AND db.fecha='$fecharegistro' AND dc.fk_tipo_documento = '$tipodoc'";
  $query = mysqli_query($conexion,$consulta);

  if (mysqli_num_rows($query) > 0){

    while($resultados = mysqli_fetch_array($query)) {

			$historia = $resultados['id_historia'];
			$code = base64_encode(522);
			$t_code = base64_encode(1);
			$th_code = base64_encode(2);
			$h_code= base64_encode($resultados['numero_documento']);
			$f_code= base64_encode($resultados['fecha']);

?>
<body>
<br>
<div class="container">
  <p>Resultados de Examenes Practicados:</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Consulta</th>
        <th>Datos Basicos</th>
        <th>Audiometria</th>
        <th>Visiometria</th>
        <th>Espirometria</th>
        <th>Psicologia</th>
        <th>Enfermeria</th>
        <th>Medico</th>
      </tr>
    </thead>
    <tbody>
      <tr class="text-center">
      
        <td>Resultado</td>

        <td>
          <button type="button" class="btn btn-default btn-sm">
            <a target="_blank" href="recepcion_paciente.php?paciente=<?php echo $h_code ?>&&registro=<?php echo $f_code ?>&&cod=<?php echo $code ?>">
                <strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong>
            </a>
          </button>
        </td>

     		<td>
          <button type="button" class="btn btn-default btn-sm">
            <a target="_blank" href="audiometria_result.php?paciente=<?php echo $h_code ?>&&registro=<?php echo $f_code ?>&&cod=<?php echo $code ?>&&tipoconsulta=<?php echo $t_code ?>">
              <strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong>
            </a>
          </button>
        </td>

     		<td>
          <button type="button" class="btn btn-default btn-sm">
            <a target="_blank" href="visiometria_result.php?paciente=<?php echo $h_code ?>&&registro=<?php echo $f_code ?>&&cod=<?php echo $code ?>&&tipoconsulta=<?php echo $t_code ?>">
              <strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong>
            </a>
          </button>
        </td>

     		<td>
          <button type="button" class="btn btn-default btn-sm">
            <a target="_blank" href="espirometria_result.php?paciente=<?php echo $h_code ?>&&registro=<?php echo $f_code ?>&&cod=<?php echo $code ?>&&tipoconsulta=<?php echo $t_code ?>">
              <strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong>
            </a>
          </button>
        </td>

     		<td>
          <button type="button" class="btn btn-default btn-sm">
            <a target="_blank" href="psicologia_result.php?paciente=<?php echo $h_code ?>&&registro=<?php echo $f_code ?>&&cod=<?php echo $code ?>&&tipoconsulta=<?php echo $t_code ?>">
              <strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong>
            </a>
          </button>
        </td>

     		<td>
          <button type="button" class="btn btn-default btn-sm">
            <a target="_blank" href="enfermeria_result.php?paciente=<?php echo $h_code ?>&&registro=<?php echo $f_code ?>&&cod=<?php echo $code ?>&&tipoconsulta=<?php echo $t_code ?>">
              <strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong>
            </a>
          </button>
        </td>

     		<td>
          <button type="button" class="btn btn-default btn-sm">
            <a target="_blank" href="medico_result.php?paciente=<?php echo $h_code ?>&&registro=<?php echo $f_code ?>&&cod=<?php echo $code ?>&&tipoconsulta=<?php echo $t_code ?>">
              <strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong>
            </a>
          </button>
        </td>
      </tr>
    </tbody>

    <tbody>
      <tr class="text-center">

        <td>Historia</td>

        <td>
          <button type="button" class="btn btn-default btn-sm">
            <a target="_blank" href="recepcion_paciente.php?paciente=<?php echo $h_code ?>&&registro=<?php echo $f_code ?>&&cod=<?php echo $code ?>">
              <strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong>
            </a>
          </button>
        </td>

     		<td>
          <button type="button" class="btn btn-default btn-sm">
            <a target="_blank" href="audiometria_result.php?paciente=<?php echo $h_code ?>&&registro=<?php echo $f_code ?>&&cod=<?php echo $code ?>&&tipoconsulta=<?php echo $th_code ?>">
              <strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong>
            </a>
          </button>
        </td>

     		<td>
          <button type="button" class="btn btn-default btn-sm">
            <a target="_blank" href="visiometria_result.php?paciente=<?php echo $h_code ?>&&registro=<?php echo $f_code ?>&&cod=<?php echo $code ?>&&tipoconsulta=<?php echo $th_code ?>">
              <strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong>
            </a>
          </button>
        </td>

     		<td>
          <button type="button" class="btn btn-default btn-sm">
            <a target="_blank" href="espirometria_result.php?paciente=<?php echo $h_code ?>&&registro=<?php echo $f_code ?>&&cod=<?php echo $code ?>&&tipoconsulta=<?php echo $th_code ?>">
              <strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong>
            </a>
          </button>
        </td>

     		<td>
          <button type="button" class="btn btn-default btn-sm">
            <a target="_blank" href="psicologia_result.php?paciente=<?php echo $h_code ?>&&registro=<?php echo $f_code ?>&&cod=<?php echo $code ?>&&tipoconsulta=<?php echo $th_code ?>">
              <strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong>
            </a>
          </button>
        </td>

     		<td>
          <button type="button" class="btn btn-default btn-sm">
            <a target="_blank" href="enfermeria_result.php?paciente=<?php echo $h_code ?>&&registro=<?php echo $f_code ?>&&cod=<?php echo $code ?>&&tipoconsulta=<?php echo $th_code ?>">
              <strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong>
            </a>
          </button>
        </td>

     		<td>
          <button type="button" class="btn btn-default btn-sm">
            <a target="_blank" href="medico_result.php?paciente=<?php echo $h_code ?>&&registro=<?php echo $f_code ?>&&cod=<?php echo $code ?>&&tipoconsulta=<?php echo $th_code ?>">
              <strong><span class="glyphicon glyphicon-eye-open"></span> Ver</strong>
            </a>
          </button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<?php 
}//while
}else{
  echo '<script>
   $(document).ready(function(){
    $("#mostrarmodal").modal("show");
   });</script>'; 
}  
?>
</body>

 <!--Error de usuario no registrado o incorrecto Interfaz Admin-->
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='recepcion_resultados_paciente.php';">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button onClick="window.location.href='recepcion_resultados_paciente.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> ERROR.</h4>
      </div>
      <div class="modal-body">
        <h5 class="text-primary text-justify"><label>El Paciente con Indentificacion Nº <i class="text-danger"><?php echo $documento; ?></i> y fecha de atencion <i class="text-danger"><?php echo $fecharegistro; ?></i>  Incorrecto o no presenta Registro historico en esta area del sistema, Verifique que el numero de documento y la fecha de atencion ingresada coincidan con los registros historicos del paciente.</label></h4>      
      </div>
      <div class="modal-footer">
        <a onClick="window.location.href='recepcion_resultados_paciente.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>

