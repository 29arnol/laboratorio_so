<?php 
  include ('includes/conexion.php'); 
  include ('bar/navbar_administracion.php'); 
?>

<!DOCTYPE html>
<html>
  <head>
  	<title>Laboratorio Salud Ocupacional</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

  </head>
    
  <body>
  	<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);

    if (isset($_POST['Actualizar'])) {
    
    //$identificacion = $_POST['cedula_id'];
    //$fecha = $_POST['fecha'];

    $historia = $_POST['historia'];
    
    $histlaboral = $_POST['historia_laboral'];
    $anosenempresa = $_POST['anosenempresa'];
    $cargohist = $_POST['cargo_historia'];
    $descripcioncargo = $_POST['descripcioncargo'];
    $turno = $_POST['turno'];
    $actividades = $_POST['actividades'];
     $acciones = $_POST['acciones'];
     //-------conjunto de checkbox actvidades-----------HERE------------------
      /* $actividad = '';
  foreach ($_POST['actividades'] as $actividades){
    $s1 = ' | ';
    if($actividad == ''){
      $actividad =$actividades;
    }else{
      $actividad .= $s1.$actividades;
    }
  }
  echo $actividad;*/

     //----Guardar conjunto de valores en un solo campo----------HERE------------------
   /*$cadena = '';
  foreach ($_POST['acciones'] as $idd){
    $s = ' | ';
    if($cadena == ''){
      $cadena =$idd;
    }else{
      $cadena .= $s.$idd;
    }
  }
  echo $cadena;*/
  /* esto es para separar la cadena */
 // $cadena2 = explode('|', $cadena);
  //echo '<br><br>imprimo el valor 0 de mi array '.$cadena2[0]
    //-------------------------------------------------------------HERE-------------------

    $hist_laboral = "UPDATE `historia_laboral` SET `historia_laboral`='$histlaboral', `anos_en_empresa`='$anosenempresa',`cargo`='$cargohist', `descripcion_cargo`='$descripcioncargo',`turno`='$turno',`actividades`='$actividades',`acciones`='$acciones' WHERE paciente_enfermeria = ".$historia." "; 
    $query1 = mysqli_query($conexion,$hist_laboral);

    //-----------------
   if ($query1){   
      //Obtenemos El Ultimo ID Insertado
      $ver = "SELECT * FROM historia_laboral WHERE paciente_enfermeria = ".$historia."";
      $queryid = mysqli_query ($conexion,$ver);
      $dataid = mysqli_fetch_array($queryid);
      $idfk_histlaboral = $dataid['id'];
    }else{
      echo "<script>alert('Error 1, Intente Nuevamente')</script>";
    }
    //----------------- 
   $exposicion_riesgos = $_POST['exposicion_riesgo'];

    $empresa1 = $_POST['empresa1_riesgo'];
    $fisico1 = $_POST['Fisico_emp1'];
    $quimico1 = $_POST['quimico_emp1'];
    $biologico1 = $_POST['biologico_emp1'];
    $ergonomico1 = $_POST['ergonomico_emp1'];
    $mecanico1 = $_POST['mecanico_emp1'];
    $psicosocial1 = $_POST['psicosocial_emp1'];
    $electrico1 = $_POST['electrico_emp1'];
    $otros1 = $_POST['otros_emp1'];
    $cargo1 = $_POST['riesgo_cargo1'];
    $tiempo1 = $_POST['riesgo_tiempo1'];
    $proteccion_personal1 = $_POST['riesgo_epp1'];

    $empresa2 = $_POST['empresa2_riesgo'];
    $fisico2 = $_POST['Fisico_emp2'];
    $quimico2 = $_POST['quimico_emp2'];
    $biologico2 = $_POST['biologico_emp2'];
    $ergonomico2 = $_POST['ergonomico_emp2'];
    $mecanico2 = $_POST['mecanico_emp2'];
    $psicosocial2 = $_POST['psicosocial_emp2'];
    $electrico2 = $_POST['electrico_emp2'];
    $otros2 = $_POST['otros_emp2'];
    $cargo2 = $_POST['riesgo_cargo2'];
    $tiempo2 = $_POST['riesgo_tiempo2'];
    $proteccion_personal2 = $_POST['riesgo_epp2'];

    $empresa3 = $_POST['empresa3_riesgo'];
    $fisico3 = $_POST['Fisico_emp3'];
    $quimico3 = $_POST['quimico_emp3'];
    $biologico3 = $_POST['biologico_emp3'];
    $ergonomico3 = $_POST['ergonomico_emp3'];
    $mecanico3 = $_POST['mecanico_emp3'];
    $psicosocial3 = $_POST['psicosocial_emp3'];
    $electrico3 = $_POST['electrico_emp3'];
    $otros3 = $_POST['otros_emp3'];
    $cargo3 = $_POST['riesgo_cargo3'];
    $tiempo3 = $_POST['riesgo_tiempo3'];
    $proteccion_personal3 = $_POST['riesgo_epp3'];

    $empresa4 = $_POST['empresa4_riesgo'];
    $fisico4 = $_POST['Fisico_emp4'];
    $quimico4 = $_POST['quimico_emp4'];
    $biologico4 = $_POST['biologico_emp4'];
    $ergonomico4 = $_POST['ergonomico_emp4'];
    $mecanico4 = $_POST['mecanico_emp4'];
    $psicosocial4 = $_POST['psicosocial_emp4'];
    $electrico4 = $_POST['electrico_emp4'];
    $otros4 = $_POST['otros_emp4'];
    $cargo4 = $_POST['riesgo_cargo4'];
    $tiempo4 = $_POST['riesgo_tiempo4'];
    $proteccion_personal4 = $_POST['riesgo_epp4'];

    $empresa5 = $_POST['empresa5_riesgo'];
    $fisico5 = $_POST['Fisico_emp5'];
    $quimico5 = $_POST['quimico_emp5'];
    $biologico5 = $_POST['biologico_emp5'];
    $ergonomico5 = $_POST['ergonomico_emp5'];
    $mecanico5 = $_POST['mecanico_emp5'];
    $psicosocial5 = $_POST['psicosocial_emp5'];
    $electrico5 = $_POST['electrico_emp5'];
    $otros5 = $_POST['otros_emp5'];
    $cargo5 = $_POST['riesgo_cargo5'];
    $tiempo5 = $_POST['riesgo_tiempo5'];
    $proteccion_personal5 = $_POST['riesgo_epp5'];
    
    $fact_riesgos = "UPDATE `exposicion_riesgos_enf` SET `factores_riesgos`='$exposicion_riesgos', `empresa1`='$empresa1', `fisico1`='$fisico1', `quimico1`='$quimico1', `biologico1`='$biologico1', `ergonomico1`='$ergonomico1', `mecanico1`='$mecanico1', `psicosocial1`='psicosocial1', `electrico1`='$electrico1', `otros1`='$otros1', `cargo1`='$cargo1', `tiempo1`='$tiempo1', `proteccion_personal1`='$proteccion_personal1', `empresa2`='$empresa2', `fisico2`='$fisico2', `quimico2`='$quimico2', `biologico2`='$biologico2', `ergonomico2`='$ergonomico2', `mecanico2`='$mecanico2', `psicosocial2`='$psicosocial2', `electrico2`='$electrico2', `otros2`='$otros2', `cargo2`='$cargo2', `tiempo2`='$tiempo2', `proteccion_personal2`='$proteccion_personal2', `empresa3`='$empresa3', `fisico3`='$fisico3', `quimico3`='$quimico3', `biologico3`='$biologico3', `ergonomico3`='$ergonomico3', `mecanico3`='$mecanico3', `psicosocial3`='$psicosocial3', `electrico3`='$electrico3', `otros3`='$otros3', `cargo3`='$cargo3', `tiempo3`='$tiempo3', `proteccion_personal3`='$proteccion_personal3', `empresa4`='$empresa4', `fisico4`='$fisico4', `quimico4`='$quimico4', `biologico4`='$biologico4', `ergonomico4`='$ergonomico4', `mecanico4`='$mecanico4', `psicosocial4`='$psicosocial4', `electrico4`='$electrico4', `otros4`='$otros4', `cargo4`='$cargo4', `tiempo4`='$tiempo4', `proteccion_personal4`='$proteccion_personal4', `empresa5`='$empresa5', `fisico5`='$fisico5', `quimico5`='$quimico5', `biologico5`='$biologico5', `ergonomico5`='$ergonomico5', `mecanico5`='$mecanico5', `psicosocial5`='$psicosocial5', `electrico5`='$electrico5', `otros5`='$otros5', `cargo5`='$cargo5', `tiempo5`='$tiempo5', `proteccion_personal5`='$proteccion_personal5' WHERE `id_paciente`=".$idfk_histlaboral." "; 
    $query2 = mysqli_query($conexion,$fact_riesgos);

    //-----------------HEREEEEEEEEEEEEEE
    if ($query2){   
      //Obtenemos El Ultimo ID Insertado
      $ver2 = "SELECT * FROM exposicion_riesgos_enf WHERE id_paciente = ".$idfk_histlaboral."";
      $queryid2 = mysqli_query ($conexion,$ver2);
      $dataid2 = mysqli_fetch_array($queryid2);
      $idfk_riesgos_lab = $dataid2['id'];
    }else{
      echo "<script>alert('Error 2, Intente Nuevamente')</script>";
    }
    //-----------------

    $infancia = $_POST['ant_infancia'];//---------
    $enf_cardiaca = $_POST['ant_cardiaca'];
    $trauma = $_POST['ant_trauma'];
    $transmision_sexual = $_POST['ant_transmision_sexual'];
    $vacunas = $_POST['ant_vacunas'];
    $toxicos = $_POST['ant_toxicos'];
    $hipertension = $_POST['ant_hipertension'];
    $enf_piel = $_POST['ant_piel'];
    $enf_renal = $_POST['ant_renal'];
    $enf_pulmonar = $_POST['ant_pulmonar'];
    $enf_peptica = $_POST['ant_peptica'];
    $enf_mental = $_POST['ant_mental'];

    $alergias = $_POST['ant_alergias'];
    $hernias = $_POST['ant_hernias'];
    $oido_nariz_laringe = $_POST['ant_oido_nariz_laringe'];
    $enf_visuales = $_POST['ant_visuales'];
    $diabetes = $_POST['ant_diabetes'];
    $enf_hematicos = $_POST['ant_hematicos'];
    $cirugias = $_POST['ant_cirugias'];
    $tunel_carpo = $_POST['ant_carpo'];
    $enf_vascular = $_POST['ant_vascular'];
    $varicocele = $_POST['ant_varicocele'];
    $enf_hepatica = $_POST['ant_hepatica'];
    $osteomuscular = $_POST['ant_osteomuscular'];
    
    $hospitalizaciones = $_POST['ant_hospital'];
    $quervein = $_POST['ant_quervein'];
    $lumbalgias = $_POST['ant_lumbalgias'];
    $cancer = $_POST['ant_cancer'];
    $fracturas = $_POST['ant_fracturas'];
    $dislipidemias = $_POST['ant_dislipidemias'];

    $ant_observaciones = $_POST['ant_observacion'];
    $ant_familiar = $_POST['ant_familiar'];
    $ant_familiar_descripcion = $_POST['ant_familiar_descripcion'];
    $ant_personal = $_POST['ant_personal'];
    $ant_personal_descripcion = $_POST['ant_personal_descripcion'];


    $ant_per_fam = "UPDATE `antecedentes_per_fam_enf` SET `infancia`='$infancia',`hipertension_arterial`='$hipertension',`alergias`='$alergias',`cirugias`='$cirugias',`hospitalizaciones`='$hospitalizaciones',`enf_cardiaca`='$enf_cardiaca',`enf_piel_anexos`='$enf_piel',`hernias`='$hernias',`tunel_carpo`='$tunel_carpo',`enf_quervein`='$quervein',`trauma`='$trauma',`enf_vias_renal`='$enf_renal',`enf_oido_nariz_laringe`='$oido_nariz_laringe',`enf_vascular`='$enf_vascular',`lumbalgias`='$lumbalgias',`enf_transmision_sexual`='$transmision_sexual',`enf_pulmonar`='$enf_pulmonar',`enf_visual`='$enf_visuales',`varicocele`='$varicocele',`cancer`='$cancer',`vacunas_dosis`='$vacunas',`enf_acido_peptica`='$enf_peptica',`diabetes`='$diabetes',`enf_hepatica`='$enf_hepatica',`fracturas`='$fracturas',`toxicos`='$toxicos',`enf_mental`='$enf_mental',`enf_hematicos`='$enf_hematicos',`osteomuscular`='$osteomuscular',`dislipidemias`='$dislipidemias',`ant_observaciones`='$ant_observaciones',`familiar_ant`='$ant_familiar',`desc_ant_familiar`='$ant_familiar_descripcion',`personal_ant`='$ant_personal',`desc_ant_per`='$ant_personal_descripcion' WHERE id_paciente_riesgos = ".$idfk_riesgos_lab.""; 
      $query3 = mysqli_query($conexion,$ant_per_fam);

    //-----------------HEREEEEEEEEEEEEEE
    if ($query3){   
      //Obtenemos El Ultimo ID Insertado
      $ver2 = "SELECT * FROM antecedentes_per_fam_enf WHERE id_paciente_riesgos = ".$idfk_riesgos_lab."";
      $queryid2 = mysqli_query ($conexion,$ver2);
      $dataid2 = mysqli_fetch_array($queryid2);
      $idfk_per_fam = $dataid2['id'];
    }else{
      echo "<script>alert('Error 3 get id, Intente Nuevamente')</script>";
    }
    //-----------------

    $menarquia = $_POST['gin_menarquia'];//---------
    $ciclos = $_POST['gin_ciclo'];
    //$obstetrica = $_POST['ficha_obstetrica'];
    $planifica = $_POST['gin_planifica'];
    $metodo = $_POST['gin_metodo'];
    $ultima_mestruacion = $_POST['gin_ult_mestruacion'];
    $ultima_citologia = $_POST['gin_ult_citologia'];
    $resultado_ginecologia = $_POST['resultado_ginecologia'];
    $flujo_vaginal = $_POST['gin_flujo'];
    $dolor_pelvico = $_POST['gin_dolor_pelvico'];
    $dolor_senos = $_POST['gin_dolor_senos'];

  $obstetrica = '';
  foreach ($_POST['gin_obstetrica'] as $obs){
    $m = ' | ';
    if($obstetrica == ''){
      $obstetrica =$obs;
    }else{
      $obstetrica .= $m.$obs;
    }
  }
  echo $obstetrica;

    $ginecologia = "UPDATE `antecedentes_ginecologia_enf` SET `menarquia`='$menarquia',`ciclos`='$ciclos',`ficha_obstetrica`='$obstetrica',`planifica`='$planifica',`metodo`='$metodo',`ultima_mestruacion`='$ultima_mestruacion',`ultima_citologia`='$ultima_citologia',`resultado`='$resultado_ginecologia',`flujo_vaginal`='$flujo_vaginal',`dolor_pelvico`='$dolor_pelvico',`dolor_senos`='$dolor_senos' WHERE id_ant_per_fam = ".$idfk_per_fam."";
    $query4 = mysqli_query($conexion, $ginecologia);

        //-----------------HEREEEEEEEEEEEEEE
    if ($query3){   
      //Obtenemos El Ultimo ID Insertado
      $ver2 = "SELECT * FROM antecedentes_ginecologia_enf WHERE id_ant_per_fam = ".$idfk_per_fam."";
      $queryid2 = mysqli_query ($conexion,$ver2);
      $dataid2 = mysqli_fetch_array($queryid2);
      $idfk_ginecologia = $dataid2['id'];
    }else{
      echo "<script>alert('Error 4 get id, Intente Nuevamente')</script>";
    }
    //-----------------

    $uso_proteccion = $_POST['usoproteccion_p'];//---------
    $proteccion_personal = $_POST['ele_proteccion_cargo'];
    $proteccion_actual = $_POST['proteccion_actual'];
    $casco = $_POST['casco'];
    $botas = $_POST['botas'];
    $gafas = $_POST['gafas'];
    $tapabocas = $_POST['tapabocas'];
    $overol = $_POST['overol'];
    $protectores_auditivos = $_POST['p_auditivos'];
    $protectores_respiratorios = $_POST['p_respiratorios'];
    $otros = $_POST['p_otros'];
    $adecuada = $_POST['p_adecuada'];
    $todoadecuado = $_POST['todoadecuado'];
    $solo_ad = $_POST['solo_ad'];

    $proteccion_pers= "UPDATE `proteccion_personal_enf` SET `uso_proteccion`='$uso_proteccion',`cargo_o_empresa`='$proteccion_personal',`actual`='$proteccion_actual',`casco`='$casco',`botas`='$botas',`gafas`='$gafas',`tapabocas`='$tapabocas',`overol`='$overol',`protectores_auditivos`='$protectores_auditivos',`protectores_respiratorios`='$protectores_respiratorios',`otros`='$otros',`adecuados`='$adecuada',`todas`='$todoadecuado',`solo`='$solo_ad' WHERE id_ginecologia = ".$idfk_ginecologia."";
    $query5 = mysqli_query($conexion,$proteccion_pers);
    //-----------------HEREEEEEEEEEEEEEE
    if ($query5){   
      //Obtenemos El Ultimo ID Insertado
      $ver2 = "SELECT * FROM proteccion_personal_enf WHERE id_ginecologia =".$idfk_ginecologia."";
      $queryid2 = mysqli_query ($conexion,$ver2);
      $dataid2 = mysqli_fetch_array($queryid2);
      $idfk_protec_pers = $dataid2['id'];
    }else{
      echo "<script>alert('Error 5 get id, Intente Nuevamente')</script>";
    }
    //-----------------
//  
    $accidentestrabajo = $_POST['accidentestrabajo'];

    $fecha_accidente = $_POST['fechaaccidente'];
    $empresa_accidente = $_POST['empresaaccidente'];
    $causa_accidente = $_POST['causaaccidente'];
    $lesion_accidente = $_POST['lesionaccidente'];
    $parte_afectada = $_POST['parteafectadaaccidente'];
    $incapacidad_accidente = $_POST['incapacidadaccidente'];
    $secuelaaccidente = $_POST['secuelaaccidente'];

    $fecha_accidente2 = $_POST['fechaaccidente2'];
    $empresa_accidente2 = $_POST['empresaaccidente2'];
    $causa_accidente2 = $_POST['causaaccidente2'];
    $lesion_accidente2 = $_POST['lesionaccidente2'];
    $parte_afectada2 = $_POST['parteafectadaaccidente2'];
    $incapacidad_accidente2 = $_POST['incapacidadaccidente2'];
    $secuelaaccidente2 = $_POST['secuelaaccidente2'];

    $fecha_accidente3 = $_POST['fechaaccidente3'];
    $empresa_accidente3 = $_POST['empresaaccidente3'];
    $causa_accidente3 = $_POST['causaaccidente3'];
    $lesion_accidente3 = $_POST['lesionaccidente3'];
    $parte_afectada3 = $_POST['parteafectadaaccidente3'];
    $incapacidad_accidente3 = $_POST['incapacidadaccidente3'];
    $secuelaaccidente3 = $_POST['secuelaaccidente3'];

    $fecha_accidente4 = $_POST['fechaaccidente4'];
    $empresa_accidente4 = $_POST['empresaaccidente4'];
    $causa_accidente4 = $_POST['causaaccidente4'];
    $lesion_accidente4 = $_POST['lesionaccidente4'];
    $parte_afectada4 = $_POST['parteafectadaaccidente4'];
    $incapacidad_accidente4 = $_POST['incapacidadaccidente4'];
    $secuelaaccidente4 = $_POST['secuelaaccidente4'];

    $fecha_accidente5 = $_POST['fechaaccidente5'];
    $empresa_accidente5 = $_POST['empresaaccidente5'];
    $causa_accidente5 = $_POST['causaaccidente5'];
    $lesion_accidente5 = $_POST['lesionaccidente5'];
    $parte_afectada5 = $_POST['parteafectadaaccidente5'];
    $incapacidad_accidente5 = $_POST['incapacidadaccidente5'];
    $secuelaaccidente5 = $_POST['secuelaaccidente5'];

    //$idfk_protec_pers = 5;

    $accidente_trabajo = "UPDATE `accidentes_trabajo_enf` SET `accidentes_trabajo`='$accidentestrabajo',`fecha1`='$fecha_accidente',`ac_empresa1`='$empresa_accidente',`causa1`='$causa_accidente',`lesion1`='$lesion_accidente',`parte_afectada1`='$parte_afectada',`incapacidad1`='$incapacidad_accidente',`secuela1`='$secuelaaccidente',`fecha2`='$fecha_accidente2',`ac_empresa2`='$empresa_accidente2',`causa2`='$causa_accidente2',`lesion2`='$lesion_accidente2',`parte_afectada2`='$parte_afectada2',`incapacidad2`='$incapacidad_accidente2',`secuela2`='$secuelaaccidente2',`fecha3`='$fecha_accidente3',`ac_empresa3`='$empresa_accidente3',`causa3`='$causa_accidente3',`lesion3`='$lesion_accidente3',`parte_afectada3`='$parte_afectada3',`incapacidad3`='$incapacidad_accidente3',`secuela3`='$secuelaaccidente3',`fecha4`='$fecha_accidente4',`ac_empresa4`='$empresa_accidente4',`causa4`='$causa_accidente4',`lesion4`='$lesion_accidente4',`parte_afectada4`='$parte_afectada4',`incapacidad4`='$incapacidad_accidente4',`secuela4`='$secuelaaccidente4',`fecha5`='$fecha_accidente5',`ac_empresa5`='$empresa_accidente5',`causa5`='$causa_accidente5',`lesion5`='$lesion_accidente5',`parte_afectada5`='$parte_afectada5',`incapacidad5`='$incapacidad_accidente5',`secuela5`='$secuelaaccidente5' WHERE id_protec_personal = ".$idfk_protec_pers."";
    $query6 = mysqli_query($conexion,$accidente_trabajo);

        //-----------------HEREEEEEEEEEEEEEE
    if ($query6){   
      //Obtenemos El Ultimo ID Insertado
      $ver2 = "SELECT * FROM accidentes_trabajo_enf WHERE id_protec_personal = ".$idfk_protec_pers."";
      $queryid2 = mysqli_query ($conexion,$ver2);
      $dataid2 = mysqli_fetch_array($queryid2);
      $idfk_accidente_trab = $dataid2['id'];
    }else{
      echo "<script>alert('Error 6 get id, Intente Nuevamente')</script>";
    }
    //-----------------
  $enfermedad_profesional = $_POST['enfermedad_p']; 

    $fechaenfermedad1 = $_POST['fechaenfermedad1'];
    $empresaenfermedad1 = $_POST['empresaenfermedad1'];
    $diagnostico1= $_POST['diagnostico1'];
    $arl1 = $_POST['arl1'];
    $reubicacion1 = $_POST['reubicacion1'];
    $pension1 = $_POST['pension1'];

    $fechaenfermedad2 = $_POST['fechaenfermedad2'];
    $empresaenfermedad2 = $_POST['empresaenfermedad2'];
    $diagnostico2 = $_POST['diagnostico2'];
    $arl2 = $_POST['arl2'];
    $reubicacion2 = $_POST['reubicacion2'];
    $pension2 = $_POST['pension2'];

    $fechaenfermedad3 = $_POST['fechaenfermedad3'];
    $empresaenfermedad3 = $_POST['empresaenfermedad3'];
    $diagnostico3 = $_POST['diagnostico3'];
    $arl3 = $_POST['arl3'];
    $reubicacion3 = $_POST['reubicacion3'];
    $pension3 = $_POST['pension3'];

    $fechaenfermedad4 = $_POST['fechaenfermedad4'];
    $empresaenfermedad4 = $_POST['empresaenfermedad4'];
    $diagnostico4 = $_POST['diagnostico4'];
    $arl4 = $_POST['arl4'];
    $reubicacion4= $_POST['reubicacion4'];
    $pension4 = $_POST['pension4'];

    $fechaenfermedad5 = $_POST['fechaenfermedad5'];
    $empresaenfermedad5 = $_POST['empresaenfermedad5'];
    $diagnostico5 = $_POST['diagnostico5'];
    $arl5 = $_POST['arl5'];
    $reubicacion5 = $_POST['reubicacion5'];
    $pension5 = $_POST['pension5'];

    $enfermedad_trabajo= "UPDATE `enfermedad_profesional_enf` SET `enfermedad_profesional`='$enfermedad_profesional',`en_fecha1`='$fechaenfermedad1',`en_empresa1`='$empresaenfermedad1',`diagnostico1`='$diagnostico1',`arl1`='$arl1',`reubicacion1`='$reubicacion1',`pension1`='$pension1',`en_fecha2`='$fechaenfermedad2',`en_empresa2`='$empresaenfermedad2',`diagnostico2`='$diagnostico2',`arl2`='$arl2',`reubicacion2`='$reubicacion2',`pension2`='$pension2',`en_fecha3`='$fechaenfermedad3',`en_empresa3`='$empresaenfermedad3',`diagnostico3`='$diagnostico3',`arl3`='$arl3',`reubicacion3`='$reubicacion3',`pension3`='$pension3',`en_fecha4`='$fechaenfermedad4',`en_empresa4`='$empresaenfermedad4',`diagnostico4`='$diagnostico4',`arl4`='$arl4',`reubicacion4`='$reubicacion4',`pension4`='$pension4',`en_fecha5`='$fechaenfermedad5',`en_empresa5`='$empresaenfermedad5',`diagnostico5`='$diagnostico5',`arl5`='$arl5',`reubicacion5`='$reubicacion5',`pension5`='$pension5' WHERE id_accidente_trabajo = ".$idfk_accidente_trab.""; 
    $query7 = mysqli_query($conexion,$enfermedad_trabajo);
    //-----------------HEREEEEEEEEEEEEEE
    if ($query7){   
      //Obtenemos El Ultimo ID Insertado
      $ver2 = "SELECT * FROM enfermedad_profesional_enf WHERE id_accidente_trabajo = ".$idfk_accidente_trab."";
      $queryid2 = mysqli_query ($conexion,$ver2);
      $dataid2 = mysqli_fetch_array($queryid2);
      $idfk_enfermedad_prof = $dataid2['id'];
    }else{
      echo "<script>alert('Error 7 get id, Intente Nuevamente')</script>";
    }
    //-----------------
    $practica_deporte = $_POST['deporte'];
    $deportepractica = $_POST['ejercicio'];
    $otro_deporte = $_POST['cual_deporte'];
    $sedentario = $_POST['sedentario'];
    $depor_cardiopulmonar = $_POST['depor_cardiopulmonar'];
    $depor_frecuencia = $_POST['depor_frecuencia'];

      /*$deportepractica = '';
  foreach ($_POST['ejercicio'] as $depor){
    $m = ' | ';
    if($deportepractica == ''){
      $deportepractica =$depor;
    }else{
      $deportepractica .= $m.$depor;
    }
  }
  echo $deportepractica;
*/
    $habito_saludable = "UPDATE `habitos_saludables_enf` SET `practica_deporte`='$practica_deporte',`cuales`='$deportepractica',`sedentario`='$sedentario',`ejercicio_cardiopulmonar`='$depor_cardiopulmonar',`ejercicio_otro`='$otro_deporte',`frecuencia_ejercicio`='$depor_frecuencia' WHERE id_enfermedad_prof = ".$idfk_enfermedad_prof." "; 
    $query8 = mysqli_query($conexion,$habito_saludable);

    //-----------------HEREEEEEEEEEEEEEE
    if ($query8){   
      //Obtenemos El Ultimo ID Insertado
      $ver2 = "SELECT * FROM habitos_saludables_enf WHERE id_enfermedad_prof = ".$idfk_enfermedad_prof." ";
      $queryid2 = mysqli_query ($conexion,$ver2);
      $dataid2 = mysqli_fetch_array($queryid2);
      $idfk_hab_saludable = $dataid2['id'];
    }else{
      echo "<script>alert('Error 8 get id, Intente Nuevamente')</script>";
    }
    //-----------------    

    $fuma = $_POST['fuma'];
    $fumador = $_POST['fumador'];
    $anos_fumador = $_POST['anosfumador'];
    $exfumador = $_POST['exfumador'];
    $exfumador_anos = $_POST['anosexfumador'];
    $cigarrillos_dia = $_POST['cantidad_cigarrillos_dia'];
    $bebe_habitualmente = $_POST['tomahab'];
    $anos_hab_beber = $_POST['anoshab_beber'];
    $frecuencia_beber = $_POST['frec_beber'];
    $tipo_licor = $_POST['tipolicor'];
    $problemas_bebidas = $_POST['problemasbebidas'];  
    $cual_bebida_prob = $_POST['cuales_bebidas'];
    $exbebedor = $_POST['exbebedor'];
    $exbebedor_anos = $_POST['exbebedor_anos'];
    $otros_habitos_toxicos = $_POST['otroshabitos'];
    $cuales_habitos = $_POST['nombre_otrohabito'];//-----here
    $medic_regularmente = $_POST['medic_regularmente'];
    $nombre_medicamento = $_POST['nombre_medicamento'];
    $cirugiaseps = $_POST['cirugiaseps'];
    $cual_cirugia_eps = $_POST['cuales_cirugias'];
    $pend_tratamiento = $_POST['pend_tratamiento'];
    $cual_tratamiento = $_POST['cuales_tratamientos'];
    $incapacidad_ultimos_meses = $_POST['incapacidadultimosmeses'];
    $motivo_incapacidad = $_POST['motivo_incapacidad'];

    /*$tipo_licor = '';
    foreach ($_POST['tipolicor'] as $licores){
      $m = ' | ';
      if($tipo_licor == ''){
        $tipo_licor =$licores;
      }else{
        $tipo_licor .= $m.$licores;
      }
    }
    echo $tipo_licor;*/

    $habitos_toxicos = "UPDATE habitos_toxicos_enf SET `fuma`='$fuma',`fumador`='$fumador',`fumador_anos`='anos_fumador',`exfumador`='$exfumador',`exfumador_anos`='$exfumador_anos',`cant_cigarrillos_dia`='$cigarrillos_dia',`beber_habitualmente`='$bebe_habitualmente',`anos_habito_beber`='$anos_hab_beber',`frecuencia_beber`='$frecuencia_beber',`tipo_licor`='$tipo_licor',`problemas_con_bebidas`='$problemas_bebidas',`cuales_bebidas_problemas`='$cual_bebida_prob',`exbebedor`='$exbebedor',`anos_exbebedor`='$exbebedor_anos',`otros_habitos_toxicos`='$otros_habitos_toxicos',`cuales_habitos_tox`='$cuales_habitos',`medicamento_regularmente`='$medic_regularmente',`cuales_medicamentos`='$nombre_medicamento',`cirugias_en_eps`='$cirugiaseps',`cuales_cirugias`='$cual_cirugia_eps',`tratamiento_pendiente`='$pend_tratamiento',`cuales_tratamientos`='$cual_tratamiento',`incapacidad_ultimos_meses`='$incapacidad_ultimos_meses',`motivo_incapacidad`='$motivo_incapacidad' WHERE id_hab_saludables = ".$idfk_hab_saludable."";
    $query9 = mysqli_query($conexion,$habitos_toxicos);
    //-----------------HEREEEEEEEEEEEEEE
    if ($query9){   
      //Obtenemos El Ultimo ID Insertado
      $ver2 = "SELECT * FROM habitos_toxicos_enf WHERE id_hab_saludables = ".$idfk_hab_saludable."";
      $queryid2 = mysqli_query ($conexion,$ver2);
      $dataid2 = mysqli_fetch_array($queryid2);
      $idfk_hab_toxicos = $dataid2['id'];
    }else{
      echo "<script>alert('Error 9 get id, Intente Nuevamente')</script>";
    }
    //-----------------

    $mano_habil = $_POST['mano_habil'];
    $cicatrices = $_POST['cicatrices'];
    $tatuajes = $_POST['tatuajes'];
    $perimetro_abdominal = $_POST['perimetro_abdominal'];
    $perimetro_toraxico = $_POST['perimetro_toraxico'];
    $otras_mediciones = $_POST['otras_mediciones'];

    $tension_arterial = $_POST['tensionarterial'];
    $frecuencia_cardiaca = $_POST['frecuenciacardiaca'];
    $frecuencia_respiratoria = $_POST['frecuenciarespiratoria'];
    $talla = $_POST['talla'];
    $peso = $_POST['peso'];
    $peso_diagnostico = $_POST['pesodiagnostico'];


    $signos_vitales = "UPDATE signos_vitales_enf SET `mano_habil`='$mano_habil',`cicatrices`='$cicatrices',`tatuajes`='$tatuajes',`perimetro_abdominal`='$perimetro_abdominal',`perimetro_toraxico`='$perimetro_toraxico',`otras_mediciones`='$otras_mediciones',`tension_arterial`='$tension_arterial',`frecuencia_cardiaca`='$frecuencia_cardiaca',`frecuencia_respiratoria`='$frecuencia_respiratoria',`talla`='$talla',`peso`='$peso',`peso_diagnostico`='$peso_diagnostico' WHERE id_habitos_toxicos = ".$idfk_hab_toxicos."";
    $query10 = mysqli_query($conexion,$signos_vitales);
        //-----------------HEREEEEEEEEEEEEEE
    if ($query10){   
      //Obtenemos El Ultimo ID Insertado
      $ver2 = "SELECT * FROM signos_vitales_enf WHERE id_habitos_toxicos = ".$idfk_hab_toxicos."";
      $queryid2 = mysqli_query ($conexion,$ver2);
      $dataid2 = mysqli_fetch_array($queryid2);
      $idfk_signos_vitales = $dataid2['id'];
    }else{
      echo "<script>alert('Error 10 get id, Intente Nuevamente')</script>";
    }
    //-----------------
    $riesgos_suministrado  = $_POST['riesgos_suministrado'];
    $suministrado_fisico = $_POST['suministrado_fisico'];
    $suministrado_mecanico = $_POST['suministrado_mecanico'];
    $suministrado_quimico = $_POST['suministrado_quimico'];
    $suministrado_psicosocial = $_POST['suministrado_psicosocial'];
    $suministrado_biologico = $_POST['suministrado_biologico'];
    $suministrado_electrico = $_POST['suministrado_electrico'];
    $suministrado_ergonomico = $_POST['suministrado_ergonomico'];
    $suministrado_otro = $_POST['suministrado_otro'];



    $riesgos_suministrados = "UPDATE enfermeria_riesgos_suministrados SET `riesgos_suministrados`='$riesgos_suministrado',`suministrado_fisico`='$suministrado_fisico',`suministrado_mecanico`='$suministrado_mecanico',`suministrado_quimico`='$suministrado_quimico',`suministrado_psicosocial`='$suministrado_psicosocial',`suministrado_biologico`='$suministrado_biologico',`suministrado_electrico`='$suministrado_electrico',`suministrado_ergonomico`='$suministrado_ergonomico',`suministrado_otro`='$suministrado_otro' WHERE id_signos_vitales = ".$idfk_signos_vitales."";
    $query11 = mysqli_query($conexion,$riesgos_suministrados);

 if ($query1 && $query2 && $query3 && $query4 && $query5 && $query6 && $query7 && $query8 && $query9 && $query10 && $query11) {
    echo "<script>alert('Datos Actualizados Exitosamente')</script>";
    echo "<script>window.location = 'administracion_search.php'</script>"; 
    /*echo '<script>
     $(document).ready(function(){
      $("#datossucces").modal("show");
    });</script>';*/
  } else {
    echo "<script>alert('Error a la hora de actualizar datos, Intente Nuevamente')</script>";
    echo "<script>window.location = 'administracion_search.php'</script>"; 
    /*echo '<script>
     $(document).ready(function(){
      $("#datoserror").modal("show");
    });</script>';*/
  }
  }   //fin isset actualizar
  ?> 
  <!--paciente consulta-->
    <!---->
    <?php 
      //$id = $_POST['cedula'];
      //$fecha = $_POST['fecha_registro'];
    
      $area = base64_decode($_REQUEST['area']);
      if ($area==16) {
        $id = base64_decode($_REQUEST['documento']);
        $fecha_reg = base64_decode($_REQUEST['fecha_registro']);
      }else{
        $id = base64_decode($_REQUEST['paciente']);
        $fecha_reg = $_GET['registro'];
      }
      $consult="SELECT * FROM datos_basicos AS db
      JOIN datos_complementarios AS dc ON db.fk_d_complementario = dc.id
      JOIN datos_basicos_tipo_documento AS dbtd ON dc.fk_tipo_documento = dbtd.idtd
      JOIN historia_laboral AS hl ON db.id_historia = hl.paciente_enfermeria 
      JOIN exposicion_riesgos_enf AS ere ON hl.id = ere.id_paciente
      JOIN antecedentes_per_fam_enf AS apfe ON apfe.id_paciente_riesgos = ere.id
      JOIN antecedentes_ginecologia_enf AS age ON age.id_ant_per_fam = apfe.id
      JOIN proteccion_personal_enf AS ppe ON age.id = ppe.id_ginecologia
      JOIN accidentes_trabajo_enf AS ate ON ppe.id = ate.id_protec_personal
      JOIN enfermedad_profesional_enf AS epe ON ate.id = epe.id_accidente_trabajo
      JOIN habitos_saludables_enf AS hse ON epe.id = hse.id_enfermedad_prof
      JOIN habitos_toxicos_enf AS hte ON hse.id = hte.id_hab_saludables
      JOIN signos_vitales_enf AS sve ON hte.id = sve.id_habitos_toxicos
      JOIN enfermeria_riesgos_suministrados AS ers ON sve.id = ers.id_signos_vitales
WHERE db.id_historia='$id' OR dc.numero_documento = '$id' AND db.fecha = '$fecha_reg'";
      $query = mysqli_query($conexion,$consult);

      if (mysqli_num_rows($query) > 0){
      //cuenta el numero de filas de la consulta
      while ($datos=mysqli_fetch_array($query)) {

      //$historia=$datos['id_historia'];

      //datos personales
      $historia=$datos['id_historia'];

      $nombres_apellidos= $datos['nombres_apellidos'];
      $tipo_documento= $datos['tipo_documento'];
      $numero_documento= $datos['numero_documento'];
      $fecha_nacimiento= $datos['fecha_nacimiento'];
      $edad= $datos['edad'];
      $celular= $datos['celular'];
      $genero= $datos['genero'];
      $motivo_evaluacion= $datos['motivo_evaluacion'];
      $direccion = $datos['direccion'];
      $cargodesempenar= $datos['cargo_a_desempenar'];
      $actividad_economica= $datos['actividad_economica'];
      $nombre_empresa= $datos['nombre_empresa'];
      $ciudad= $datos['ciudad'];
      $direccion_empresa= $datos['direccion_empresa'];
      $numero_nit= $datos['numero_nit'];
      $telefono_empresa= $datos['telefono_empresa'];

      $lugar_nacimiento= $datos['lugar_nacimiento'];
      $estado_civil= $datos['estado_civil'];
      $ruta_destino =   "fotografias/"; //ruta de las fotos de los paciente

      //Historia laboral
      $historia_laboral= $datos['historia_laboral'];
      $anos_en_empresa = $datos['anos_en_empresa'];
      $cargo= $datos['cargo'];
      $descripcion_cargo= $datos['descripcion_cargo'];
      $turno= $datos['turno'];
      $actividades= $datos['actividades'];
      $acciones= $datos['acciones'];
      //exposicion factores de riesgos
      $factores_riesgos= $datos['factores_riesgos'];

      $empresa1= $datos['empresa1'];
      $fisico1= $datos['fisico1'];
      $quimico1= $datos['quimico1'];
      $biologico1= $datos['biologico1'];
      $ergonomico1= $datos['ergonomico1'];
      $mecanico1= $datos['mecanico1'];
      $psicosocial1= $datos['psicosocial1'];
      $electrico1= $datos['electrico1'];
      $otros1= $datos['otros1'];
      $cargo1= $datos['cargo1'];
      $tiempo1= $datos['tiempo1'];
      $proteccion_personal1= $datos['proteccion_personal1'];

      $empresa2= $datos['empresa2'];
      $fisico2= $datos['fisico2'];
      $quimico2= $datos['quimico2'];
      $biologico2= $datos['biologico2'];
      $ergonomico2= $datos['ergonomico2'];
      $mecanico2= $datos['mecanico2'];
      $psicosocial2= $datos['psicosocial2'];
      $electrico2= $datos['electrico2'];
      $otros2= $datos['otros2'];
      $cargo2= $datos['cargo2'];
      $tiempo2= $datos['tiempo2'];
      $proteccion_personal2= $datos['proteccion_personal2'];

      $empresa3= $datos['empresa3'];
      $fisico3= $datos['fisico3'];
      $quimico3= $datos['quimico3'];
      $biologico3= $datos['biologico3'];
      $ergonomico3= $datos['ergonomico3'];
      $mecanico3= $datos['mecanico3'];
      $psicosocial3= $datos['psicosocial3'];
      $electrico3= $datos['electrico3'];
      $otros3= $datos['otros3'];
      $cargo3= $datos['cargo3'];
      $tiempo3= $datos['tiempo3'];
      $proteccion_personal3= $datos['proteccion_personal3'];

      $empresa4= $datos['empresa4'];
      $fisico4= $datos['fisico4'];
      $quimico4= $datos['quimico4'];
      $biologico4= $datos['biologico4'];
      $ergonomico4= $datos['ergonomico4'];
      $mecanico4= $datos['mecanico4'];
      $psicosocial4= $datos['psicosocial4'];
      $electrico4= $datos['electrico4'];
      $otros4= $datos['otros4'];
      $cargo4= $datos['cargo4'];
      $tiempo4= $datos['tiempo4'];
      $proteccion_personal4= $datos['proteccion_personal4'];

      $empresa5= $datos['empresa5'];
      $fisico5= $datos['fisico5'];
      $quimico5= $datos['quimico5'];
      $biologico5= $datos['biologico5'];
      $ergonomico5= $datos['ergonomico5'];
      $mecanico5= $datos['mecanico5'];
      $psicosocial5= $datos['psicosocial5'];
      $electrico5= $datos['electrico5'];
      $otros5= $datos['otros5'];
      $cargo5= $datos['cargo5'];
      $tiempo5= $datos['tiempo5'];
      $proteccion_personal5= $datos['proteccion_personal5'];
      //Antecedentes Personales-Familiares
      $infancia= $datos['infancia'];
      $hipertension_arterial= $datos['hipertension_arterial'];
      $alergias= $datos['alergias'];
      $cirugias= $datos['cirugias'];
      $hospitalizaciones= $datos['hospitalizaciones'];
      $enf_cardiaca= $datos['enf_cardiaca'];
      $enf_piel_anexos= $datos['enf_piel_anexos'];
      $hernias= $datos['hernias'];
      $tunel_carpo= $datos['tunel_carpo'];
      $enf_quervein= $datos['enf_quervein'];
      $trauma= $datos['trauma'];
      $enf_vias_renal= $datos['enf_vias_renal'];
      $enf_oido_nariz_laringe= $datos['enf_oido_nariz_laringe'];
      $enf_vascular= $datos['enf_vascular'];
      $lumbalgias= $datos['lumbalgias'];
      $enf_transmision_sexual= $datos['enf_transmision_sexual'];
      $enf_pulmonar= $datos['enf_pulmonar'];
      $enf_visual= $datos['enf_visual'];
      $varicocele= $datos['varicocele'];
      $cancer= $datos['cancer'];
      $vacunas_dosis= $datos['vacunas_dosis'];
      $enf_acido_peptica= $datos['enf_acido_peptica'];
      $diabetes= $datos['diabetes'];
      $enf_hepatica= $datos['enf_hepatica'];
      $fracturas= $datos['fracturas'];
      $toxicos= $datos['toxicos'];
      $enf_mental= $datos['enf_mental'];
      $enf_hematicos= $datos['enf_hematicos'];
      $osteomuscular= $datos['osteomuscular'];
      $dislipidemias= $datos['dislipidemias'];
      $ant_observaciones= $datos['ant_observaciones'];
      $familiar_ant= $datos['familiar_ant'];
      $desc_ant_familiar= $datos['desc_ant_familiar'];
      $personal_ant= $datos['personal_ant'];
      $desc_ant_per= $datos['desc_ant_per'];
      //antecedentes ginecologicos
      $menarquia= $datos['menarquia'];
      $ciclos= $datos['ciclos'];
      $ficha_obstetrica= $datos['ficha_obstetrica'];
      $planifica= $datos['planifica'];
      $metodo= $datos['metodo'];
      $ultima_mestruacion= $datos['ultima_mestruacion'];
      $ultima_citologia= $datos['ultima_citologia'];
      $resultado= $datos['resultado'];
      $flujo_vaginal= $datos['flujo_vaginal'];
      $dolor_pelvico= $datos['dolor_pelvico'];
      $dolor_senos= $datos['dolor_senos'];
      //Uso de Elementos de Proteccion Personal:
      $uso_proteccion= $datos['uso_proteccion'];
      $cargo_o_empresa= $datos['cargo_o_empresa'];
      $actual= $datos['actual'];
      $casco= $datos['casco'];
      $botas= $datos['botas'];
      $gafas= $datos['gafas'];
      $tapabocas= $datos['tapabocas'];
      $overol= $datos['overol'];
      $protectores_auditivos= $datos['protectores_auditivos'];
      $protectores_respiratorios= $datos['protectores_respiratorios'];
      $otra_proteccion= $datos['otros'];
      $adecuados= $datos['adecuados'];
      $adecuados_todas= $datos['todas'];
      $adecuados_solo= $datos['solo'];
      //Accidentes de Trabajo:
      $accidentes_trabajo= $datos['accidentes_trabajo'];
      $fecha1= $datos['fecha1'];
      $ac_empresa1= $datos['ac_empresa1'];
      $causa1= $datos['causa1'];
      $lesion1= $datos['lesion1'];
      $parte_afectada1= $datos['parte_afectada1'];
      $incapacidad1= $datos['incapacidad1'];
      $secuela1= $datos['secuela1'];

        $fecha2= $datos['fecha2'];
      $ac_empresa2= $datos['ac_empresa2'];
      $causa2= $datos['causa2'];
      $lesion2= $datos['lesion2'];
      $parte_afectada2= $datos['parte_afectada2'];
      $incapacidad2= $datos['incapacidad2'];
      $secuela2= $datos['secuela2'];

      $fecha3= $datos['fecha3'];
      $ac_empresa3= $datos['ac_empresa3'];
      $causa3= $datos['causa3'];
      $lesion3= $datos['lesion3'];
      $parte_afectada3= $datos['parte_afectada3'];
      $incapacidad3= $datos['incapacidad3'];
      $secuela3= $datos['secuela3'];

      $fecha4= $datos['fecha4'];
      $ac_empresa4= $datos['ac_empresa4'];
      $causa4= $datos['causa4'];
      $lesion4= $datos['lesion4'];
      $parte_afectada4= $datos['parte_afectada4'];
      $incapacidad4= $datos['incapacidad4'];
      $secuela4= $datos['secuela4'];

      $fecha5= $datos['fecha5'];
      $ac_empresa5= $datos['ac_empresa5'];
      $causa5= $datos['causa5'];
      $lesion5= $datos['lesion5'];
      $parte_afectada5= $datos['parte_afectada5'];
      $incapacidad5= $datos['incapacidad5'];
      $secuela5= $datos['secuela5'];

      //Enfermedad de Trabajo:
      $enfermedad_profesional= $datos['enfermedad_profesional'];

      $diagnostico1= $datos['diagnostico1'];
      $en_fecha1= $datos['en_fecha1'];
      $en_empresa1= $datos['en_empresa1'];
      $diagnostico1= $datos['diagnostico1'];
      $arl1= $datos['arl1'];
      $reubicacion1= $datos['reubicacion1'];
      $pension1 = $datos['pension1'];

      $diagnostico2= $datos['diagnostico2'];
      $en_fecha2= $datos['en_fecha2'];
      $en_empresa2= $datos['en_empresa2'];
      $diagnostico2= $datos['diagnostico2'];
      $arl2= $datos['arl2'];
      $reubicacion2 = $datos['reubicacion2'];
      $pension2 = $datos['pension2'];

      $diagnostico3= $datos['diagnostico3'];
      $en_fecha3= $datos['en_fecha3'];
      $en_empresa3= $datos['en_empresa3'];
      $diagnostico3= $datos['diagnostico3'];
      $arl3= $datos['arl3'];
      $reubicacion3= $datos['reubicacion3'];
      $pension3 = $datos['pension3'];

      $diagnostico4= $datos['diagnostico4'];
      $en_fecha4= $datos['en_fecha4'];
      $en_empresa4= $datos['en_empresa4'];
      $diagnostico4= $datos['diagnostico4'];
      $arl4= $datos['arl4'];
      $reubicacion4= $datos['reubicacion4'];
      $pension4 = $datos['pension4'];

      $diagnostico5= $datos['diagnostico5'];
      $en_fecha5= $datos['en_fecha5'];
      $en_empresa5= $datos['en_empresa5'];
      $diagnostico5= $datos['diagnostico5'];
      $arl5= $datos['arl5'];
      $reubicacion5= $datos['reubicacion5'];
      $pension5 = $datos['pension5'];
      //Habitos Saludables:
      $practica_deporte= $datos['practica_deporte'];
      $cuales= $datos['cuales'];
      $sedentario= $datos['sedentario'];
      $ejercicio_cardiopulmonar= $datos['ejercicio_cardiopulmonar'];
      $ejercicio_otro= $datos['ejercicio_otro'];
      $frecuencia_ejercicio= $datos['frecuencia_ejercicio'];
      //Habitos Toxicos:
      $fuma= $datos['fuma'];
      $fumador= $datos['fumador'];
      $fumador_anos= $datos['fumador_anos'];
      $exfumador= $datos['exfumador'];
      $exfumador_anos= $datos['exfumador_anos'];
      $cant_cigarrillos_dia= $datos['cant_cigarrillos_dia'];
      $beber_habitualmente= $datos['beber_habitualmente'];
      $anos_habito_beber= $datos['anos_habito_beber'];
      $frecuencia_beber= $datos['frecuencia_beber'];
      $tipo_licor= $datos['tipo_licor'];
      $problemas_con_bebidas= $datos['problemas_con_bebidas'];
      $cuales_bebidas_problemas= $datos['cuales_bebidas_problemas'];
      $exbebedor= $datos['exbebedor'];
      $anos_exbebedor= $datos['anos_exbebedor'];
      $otros_habitos_toxicos= $datos['otros_habitos_toxicos'];
      $cuales_habitos_tox= $datos['cuales_habitos_tox'];
      $medicamento_regularmente= $datos['medicamento_regularmente'];
      $cuales_medicamentos= $datos['cuales_medicamentos'];
      $cirugias_en_eps= $datos['cirugias_en_eps'];
      $cuales_cirugias= $datos['cuales_cirugias'];
      $tratamiento_pendiente= $datos['tratamiento_pendiente'];
      $cuales_tratamientos= $datos['cuales_tratamientos'];
      $incapacidad_ultimos_meses= $datos['incapacidad_ultimos_meses'];
      $motivo_incapacidad= $datos['motivo_incapacidad'];
      //Signos Vitales:
      $mano_habil= $datos['mano_habil'];
      $cicatrices= $datos['cicatrices'];
      $tatuajes= $datos['tatuajes'];
      $tension_arterial= $datos['tension_arterial'];
      $frecuencia_cardiaca= $datos['frecuencia_cardiaca'];
      $frecuencia_respiratoria= $datos['frecuencia_respiratoria'];
      $talla= $datos['talla'];
      $Peso= $datos['peso'];
      $peso_diagnostico= $datos['peso_diagnostico'];

      $perimetro_abdominal= $datos['perimetro_abdominal'];
      $perimetro_toraxico= $datos['perimetro_toraxico'];
      $otras_mediciones= $datos['otras_mediciones'];


      //riegos suministrados por la empresa
      $riesgos_suministrados= $datos['riesgos_suministrados'];
      $suministrado_fisico= $datos['suministrado_fisico'];
      $suministrado_mecanico= $datos['suministrado_mecanico'];
      $suministrado_quimico= $datos['suministrado_quimico'];
      $suministrado_psicosocial= $datos['suministrado_psicosocial'];
      $suministrado_biologico= $datos['suministrado_biologico'];
      $suministrado_electrico= $datos['suministrado_electrico'];
      $suministrado_ergonomico= $datos['suministrado_ergonomico'];
      $suministrado_otro= $datos['suministrado_otro'];

    ?>
<!---->

  <form method="POST"  action="" >
 <input class="form-control" type="text" name="historia" value='<?php echo $historia; ?>' readonly="readonly" style  ="display: none;">

<div class="container">
<div class="panel panel-default">
  <div class="panel-heading text-center"><label>Datos  <a href="#" data-toggle="modal" data-target="#historial">Paciente</a> - Empresa</label></div>
    <div class="panel-body">    
      <img class="img-responsive img-thumbnail paciente_datos" alt="Foto del Paciente" src=<?php echo $ruta_destino."".$historia.'.png'; ?> >
      <div class="col-sm-6">
      <div class="tabla_paciente">
        <table class="table table-bordered">
        <thead>
          <th>Nombres-Apellidos:</th>
          <th>Tipo Documento:</th>
          <th>Numero Documento:</th>
        </thead>

          <tbody style="font-size: 13px;">
            <tr>
              <td><?php echo $nombres_apellidos ?></td>
              <td><?php echo $tipo_documento ?></td>
              <td><?php echo $numero_documento ?></td> 
            </tr>
            <thead>
              <th>Edad:</th>
              <th>Fecha Nacimiento:</th>
              <th>Genero:</th>
            </thead>
            <tr>   
              <td><?php echo $edad ?></td>
              <td><?php echo $fecha_nacimiento ?></td>
              <td><?php echo $genero ?></td>
            </tr>
            <thead>      
              <th>Estado Civil:</th>
              <th>Lugar Nacimiento:</th>
              <th>Numero Celular:</th>
            </thead>
            <tr>   
              <td><?php echo $estado_civil ?></td>
              <td><?php echo $lugar_nacimiento ?></td>
              <td><?php echo $celular ?></td>
            </tr>
            <thead> 
              <th>Direccion</th>
              <th colspan="3">Motivo de Evaluacion:</th>
            </thead>
            <tr>
              
              <td><?php echo $direccion ?></td>  
              <td colspan="3"><?php echo $motivo_evaluacion ?></td>
            </tr>
          </tbody>
        </table>
        </div>
      </div>


      <div class="col-sm-12"> 
        <table class="table table-bordered">
          <tbody style="font-size: 13px;">
          <thead>
            <th>Nombre de la Empresa:</th>
            <th>Actividad Economica:</th>
            <th>Ciudad:</th>
            <th>Direccion de la empresa</th>
            <th>Numero de Nit</th>
            <th>Telefono</th>
          </thead>
            <tr>
              <td><?php echo $nombre_empresa ?></td>
              <td><?php echo $actividad_economica ?></td>
              <td><?php echo $ciudad ?></td>
              <td><?php echo $direccion_empresa ?></td>
              <td><?php echo $numero_nit ?></td>
              <td><?php echo $telefono_empresa ?></td>
            </tr>

          </tbody>
        </table>
      </div>
      <!--  -->
    </div>
  </div>
</div>

<div class="container">
<div class="panel panel-default">
  <div class="panel-heading"><div class="text-center"><label class="text-info">Historia Laboral: </label>
    <?php if ($historia_laboral == "Si"){ ?>
      <input type="radio" name="historia_laboral" value="Si" checked> Si 
      <input type="radio" name="historia_laboral" value="No"> No
    <?php }else{ ?> 
      <input type="radio" name="historia_laboral" value="Si"> Si 
      <input type="radio" name="historia_laboral" value="No" checked> No
    <?php } ?>  
  </div></div>
  <div class="panel-body">

    <div class=" col-sm-6">
      <label>Años en la empresa:</label>
      <input class="form-control" type="text" name="anosenempresa" value="<?php echo $anos_en_empresa ?>">
      <br>
    </div>

    <div class=" col-sm-6">
      <label>Cargo:</label>
      <input class="form-control" type="text" name="cargo_historia" value="<?php echo $cargo ?>">
      <br>
    </div>

    <div class="col-sm-6">
      <label>Descripcion del cargo:</label>
      <textarea class="form-control" type="text" name="descripcioncargo" rows="3"><?php echo $descripcion_cargo ?></textarea><br>
    </div>

    <div class=" col-sm-6">
      <br>
      <div class="text-center">
        <table class="table table-bordered">    
          <thead>
            <tr><th>
            <label>Turno:</label></th></tr>
          </thead>
          <tbody>
          <tr>
            <td>
              <div class="text-center">
                <?php if ($turno == "Diurno"){ ?>
                  <input type="radio" name="turno" value="Diurno" checked> Diurno
                  <input type="radio" name="turno" value="Nocturno"> Nocturno
                  <input type="radio" name="turno" value="Rotativo"> Rotativo
                <?php }else if ($turno == "Nocturno") { ?>
                  <input type="radio" name="turno" value="Diurno"> Diurno
                  <input type="radio" name="turno" value="Nocturno" checked> Nocturno
                  <input type="radio" name="turno" value="Rotativo"> Rotativo
                <?php }else if ($turno == "Rotativo") { ?>
                  <input type="radio" name="turno" value="Diurno"> Diurno
                  <input type="radio" name="turno" value="Nocturno"> Nocturno
                  <input type="radio" name="turno" value="Rotativo" checked=""> Rotativo
                <?php }else{ ?>
                  <input type="radio" name="turno" value="Diurno"> Diurno
                  <input type="radio" name="turno" value="Nocturno"> Nocturno
                  <input type="radio" name="turno" value="Rotativo"> Rotativo
                <?php } ?>
              </div>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div><!--finsm-->

    <div class="col-sm-6">
      <label>Actividades</label>
      <textarea type="text" name="actividades" class="form-control"><?php echo $actividades ?></textarea>
      <br>
    </div><!--finsm--> 

    <div class="col-sm-6">
      <label>Acciones</label>
      <textarea type="text" name="acciones" class="form-control"><?php echo $acciones ?></textarea>
      <br>
    </div><!--finsm--> 


  </div>
</div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="text-center"><label class="text-info">Exposicion a factores de riesgo: </label> 
        <input type="radio" name="exposicion_riesgo" value="Si"> Si
        <input type="radio" name="exposicion_riesgo" value="No" checked> No
      </div>
    </div>
    <div class="panel-body">
        <label class="text-center"> </label>
        <table class="table table-bordered">    
          <thead>
            <tr>
            <th class="text" style="width: 190px;">Empresa</th>
              <th class="text-center">F</th>
              <th class="text-center">Q</th>
              <th class="text-center">B</th>
              <th class="text-center">ERG</th>
              <th class="text-center">MEC</th>
              <th class="text-center">PSC</th>
              <th class="text-center">ELEC</th>
              <th class="text-center">OTROS</th>
              <th class="text-center">CARGO</th>
              <th class="text-center">TIEMPO</th>
              <th class="text-center">Elemento Proteccion Personal</th>
            </tr>
          </thead>
          <tbody>
            <tr class="text-center">
	            <td>
                <textarea class="form-control" type="text" name="empresa1_riesgo"><?php echo $empresa1 ?></textarea>
              </td>
	            <td style="position: relative; top: 18px;">
                <?php if ($fisico1== "SI"){ ?>
                  <input type="checkbox" name="Fisico_emp1" value="SI" checked>
                <?php }else{ ?>
                  <div class="text-center"><input type="checkbox" name="Fisico_emp1" value="SI" >
                <?php } ?> 
              </td>
	            <td style="position: relative; top: 18px;">
                <?php if ($quimico1 == "SI") { ?>
                  <input type="checkbox" name="quimico_emp1" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="quimico_emp1" value="SI">
                <?php } ?>  
              </td>
	            <td style="position: relative; top: 18px;">
                <?php if ($biologico1 == "SI") { ?>
                  <input type="checkbox" name="biologico_emp1" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="biologico_emp1" value="SI">
                <?php } ?>  
              </td>
	            <td style="position: relative; top: 18px;"> 
                <?php if ($ergonomico1 == "SI") { ?>
                  <input type="checkbox" name="ergonomico_emp1" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="ergonomico_emp1" value="SI">
                <?php } ?>  
              </td>
	            <td style="position: relative; top: 18px;">
                <?php if ($mecanico1=="SI") { ?>
                  <input type="checkbox" name="mecanico_emp1" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="mecanico_emp1" value="SI">
                <?php } ?>  
              </td>
	            <td style="position: relative; top: 18px;"> 
                <?php if ($psicosocial1 == "SI") { ?>
                  <input type="checkbox" name="psicosocial_emp1" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="psicosocial_emp1" value="SI">
                <?php } ?>  
              </td>
	            <td style="position: relative; top: 18px;">
                <?php if ($electrico1 == "SI"){ ?>
                  <input type="checkbox" name="electrico_emp1" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="electrico_emp1" value="SI">
                <?php } ?>  
              </td>
	            <td>
                <textarea input type="checkbox" name="otros_emp1" class="form-control"><?php echo $otros1 ?></textarea>
              </td>
	            <td>
                <textarea class="form-control" style="width: 190px;" type="text" name="riesgo_cargo1"><?php echo $cargo1 ?></textarea> 
              </td>
	            <td>
                <textarea class="form-control" style="width: 87px;" type="text" name="riesgo_tiempo1"><?php echo  $tiempo1 ?></textarea> 
              </td>
	            <td>
                <textarea class="form-control" style="width: 190px;" type="text" name="riesgo_epp1"><?php echo $proteccion_personal1 ?></textarea>   
              </td> 
            </tr>
            <tr class="text-center">
              <td>
                <textarea type="text" name="empresa2_riesgo" class="form-control"><?php echo $empresa2 ?></textarea>
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($fisico2 =="SI") { ?>
                  <input type="checkbox" name="Fisico_emp2" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="Fisico_emp2" value="SI">
                <?php } ?>  
              </td>
              <td style="position: relative; top: 18px;"> 
                <?php if ($quimico2 == "SI") { ?>
                  <input type="checkbox" name="quimico_emp2" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="quimico_emp2" value="SI">
                <?php } ?>  
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($biologico2=="SI") { ?>
                  <input type="checkbox" name="biologico_emp2" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="biologico_emp2" value="SI">
                <?php } ?>  
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($ergonomico2 == "SI") { ?>
                  <input type="checkbox" name="ergonomico_emp2" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="ergonomico_emp2" value="SI">
                <?php } ?>  
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($mecanico2 == "SI") { ?>
                  <input type="checkbox" name="mecanico_emp2" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="mecanico_emp2" value="SI">
                <?php } ?>
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($psicosocial2=="SI") { ?>
                  <input type="checkbox" name="psicosocial_emp2" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="psicosocial_emp2" value="SI">
                <?php } ?>
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($electrico2 == "SI") { ?>
                  <input type="checkbox" name="electrico_emp2" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="electrico_emp2" value="SI">
                <?php } ?>
              </td>
              <td>
                <textarea type="checkbox" name="otros_emp2" class="form-control"><?php echo $otros2 ?></textarea>
              </td>
              <td>
                <textarea class="form-control" style="width: 190px;" type="text" name="riesgo_cargo2"><?php echo $cargo2 ?></textarea>
              </td>
              <td>
                <textarea class="form-control" style="width: 87px;" type="text" name="riesgo_tiempo2"><?php echo $tiempo2 ?></textarea>
              </td>
              <td>
                <textarea class="form-control" style="width: 190px;" type="text" name="riesgo_epp2"><?php echo $proteccion_personal2 ?></textarea>
              </td> 
            </tr>
            <tr class="text-center">
              <td>
                <textarea type="text" name="empresa3_riesgo" class="form-control"><?php echo $empresa3 ?></textarea>
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($fisico3=="SI") { ?>
                  <input type="checkbox" name="Fisico_emp3" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="Fisico_emp3" value="SI">
                <?php } ?>  
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($quimico3=="SI") { ?>
                  <input type="checkbox" name="quimico_emp3" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="quimico_emp3" value="SI">
                <?php } ?>
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($biologico3=="SI"){ ?>
                  <input type="checkbox" name="biologico_emp3" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="biologico_emp3" value="SI">
                <?php } ?>
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($ergonomico3=="SI") { ?>
                  <input type="checkbox" name="ergonomico_emp3" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="ergonomico_emp3" value="SI">
                <?php } ?>  
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($mecanico3=="SI") { ?>
                  <input type="checkbox" name="mecanico_emp3" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="mecanico_emp3" value="SI">
                <?php } ?>
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($psicosocial3 =="SI") { ?>
                  <input type="checkbox" name="psicosocial_emp3" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="psicosocial_emp3" value="SI">
                <?php } ?>
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($electrico3=="SI") { ?>
                  <input type="checkbox" name="electrico_emp3" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="electrico_emp3" value="SI">
                <?php } ?>
              </td>
              <td>
                <textarea type="checkbox" name="otros_emp3" class="form-control"><?php echo $otros3 ?></textarea>
              </td>
              <td>
                <textarea class="form-control" style="width: 190px;" type="text" name="riesgo_cargo3"><?php echo $cargo3 ?></textarea>
              </td>
              <td>
                <textarea class="form-control" style="width: 87px;" type="text" name="riesgo_tiempo3"><?php echo $tiempo3 ?></textarea>
              </td>
              <td>
                <textarea class="form-control" style="width: 190px;" type="text" name="riesgo_epp3"><?php echo $proteccion_personal3 ?></textarea>
              </td> 
            </tr>
            <tr class="text-center"><!--LISTOOOOOOOOOOOOOOOOO-->
              <td>
                <textarea type="text" name="empresa4_riesgo" class="form-control" style="width: 190px;"><?php echo $empresa4 ?></textarea>
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($fisico4=="SI") { ?>
                  <input type="checkbox" name="Fisico_emp4" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="Fisico_emp4" value="SI">
                <?php } ?>  
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($quimico4=="SI") { ?>
                  <input type="checkbox" name="quimico_emp4" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="quimico_emp4" value="SI">
                <?php } ?>
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($biologico4=="SI") { ?>
                  <input type="checkbox" name="biologico_emp4" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="biologico_emp4" value="SI">
                <?php } ?>
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($ergonomico4=="SI") { ?>
                  <input type="checkbox" name="ergonomico_emp4" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="ergonomico_emp4" value="SI">
                <?php } ?>
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($mecanico4=="SI") { ?>
                  <input type="checkbox" name="mecanico_emp4" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="mecanico_emp4" value="SI">
                <?php } ?>  
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($psicosocial4=="SI") { ?>
                  <input type="checkbox" name="psicosocial_emp4" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="psicosocial_emp4" value="SI">
                <?php } ?>
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($electrico4=="SI") { ?>
                  <input type="checkbox" name="electrico_emp4" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="electrico_emp4" value="SI">
                <?php } ?>  
              </td>
              <td>
                <textarea type="checkbox" name="otros_emp4" class="form-control"><?php echo $otros4 ?></textarea>
              </td>
              <td>
                <textarea class="form-control" style="width: 190px;" type="text" name="riesgo_cargo4"><?php echo $cargo4 ?></textarea>
              </td>
              <td>
                <textarea class="form-control input-sm" style="width: 87px;" type="text" name="riesgo_tiempo4"><?php echo $tiempo4 ?></textarea>
              </td>
              <td>
                <textarea class="form-control input-sm" style="width: 190px;" type="text" name="riesgo_epp4"><?php echo $proteccion_personal4 ?></textarea>
              </td> 
            </tr>
            <tr class="text-center">
              <td>
                <textarea type="text" name="empresa5_riesgo" class="form-control" style="width: 190px;"><?php echo $empresa5 ?></textarea>
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($fisico5=="SI") { ?>
                  <input type="checkbox" name="Fisico_emp5" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="Fisico_emp5" value="SI">
                <?php } ?>
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($quimico5=="SI") { ?>
                  <input type="checkbox" name="quimico_emp5" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="quimico_emp5" value="SI">
                <?php } ?>
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($biologico5=="SI") { ?>
                  <input type="checkbox" name="biologico_emp5" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="biologico_emp5" value="SI">
                <?php } ?>
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($ergonomico5=="SI") { ?>
                  <input type="checkbox" name="ergonomico_emp5" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="ergonomico_emp5" value="SI">
                <?php } ?>
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($mecanico5=="SI") { ?>
                  <input type="checkbox" name="mecanico_emp5" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="mecanico_emp5" value="SI">
                <?php } ?>
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($psicosocial5=="SI") { ?>
                  <input type="checkbox" name="psicosocial_emp5" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="psicosocial_emp5" value="SI">
                <?php } ?>
              </td>
              <td style="position: relative; top: 18px;">
                <?php if ($electrico5=="SI") { ?>
                  <input type="checkbox" name="electrico_emp5" value="SI" checked>
                <?php }else{ ?>
                  <input type="checkbox" name="electrico_emp5" value="SI">
                <?php } ?>
              </td>
              <td>
                <textarea type="checkbox" name="otros_emp5" class="form-control"><?php echo $otros5 ?></textarea>
              </td>
              <td>
                <textarea class="form-control" style="width: 190px;" type="text" name="riesgo_cargo5"><?php echo $cargo5 ?></textarea>
              </td>
              <td>
                <textarea class="form-control" style="width: 87px;" type="text" name="riesgo_tiempo5"><?php echo $tiempo5 ?></textarea>
              </td>
              <td>
                <textarea class="form-control" style="width: 190px;" type="text" name="riesgo_epp5"><?php echo $proteccion_personal5 ?></textarea>
              </td> 
            </tr>
          </tbody>
        </table>
        	<div class="text-center"><label>F:</label> Fisico | <label>Q:</label> Quimico | <label>B:</label> Biologico | <label>ERG:</label> Ergonomico | <label>MEC:</label> Mecanico | <label>PSC:</label> Psicosocial | <label>ELEC:</label> Electrico</div>
    </div>
  </div>      
</div><!--container-->


<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading"><div class="text-center text-info"><label>Antecedentes Personales-Familiares: </label></div></div>
    <div class="panel-body"> 
          
    <div class="col-sm-12">
            <label class="text-center"> </label>
        <table class="table table-bordered">
          <thead>
            <tr class="active">
              <th class="text-center">Infancia:</th>
              <th class="text-center">Enfermedad Cardiaca:</th>   
              <th class="text-center">Trauma:</th>
              <th class="text-center">Enf. Transmisión Sexual:</th>
              <th class="text-center">Vacunas Y Dosis:</th>
              <th class="text-center">Toxicos:</th>
            </tr>
          </thead>    
          <tbody>
            <tr class="text-center">
              
              <td>
                <?php if ($infancia=="Si"){ ?>
                  Si.<input type="radio" name="ant_infancia" value="Si" checked> / 
                  No <input type="radio" name="ant_infancia" value="No">  
                <?php }else{ ?>
                  Si<input type="radio" name="ant_infancia" value="Si"> /
                  No <input type="radio" name="ant_infancia" value="No" checked>
                <?php } ?> 
              </td>
              
              <td>
                <?php if ($enf_cardiaca=="Si") { ?>
                  Si.<input type="radio" name="ant_cardiaca" value="Si" checked> / 
                  No <input type="radio" name="ant_cardiaca" value="No"> 
                <?php }else{ ?>
                  Si.<input type="radio" name="ant_cardiaca" value="Si"> /
                  No <input type="radio" name="ant_cardiaca" value="No" checked> 
                <?php } ?>
              </td>
              
              <td>
                <?php if ($trauma=="Si") { ?>
                  Si.<input type="radio" name="ant_trauma" value="Si" checked> /
                  No <input type="radio" name="ant_trauma" value="No">
                <?php }else{ ?>
                  Si.<input type="radio" name="ant_trauma" value="Si"> /
                  No <input type="radio" name="ant_trauma" value="No" checked>
                <?php } ?>
              </td>
              
              <td>
                <?php if ($enf_transmision_sexual=="Si"){ ?>
                  Si.<input type="radio" name="ant_transmision_sexual" value="Si" checked> /
                  No <input type="radio" name="ant_transmision_sexual" value="No">
                <?php }else{ ?>
                  Si.<input type="radio" name="ant_transmision_sexual" value="Si"> /
                  No <input type="radio" name="ant_transmision_sexual" value="No" checked>
                <?php } ?>
              </td>
              
              <td>
                <?php if ($vacunas_dosis=="Si") { ?>
                  Si.<input type="radio" name="ant_vacunas" value="Si" checked> /
                  No <input type="radio" name="ant_vacunas" value="No">
                <?php }else{ ?>
                  Si.<input type="radio" name="ant_vacunas" value="Si"> /
                  No <input type="radio" name="ant_vacunas" value="No" checked>
                <?php } ?>
              </td>
        	  
              <td>
                <?php if ($toxicos=="Si") { ?>
                  Si.<input type="radio" name="ant_toxicos" value="Si" checked> /
                  No<input type="radio" name="ant_toxicos" value="No">
                <?php }else{ ?>
                  Si.<input type="radio" name="ant_toxicos" value="Si"> /
                  No<input type="radio" name="ant_toxicos" value="No" checked>
                <?php } ?>
              </td>
            </tr>
            <thead>
              <tr class="active">
                <th class="text-center">Hipertensión Arterial:</th>
                <th class="text-center">Enfermedad Piel y Anexos:</th>
                <th class="text-center">Enfermedad Vias Renales:</th>
                <th class="text-center">Enfermedad Pulmonar:</th>
                <th class="text-center">Enfermedad Acido Pèptica:</th>
                <th class="text-center">Enfermedad Mental:</th>
              </tr>  
            </thead>
 
            <tr class="text-center">
              
              <td>
                <?php if ($hipertension_arterial=="Si"){ ?>
                  Si<input type="radio" name="ant_hipertension" value="Si" checked> /
                  No<input type="radio" name="ant_hipertension" value="No">                 
                <?php }else{ ?>
                  Si<input type="radio" name="ant_hipertension" value="Si"> /
                  No<input type="radio" name="ant_hipertension" value="No" checked>
                <?php } ?>
              </td>
              
              <td>
                <?php if ($enf_piel_anexos=="Si") { ?>
                  Si<input type="radio" name="ant_piel" value="Si" checked> /
                  No<input type="radio" name="ant_piel" value="No">
                <?php }else{ ?>
                  Si<input type="radio" name="ant_piel" value="Si"> /
                  No<input type="radio" name="ant_piel" value="No" checked>
                <?php } ?>
              </td>
              
              <td>
                <?php if ($enf_vias_renal=="Si") { ?>
                  Si<input type="radio" name="ant_renal" value="Si" checked> /
                  No<input type="radio" name="ant_renal" value="No">
                <?php }else{ ?>
                  Si<input type="radio" name="ant_renal" value="Si"> /
                  No<input type="radio" name="ant_renal" value="No" checked>
                <?php } ?>
              </td>
              
              <td>
                <?php if ($enf_pulmonar=="Si") { ?>
                  Si<input type="radio" name="ant_pulmonar" value="Si" checked> /
                  No<input type="radio" name="ant_pulmonar" value="No">
                <?php }else{ ?>
                  Si<input type="radio" name="ant_pulmonar" value="Si"> /
                  No<input type="radio" name="ant_pulmonar" value="No" checked>
                <?php } ?>
              </td>

              
              <td>
                <?php if ($enf_acido_peptica=="Si") { ?>
                  Si<input type="radio" name="ant_peptica" value="Si" checked> /
                  No<input type="radio" name="ant_peptica" value="No">
                <?php }else{ ?>
                  Si<input type="radio" name="ant_peptica" value="Si"> /
                  No<input type="radio" name="ant_peptica" value="No" checked>
                <?php } ?>
              </td>
              
              <td>
                <?php if ($enf_mental=="Si") { ?>
                  Si<input type="radio" name="ant_mental" value="Si" checked> /
                  No <input type="radio" name="ant_mental" value="No">
                <?php }else{ ?>
                  Si<input type="radio" name="ant_mental" value="Si"> /
                  No <input type="radio" name="ant_mental" value="No" checked>
                <?php } ?>
              </td>
            </tr>
            <thead>
              <tr class="active">
                <th class="text-center">Alergias:</th>
                <th class="text-center">Hernias:</th>
                <th class="text-center">Enf. Oído–Nariz–Laringe:</th>
                <th class="text-center">Enfermedades Visuales:</th>
                <th class="text-center">Diabetes:</th>
                <th class="text-center">Enfermedad Hemàticos:</th>
              </tr>
            </thead>

            <tr class="text-center">
              <td>
                <?php if ($alergias=="Si") { ?>
                  Si<input type="radio" name="ant_alergias" value="Si" checked> /
                  No<input type="radio" name="ant_alergias" value="No">
                <?php }else{ ?>
                  Si<input type="radio" name="ant_alergias" value="Si"> /
                  No<input type="radio" name="ant_alergias" value="No" checked>
                <?php } ?>
              </td>
              
              <td>
                <?php if ($hernias=="Si") { ?>
                  Si<input type="radio" name="ant_hernias" value="Si" checked> /
                  No<input type="radio" name="ant_hernias" value="No">
                <?php }else{ ?>
                  Si<input type="radio" name="ant_hernias" value="Si"> /
                  No<input type="radio" name="ant_hernias" value="No" checked>
                <?php } ?>
              </td>
              
              <td>
                <?php if ($enf_oido_nariz_laringe=="Si") { ?>
                  Si<input type="radio" name="ant_oido_nariz_laringe" value="Si" checked> /
                  No<input type="radio" name="ant_oido_nariz_laringe" value="No">
                <?php }else{ ?>
                  Si<input type="radio" name="ant_oido_nariz_laringe" value="Si"> /
                  No<input type="radio" name="ant_oido_nariz_laringe" value="No" checked>
                <?php } ?>
              </td>
              
              <td>
                <?php if ($enf_visual=="Si") { ?>
                  Si<input type="radio" name="ant_visuales" value="Si" checked> /
                  No<input type="radio" name="ant_visuales" value="No">
                <?php }else{ ?>
                  Si<input type="radio" name="ant_visuales" value="Si"> /
                  No<input type="radio" name="ant_visuales" value="No" checked>
                <?php } ?>
              </td>
              
              <td>
                <?php if ($diabetes=="Si"){ ?>
                  Si<input type="radio" name="ant_diabetes" value="Si" checked> /
                  No<input type="radio" name="ant_diabetes" value="No">
                <?php }else{ ?>
                  Si<input type="radio" name="ant_diabetes" value="Si"> /
                  No<input type="radio" name="ant_diabetes" value="No" checked>
                <?php } ?>
              </td>
              
              <td>
                <?php if ($enf_hematicos=="Si"){ ?>
                  Si<input type="radio" name="ant_hematicos" value="Si" checked> /
                  No<input type="radio" name="ant_hematicos" value="No">
                <?php }else{ ?>
                  Si<input type="radio" name="ant_hematicos" value="Si"> /
                  No<input type="radio" name="ant_hematicos" value="No" checked>
                <?php } ?>
              </td>
            </tr class="active">

            <thead>
              <tr class="active">
                <th class="text-center">Cirugias:</th>
                <th class="text-center">Tunel del Carpo:</th>
                <th class="text-center">Enfermedad Vascular:</th>
                <th class="text-center">Varicocele:</th>
                <th class="text-center">Enfermedad hepàtica:</th>
                <th class="text-center">Osteomuscular:</th>
              </tr>
            </thead>

            <tr class="text-center">
              
              <td>
                <?php if ($cirugias=="Si") { ?>
                  Si<input type="radio" name="ant_cirugias" value="Si" checked> /
                  No<input type="radio" name="ant_cirugias" value="No">
                <?php }else{ ?>
                  Si<input type="radio" name="ant_cirugias" value="Si"> /
                  No<input type="radio" name="ant_cirugias" value="No" checked>
                <?php } ?>
              </td>
              
              <td>
                <?php if ($tunel_carpo=="Si"){ ?>
                  Si<input type="radio" name="ant_carpo" value="Si" checked> /
                  No<input type="radio" name="ant_carpo" value="No">
                <?php }else{ ?>
                  Si<input type="radio" name="ant_carpo" value="Si"> /
                  No<input type="radio" name="ant_carpo" value="No" checked>
                <?php } ?>
              </td>

              
              <td>
                <?php if ($enf_vascular=="Si") { ?>
                  Si<input type="radio" name="ant_vascular" value="Si" checked> /
                  No<input type="radio" name="ant_vascular" value="No">
                <?php }else{ ?>
                  Si<input type="radio" name="ant_vascular" value="Si"> /
                  No<input type="radio" name="ant_vascular" value="No" checked>
                <?php } ?>
              </td>
              
              <td>
                <?php if ($varicocele=="Si") { ?>
                  Si<input type="radio" name="ant_varicocele" value="Si" checked> /
                  No<input type="radio" name="ant_varicocele" value="No">
                <?php }else{ ?>
                  Si<input type="radio" name="ant_varicocele" value="Si"> /
                  No<input type="radio" name="ant_varicocele" value="No" checked>
                <?php } ?>
              </td>
              
              <td>
              <?php if ($enf_hepatica=="Si") { ?>
                  Si<input type="radio" name="ant_hepatica" value="Si" checked> /
                  No<input type="radio" name="ant_hepatica" value="No">
              <?php }else{ ?>
                  Si<input type="radio" name="ant_hepatica" value="Si"> /
                  No<input type="radio" name="ant_hepatica" value="No" checked>
              <?php } ?>
              </td>
              
              <td>
                <?php if ($osteomuscular=="Si") { ?>
                  Si<input type="radio" name="ant_osteomuscular" value="Si" checked> /
                  No<input type="radio" name="ant_osteomuscular" value="No">
                <?php }else{ ?>
                  Si<input type="radio" name="ant_osteomuscular" value="Si"> /
                  No<input type="radio" name="ant_osteomuscular" value="No" checked>
                <?php } ?>
              </td>
            </tr>

            <thead>
              <tr class="active">
                <th class="text-center">Hospitalizaciones:</th>
                <th class="text-center">Enfermedad Quervein:</th>
                <th class="text-center">Lumbalgias:</th>
                <th class="text-center">Cancer:</th>
                <th class="text-center">Fracturas:</th>
                <th class="text-center">Dislipidemias:</th>
              </tr>
            </thead>

            <tr class="text-center">
              
              <td>
                <?php if ($hospitalizaciones=="Si") { ?>
                  Si<input type="radio" name="ant_hospital" value="Si" checked> /
                  No<input type="radio" name="ant_hospital" value="No">
                <?php }else{ ?>
                  Si<input type="radio" name="ant_hospital" value="Si"> /
                  No<input type="radio" name="ant_hospital" value="No" checked>
                <?php } ?>
              </td>
              
              <td>
                <?php if ($enf_quervein=="Si") { ?>
                  Si<input type="radio" name="ant_quervein" value="Si" checked> /
                  No<input type="radio" name="ant_quervein" value="No">
                <?php }else{ ?>
                  Si<input type="radio" name="ant_quervein" value="Si"> /
                  No<input type="radio" name="ant_quervein" value="No" checked>
                <?php } ?>
              </td>
               
              <td>
                <?php if ($lumbalgias=="Si") { ?>
                  Si<input type="radio" name="ant_lumbalgias" value="Si" checked> /
                  No<input type="radio" name="ant_lumbalgias" value="No">
                <?php }else{ ?>
                  Si<input type="radio" name="ant_lumbalgias" value="Si"> /
                  No<input type="radio" name="ant_lumbalgias" value="No" checked>
                <?php } ?>
              </td>
               
              <td>
                <?php if ($cancer=="Si") { ?>
                  Si<input type="radio" name="ant_cancer" value="Si" checked> /
                  No<input type="radio" name="ant_cancer" value="No">
                <?php }else{ ?>
                  Si<input type="radio" name="ant_cancer" value="Si"> /
                  No<input type="radio" name="ant_cancer" value="No" checked>
                <?php } ?>
              </td>
              
              <td>
                <?php if ($fracturas=="Si") { ?>
                  Si<input type="radio" name="ant_fracturas" value="Si" checked> /
                  No<input type="radio" name="ant_fracturas" value="No">
                <?php }else{ ?>
                  Si<input type="radio" name="ant_fracturas" value="Si"> /
                  No<input type="radio" name="ant_fracturas" value="No" checked>
                <?php } ?>
              </td>
              
              <td>
                <?php if ($dislipidemias=="Si") { ?>
                  Si<input type="radio" name="ant_dislipidemias" value="Si" checked> /
                  No<input type="radio" name="ant_dislipidemias" value="No">
                <?php }else{ ?>
                  Si<input type="radio" name="ant_dislipidemias" value="Si"> /
                  No<input type="radio" name="ant_dislipidemias" value="No" checked>
                <?php } ?>
              </td>
            </tr>

          </tbody>
        </table>
      </div><!--finsm-->

  		<div class="container-fluid">
  			<th class="text-center">Observaciones:</th>
  			<td><textarea  class="col-sm-12" type="text" name="ant_observacion" rows="2"><?php echo $ant_observaciones ?></textarea></td>
  		</div>


            <label class="text-center"> </label>
        <table class="table table-bordered">    
          <tbody>
            <tr>
            	<td class="col-sm-2 ">
                <div style="padding-top: 10px;" class="form-inline">
                  <label>Familiar:</label>
          		    No Refiere 
                  <?php if ($familiar_ant=="Si") { ?>
                    <input type="checkbox" name="ant_familiar" value="Si" checked>
                  <?php }else{ ?>
                    <input type="checkbox" name="ant_familiar" value="Si">
                  <?php } ?>  
                </div>
              </td>
            	<td>
                <textarea  class="col-sm-12" type="text" name="ant_familiar_descripcion" rows="2"><?php echo $desc_ant_familiar ?></textarea>
              </td>
            </tr>
            </tr>
            	<td>
                <div style="padding-top: 10px;" class="form-inline">
                  <label>Personal:</label>
            		  No Refiere 
                  <?php if ($personal_ant == "Si"){ ?>
                    <input type="checkbox" name="ant_personal" value="Si" checked> 
                  <?php }else{ ?>
                    <input type="checkbox" name="ant_personal" value="Si">
                  <?php } ?>
                </div>
              </td>
              	<td><textarea class="col-sm-12" type="text" name="ant_personal_descripcion" rows="2"><?php echo $desc_ant_per ?></textarea>
              </td>
            </tr>

          </tbody>
        </table>

    </div>
  </div>
</div><!--container-->        


    <div class="container">

    <div class="panel-group">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse1"><div class="text-center text-info">Antecedentes Ginecologicos:</div></a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
      <div class="panel-body">
        <table class="table table-bordered"> 
          <thead>
            <th class="text-center">Menarquia:</th>
            <th class="text-center">Ciclos:</th>
            <th colspan="4" class="text-center">Ficha Obstetrica:</th>
          </thead>   
          <tbody>
            <tr class="text-center">
              <td>
                <div class="form-inline">
                  Años: <input type="text" name="gin_menarquia" class="form-control input-sm" style="width: 85px;" value="<?php echo $menarquia ?>">
                </div>
              </td>
              <td>
                <div style="width: 210px" class="form-inline">
                  <?php if ($ciclos=="Regular") { ?>
                    Regular <input type="radio" name="gin_ciclo" value="Regular" checked>
                  <?php }else{ ?>
                    Regular <input type="radio" name="gin_ciclo" value="Regular">
                  <?php } ?>   
                  <?php if($ciclos=="Irregular"){ ?>   
                    | Irregular <input type="radio" name="gin_ciclo" value="Irregular" checked>
                  <?php }else{ ?>
                    | Irregular <input type="radio" name="gin_ciclo" value="Irregular">
                  <?php } ?> 
                  <?php if ($ciclos=="Dias") { ?>
                    | Dias <input type="radio" name="gin_ciclo" value="Dias">
                  <?php }else{ ?> 
                    | Dias <input type="radio" name="gin_ciclo" value="Dias">
                  <?php } ?>
              </div>
              </td>
              <td colspan="4" class="col-sm-8"> 
                <?php if ($ficha_obstetrica=="Gestacion") { ?>
                  Gestacion <input type="checkbox" name="gin_obstetrica[]" value="Gestacion" checked>
                <?php }else{ ?>
                  Gestacion <input type="checkbox" name="gin_obstetrica[]" value="Gestacion">
                <?php } ?>
                <?php if ($ficha_obstetrica=="Parto") { ?>
                  | Parto <input type="checkbox" name="gin_obstetrica[]" value="Parto" checked>
                <?php }else{ ?>
                  | Parto <input type="checkbox" name="gin_obstetrica[]" value="Parto">
                <?php } ?>
                <?php if ($ficha_obstetrica=="Cesarea") { ?>
                  | Cesárea <input type="checkbox" name="gin_obstetrica[]" value="Cesarea" checked>
                <?php }else{ ?>
                  | Cesárea <input type="checkbox" name="gin_obstetrica[]" value="Cesarea">
                <?php } ?>
                <?php if ($ficha_obstetrica=="Aborto") { ?>
                  | Aborto <input type="checkbox" name="gin_obstetrica[]" value="Aborto" checked>
                <?php }else{ ?>  
                  | Aborto <input type="checkbox" name="gin_obstetrica[]" value="Aborto">
                <?php } ?>
                <?php if ($ficha_obstetrica=="Ectopico") { ?>
                  | Ectópico <input type="checkbox" name="gin_obstetrica[]" value="Ectopico" checked>
                <?php }else{?>
                  | Ectópico <input type="checkbox" name="gin_obstetrica[]" value="Ectopico">
                <?php } ?>  
                <?php if ($ficha_obstetrica=="Hijos Vivos") { ?>
                  | Hijos Vivos <input type="checkbox" name="gin_obstetrica[]" value="Hijos Vivos">
                <?php }else{ ?>
                  | Hijos Vivos <input type="checkbox" name="gin_obstetrica[]" value="Hijos Vivos">
                <?php } ?>
                <?php if ($ficha_obstetrica=="Hijos Muertos") { ?>
                  | Hijos Muertos <input type="checkbox" name="gin_obstetrica[]" value="Hijos Muertos">
                <?php }else{ ?>  
                  | Hijos Muertos <input type="checkbox" name="gin_obstetrica[]" value="Hijos Muertos">
                <?php } ?>
                  <hr>
                  <div class="col-sm-4"><label>Planifica:</label> 
                    <?php if ($planifica=="Si") { ?>
                      Si <input type="radio" name="gin_planifica" value="Si" checked>
                      No <input type="radio" name="gin_planifica" value="No"> 
                    <?php }else if ($planifica=="No"){ ?>
                      Si <input type="radio" name="gin_planifica" value="Si">
                      No <input type="radio" name="gin_planifica" value="No" checked>
                    <?php }else{ ?>
                      Si <input type="radio" name="gin_planifica" value="Si">
                      No <input type="radio" name="gin_planifica" value="No">
                    <?php } ?>
                  </div>
                  <div class="col-sm-8 form-inline"><label>Metodo:</label> 
                    <input type="text" name="gin_metodo" class="form-control input-sm" style="width: 350px;" value="<?php echo $metodo ?>">
                  </div>
              </td>
            </tr>
            <thead>
              <th class="text-center">Ultima Mestruacion:</th>
              <th class="text-center">Ultima Citologia:</th>
              <th class="text-center">Resultado:</th>
              <th class="text-center">Flujo Vaginal:</th>
              <th class="text-center">Dolor Pelvico:</th>
              <th class="text-center">Dolor Senos:</th>
            </thead>
            <tr class="text-center">
              <td>
                <input class="form-control" type="date" name="gin_ult_mestruacion" value="$ultima_mestruacion">
              </td>
              <td>
                <input class="form-control" type="date" name="gin_ult_citologia" value="<?php echo $ultima_citologia ?>">
              </td>
              <td>
                <?php if ($resultado=="Normal") { ?>
                  Normal: <input type="radio" name="resultado_ginecologia" value="Normal" checked> / 
                  Anormal: <input type="radio" name="resultado_ginecologia" value="Anormal">
                <?php }else if ($resultado=="Anormal"){ ?>
                  Normal: <input type="radio" name="resultado_ginecologia" value="Normal"> / 
                  Anormal: <input type="radio" name="resultado_ginecologia" value="Anormal" checked>
                <?php }else{ ?>
                  Normal: <input type="radio" name="resultado_ginecologia" value="Normal"> / 
                  Anormal: <input type="radio" name="resultado_ginecologia" value="Anormal">
                <?php } ?>
              <td> 
                <?php if ($flujo_vaginal=="Si") { ?>
                  Si <input type="radio" name="gin_flujo" value="Si" checked> / 
                  No <input type="radio" name="gin_flujo" value="No">
                <?php }else if($flujo_vaginal=="No"){ ?>   
                  Si <input type="radio" name="gin_flujo" value="Si"> / 
                  No <input type="radio" name="gin_flujo" value="No" checked>
                <?php }else{ ?>
                  Si <input type="radio" name="gin_flujo" value="Si"> / 
                  No <input type="radio" name="gin_flujo" value="No">
                <?php } ?>
              </td>
              <td> 
                <?php if ($dolor_pelvico=="Si") { ?>   
                  Si <input type="radio" name="gin_dolor_pelvico" value="Si" checked> / 
                  No <input type="radio" name="gin_dolor_pelvico" value="No">
                <?php }else if ($dolor_pelvico=="No") { ?>
                  Si <input type="radio" name="gin_dolor_pelvico" value="Si"> / 
                  No <input type="radio" name="gin_dolor_pelvico" value="No" checked>
                <?php }else{ ?>
                  Si <input type="radio" name="gin_dolor_pelvico" value="Si"> / 
                  No <input type="radio" name="gin_dolor_pelvico" value="No">
                <?php } ?>  
              </td>
              <td>
                <?php if ($dolor_senos=="Si") { ?> 
                  Si <input type="radio" name="gin_dolor_senos" value="Si" checked> / 
                  No <input type="radio" name="gin_dolor_senos" value="No">
                <?php }else if ($dolor_senos=="No") { ?>
                  Si <input type="radio" name="gin_dolor_senos" value="Si"> / 
                  No <input type="radio" name="gin_dolor_senos" value="No" checked>
                <?php }else{ ?>
                  Si <input type="radio" name="gin_dolor_senos" value="Si"> / 
                  No <input type="radio" name="gin_dolor_senos" value="No">
                <?php } ?>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>  
    </div>
  </div>
</div>


<div class="container">

  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="text-center text-info"><label>Uso de Elementos de Proteccion Personal: </label>
        <?php if ($uso_proteccion=="Si") { ?>
          <input type="radio" name="usoproteccion_p" value="Si" checked> Si 
          <input type="radio" name="usoproteccion_p" value="No"> No
        <?php }else if($uso_proteccion=="No"){ ?> 
          <input type="radio" name="usoproteccion_p" value="Si"> Si 
          <input type="radio" name="usoproteccion_p" value="No" checked> No
        <?php }else{ ?>
          <input type="radio" name="usoproteccion_p" value="Si"> Si 
          <input type="radio" name="usoproteccion_p" value="No"> No
        <?php } ?>
      </div>
    </div>

    <div class="panel-body">

        <label class="text-center"> </label>
        <table class="table table-bordered"> 
          <thead>
            <th class="text-center">En el Cargo o Empresa:</th>
            <th class="text-center">Actual:</th>
            <th class="text-center">Casco:</th>
            <th class="text-center">Botas:</th>
            <th class="text-center">Gafas:</th>
            <th class="text-center">Tapabocas:</th>
            <th class="text-center">Overol:</th>
          </thead>   
	        <tbody>
	            <tr>
	            	<td>
                  <div class="text-center"><br>
                  <?php if ($cargo_o_empresa=="Si") { ?>
                    Si <input type="radio" name="ele_proteccion_cargo" value="Si" checked> / 
                    No <input type="radio" name="ele_proteccion_cargo" value="No">
                  <?php }else if($cargo_o_empresa=="No"){ ?>
	          		    Si <input type="radio" name="ele_proteccion_cargo" value="Si"> / 
                    No <input type="radio" name="ele_proteccion_cargo" value="No" checked>
                  <?php }else{ ?>
                    Si <input type="radio" name="ele_proteccion_cargo" value="Si"> / 
                    No <input type="radio" name="ele_proteccion_cargo" value="No">
                  <?php } ?>
                  </div>
                </td>

                <td>
                  <div class="text-center"><br>
                    <?php if ($actual=="Si") { ?>
                      Si <input type="radio" name="proteccion_actual" value="Si" checked> / 
                      No <input type="radio" name="proteccion_actual" value="No">
                    <?php }else if($actual=="No"){ ?>
                      Si <input type="radio" name="proteccion_actual" value="Si"> / 
                      No <input type="radio" name="proteccion_actual" value="No" checked>
                    <?php }else{ ?>
                      Si <input type="radio" name="proteccion_actual" value="Si"> / 
                      No <input type="radio" name="proteccion_actual" value="No">
                    <?php } ?>
                  </div>
                </td>

                <td>
                  <div class="text-center"><br>
                    <?php if ($casco=="Si") { ?>
                      Si <input type="radio" name="casco" value="Si" checked> / 
                      No <input type="radio" name="casco" value="No">
                    <?php }else if($casco=="No"){ ?>
                      Si <input type="radio" name="casco" value="Si"> / 
                      No <input type="radio" name="casco" value="No" checked>
                    <?php }else{ ?>
                      Si <input type="radio" name="casco" value="Si"> / 
                      No <input type="radio" name="casco" value="No">
                    <?php } ?>                      
                  </div>
                </td>

                <td>
                  <div class="text-center"><br>
                    <?php if ($botas=="Si") { ?>
                      Si <input type="radio" name="botas" value="Si" checked> / 
                      No <input type="radio" name="botas" value="No">
                    <?php }else if($botas=="No"){ ?> 
                      Si <input type="radio" name="botas" value="Si"> / 
                      No <input type="radio" name="botas" value="No" checked>
                    <?php }else{ ?>
                      Si <input type="radio" name="botas" value="Si"> / 
                      No <input type="radio" name="botas" value="No">
                    <?php } ?>
                   </div>
                </td>

                <td>
                  <div class="text-center"><br>
                    <?php if ($gafas=="Si") { ?>
                      Si <input type="radio" name="gafas" value="Si" checked> / 
                      No <input type="radio" name="gafas" value="No">
                    <?php }else if($gafas=="No"){ ?>
                      Si <input type="radio" name="gafas" value="Si"> / 
                      No <input type="radio" name="gafas" value="No" checked>
                    <?php }else{ ?>
                      Si <input type="radio" name="gafas" value="Si"> / 
                      No <input type="radio" name="gafas" value="No">
                    <?php } ?>
                  </div>
                </td>

                <td>
                  <div class="text-center"><br>
                    <?php if ($tapabocas=="Si") { ?>
                      Si <input type="radio" name="tapabocas" value="Si" checked> / 
                      No <input type="radio" name="tapabocas" value="No">.
                    <?php }else if($tapabocas=="No"){ ?>
                      Si <input type="radio" name="tapabocas" value="Si"> / 
                      No <input type="radio" name="tapabocas" value="No" checked>
                    <?php }else{ ?>
                      Si <input type="radio" name="tapabocas" value="Si"> / 
                      No <input type="radio" name="tapabocas" value="No">
                    <?php } ?>                    
                  </div>
                </td>

                <td>
                  <div class="text-center"><br>
                    <?php if ($overol=="Si") { ?> 
                      Si <input type="radio" name="overol" value="Si" checked> / 
                      No <input type="radio" name="overol" value="No">                    
                    <?php }else if($overol=="No"){ ?> 
                      Si <input type="radio" name="overol" value="Si"> / 
                      No <input type="radio" name="overol" value="No" checked>
                    <?php }else{ ?>
                      Si <input type="radio" name="overol" value="Si"> / 
                      No <input type="radio" name="overol" value="No">
                    <?php } ?>
                  </div>
                </td>
	            </tr>
	        </tbody>
        </table>
     
        <label class="text-center"> </label>
        <table class="table table-bordered">
        <thead>
          <th class="text-center">Protectores Auditivos:</th>
          <th class="text-center">Protectores Respiratorios:</th>
          <th class="text-center">Otros:</th>
          <th class="text-center">Son Adecuados?</th>
          <th class="text-center">Todas:</th>
          <th class="text-center">Solo:</th>
        </thead>    
        <tbody>    
    		  <tr>
<!-- REVISAR EPP OVerol VALUE -->
            <td>
              <div class="text-center">
                <?php if ($protectores_auditivos=="Si") { ?>
                  Si <input type="radio" name="p_auditivos" value="Si" checked> / 
                  No <input type="radio" name="p_auditivos" value="No">
                <?php }else if($protectores_auditivos=="No"){ ?>  
                	Si <input type="radio" name="p_auditivos" value="Si"> / 
                  No <input type="radio" name="p_auditivos" value="No" checked>
                <?php }else{ ?>
                  Si <input type="radio" name="p_auditivos" value="Si"> / 
                  No <input type="radio" name="p_auditivos" value="No">
                <?php } ?>                  
              </div>
            </td>

            <td>
              <div class="text-center">
                <?php if ($protectores_respiratorios=="Si") { ?>
                  Si <input type="radio" name="p_respiratorios" value="Si" checked> / 
                  No <input type="radio" name="p_respiratorios" value="No">
                <?php }else if($protectores_respiratorios=="No"){ ?>
                  Si <input type="radio" name="p_respiratorios" value="Si"> / 
                  No <input type="radio" name="p_respiratorios" value="No" checked>
                <?php }else{ ?>
                  Si <input type="radio" name="p_respiratorios" value="Si"> / 
                  No <input type="radio" name="p_respiratorios" value="No">                  
                <?php } ?>
              </div>
            </td>

            <td>
              <div class="text-center">
                <textarea type="text" name="p_otros" class="form-control input-sm"><?php echo $otra_proteccion ?></textarea>
              </div>       
            </td>

            <td>
              <div class="text-center">
                <?php if ($adecuados=="Si"){ ?>
                  Si <input type="radio" name="p_adecuada" value="Si" checked> / 
                  No <input type="radio" name="p_adecuada" value="No">
                <?php }else if($adecuados=="No"){ ?>
                  Si <input type="radio" name="p_adecuada" value="Si"> / 
                  No <input type="radio" name="p_adecuada" value="No" checked>
                <?php }else{ ?>
                  Si <input type="radio" name="p_adecuada" value="Si"> / 
                  No <input type="radio" name="p_adecuada" value="No">
                <?php } ?>
              </div>
            </td>

            <td>
              <div class="text-center">
                <?php if ($adecuados_todas=="Si") { ?>
                  Si <input type="radio" name="todoadecuado" value="Si" checked> / 
                  No <input type="radio" name="todoadecuado" value="No">
                <?php }else if($adecuados_todas=="No"){ ?> 
                  Si <input type="radio" name="todoadecuado" value="Si"> / 
                  No <input type="radio" name="todoadecuado" value="No" checked>
                <?php }else{ ?>
                  Si <input type="radio" name="todoadecuado" value="Si"> / 
                  No <input type="radio" name="todoadecuado" value="No">                
                <?php } ?>
              </div>
            </td>

            <td>
              <div class="text-center"> 
                <textarea class="form-control input-sm"  type="text" name="solo_ad" ><?php echo $adecuados_solo ?></textarea>
              </div>
            </td> 
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="container">
  <br>
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="text-center text-info"><label>Accidentes de Trabajo: </label> 
        <?php if ($accidentes_trabajo=="Si") { ?>
          <input type="radio" name="accidentestrabajo" value="Si" checked> Si 
          <input type="radio" name="accidentestrabajo" value="No"> No
        <?php }else if($accidentes_trabajo=="No"){ ?>
          <input type="radio" name="accidentestrabajo" value="Si"> Si 
          <input type="radio" name="accidentestrabajo" value="No" checked> No
        <?php }else{ ?>
          <input type="radio" name="accidentestrabajo" value="Si"> Si 
          <input type="radio" name="accidentestrabajo" value="No"> No
        <?php } ?>
      </div>
    </div>
    <div class="panel-body">    	
	      
        <label class="text-center"> </label>
        <table class="table table-bordered">  
        	<thead>
        		<th><label>Fecha</label></th>
        		<th><label>Empresa</label></th>
        		<th><label>Causa</label></th>
        		<th><label>Lesion</label></th>
        		<th><label>Parte Afectada</label></th>
        		<th><label>Incapacidad</label></th>
        		<th><label>Secuela</label></th>
        	</thead>  
	        <tbody>
	            <tr>	            	
	          		<td>
                  <input class="form-control input-sm" style="width: 160px;" type="date" name="fechaaccidente" value="<?php echo $fecha1 ?>">
                </td>
	          		<td>
                  <input class="form-control input-sm" style="width: 190px;" type="text" name="empresaaccidente" value="<?php echo $ac_empresa1 ?>">
                </td>
	          		<td>
                  <input class="form-control input-sm" style="width: 200px;" type="text" name="causaaccidente" value="<?php echo $causa1 ?>">
                </td>
	          		<td>
                  <?php if ($lesion1=="Si") { ?>
                    <input type="radio" name="lesionaccidente" value="Si" checked> Si  
                    <input type="radio" name="lesionaccidente" value="No"> No
                  <?php }else if($lesion1=="No"){ ?>
                    <input type="radio" name="lesionaccidente" value="Si"> Si  
                    <input type="radio" name="lesionaccidente" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="lesionaccidente" value="Si"> Si  
                    <input type="radio" name="lesionaccidente" value="No"> No
                  <?php } ?>
                </td>
	          		<td>
                  <input class="form-control input-sm" style="width: 190px;" type="text" name="parteafectadaaccidente" value="<?php echo $parte_afectada1 ?>">
                </td>
	          		<td>
                  <?php if ($incapacidad1=="Si") { ?>
                    <input type="radio" name="incapacidadaccidente" value="Si" checked> Si 
                    <input type="radio" name="incapacidadaccidente" value="No"> No
                  <?php }else if($incapacidad1=="No"){ ?>
                    <input type="radio" name="incapacidadaccidente" value="Si"> Si 
                    <input type="radio" name="incapacidadaccidente" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="incapacidadaccidente" value="Si"> Si 
                    <input type="radio" name="incapacidadaccidente" value="No"> No
                  <?php } ?>
                </td>
	          		<td>
                  <?php if ($secuela1=="Si") { ?>
                    <input type="radio" name="secuelaaccidente" value="Si" checked> Si 
                    <input type="radio" name="secuelaaccidente" value="No"> No
                  <?php }else if($secuela1=="No"){ ?>
                    <input type="radio" name="secuelaaccidente" value="Si"> Si 
                    <input type="radio" name="secuelaaccidente" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="secuelaaccidente" value="Si"> Si 
                    <input type="radio" name="secuelaaccidente" value="No"> No 
                  <?php } ?>                 
                </td>
	            </tr>
	           	<tr>
	          		<td>
                    <input class="form-control input-sm" style="width: 160px;" class="" type="date" name="fechaaccidente2" value="<?php echo $fecha2 ?>">
                </td>
	          		<td>
                  <input class="form-control input-sm" style="width: 190px;" type="text" name="empresaaccidente2" value="<?php echo $ac_empresa2 ?>">
                </td>
	          		<td>
                  <input class="form-control input-sm" style="width: 200px;" type="text" name="causaaccidente2" value="<?php echo $causa2 ?>">
                </td>
	          		<td>
                  <?php if ($lesion2=="Si") { ?>
                    <input type="radio" name="lesionaccidente2" value="Si" checked> Si 
                    <input type="radio" name="lesionaccidente2" value="No"> No
                  <?php }else if($lesion2=="No"){ ?>
                    <input type="radio" name="lesionaccidente2" value="Si"> Si 
                    <input type="radio" name="lesionaccidente2" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="lesionaccidente2" value="Si"> Si 
                    <input type="radio" name="lesionaccidente2" value="No"> No
                  <?php } ?>
                </td>
	          		<td>
                  <input class="form-control input-sm" style="width: 190px;" type="text" name="parteafectadaaccidente2" value="<?php echo $parte_afectada2 ?>">
                </td>
	          		<td>
                  <?php if ($incapacidad2=="Si") { ?>
                    <input type="radio" name="incapacidadaccidente2" value="Si" checked> Si 
                    <input type="radio" name="incapacidadaccidente2" value="No"> No
                  <?php }else if($incapacidad2=="No"){ ?>
                    <input type="radio" name="incapacidadaccidente2" value="Si"> Si 
                    <input type="radio" name="incapacidadaccidente2" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="incapacidadaccidente2" value="Si"> Si 
                    <input type="radio" name="incapacidadaccidente2" value="No"> No
                  <?php } ?>
                </td>
	          		<td>
                  <?php if ($secuela2=="Si") { ?>
                    <input type="radio" name="secuelaaccidente2" value="Si" checked> Si 
                    <input type="radio" name="secuelaaccidente2" value="No"> No
                  <?php }else if($secuela2=="No"){ ?>
                    <input type="radio" name="secuelaaccidente2" value="Si"> Si 
                    <input type="radio" name="secuelaaccidente2" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="secuelaaccidente2" value="Si"> Si 
                    <input type="radio" name="secuelaaccidente2" value="No"> No 
                  <?php } ?>                   
                </td>
	            </tr>
              <tr>
                <td>
                  <input class="form-control input-sm" style="width: 160px;" type="date" name="fechaaccidente3" value="<?php echo $fecha3 ?>">
                </td>
                <td>
                  <input class="form-control input-sm" style="width: 190px;" type="text" name="empresaaccidente3" value="<?php echo $ac_empresa3 ?>" >
                </td>
                <td>
                  <input class="form-control input-sm" style="width: 200px;" type="text" name="causaaccidente3" value="<?php echo $causa3 ?>">
                </td>
                <td>
                  <?php if ($lesion3=="Si") { ?>
                    <input type="radio" name="lesionaccidente3" value="Si" checked> Si 
                    <input type="radio" name="lesionaccidente3" value="No"> No
                  <?php }else if($lesion3=="No"){ ?>
                    <input type="radio" name="lesionaccidente3" value="Si"> Si 
                    <input type="radio" name="lesionaccidente3" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="lesionaccidente3" value="Si"> Si 
                    <input type="radio" name="lesionaccidente3" value="No"> No
                  <?php } ?>
                </td>
                <td>
                  <input class="form-control input-sm" style="width: 190px;" type="text" name="parteafectadaaccidente3" value="<?php echo $parte_afectada3 ?>">
                </td>
                <td>
                  <?php if ($incapacidad3=="Si") { ?>
                    <input type="radio" name="incapacidadaccidente3" value="Si" checked> Si 
                    <input type="radio" name="incapacidadaccidente3" value="No"> No
                  <?php }else if($incapacidad3=="No"){ ?>
                    <input type="radio" name="incapacidadaccidente3" value="Si"> Si 
                    <input type="radio" name="incapacidadaccidente3" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="incapacidadaccidente3" value="Si"> Si 
                    <input type="radio" name="incapacidadaccidente3" value="No"> No
                  <?php } ?>
                </td>
                <td>
                  <?php if ($secuela3=="Si") { ?>
                    <input type="radio" name="secuelaaccidente3" value="Si" checked> Si 
                    <input type="radio" name="secuelaaccidente3" value="No"> No
                  <?php }else if($secuela3=="No"){ ?>
                    <input type="radio" name="secuelaaccidente3" value="Si"> Si 
                    <input type="radio" name="secuelaaccidente3" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="secuelaaccidente3" value="Si"> Si 
                    <input type="radio" name="secuelaaccidente3" value="No"> No
                  <?php } ?>
                </td>
              </tr>
              <!--FALTA POR REGISTRAR ULTIMAS DOS TR 2222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222-->
              <tr>
                <td>
                  <input class="form-control input-sm" style="width: 160px;" class="" type="date" name="fechaaccidente4" value="<?php echo $fecha4 ?>">
                </td>
                <td>
                  <input class="form-control input-sm" style="width: 190px;" type="text" name="empresaaccidente4" value="<?php echo $ac_empresa4 ?>">
                </td>
                <td>
                  <input class="form-control input-sm" style="width: 200px;" type="text" name="causaaccidente4" value="<?php echo $causa4 ?>">
                </td>
                <td>
                  <?php if ($lesion4=="Si") { ?>
                    <input type="radio" name="lesionaccidente4" value="Si" checked> Si 
                    <input type="radio" name="lesionaccidente4" value="No"> No
                  <?php }else if($lesion4=="No"){ ?>  
                    <input type="radio" name="lesionaccidente4" value="Si"> Si 
                    <input type="radio" name="lesionaccidente4" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="lesionaccidente4" value="Si"> Si 
                    <input type="radio" name="lesionaccidente4" value="No"> No 
                  <?php } ?>                 
                </td>
                <td>
                  <input class="form-control input-sm" style="width: 190px;" type="text" name="parteafectadaaccidente4" value="<?php echo $parte_afectada4 ?>">
                </td>
                <td>
                  <?php if ($incapacidad4=="Si") { ?>
                    <input type="radio" name="incapacidadaccidente4" value="Si" checked> Si 
                    <input type="radio" name="incapacidadaccidente4" value="No"> No
                  <?php }else if($incapacidad4=="No"){ ?>
                    <input type="radio" name="incapacidadaccidente4" value="Si"> Si 
                    <input type="radio" name="incapacidadaccidente4" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="incapacidadaccidente4" value="Si"> Si 
                    <input type="radio" name="incapacidadaccidente4" value="No"> No
                  <?php } ?>
                </td>
                <td>
                  <?php if ($secuela4=="Si") { ?>
                    <input type="radio" name="secuelaaccidente4" value="Si" checked> Si 
                    <input type="radio" name="secuelaaccidente4" value="No"> No
                  <?php }else if($secuela4=="No"){ ?>
                    <input type="radio" name="secuelaaccidente4" value="Si"> Si 
                    <input type="radio" name="secuelaaccidente4" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="secuelaaccidente4" value="Si"> Si 
                    <input type="radio" name="secuelaaccidente4" value="No"> No
                  <?php } ?>
                </td>
              </tr>
              <tr>
                <td>
                  <input class="form-control input-sm" style="width: 160px;" class="" type="date" name="fechaaccidente5" value="<?php echo $fecha5 ?>">
                </td>
                <td>
                  <input class="form-control input-sm" style="width: 190px;" type="text" name="empresaaccidente5" value="<?php echo $ac_empresa5 ?>">
                </td>
                <td>
                  <input class="form-control input-sm" style="width: 200px;" type="text" name="causaaccidente5" value="<?php echo $causa5 ?>">
                </td>
                <td>
                  <?php if ($lesion5=="Si") { ?>
                    <input type="radio" name="lesionaccidente5" value="Si" checked> Si 
                    <input type="radio" name="lesionaccidente5" value="No"> No
                  <?php }else if($lesion5=="No"){ ?>
                    <input type="radio" name="lesionaccidente5" value="Si"> Si 
                    <input type="radio" name="lesionaccidente5" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="lesionaccidente5" value="Si"> Si 
                    <input type="radio" name="lesionaccidente5" value="No"> No
                  <?php } ?>
                </td>
                <td>
                  <input class="form-control input-sm" style="width: 190px;" type="text" name="parteafectadaaccidente5" value="<?php echo $parte_afectada5 ?>">
                </td>
                <td>
                  <?php if ($incapacidad5 =="Si") { ?>
                    <input type="radio" name="incapacidadaccidente5" value="Si" checked> Si 
                    <input type="radio" name="incapacidadaccidente5" value="No"> No
                  <?php }else if($incapacidad5=="No") { ?>
                    <input type="radio" name="incapacidadaccidente5" value="Si"> Si 
                    <input type="radio" name="incapacidadaccidente5" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="incapacidadaccidente5" value="Si"> Si 
                    <input type="radio" name="incapacidadaccidente5" value="No"> No
                  <?php } ?>                 
                </td>
                <td>
                  <?php if ($secuela5=="Si") { ?>
                    <input type="radio" name="secuelaaccidente5" value="Si" checked> Si 
                    <input type="radio" name="secuelaaccidente5" value="No"> No
                  <?php }else if($secuela5=="No"){ ?>
                    <input type="radio" name="secuelaaccidente5" value="Si"> Si 
                    <input type="radio" name="secuelaaccidente5" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="secuelaaccidente5" value="Si"> Si 
                    <input type="radio" name="secuelaaccidente5" value="No"> No
                  <?php } ?>
                </td>
              </tr>
	        </tbody>
        </table>
    </div>
  </div>
</div>

<div class="container">

<div class="panel panel-default">
  <div class="panel-heading">
    <div class="text-center text-info"><label>Enfermedad Profesional: </label>
      <?php if ($enfermedad_profesional=="Si"){ ?>
        <input type="radio" name="enfermedad_p" value="Si" checked> Si 
        <input type="radio" name="enfermedad_p" value="No"> No       
      <?php }else if($enfermedad_profesional=="No"){ ?> 
        <input type="radio" name="enfermedad_p" value="Si"> Si 
        <input type="radio" name="enfermedad_p" value="No" checked> No
      <?php }else{ ?>
        <input type="radio" name="enfermedad_p" value="Si"> Si 
        <input type="radio" name="enfermedad_p" value="No"> No
      <?php } ?>
    </div>
  </div>
  <div class="panel-body">
    
        <label class="text-center"> </label>
        <table class="table table-bordered">  
        	<thead>
        		<th><label>Fecha</label></th>
        		<th><label>Empresa</label></th>
        		<th><label>Diagnostico</label></th>
        		<th><label>ARL</label></th>
        		<th><label>Reubicacion</label></th>
            <th><label>Pension</label></th>
        	</thead>  
	        <tbody>
	            <tr>
	          		<td>
                  <input class="form-control input-sm" style="width: 160px;" type="date" name="fechaenfermedad1" value="<?php echo $en_fecha1 ?>">
                </td>
	          		<td>
                  <input class="form-control input-sm" style="width: 190px;" type="text" name="empresaenfermedad1" value="<?php echo $en_empresa1 ?>">
                </td>
	          		<td>
                  <input class="form-control input-sm" style="width: 290px;" type="text" name="diagnostico1" value="<?php echo $diagnostico1 ?>">
                </td>
	          		<td>
                  <?php if ($arl1=="Si"){ ?>
                    <input type="radio" name="arl1" value="Si" checked> Si 
                    <input type="radio" name="arl1" value="No">No                    
                  <?php }else if($arl1=="No"){ ?>
                    <input type="radio" name="arl1" value="Si"> Si 
                    <input type="radio" name="arl1" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="arl1" value="Si"> Si 
                    <input type="radio" name="arl1" value="No"> No
                  <?php } ?>
                </td>
	          		<td>
                  <?php if ($reubicacion1=="Si") { ?>
                    <input type="radio" name="reubicacion1" value="Si" checked> Si 
                    <input type="radio" name="reubicacion1" value="No"> No
                  <?php }else if($reubicacion1=="No"){ ?>
                    <input type="radio" name="reubicacion1" value="Si"> Si 
                    <input type="radio" name="reubicacion1" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="reubicacion1" value="Si"> Si 
                    <input type="radio" name="reubicacion1" value="No"> No
                  <?php } ?>
                </td>
                <td>
                  <?php if ($pension1=="Si") { ?>
                    <input type="radio" name="pension1" value="Si" checked> Si 
                    <input type="radio" name="pension1" value="No"> No
                  <?php }else if($pension1=="No"){ ?>
                    <input type="radio" name="pension1" value="Si"> Si 
                    <input type="radio" name="pension1" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="pension1" value="Si"> Si 
                    <input type="radio" name="pension1" value="No"> No
                  <?php } ?>
                </td>
	            </tr>
              <tr>
                <td>
                  <input class="form-control input-sm" style="width: 160px;" type="date" name="fechaenfermedad2" value="<?php echo $en_fecha2 ?>">
                </td>
                <td>
                  <input class="form-control input-sm" style="width: 190px;" type="text" name="empresaenfermedad2" value="<?php echo $en_empresa2 ?>">
                </td>
                <td>
                  <input class="form-control input-sm" style="width: 290px;" type="text" name="diagnostico2" value="<?php echo $diagnostico2 ?>">
                </td>
                <td>
                  <?php if ($arl2=="Si"){ ?>
                    <input type="radio" name="arl2" value="Si" checked> Si 
                    <input type="radio" name="arl2" value="No">No                    
                  <?php }else if($arl2=="No"){ ?>
                    <input type="radio" name="arl2" value="Si"> Si 
                    <input type="radio" name="arl2" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="arl2" value="Si"> Si 
                    <input type="radio" name="arl2" value="No"> No
                  <?php } ?>
                </td>
                <td>
                  <?php if ($reubicacion2=="Si") { ?>
                    <input type="radio" name="reubicacion2" value="Si" checked> Si 
                    <input type="radio" name="reubicacion2" value="No"> No
                  <?php }else if($reubicacion2=="No"){ ?>
                    <input type="radio" name="reubicacion2" value="Si"> Si 
                    <input type="radio" name="reubicacion2" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="reubicacion2" value="Si"> Si 
                    <input type="radio" name="reubicacion2" value="No"> No
                  <?php } ?>
                </td>
                <td>
                  <?php if ($pension2=="Si") { ?>
                    <input type="radio" name="pension2" value="Si" checked> Si 
                    <input type="radio" name="pension2" value="No"> No
                  <?php }else if($pension2=="No"){ ?>
                    <input type="radio" name="pension2" value="Si"> Si 
                    <input type="radio" name="pension2" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="pension2" value="Si"> Si 
                    <input type="radio" name="pension2" value="No"> No
                  <?php } ?>
                </td>
              </tr>
              <tr>
              <td>
                  <input class="form-control input-sm" style="width: 160px;" type="date" name="fechaenfermedad3" value="<?php echo $en_fecha3 ?>">
                </td>
                <td>
                  <input class="form-control input-sm" style="width: 190px;" type="text" name="empresaenfermedad3" value="<?php echo $en_empresa3 ?>">
                </td>
                <td>
                  <input class="form-control input-sm" style="width: 290px;" type="text" name="diagnostico3" value="<?php echo $diagnostico3 ?>">
                </td>
                <td>
                  <?php if ($arl3=="Si"){ ?>
                    <input type="radio" name="arl3" value="Si" checked> Si 
                    <input type="radio" name="arl3" value="No">No                    
                  <?php }else if($arl3=="No"){ ?>
                    <input type="radio" name="arl3" value="Si"> Si 
                    <input type="radio" name="arl3" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="arl3" value="Si"> Si 
                    <input type="radio" name="arl3" value="No"> No
                  <?php } ?>
                </td>
                <td>
                  <?php if ($reubicacion3=="Si") { ?>
                    <input type="radio" name="reubicacion3" value="Si" checked> Si 
                    <input type="radio" name="reubicacion3" value="No"> No
                  <?php }else if($reubicacion3=="No"){ ?>
                    <input type="radio" name="reubicacion3" value="Si"> Si 
                    <input type="radio" name="reubicacion3" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="reubicacion3" value="Si"> Si 
                    <input type="radio" name="reubicacion3" value="No"> No
                  <?php } ?>
                </td>
                <td>
                  <?php if ($pension3=="Si") { ?>
                    <input type="radio" name="pension3" value="Si" checked> Si 
                    <input type="radio" name="pension3" value="No"> No
                  <?php }else if($pension3=="No"){ ?>
                    <input type="radio" name="pension3" value="Si"> Si 
                    <input type="radio" name="pension3" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="pension3" value="Si"> Si 
                    <input type="radio" name="pension3" value="No"> No
                  <?php } ?>
                </td>
              </tr>
              <!--LISTOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO-->
              <tr>
                <td>
                  <input class="form-control input-sm" style="width: 160px;" type="date" name="fechaenfermedad4" value="<?php echo $en_fecha4 ?>">
                </td>
                <td>
                  <input class="form-control input-sm" style="width: 190px;" type="text" name="empresaenfermedad4" value="<?php echo $en_empresa4 ?>">
                </td>
                <td>
                  <input class="form-control input-sm" style="width: 290px;" type="text" name="diagnostico4" value="<?php echo $diagnostico4 ?>">
                </td>
                <td>
                  <?php if ($arl4=="Si"){ ?>
                    <input type="radio" name="arl4" value="Si" checked> Si 
                    <input type="radio" name="arl4" value="No">No                    
                  <?php }else if($arl4=="No"){ ?>
                    <input type="radio" name="arl4" value="Si"> Si 
                    <input type="radio" name="arl4" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="arl4" value="Si"> Si 
                    <input type="radio" name="arl4" value="No"> No
                  <?php } ?>
                </td>
                <td>
                  <?php if ($reubicacion4=="Si") { ?>
                    <input type="radio" name="reubicacion4" value="Si" checked> Si 
                    <input type="radio" name="reubicacion4" value="No"> No
                  <?php }else if($reubicacion4=="No"){ ?>
                    <input type="radio" name="reubicacion4" value="Si"> Si 
                    <input type="radio" name="reubicacion4" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="reubicacion4" value="Si"> Si 
                    <input type="radio" name="reubicacion4" value="No"> No
                  <?php } ?>
                </td>
                <td>
                  <?php if ($pension4=="Si") { ?>
                    <input type="radio" name="pension4" value="Si" checked> Si 
                    <input type="radio" name="pension4" value="No"> No
                  <?php }else if($reubicacion4=="No"){ ?>
                    <input type="radio" name="pension4" value="Si"> Si 
                    <input type="radio" name="pension4" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="pension4" value="Si"> Si 
                    <input type="radio" name="pension4" value="No"> No
                  <?php } ?>
                </td>
              </tr>
              <tr>
                <td>
                  <input class="form-control input-sm" style="width: 160px;" type="date" name="fechaenfermedad5" value="<?php echo $en_fecha5 ?>">
                </td>
                <td>
                  <input class="form-control input-sm" style="width: 190px;" type="text" name="empresaenfermedad5" value="<?php echo $en_empresa5 ?>">
                </td>
                <td>
                  <input class="form-control input-sm" style="width: 290px;" type="text" name="diagnostico5" value="<?php echo $diagnostico5 ?>">
                </td>
                <td>
                  <?php if ($arl5=="Si"){ ?>
                    <input type="radio" name="arl5" value="Si" checked> Si 
                    <input type="radio" name="arl5" value="No">No                    
                  <?php }else if($arl1=="No"){ ?>
                    <input type="radio" name="arl5" value="Si"> Si 
                    <input type="radio" name="arl5" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="arl5" value="Si"> Si 
                    <input type="radio" name="arl5" value="No"> No
                  <?php } ?>
                </td>
                <td>
                  <?php if ($reubicacion5=="Si") { ?>
                    <input type="radio" name="reubicacion5" value="Si" checked> Si 
                    <input type="radio" name="reubicacion5" value="No"> No
                  <?php }else if($reubicacion5=="No"){ ?>
                    <input type="radio" name="reubicacion5" value="Si"> Si 
                    <input type="radio" name="reubicacion5" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="reubicacion5" value="Si"> Si 
                    <input type="radio" name="reubicacion5" value="No"> No
                  <?php } ?>
                </td>
                <td>
                  <?php if ($pension5=="Si") { ?>
                    <input type="radio" name="pension5" value="Si" checked> Si 
                    <input type="radio" name="pension5" value="No"> No
                  <?php }else if($reubicacion5=="No"){ ?>
                    <input type="radio" name="pension5" value="Si"> Si 
                    <input type="radio" name="pension5" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="pension5" value="Si"> Si 
                    <input type="radio" name="pension5" value="No"> No
                  <?php } ?>
                </td>
              </tr>
	        </tbody>
        </table>
    </div>
  </div>
</div>

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading"><div class="text-center text-info"><label>Habitos Saludables: </label></div></div>
    <div class="panel-body">
      

        <table class="table table-bordered">
          <thead>
            <th class="text-center">Realiza algun deporte:</th>
            <th class="text-center">Cual:</th>
            <th class="text-center">Sedentario:</th>
          </thead>  
          <tbody class="text-center">
              <tr>
                <td>
                  <?php if ($practica_deporte=="Si") { ?>
                    Si <input type="radio" name="deporte" value="Si" checked> / 
                    NO <input type="radio" name="deporte" value="No">
                  <?php }else if($practica_deporte=="No"){ ?>
                    Si <input type="radio" name="deporte" value="Si"> / 
                    NO <input type="radio" name="deporte" value="No" checked>
                  <?php }else{ ?>
                    Si <input type="radio" name="deporte" value="Si"> / 
                    NO <input type="radio" name="deporte" value="No">
                  <?php } ?>
                </td>

                <td>
                  <input type="text" name="ejercicio" class="form-control" value="<?php echo $cuales ?>">
                </td>

                <td>
                  <?php if ($sedentario=="Si") { ?>
                    Si <input type="radio" name="sedentario" value="Si" checked> / 
                    NO <input type="radio" name="sedentario" value="No" >
                  <?php }else if($sedentario=="No"){ ?>
                    Si <input type="radio" name="sedentario" value="Si"> / 
                    NO <input type="radio" name="sedentario" value="No" checked>
                  <?php }else{ ?>
                    Si <input type="radio" name="sedentario" value="Si"> / 
                    NO <input type="radio" name="sedentario" value="No" >
                  <?php } ?>
                </td> 

              </tr>
             </tbody>
               
             <tbody> 
              <thead>
                <th class="text-center">Ejercicio CardioPulmonar:</th>
                <th class="text-center">Otros?:</th>
                <th class="text-center">Frecuencia:</th>
              </thead>  
              <tr class="text-center">
                <td>
                  <?php if ($ejercicio_cardiopulmonar=="Si") { ?>
                    Si <input type="radio" name="depor_cardiopulmonar" value="Si" checked> / 
                    NO <input type="radio" name="depor_cardiopulmonar" value="No">
                  <?php }else if($ejercicio_cardiopulmonar=="No"){ ?>
                    Si <input type="radio" name="depor_cardiopulmonar" value="Si"> / 
                    NO <input type="radio" name="depor_cardiopulmonar" value="No" checked>
                  <?php }else{ ?>
                    Si <input type="radio" name="depor_cardiopulmonar" value="Si"> / 
                    NO <input type="radio" name="depor_cardiopulmonar" value="No">
                  <?php } ?>
                </td>

                <td>
                  <input class="form-control input-sm" type="text" name="cual_deporte" value="<?php echo $ejercicio_otro ?>">
                </td>

                <td>
                  <?php if ($frecuencia_ejercicio=="Diario") { ?>
                    Diario <input type="radio" name="depor_frecuencia" value="Diario" checked> / 
                    Semanal <input type="radio" name="depor_frecuencia" value="Semanal" >
                  <?php }else if($frecuencia_ejercicio=="Semanal"){ ?>
                    Diario <input type="radio" name="depor_frecuencia" value="Diario"> / 
                    Semanal <input type="radio" name="depor_frecuencia" value="Semanal" checked> 
                  <?php }else{ ?>
                    Diario <input type="radio" name="depor_frecuencia" value="Diario"> / 
                    Semanal <input type="radio" name="depor_frecuencia" value="Semanal" >
                  <?php } ?>
                </td> 
              </tr>
          </tbody>
        </table>
   
          </tbody>
        </table>
    </td>    
  </div>  
</div>
</div>


<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading"><div class="text-center text-info"><label>Habitos Toxicos: </label></div></div>
    <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <th class="text-center">Fuma:</th>
            <th class="text-center">Fumador:</th>
            <th class="text-center">Fumador - Años:</th>
            <th class="text-center">EX-Fumador:</th>
            <th class="text-center">Exfumador - Años:</th>
            <th class="text-center">Numero Cigarrillos/Dia:</th>
          </thead>  
	        <tbody class="text-center">
	            <tr>
	            	<td>
                  <?php if ($fuma=="Si") { ?>
                   <input type="radio" name="fuma" value="Si" checked> Si 
                   <input type="radio" name="fuma" value="No"> No
                  <?php }else if($fuma=="No"){ ?>
	          		   <input type="radio" name="fuma" value="Si"> Si 
                   <input type="radio" name="fuma" value="No" checked> No
                  <?php }else{ ?>
                   <input type="radio" name="fuma" value="Si"> Si 
                   <input type="radio" name="fuma" value="No"> No
                  <?php } ?>
                </td>
	            	<td>
                    <?php if ($fumador=="Si") { ?>
                      <input type="radio" name="fumador" value="Si" checked> Si 
                      <input type="radio" name="fumador" value="No"> No
                    <?php }else if($fumador=="No"){ ?>
	          		      <input type="radio" name="fumador" value="Si"> Si 
                      <input type="radio" name="fumador" value="No" checked> No
                    <?php }else{ ?>
                      <input type="radio" name="fumador" value="Si"> Si 
                      <input type="radio" name="fumador" value="No"> No
                    <?php } ?>
                </td>
                <td>
                  <input class="form-control input-sm" type="text" name="anosfumador" value="<?php echo $fumador_anos ?>">
                </td>
	          		<td>
                  <?php if ($exfumador=="Si") { ?>
                   <input type="radio" name="exfumador" value="Si" checked> Si 
                   <input type="radio" name="exfumador" value="No"> No
                  <?php }else if($exfumador=="No"){ ?>
	          		   <input type="radio" name="exfumador" value="Si"> Si 
                   <input type="radio" name="exfumador" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="exfumador" value="Si"> Si 
                    <input type="radio" name="exfumador" value="No"> No
                  <?php } ?>
                </td>
                <td>
	          		 <input class="form-control input-sm" type="text" name="anosexfumador" value="<?php echo $exfumador_anos ?>">
                </td>

	          		<td>
                  <input class="form-control input-sm" type="text" name="cantidad_cigarrillos_dia" value="<?php echo $cant_cigarrillos_dia ?>">
                </td>

	            </tr>
	        </tbody>
        </table>

        <table class="table table-bordered">
          <thead>
            <th>Toma Habitualmente:</th>
            <th>Años de Habito:</th>
            <th colspan="">Frecuencia:</th>
            <th colspan="2">Tipo Licor:</th>
          </thead>  
 	        <tbody>
            <tr>
            	<td>
                <?php if ($beber_habitualmente=="Si") { ?>
                  <input type="radio" name="tomahab" value="Si" checked> Si 
                  <input type="radio" name="tomahab" value="No"> No
                <?php }else if($beber_habitualmente=="No"){ ?>
          		    <input type="radio" name="tomahab" value="Si"> Si 
                  <input type="radio" name="tomahab" value="No" checked> No
                <?php }else{ ?>
                  <input type="radio" name="tomahab" value="Si"> Si 
                  <input type="radio" name="tomahab" value="No"> No
                <?php } ?>                  
              </td>

            	<td>
          		 <input class="form-control input-sm" type="text" name="anoshab_beber" value="<?php echo $anos_habito_beber ?>">
              </td>

          		<td colspan="" style="width: 285px;">
              <?php if ($frecuencia_beber=="Dia") { ?>
              <label>Dia:</label> <input type="radio" name="frec_beber" value="Dia" checked> | 
              <label>Sem:</label> <input type="radio" name="frec_beber" value="Semana"> |
              <label>15:</label> <input type="radio" name="frec_beber" value="Quincenalmente">| 
              <label>30:</label> <input type="radio" name="frec_beber" value="Mensualmente"> | 
              <label>Ocac:</label> <input type="radio" name="frec_beber" value="Ocacionalmente">
              <?php }else if($frecuencia_beber=="Semana"){ ?>
          		<label>Dia:</label> <input type="radio" name="frec_beber" value="Dia"> | 
              <label>Sem:</label> <input type="radio" name="frec_beber" value="Semana" checked> | 
          		<label>15:</label> <input type="radio" name="frec_beber" value="Quincenalmente"> | 
              <label>30:</label> <input type="radio" name="frec_beber" value="Mensualmente"> | 
              <label>Ocac:</label> <input type="radio" name="frec_beber" value="Ocacionalmente">
          		<?php }else if ($frecuencia_beber=="Quincenalmente") { ?>
                <label>Dia:</label> <input type="radio" name="frec_beber" value="Dia"> |
                <label>Sem:</label> <input type="radio" name="frec_beber" value="Semana"> |
                <label>15:</label> <input type="radio" name="frec_beber" value="Quincenalmente" checked> | 
                <label>30:</label> <input type="radio" name="frec_beber" value="Mensualmente"> |
                <label>Ocac:</label> <input type="radio" name="frec_beber" value="Ocacionalmente">
              <?php }else if ($frecuencia_beber=="Mensualmente") { ?>
                <label>Dia:</label> <input type="radio" name="frec_beber" value="Dia"> |
                <label>Sem:</label> <input type="radio" name="frec_beber" value="Semana"> |
                <label>15:</label> <input type="radio" name="frec_beber" value="Quincenalmente"> | 
                <label>30:</label> <input type="radio" name="frec_beber" value="Mensualmente" checked> |
                <label>Ocac:</label> <input type="radio" name="frec_beber" value="Ocacionalmente">
              <?php }else if ($frecuencia_beber=="Ocacionalmente"){ ?>
                <label>Dia:</label> <input type="radio" name="frec_beber" value="Dia"> |
                <label>Sem:</label> <input type="radio" name="frec_beber" value="Semana"> |
                <label>15:</label> <input type="radio" name="frec_beber" value="Quincenalmente"> | 
                <label>30:</label> <input type="radio" name="frec_beber" value="Mensualmente"> |
                <label>Ocac:</label> <input type="radio" name="frec_beber" value="Ocacionalmente" checked>
              <?php }else{ ?>
                <label>Dia:</label> <input type="radio" name="frec_beber" value="Dia"> |
                <label>Sem:</label> <input type="radio" name="frec_beber" value="Semana"> |
                <label>15:</label> <input type="radio" name="frec_beber" value="Quincenalmente"> | 
                <label>30:</label> <input type="radio" name="frec_beber" value="Mensualmente"> |
                <label>Ocac:</label> <input type="radio" name="frec_beber" value="Ocacionalmente">
              <?php } ?>  
              </td>

          		<td colspan="2">
                <input type="text" name="tipolicor" class="form-control" value="<?php echo $tipo_licor ?>">	
              </td>        
            </tr>
            <thead>
              <th>Problemas con Bebidas:</th>
              <th>Cuales?</th>
              <th>Exbebedor:</th>
              <th>Exbebedor - Años:</th>
            </thead>
            <tr>
            	<td>
                <?php if ($problemas_con_bebidas=="Si") { ?>
                  <input type="radio" name="problemasbebidas" value="Si" checked> Si 
                  <input type="radio" name="problemasbebidas" value="No"> No
                <?php }else if($problemas_con_bebidas=="No"){ ?>
          		    <input type="radio" name="problemasbebidas" value="Si"> Si 
                  <input type="radio" name="problemasbebidas" value="No" checked> No
                <?php }else{ ?>
                  <input type="radio" name="problemasbebidas" value="Si"> Si 
                  <input type="radio" name="problemasbebidas" value="No"> No
                <?php } ?>
          		</td>
              <td>
          		  <input class="form-control input-sm" type="text" name="cuales_bebidas" value="<?php echo $cuales_bebidas_problemas ?>">
              </td>

          		<td>
                <?php if ($exbebedor=="Si") { ?>
                  <input type="radio" name="exbebedor" value="Si" checked> Si 
                  <input type="radio" name="exbebedor" value="No"> No
                <?php }else if($exbebedor=="No"){ ?>
          		    <input type="radio" name="exbebedor" value="Si"> Si 
                  <input type="radio" name="exbebedor" value="No" checked> No
                <?php }else{ ?>
                  <input type="radio" name="exbebedor" value="Si"> Si 
                  <input type="radio" name="exbebedor" value="No"> No
                <?php } ?>
          		</td>
              <td> 
          		  <input class="form-control input-sm" type="text" name="exbebedor_anos" value="<?php echo $anos_exbebedor ?>">
              </td>
            </tr>
            <tr>
              <th>Otros Habitos Toxicos:</th>
              <th>¿Cual Habito Toxico?</th>
              <th>Medicamento Regularmente:</th>
              <th>Cual Medicamento:</th>
            </tr>
            <tr>  
          		<td style="width: 200px;">
                <?php if ($otros_habitos_toxicos=="Si") { ?>
                  <input type="radio" name="otroshabitos" value="Si" checked> Si 
                  <input type="radio" name="otroshabitos" value="No"> No
                <?php }else if($otros_habitos_toxicos=="No"){ ?>
          		    <input type="radio" name="otroshabitos" value="Si"> Si 
                  <input type="radio" name="otroshabitos" value="No" checked> No
                <?php }else{ ?>
                  <input type="radio" name="otroshabitos" value="Si"> Si 
                  <input type="radio" name="otroshabitos" value="No"> No
                <?php } ?>
              </td>
              <td>
          		  <textarea type="text" class="form-control input-sm" name="nombre_otrohabito"><?php echo $cuales_habitos_tox ?></textarea>
              </td>
          		<td>
                <?php if ($medicamento_regularmente=="Si") { ?>
                  <input type="radio" name="medic_regularmente" value="Si" checked> Si 
                  <input type="radio" name="medic_regularmente" value="No"> No
                <?php }else if($medicamento_regularmente=="No"){ ?>
          		    <input type="radio" name="medic_regularmente" value="Si"> Si 
                  <input type="radio" name="medic_regularmente" value="No" checked> No
                <?php }else{ ?>
                  <input type="radio" name="medic_regularmente" value="Si"> Si 
                  <input type="radio" name="medic_regularmente" value="No" checked> No
                <?php } ?>                
          		</td>
              <td> 
          		  <textarea type="text" class="form-control input-sm" name="nombre_medicamento"><?php echo $cuales_medicamentos ?></textarea>
          		</td>	          		
            </tr>
	        </tbody>
        </table>


        <table class="table table-bordered">
          <thead>
            <th>Pendiente Cirugias en EPS:</th>
            <th>Cual Cirugia?</th>
            <th>Tratamientos Pendientes:</th>
            <th>Cual Tratamiento?</th>
          </thead>  
	        <tbody>
	            <tr>
	            	<td>
                  <?php if ($cirugias_en_eps=="Si"){ ?>
                    <input type="radio" name="cirugiaseps" value="Si" checked> Si 
                    <input type="radio" name="cirugiaseps" value="No" > No                    
                  <?php }else if ($cirugias_en_eps=="No") { ?>
                    <input type="radio" name="cirugiaseps" value="Si"> Si 
                    <input type="radio" name="cirugiaseps" value="No" checked> No
                  <?php }else{ ?>
	          		    <input type="radio" name="cirugiaseps" value="Si"> Si 
                    <input type="radio" name="cirugiaseps" value="No"> No
                  <?php } ?>
                </td>
                <td>
                 <input class="form-control input-sm" style="width: 180px;" type="text" name="cuales_cirugias" value="<?php echo $cuales_cirugias ?>">
                </td>

	            	<td>
                <?php if ($tratamiento_pendiente=="Si"){ ?>
                  <input type="radio" name="pend_tratamiento" value="Si" checked> Si 
                  <input type="radio" name="pend_tratamiento" value="No"> No                  
                <?php }else if ($tratamiento_pendiente=="No"){ ?>
	          		  <input type="radio" name="pend_tratamiento" value="Si"> Si 
                  <input type="radio" name="pend_tratamiento" value="No" checked> No
                <?php }else{ ?>
                  <input type="radio" name="pend_tratamiento" value="Si"> Si 
                  <input type="radio" name="pend_tratamiento" value="No"> No
                <?php } ?>
                </td>
                <td> 
                  <input class="form-control input-sm" style="width: 180px;" type="text" name="cuales_tratamientos" value="<?php echo $cuales_tratamientos ?>">
                </td>
	            </tr>
              <thead>
                <th>Incapacidad en estos 6 Meses:</th>
                <th colspan="3">Motivo:</th>
              </thead>
              <tr>
                <td>
                  <?php if ($incapacidad_ultimos_meses =="Si"){ ?>
                    <input type="radio" name="incapacidadultimosmeses" value="Si" checked> Si 
                    <input type="radio" name="incapacidadultimosmeses" value="No">No                    
                  <?php }else if($incapacidad_ultimos_meses=="No"){ ?>
                    <input type="radio" name="incapacidadultimosmeses" value="Si"> Si 
                    <input type="radio" name="incapacidadultimosmeses" value="No" checked> No
                  <?php }else{ ?>
                    <input type="radio" name="incapacidadultimosmeses" value="Si"> Si 
                    <input type="radio" name="incapacidadultimosmeses" value="No"> No
                  <?php } ?>
                </td>
                <td colspan="3">
                 <input class="form-control input-sm"  type="text" name="motivo_incapacidad" value="<?php echo $motivo_incapacidad ?>">
                </td>
              </tr>

	        </tbody>
        </table>

    </div>    
  </div>  
</div>
<!--ssssssssssssssssssssssssssssssss-->

<div class="container">
<div class="panel panel-default">
<div class="panel-heading"><div class="text-center text-info"><label>Signos Vitales: </label></div></div>
  <div class="panel-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td><label>Diestro: </label>
                <?php if ($mano_habil=="Diestro") { ?>
                  <input type="radio" name="mano_habil" value="Diestro" checked>
                <?php }else{ ?>
                  <input type="radio" name="mano_habil" value="Diestro">
                <?php } ?>
              </td>

              <td><label> Zurdo: </label>
                <?php if ($mano_habil=="Zurdo") { ?>
                  <input type="radio" name="mano_habil" value="Zurdo" checked>
                <?php }else{ ?>
                  <input type="radio" name="mano_habil" value="Zurdo">
                <?php } ?>
              </td>

              <td><label> Ambidiestro: </label>
                <?php if ($mano_habil=="Ambidiestro") { ?>
                  <input type="radio" name="mano_habil" value="Zurdo" checked>
                <?php }else{ ?>
                  <input type="radio" name="mano_habil" value="Ambidiestro">
                <?php } ?>
              </td>

              <td><label>Cicatrices: </label>
                <?php if ($cicatrices=="Si") { ?>
                  <input type="radio" name="cicatrices" value="Si" checked> Si 
                  <input type="radio" name="cicatrices" value="No"> No
                <?php }else if ($cicatrices=="No") { ?>
                  <input type="radio" name="cicatrices" value="Si"> Si 
                  <input type="radio" name="cicatrices" value="No" checked> No
                <?php }else{ ?>
                  <input type="radio" name="cicatrices" value="Si"> Si 
                  <input type="radio" name="cicatrices" value="No"> No
                <?php } ?>
              </td>

              <td><label>Tatuajes: </label>
                <?php if ($tatuajes=="Si"){ ?>
                  <input type="radio" name="tatuajes" value="Si" checked> Si 
                  <input type="radio" name="tatuajes" value="No"> No                  
                <?php }else if($tatuajes=="No"){ ?>
                  <input type="radio" name="tatuajes" value="Si"> Si 
                  <input type="radio" name="tatuajes" value="No" checked> No
                <?php }else{ ?>
                  <input type="radio" name="tatuajes" value="Si"> Si 
                  <input type="radio" name="tatuajes" value="No"> No
                <?php } ?>
              </td>
            </tr> 
          </tbody>
        </table>

        <table class="table table-bordered">
          <thead>
            <th><label style="font-size: 12px;">Perimetro Abdominal: </label></th>
            <th><label style="font-size: 12px;">Perimetro Toraxico: </label></th>
            <th class="text-center"><label style="font-size: 12px;" >Otras Mediciones:</label>  </th>
          </thead>
          <tbody class="form-inline">
            <tr>
              <td class="text-center">
                <input style="width: 65px;" type="text" name="perimetro_abdominal" class="form-control input-sm" value="<?php echo $perimetro_abdominal ?>">
              </td>

              <td class="text-center">
                <input style="width: 65px;" type="text" name="perimetro_toraxico" class="form-control input-sm" value="<?php echo $perimetro_toraxico ?>">
              </td>

              <td>                  
                <textarea  style="width: 815px;" type="text" name="otras_mediciones" rows="2" class="form-control"><?php echo $otras_mediciones ?></textarea>
              </td>         
            </tr> 
          </tbody>
        </table>

        <table class="table table-bordered">  
	        <tbody>    
	            <tr>
	            	<td>
                  <div class="form-inline"><label>Tension Arterial: </label>
	          		   <input class="form-control input-sm" type="text" style="width: 70px;" name="tensionarterial" value="<?php echo $tension_arterial ?>">
                  </div>
                </td> 

	          		<td>
                  <div class="form-inline"><label> Frecuencia Cardiaca: </label>
	          		   <input class="form-control input-sm" type="text" style="width: 70px;" name="frecuenciacardiaca" value="<?php echo $frecuencia_cardiaca ?>">
                  </div>
                </td> 

	          		<td>
                  <div class="form-inline"><label> Frecuencia Respiratoria: </label>
	          		   <input class="form-control input-sm" type="text" style="width: 70px;" name="frecuenciarespiratoria" value="<?php echo $frecuencia_respiratoria ?>">
                  </div>
                </td>

	          		<td>
                  <div class="form-inline"><label> Talla: </label>
	          		   <input class="form-control input-sm" type="text" style="width: 70px;" name="talla" value="<?php echo $talla ?>">
                  </div> 
                </td>

                <td>
                  <div class="form-inline"><label>Peso: </label>
                    <input class="form-control input-sm" type="text" style="width: 70px;" name="peso" value="<?php echo $Peso ?>" >
                  </div>
                </td>
	            </tr>
	            <tr class="text-center">
	          		<td><label>Peso Adecuado: </label>
                  <?php if ($peso_diagnostico=="Peso Adecuado"){ ?>
                   <input type="radio" name="pesodiagnostico" value="Peso Adecuado" checked> Si
                  <?php }else{ ?>
	          		   <input type="radio" name="pesodiagnostico" value="Peso Adecuado"> Si
                  <?php } ?>
                </td>  

	          		<td><label> Peso Bajo: </label>
                  <?php if ($peso_diagnostico=="Peso Bajo"){ ?>
                   <input type="radio" name="pesodiagnostico" value="Peso Bajo" checked> Si 
                  <?php }else{ ?>
	          		   <input type="radio" name="pesodiagnostico" value="Peso Bajo"> Si 
                  <?php } ?>
                </td>

	          		<td><label>Sobrepeso: </label>
                  <?php if ($peso_diagnostico=="Sobrepeso"){ ?>
                   <input type="radio" name="pesodiagnostico" value="Sobrepeso" checked> Si 
                  <?php }else{ ?>
	          		   <input type="radio" name="pesodiagnostico" value="Sobrepeso"> Si
                  <?php } ?>  

	          		<td colspan="2"><label>Obesidad: </label>
                  <?php if ($peso_diagnostico=="Obesidad") { ?>
                   <input type="radio" name="pesodiagnostico" value="Sobrepeso" checked> Si 
                  <?php }else{ ?>
	          		   <input type="radio" name="pesodiagnostico" value="Obesidad"> Si 
                  <?php } ?> 
	            </tr>
	        </tbody>
        </table>
    </div>
  </div> 
</div><!--container-->

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading"><div class="text-center"><label>Informacion Suministrada por la empresa</label></div></div>
    <div class="panel-body">
      <div class="text-center"><label>Riesgos Laborales a Exponerse:</label></div>
      <div><label>Suministrados:</label>
        <?php if ($riesgos_suministrados=="Si"){ ?>
          Si <input type="radio" name="riesgos_suministrado" value="Si" checked> / 
          No <input type="radio" name="riesgos_suministrado" value="No">
        <?php }else if($riesgos_suministrados=="No"){ ?> 
          Si <input type="radio" name="riesgos_suministrado" value="Si"> / 
          No <input type="radio" name="riesgos_suministrado" value="No" checked>
        <?php }else{ ?>
          Si <input type="radio" name="riesgos_suministrado" value="Si"> / 
          No <input type="radio" name="riesgos_suministrado" value="No">
        <?php } ?>
      </div><br>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center">Fisico</th>
            <th class="text-center">Mecanico</th>
            <th class="text-center">Quimico</th>
            <th class="text-center">Psicosocial</th>
            <th class="text-center">Biologico</th>
            <th class="text-center">Electrico</th>
            <th class="text-center">Ergonomico</th>
            <th class="text-center">Otro</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td>
              <?php if ($suministrado_fisico =="Si"){ ?>
                <input type="checkbox" name="suministrado_fisico" value="Si" checked>
              <?php }else{ ?>
                <input type="checkbox" name="suministrado_fisico" value="Si">
              <?php } ?>
            </td>
            <td>
              <?php if ($suministrado_mecanico=="Si") { ?>
                <input type="checkbox" name="suministrado_mecanico" value="Si" checked>
              <?php }else{ ?>
                <input type="checkbox" name="suministrado_mecanico" value="Si">
              <?php } ?>
            </td>
            <td>
              <?php if ($suministrado_quimico=="Si") { ?>
                <input type="checkbox" name="suministrado_quimico" value="Si" checked>
              <?php }else{ ?>
                <input type="checkbox" name="suministrado_quimico" value="Si">
              <?php } ?>
            </td>
            <td>
              <?php if ($suministrado_psicosocial=="Si") { ?>
                <input type="checkbox" name="suministrado_psicosocial" value="Si" checked>
              <?php }else{ ?>
                <input type="checkbox" name="suministrado_psicosocial" value="Si">
              <?php } ?>
            </td>
            <td>
              <?php if ($suministrado_biologico=="Si") { ?>
                <input type="checkbox" name="suministrado_biologico" value="Si" checked>
              <?php }else{ ?>
                <input type="checkbox" name="suministrado_biologico" value="Si">
              <?php } ?>
            </td>
            <td>
              <?php if ($suministrado_electrico=="Si") { ?>
                <input type="checkbox" name="suministrado_electrico" value="Si" checked>
              <?php }else{ ?>
                <input type="checkbox" name="suministrado_electrico" value="Si">
              <?php } ?>
            </td>
            <td>
              <?php if ($suministrado_ergonomico =="Si"){ ?>
                <input type="checkbox" name="suministrado_ergonomico" value="Si" checked>    
              <?php }else{ ?>  
                <input type="checkbox" name="suministrado_ergonomico" value="Si">
              <?php } ?>
            </td>
            <td>
              <input type="text" name="suministrado_otro" class="form-control input-sm" value="<?php echo $suministrado_otro ?>">
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

    <div class="text-center">
      <br>
      <input type="submit" name="Actualizar" value="Actualizar" class="btn btn-success">
      <br><br>
    </div>

<?php 
  }//fin while 

  }else{//fin mysql_rows 
    echo '<script>
    $(document).ready(function(){
      $("#mostrarmodal").modal("show");
    });</script>'; 
  }
  ?>
    

    

  </form>
  </body>

  
<!--Error de usuario no registrado o incorrecto-->
<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" onClick="window.location.href='administracion_search.php';">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button onClick="window.location.href='administracion_search.php';" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="text-danger"><span class="glyphicon glyphicon-warning-sign"></span> ERROR.</h4>
      </div>
      <div class="modal-body">
        <h4 class="text-primary">El Usuario con Indentificacion Nº <label class="text-danger"><?php echo $id; ?></label> No presenta Examen Registrado en el Sistema Concerniente al Area de Enfermeria.</h4> <p>Cerciorarse de que el Paciente fue atendido en dicha fecha por el Area.</p>    
      </div>
      <div class="modal-footer">
        <a onClick="window.location.href='administracion_search.php';" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

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
