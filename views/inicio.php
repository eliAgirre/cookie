<?php

// Se inicia sesión o reanuda la sesión
session_start();

if(isset($_SESSION['id_usuario']) && $_SESSION['id_usuario']!=''){

	// Se importan las funciones
	include_once("funciones/logueo.php");

	$nombreUsuario=obtenerUsuario($_SESSION['id_usuario']);

	//Se establece una cookie
	setcookie("Usuario", $nombreUsuario, time()+3600);  // expira una hora después de crearla
	
}

?>
<html>

	<head>
		<meta charset="utf8" />
		<title> filmdate </title>
	</head>

	<body>

		<h2> filmdate </h2>

		<!-- Menu -->
		<a href="/index.php"> Inicio </a>

		<?php

			// Botones de regitro y login
			if(!(isset($_SESSION['id_usuario']) && $_SESSION['id_usuario']!='')){

				// Se incluye el archivo noLogInicio que contiene los dos botones
				include("noLogInicio.html");

			}
			else{

				// cookie
				if (isset($_COOKIE['Usuario'])) {

					echo "<a href='views/profile.php'>" . $_COOKIE['Usuario'] . "</a>";

				}

				//Boton salir
				include("logInicio.html");

			}

		?>

	</body>

</html>