<?php

// Se importan las funciones
include_once("../funciones/logueo.php");

// Se inicia sesión o reanuda la sesión
session_start();

$nombreUsuario=obtenerUsuario($_SESSION['id_usuario']);

//Se establece una cookie
setcookie("Usuario", $nombreUsuario, time()+3600);  // expira una hora después de crearla

?>
<html>

	<head>
		<meta charset="utf8" />
		<title> Profile </title>
	</head>

	<body>

		<h2> Profile </h2>

		<!-- Menu -->
		<a href="/index.php"> Inicio </a>

		<?php

			// Botones de regitro y login
			if(!(isset($_SESSION['id_usuario']) && $_SESSION['id_usuario']!='')){

				// Se incluye el archivo noLog que contiene los dos botones
				include("noLog.html");

			}
			else{

				// cookie
				if (isset($_COOKIE['Usuario'])) {

					echo "<a href='profile.php'>" . $_COOKIE['Usuario'] . "</a>";

				}

				//Botones de profile y salir
				include("log.html");

			}

		?>

	</body>

</html>