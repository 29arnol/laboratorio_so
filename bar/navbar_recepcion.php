 <?php
  session_start();
    if(isset($_SESSION['usuario']) and $_SESSION['rol']==1){
    $nombres = $_SESSION['nombre_completo'];
    $nick = $nombres;    
  }else{
    session_destroy();
    header('Location: index.php'); 
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>RECEPCION</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="bar/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="bar/css/fontawesome.min.css"> -->
  <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">  -->
  <link rel="stylesheet" type="text/css" href="bar/css/estilo.css">
  <!-- JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.12/js/all.js" integrity="sha384-Voup2lBiiyZYkRto2XWqbzxHXwzcm4A5RfdfG6466bu5LqjwwrjXCMBQBLMWh7qR" crossorigin="anonymous"></script> 
  <script src="bar/js/jquery-3.2.1.min.js"></script>
  <script src="bar/js/bootstrap.min.js"></script>
  <script src="bar/js/popper.min.js"></script>  
  <!--   <script src="bar/js/jquery-3.3.1.slim.min.js"></script> -->
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="recepcion_citas.php">LABORATORIO SST</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav navbar-left">
      <li class="nav-item">
        <a class= "nav-link" href="recepcion_citas.php"><span class="fas fa-notes-medical"></span> CITAS</a>
      </li>
      <li class="nav-item">
        <a class= "nav-link" target="_blank" href="recepcion_validarpaciente.php"><span class="fa fa-user-plus"></span> REGISTRAR PACIENTE</a>
      </li>
      <li class="nav-item">
        <a class= "nav-link" target="_blank" href="recepcion_consultarpaciente.php"><span class="fa fa-search"></span> 
         CONSULTAR</a>
      </li>
      <li class="dropdown nav-item">
        <a class="dropdown-toggle nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#"><span class="fa fa-list-ol"></span> MENU
        <span class="caret"></span></a>

        <ul class="dropdown-menu ground" id="mouseover">
          <li class="nav-item">
            <a class= "dropdown-item size_font" target="_blank" href="recepcion_registrarequipo.php"><span class="fa fa-microchip"></span> REGISTRAR EQUIPOS DE LABORATORIO</a>

            <a class= "dropdown-item size_font" target="_blank" href="recepcion_consultarequipos.php"><span class="fa fa-search"></span> CONSULTAR EQUIPOS DE LABORATORIO</a>
            <a class= "dropdown-item size_font" target="_blank" href="recepcion_consultarequiposprestados.php"><span class="fa fa-search"></span> CONSULTAR EQUIPOS PRESTADOS</a>
          </li>
        </ul>
      </li> 
    </ul>
  </div>
  <span class=" my-2 my-sm-0  navbar-nav" >
    <li class="dropdown nav-item">
      <a class="dropdown-toggle nav-link" id= "navbarDropdownMenuLink"   data-toggle="dropdown" href="#"><span class="fa fa-user-circle"></span>  <?php echo strtoupper($nick); ?>
      <span class="caret"></span></a>
      <ul class="dropdown-menu ground">
        <li class="nav-item">
          <a class= "dropdown-item size_font" href="logout.php">CERRAR SESION <span class="fa fa-power-off"></span></a>
        </li>
      </ul>
    </li> 
  </span>
</nav>
<script>
  $(function(){//eventos de Mouse
    //evento colocar mouse sobre el elemento de id menu
    $('#mouseover').mouseover(function(){
      $('#mouseover').addClass('dropdown open').removeClass('dropdown');
    });
    $('#mouseover').mouseleave(function(){
      $('#mouseover').addClass('dropdown').removeClass('dropdown open');
    });
  });



  $(document).ready(function(){
    $("pp").hide();//default

      $(".btn1").click(function(){
          $("dl").slideUp();
      });
      $(".btn2").click(function(){
          $("dl").slideDown();
      });
  }); 
</script>
</html>





