<?php 
include ("includes/conexion.php");

session_start();


if (isset($_POST['user']) && !empty ($_POST['user']) && isset($_POST['password']) && !empty ($_POST['password'])){

	$user = $_POST['user'];
	$pas = $_POST['password'];
	$tipo_rol = $_POST['tiporol'];

	$user = mysqli_real_escape_string($conexion,$user);
	$pas = mysqli_real_escape_string($conexion,$pas);

	

	//$user = $conexion->real_escape_string($user);	
	//$pas = $conexion->real_escape_string($pas);

	//---------------recepcion---------
	if ($tipo_rol==1) {

		$existe = "SELECT * FROM usuarios WHERE usuario = '".$user."' ";
		$result = mysqli_query($conexion,$existe);

		while($row=mysqli_fetch_array($result)){  
			$documento = $row ['ndocumento'];
			$rol = $row ['rol'];
			$nombre = $row ['nombre_completo'];
			$nombre_c = $nombre;
		}

		if (mysqli_num_rows($result)>0){

			$query = "SELECT * FROM usuarios WHERE usuario = '".$user."' and contrasena = '".$pas."'";
			$con = mysqli_query($conexion,$query);

				if ($con){
					
					if (mysqli_num_rows($con) > 0){
						//cuenta el numero de filas de la consulta			
						$query2 = mysqli_fetch_array ($con); 
						
						$_SESSION ['usuario'] = $query2['usuario'];
						$_SESSION ['contrasena'] = $query2['contrasena'];
						$_SESSION ['idusuario'] = $query2['idusuario'];
						$_SESSION ['nombre_completo'] = $query2['nombre_completo'];
						/*$_SESSION ['apellidos'] = $query2['apellidos'];*/
						$_SESSION ['idusuario'] = $query2['idusuario'];
						$_SESSION ['rol'] = $query2['rol'];
						$_SESSION ['ndocumento']= $query2 ['ndocumento'];
						$usuario = $query2['usuario'];
						$_SESSION ['usuario'] = $query2['usuario'];
									
						switch ($rol==1){
						 	case 1:
				         	echo "<script>window.location = 'recepcion_citas.php'</script>";
				         	break;
						}		
						
					}else{
						
						echo "<script>alert('Datos de usuario Incorrectos')</script>";
						echo "<script>window.location = 'index.php'</script>";
						
						}//If Si Con trae algo
					
				}//if de CON
			   	   
			}elseif(mysqli_num_rows($result)==0){
			  echo "<script>alert('Datos de usuario Incorrectos')</script>";
			  echo "<script>window.location = 'index.php'</script>";
			}//If del 1er Num_Rows
			
			echo "<script>alert('Datos de usuario Incorrectos')</script>";
			echo "<script>window.location = 'index.php'</script>";
	}
	//---------------enfermeria---------
	if ($tipo_rol==2) {

		$existe = "SELECT * FROM usuarios WHERE usuario = '".$user."'";
		$result = mysqli_query($conexion,$existe);

		while($row=mysqli_fetch_array($result)){  
			$documento = $row ['ndocumento'];
			$rol = $row ['rol'];

			$nombre = $row ['nombre_completo'];
			$nombre_c = $nombre;
		}

		if (mysqli_num_rows($result)>0){

			$query = "SELECT * FROM usuarios WHERE usuario = '".$user."' and contrasena = '".$pas."'";

			$con = mysqli_query($conexion,$query);

			if ($con){
				
				if (mysqli_num_rows($con) > 0){
					//cuenta el numero de filas de la consulta
					
					$query2 = mysqli_fetch_array ($con); 
					
					$_SESSION ['usuario'] = $query2['usuario'];
					$_SESSION ['contrasena'] = $query2['contrasena'];
					$_SESSION ['idusuario'] = $query2['idusuario'];
					$_SESSION ['nombre_completo'] = $query2['nombre_completo'];
					/*$_SESSION ['apellidos'] = $query2['apellidos'];*/
					$_SESSION ['idusuario'] = $query2['idusuario'];
					$_SESSION ['rol'] = $query2['rol'];
					$_SESSION ['ndocumento']= $query2 ['ndocumento'];
					$usuario = $query2['usuario'];
					$_SESSION ['usuario'] = $query2['usuario'];
										
					switch ($rol){
					 	case 2:
			         	echo "<script>window.location = 'enfermeria_citas.php'</script>";
			         	break;
					}							
				}else{					
					echo "<script>alert('Datos de usuario Incorrectos')</script>";
					echo "<script>window.location = 'index.php'</script>";					
				}//If Si Con trae algo				
			}//if de CON			   	   
		}elseif(mysqli_num_rows($result)==0){
			echo "<script>alert('Datos de usuario Incorrectos')</script>";
			echo "<script>window.location = 'index.php'</script>";
		}//If del 1er Num_Rows
			echo "<script>alert('Datos de usuario Incorrectos')</script>";
			echo "<script>window.location = 'index.php'</script>";
	}
	//---------------Audiometria---------
	if ($tipo_rol==3) {

		$existe = "SELECT * FROM usuarios WHERE usuario = '".$user."'";
		$result = mysqli_query($conexion,$existe);

		while($row=mysqli_fetch_array($result)){  
			$documento = $row ['ndocumento'];
			$rol = $row ['rol'];
			$nombre = $row ['nombre_completo'];
			$nombre_c = $nombre;
		}


		if (mysqli_num_rows($result)>0){

			$query = "SELECT * FROM usuarios WHERE usuario = '".$user."' and contrasena = '".$pas."'";
			$con = mysqli_query($conexion,$query);

			if ($con){
				
				if (mysqli_num_rows($con) > 0){
					//cuenta el numero de filas de la consulta
					$query2 = mysqli_fetch_array ($con); 
					
					$_SESSION ['usuario'] = $query2['usuario'];
					$_SESSION ['contrasena'] = $query2['contrasena'];
					$_SESSION ['idusuario'] = $query2['idusuario'];
					$_SESSION ['nombre_completo'] = $query2['nombre_completo'];
					/*$_SESSION ['apellidos'] = $query2['apellidos'];*/
					$_SESSION ['idusuario'] = $query2['idusuario'];
					$_SESSION ['rol'] = $query2['rol'];
					$_SESSION ['ndocumento']= $query2 ['ndocumento'];
					$usuario = $query2['usuario'];
					$_SESSION ['usuario'] = $query2['usuario'];
										
					switch ($rol){
						case 3:
				         	echo "<script>window.location = 'audiometria_citas.php'</script>";
				        break;
					}		
					
				}else{					
					echo "<script>alert('Datos de usuario Incorrectos')</script>";
					echo "<script>window.location = 'index.php'</script>";		
				}//If Si Con trae algo				
			}//if de CON
		   	   
	   	}elseif(mysqli_num_rows($result)==0){
		  	echo "<script>alert('Datos de usuario Incorrectos')</script>";
		  	echo "<script>window.location = 'index.php'</script>";
	   	}//If del 1er Num_Rows
			echo "<script>alert('Datos de usuario Incorrectos')</script>";
			echo "<script>window.location = 'index.php'</script>";
	}

	//---espirometria---
	if ($tipo_rol==4) {

			$existe = "SELECT * FROM usuarios WHERE usuario = '".$user."'";
			$result = mysqli_query($conexion,$existe);

			while($row=mysqli_fetch_array($result)){  
				$documento = $row ['ndocumento'];
				$rol = $row ['rol'];
				$nombre = $row ['nombre_completo'];
				$nombre_c = $nombre;
			}


		if (mysqli_num_rows($result)>0){

			$query = "SELECT * FROM usuarios WHERE usuario = '".$user."' and contrasena = '".$pas."'";

			$con = mysqli_query($conexion,$query);

			if ($con){
				
				if (mysqli_num_rows($con) > 0){
					//cuenta el numero de filas de la consulta
					$query2 = mysqli_fetch_array ($con); 
					
					$_SESSION ['usuario'] = $query2['usuario'];
					$_SESSION ['contrasena'] = $query2['contrasena'];
					$_SESSION ['idusuario'] = $query2['idusuario'];
					$_SESSION ['nombre_completo'] = $query2['nombre_completo'];
					//$_SESSION ['apellidos'] = $query2['apellidos'];
					$_SESSION ['idusuario'] = $query2['idusuario'];
					$_SESSION ['rol'] = $query2['rol'];
					$_SESSION ['ndocumento']= $query2 ['ndocumento'];
					$usuario = $query2['usuario'];
					$_SESSION ['usuario'] = $query2['usuario'];
					
					switch ($rol){
						case 4:
				         	echo "<script>window.location = 'espirometria_citas.php'</script>";
				        break;
					}		
					
				}else{
					echo "<script>alert('Datos de usuario Incorrectos')</script>";
					echo "<script>window.location = 'index.php'</script>";				
				}//If Si Con trae algo	
			}//if de CON
			   	   
		}elseif(mysqli_num_rows($result)==0){
			echo "<script>alert('Datos de usuario Incorrectos')</script>";
			echo "<script>window.location = 'index.php'</script>";
		}//If del 1er Num_Rows
			echo "<script>alert('Datos de usuario Incorrectos')</script>";
			echo "<script>window.location = 'index.php'</script>";
	}
	//---visiometria---
	if ($tipo_rol==5) {
		$existe = "SELECT * FROM usuarios WHERE usuario = '".$user."'";
		$result = mysqli_query($conexion,$existe);

		while($row=mysqli_fetch_array($result)){  
			$documento = $row ['ndocumento'];
			$rol = $row ['rol'];
			$nombre = $row ['nombre_completo'];
			$nombre_c = $nombre;
		}

		if (mysqli_num_rows($result)>0){

			$query = "SELECT * FROM usuarios WHERE usuario = '".$user."' and contrasena = '".$pas."'";
			$con = mysqli_query($conexion,$query);

			if ($con){			
				if (mysqli_num_rows($con) > 0){
					//cuenta el numero de filas de la consulta
					
					$query2 = mysqli_fetch_array ($con); 
					
					$_SESSION ['usuario'] = $query2['usuario'];
					$_SESSION ['contrasena'] = $query2['contrasena'];
					$_SESSION ['idusuario'] = $query2['idusuario'];
					$_SESSION ['nombre_completo'] = $query2['nombre_completo'];
					/*$_SESSION ['apellidos'] = $query2['apellidos'];*/
					$_SESSION ['idusuario'] = $query2['idusuario'];
					$_SESSION ['rol'] = $query2['rol'];
					$_SESSION ['ndocumento']= $query2 ['ndocumento'];
					$usuario = $query2['usuario'];
					$_SESSION ['usuario'] = $query2['usuario'];
					
					switch ($rol){
					 	case 5:
			         		echo "<script>window.location = 'visiometria_citas.php'</script>";
			         	break;
					}			
				}else{
					echo "<script>alert('Datos de usuario Incorrectos')</script>";
					echo "<script>window.location = 'index.php'</script>";				
				}//If Si Con trae algo		
			}//if de CON
		   	   
	   	}elseif(mysqli_num_rows($result)==0){
		  	echo "<script>alert('Datos de usuario Incorrectos')</script>";
		  	echo "<script>window.location = 'index.php'</script>";
	   	}//If del 1er Num_Rows
			echo "<script>alert('Datos de usuario Incorrectos')</script>";
			echo "<script>window.location = 'index.php'</script>";
	}
	//---medico---
	if ($tipo_rol==6) {

		$existe = "SELECT * FROM usuarios WHERE usuario = '".$user."'";
		$result = mysqli_query($conexion,$existe);

		while($row=mysqli_fetch_array($result)){  
			$documento = $row ['ndocumento'];
			$rol = $row ['rol'];
			$nombre = $row ['nombre_completo'];
			$nombre_c = $nombre;
		}


		if (mysqli_num_rows($result)>0){

			$query = "SELECT * FROM usuarios WHERE usuario = '".$user."' and contrasena = '".$pas."'";
			$con = mysqli_query($conexion,$query);

			if ($con){
				
				if (mysqli_num_rows($con) > 0){
					//cuenta el numero de filas de la consulta
					
					$query2 = mysqli_fetch_array ($con); 
					
					$_SESSION ['usuario'] = $query2['usuario'];
					$_SESSION ['contrasena'] = $query2['contrasena'];
					$_SESSION ['idusuario'] = $query2['idusuario'];
					$_SESSION ['nombre_completo'] = $query2['nombre_completo'];
					//$_SESSION ['apellidos'] = $query2['apellidos'];
					$_SESSION ['idusuario'] = $query2['idusuario'];
					$_SESSION ['rol'] = $query2['rol'];
					$_SESSION ['ndocumento']= $query2 ['ndocumento'];
					$usuario = $query2['usuario'];
					$_SESSION ['usuario'] = $query2['usuario'];

					switch ($rol){
						case 6:
				         	echo "<script>window.location = 'medico_citas.php'</script>";
				        break;
					}		
					
				}else{			
					echo "<script>alert('Datos de usuario Incorrectos')</script>";
					echo "<script>window.location = 'index.php'</script>";				
				}//If Si Con trae algo		
			}//if de CON	   	   
	   	}elseif(mysqli_num_rows($result)==0){
		  	echo "<script>alert('Datos de usuario Incorrectos')</script>";
		  	echo "<script>window.location = 'index.php'</script>";
	   	}//If del 1er Num_Rows
			echo "<script>alert('Datos de usuario Incorrectos')</script>";
			echo "<script>window.location = 'index.php'</script>";
	}
	//-----psicologia--

	if ($tipo_rol==7) {

		$existe = "SELECT * FROM usuarios WHERE usuario = '".$user."'";
		$result = mysqli_query($conexion,$existe);

		while($row=mysqli_fetch_array($result)){  
			$documento = $row ['ndocumento'];
			$rol = $row ['rol'];
			$nombre = $row ['nombre_completo'];
			$nombre_c = $nombre;
		}

		if(mysqli_num_rows($result)>0){

			$query = "SELECT * FROM usuarios WHERE usuario = '".$user."' and contrasena = '".$pas."'";
			$con = mysqli_query($conexion,$query);

			if($con){
				
				if (mysqli_num_rows($con) > 0){
					//cuenta el numero de filas de la consulta

					$query2 = mysqli_fetch_array ($con); 
					
					$_SESSION ['usuario'] = $query2['usuario'];
					$_SESSION ['contrasena'] = $query2['contrasena'];
					$_SESSION ['idusuario'] = $query2['idusuario'];
					$_SESSION ['nombre_completo'] = $query2['nombre_completo'];
					//$_SESSION ['apellidos'] = $query2['apellidos'];
					$_SESSION ['idusuario'] = $query2['idusuario'];
					$_SESSION ['rol'] = $query2['rol'];
					$_SESSION ['ndocumento']= $query2 ['ndocumento'];
					$usuario = $query2['usuario'];
					$_SESSION ['usuario'] = $query2['usuario'];
							
					switch ($rol){
					 	case 7:
			         		echo "<script>window.location = 'psicologia_citas.php'</script>";
			         	break;
					}							
				}else{
					echo "<script>alert('Datos de usuario Incorrectos')</script>";
					echo "<script>window.location = 'index.php'</script>";				
				}//If Si Con trae algo	
			}//if de CON
		   	   
		}elseif(mysqli_num_rows($result)==0){
			echo "<script>alert('Datos de usuario Incorrectos')</script>";
			echo "<script>window.location = 'index.php'</script>";
		}//If del 1er Num_Rows
			echo "<script>alert('Datos de usuario Incorrectos')</script>";
			echo "<script>window.location = 'index.php'</script>";
	}
	//---higiene--
	if($tipo_rol==8) {

		$existe = "SELECT * FROM usuarios WHERE usuario = '".$user."'";
		$result = mysqli_query($conexion,$existe);


		while($row=mysqli_fetch_array($result)){  
			$documento = $row ['ndocumento'];
			$rol = $row ['rol'];
			$nombre = $row ['nombre_completo'];
			$nombre_c = $nombre;
		}


		if(mysqli_num_rows($result)>0){

			$query = "SELECT * FROM usuarios WHERE usuario = '".$user."' and contrasena = '".$pas."'";
			$con = mysqli_query($conexion,$query);

			if ($con){
				
				if (mysqli_num_rows($con) > 0){
					//cuenta el numero de filas de la consulta
					$query2 = mysqli_fetch_array ($con); 
					
					$_SESSION ['usuario'] = $query2['usuario'];
					$_SESSION ['contrasena'] = $query2['contrasena'];
					$_SESSION ['idusuario'] = $query2['idusuario'];
					$_SESSION ['nombre_completo'] = $query2['nombre_completo'];
					//$_SESSION ['apellidos'] = $query2['apellidos'];
					$_SESSION ['idusuario'] = $query2['idusuario'];
					$_SESSION ['rol'] = $query2['rol'];
					$_SESSION ['ndocumento']= $query2 ['ndocumento'];
					$usuario = $query2['usuario'];
					$_SESSION ['usuario'] = $query2['usuario'];
							
					switch ($rol){
					 case 8:
			         	echo "<script>window.location = 'higiene.php'</script>";
			         break;
					}		
					
				}else{
					
					echo "<script>alert('Datos de usuario Incorrectos')</script>";
					echo "<script>window.location = 'index.php'</script>";				
				}//If Si Con trae algo				
			}//if de CON		   	   
	   	}elseif(mysqli_num_rows($result)==0){
		  	echo "<script>alert('Datos de usuario Incorrectos')</script>";
		  	echo "<script>window.location = 'index.php'</script>";
	   	}//If del 1er Num_Rows
			echo "<script>alert('Datos de usuario Incorrectos')</script>";
			echo "<script>window.location = 'index.php'</script>";
	}

	//---administracion---
	if ($tipo_rol==9) {

		$existe = "SELECT * FROM usuarios WHERE usuario = '".$user."'";
		$result = mysqli_query($conexion,$existe);

		while($row=mysqli_fetch_array($result)){  
			$documento = $row ['ndocumento'];
			$rol = $row ['rol'];
			$nombre = $row ['nombre_completo'];
			$nombre_c = $nombre;
		}


		if (mysqli_num_rows($result)>0){

			$query = "SELECT * FROM usuarios WHERE usuario = '".$user."' and contrasena = '".$pas."'";
			$con = mysqli_query($conexion,$query);

			if ($con){
				
				if (mysqli_num_rows($con) > 0){
					//cuenta el numero de filas de la consulta
					
					$query2 = mysqli_fetch_array ($con); 
					
					$_SESSION ['usuario'] = $query2['usuario'];
					$_SESSION ['contrasena'] = $query2['contrasena'];
					$_SESSION ['idusuario'] = $query2['idusuario'];
					$_SESSION ['nombre_completo'] = $query2['nombre_completo'];
					//$_SESSION ['apellidos'] = $query2['apellidos'];
					$_SESSION ['idusuario'] = $query2['idusuario'];
					$_SESSION ['rol'] = $query2['rol'];
					$_SESSION ['ndocumento']= $query2 ['ndocumento'];
					$usuario = $query2['usuario'];
					$_SESSION ['usuario'] = $query2['usuario'];
							
					switch ($rol){
						case 9:
				         	echo "<script>window.location = 'administracion.php'</script>";
				        break;
					}		
					
				}else{				
					echo "<script>alert('Datos de usuario Incorrectos')</script>";
					echo "<script>window.location = 'index.php'</script>";				
				}//If Si Con trae algo
				
			}//if de CON
		   	   
		}elseif(mysqli_num_rows($result)==0){
			echo "<script>alert('Datos de usuario Incorrectos')</script>";
			echo "<script>window.location = 'index.php'</script>";
		}else{
			echo "<script>alert('Datos de usuario Incorrectos')</script>";
			echo "<script>window.location = 'index.php'</script>";
		}
	}
}//Primer IF 

?>


