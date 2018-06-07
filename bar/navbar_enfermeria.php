<?php
  session_start();
  if(isset($_SESSION['usuario']) and $_SESSION['rol']==2){
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
  <title>Enfermeria</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="bar/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="bar/css/fontawesome.min.css"> -->
  <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">  -->
  <script defer src="https://use.fontawesome.com/releases/[VERSION]/js/all.js"></script>
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
  <a class="navbar-brand" href="enfermeria_citas.php">LABORATORIO SST</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav navbar-left">
      <li class="nav-item">
        <a class= "nav-link" href="enfermeria_citas.php"><span class="fas fa-notes-medical"></span> CITAS</a>
      </li>
      <li class="nav-item">
        <a class= "nav-link" target="_blank" href="enfermeria_validarpaciente.php"><span class="fa fa-file-medical"></span> REGISTRAR EXAMEN</a>
      </li>
      <li class="nav-item">
        <a class= "nav-link" target="_blank" href="enfermeria_listarpacientes.php"><span class="fa fa-search"></span> 
         CONSULTAR</a>
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
      $('#menu').mouseover(function(){
        $('#menu').addClass('dropdown open').removeClass('dropdown');
      });
      $('#menu').mouseleave(function(){
        $('#menu').addClass('dropdown').removeClass('dropdown open');
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




