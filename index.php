
<?php 
 	session_start();
	error_reporting(E_ALL);
	ini_set("display_errors", true);
	include "controlador/porteroBBDD.php";
?>

<!DOCTYPE html>
<html lang="es">
<!--Pagina Principal de Login de Usuario-->
	<head>
		<title>Formulario de validación de solicitud de Documento</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css">
		<h2><center>Bienvenido Usuario</center><h2><br>
		<h2><center>Registro Nacional de las Personas</center></h2>
	</head>
	<body>
		<div class="jumbotron">
		<h2> <center> REPUBLICA ARGENTINA - MERCOSUR<br>
		    DOCUMENTO NACIONAL DE IDENTIDAD<br>
		      REGISTRO NACIONAL DE LAS PERSONAS</center></h2>
		
		
                    <form action="/prueba_documentoPhp/controlador/porteroBBDD.php" method="post" role="form">	
			<center><fieldset>
			
				Usuario: <br> <input title="Ingrese Usuario" type="text" name="usuario" id="usuario"
				placeholder= "Ingrese Usuario" pattern="[a-zA-Z]{4,20}" 
				value = "" required/ > <br><br>
			
				Clave: <br> <input title="Ingrese Clave" type="text" name="password" id="password"
				placeholder= "Ingrese Clave" pattern="[a-zA-Z\s0-9]{8,8}" 
				value = "********" required/ ><br>
				
				<input id="action" type="hidden" name="action" value="login"/>
				<center><button class="btn btn-primary btn-block" type="submit">"Acceder al Sistema"</center
			</fieldset>
			</center>
			</form>
		</div>
		</body>
</html>