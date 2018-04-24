<?php
 include ('includes/conexion.php');
 include ('bar/navbar_recepcion.php'); 
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Captura de Fotos</title>
    <script src='http://escalantecreativo.com/js/jQuery-v1.11.0.js'></script>
    <style>
      #save-photo-result,#save_photo,#again,#video-recorder-holder, #canvas-recorder,#camara-no-activa{display:none;}
      .g {
        padding-left: 0;
        padding-right: 0;
        margin-left: auto;
        margin-right: auto;
        display: block;
        width: 520px;
      }
      .border { border-style: solid; border-width: 4px; height: 393px; }
    </style>

    <script>
      function save_image_ajax(){
      var url="recepcion_guardar_foto.php"; //
      $('#save_upload_images').show();
      $('#save_photo').prop('disabled', true );
      $('#again').prop('disabled', true );
      $.ajax({   
        type: 'POST',
        url:url,
        //Enviamos el formulario via serialize
        data: $('#take_photo_form_cliente').serialize(),
        success: function(datos){    
          if(datos==1){
            alert('Foto almacenada correctamente');
            location.href ="recepcion_pacientes.php";
          }
          else{
            alert('Error al guardar la foto');
            location.href ="recepcion_pacientes.php";
          }
        }
      });
      }
    </script>
  </head> 
  <body>
  <script type='text/javascript'>
    //Nos aseguramos que estén definidas algunas funciones básicas
    video		= 	$('#video-recorder');
    canvas		=	$('#canvas-recorder');
    window.URL 	= 	window.URL || window.webkitURL;
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || function(){alert('Su navegador no soporta navigator.getUserMedia().');};

    $(document).ready(function(){
      //Este objeto guardará algunos datos sobre la cámara
      window.datosVideo = {
      'StreamVideo': null,
      'url' : null
      };

      //Solicitar acceso al dispositivo de la camara
      navigator.getUserMedia({'audio':false, 'video':true}, function(streamVideo){
          datosVideo.StreamVideo = streamVideo;
          datosVideo.url = window.URL.createObjectURL(streamVideo);
          $('#video-recorder').attr('src', datosVideo.url);
        if (navigator.getUserMedia){
          $('#video-recorder-holder').fadeIn('fast');
        }else{
          var vendorURL = window.URL || window.webkitURL;
          video.src = vendorURL.createObjectURL(streamVideo);
          $('#video-recorder-holder').fadeIn('fast');
        }
      },function(){
        $('#video-recorder-holder').fadeOut('fast');
        $('#camara-no-activa').fadeIn('fast');
        console.log('An error occured! ' + err);
      });

      $('#startbutton').click(function(e){
        e.preventDefault();
        $('#startbutton').hide('fast');
        $('#again').show('fast');
        $('#save_photo').show('fast');
        $('#video-recorder').hide('fast');
        $('#canvas-recorder').fadeIn('500');
        var oCamara, oFoto,	oContexto,	w=320, h=0;
        oCamara = $('#video-recorder');
        oFoto 	= $('#canvas-recorder');
        oFotoI 	= document.getElementById('canvas-recorder');

        w = oCamara.width();
        h	= oCamara.height();

        oFoto.attr({'width': w, 'height': h});
        oContexto = oFoto[0].getContext('2d');
        oContexto.drawImage(oCamara[0], 0, 0, w, h);
        var dataURL	=	oFotoI.toDataURL('image/png');
        oFoto.attr('src',dataURL);
        $('#image-content').val(dataURL);
      });

      $('#again').click(function(e){
        e.preventDefault();
        $('#startbutton').show('fast');
        $('#again').hide('fast');
        $('#save_photo').hide('fast');
        $('#video-recorder').fadeIn('fast');
        $('#canvas-recorder').hide('fast');
      });
    });
  </script>


  <?php   
    //Obtenemos El Ultimo ID Insertado
    $ver = "SELECT * FROM datos_basicos 
    JOIN datos_complementarios ON datos_complementarios.id = datos_basicos.fk_d_complementario
    ORDER BY datos_basicos.id_historia DESC limit 0,1";
    $query = mysqli_query($conexion,$ver);

    if(mysqli_num_rows($query) > 0){ 

      while($data=mysqli_fetch_array($query)){

        /*$numero_historia = $data['id_historia'];
        $numero_documento = $data['numero_documento'];
        $nombres_apellidos= $data['nombres_apellidos'];
        $motivo_evaluacion = $data['motivo_evaluacion'];
        $fecha = $data['fecha'];
        $hora= $data['hora'];*/
    
  ?>

  <div class="container">
    <div class="panel panel-default" >
      <div class="g">
        <!-- <article itemscope='' itemtype='http://schema.org/BlogPosting' class='post tag-irc tag-terminal tag-weechat tag-hide tag-buffer tag-bar tag-status tag-nicklist tag-title post-excerpt'> -->
        <header class='post-header'>
          <h2 itemprop='name'>
            <div class="bg-primary text-center"><label>Capturar Foto De Paciente</label></div>
          </h2>
          <div id='save-photo-result' style='width:100%;'></div>
        </header>
        <article>
          <section itemprop='description' class='post-content'>
            <div id='video-recorder-holder'>
              <video id='video-recorder' autoplay width='520' height='440' class="border"></video>
              <form id='take_photo_form_cliente' method='post' action='take_photo_chat_ajax.php' enctype='multipart/form-data' >
                <input type="text" name="historia" id="historia" value="<?php echo $data['id_historia']; ?>" style="display: none;">
                <canvas id='canvas-recorder' src='' ></canvas>
                <input type='hidden' name='image-content' id='image-content'>
              </form>
              <div style='display:inline-block;margin-bottom:80px;'>
                <center><img id='save_upload_images' src='img/ajax-loader.gif' style='display:none;'></center>

                <button class='btn btn-primary text-center' id='startbutton' role='button' style='width:100%;'><i class=\"fa fa-camera fa-lg\" style='float:left;margin-left:211px;margin-right:287px;color:#FFF;'></i>Tomar Foto</button>
                <!-- <button class='btn btn-primary' id='save_photo' role='button' style='width:100%;' onclick="save_image_ajax();"><i class=\"fa fa-cloud-upload fa-lg\" style='float:left;margin-left:10px;margin-right:10px;color:#FFF;'></i>Subir Foto</button><br> -->
                <button class='btn btn-primary text-center' id='save_photo' role='button' style='width:100%;' onclick="save_image_ajax();"><i class=\"fa fa-cloud-upload fa-lg\" style='float:left;margin-left:211px;margin-right:287px;color:#FFF;'></i>Subir Foto</button>
                <br>

                <button class='btn btn-primary' id='again' role='button' style='background:ORANGE;width:100%;'><i class=\"fa fa-refresh fa-lg\" style='float:left;margin-left:287px;margin-right:211px;color:#FFF;'></i>Probar de Nuevo</button>
              </div>
            </div>
            <div id='camara-no-activa'><span style='color:RED;'>Camara No activa</span></div>
          </section>
        </article>
        </div>

        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center">N° Historia</th>
              <th class="text-center">N° Documento</th>
              <th class="text-center">Nombres-Apellidos</th>
              <th class="text-center">Motivo Evaluacion</th>
              <th class="text-center">Fecha</th>
              <th class="text-center">Hora</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <tr>
              <td><?php echo $data['id_historia']; ?></td>
              <td><?php echo $data['numero_documento']; ?></td>
              <td><?php echo $data['nombres_apellidos']; ?></td>
              <td><?php echo $data['motivo_evaluacion']; ?></td>
              <td><?php echo $data['fecha']; ?></td>
              <td><?php echo $data['hora']; ?></td>
            </tr>
          </tbody>
        </table>


        <?php 
          }//while
          }//rows
        ?> 

      </div>
    </div>
  </div><!-- container -->
  </body>
</html>

 