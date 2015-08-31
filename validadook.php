<?php

//if (!isset($_SESSION)){
	session_start();
//}
header('Content-Type: text/html; charset=utf-8');
//require ('paravalidar.php');
?>
<!DOCTYPE html>
<html lang="es">
<!--Desarrollar un formulario de ingreso de datos para un DNI.
- Aplicar todos los conocimientos previos: HTML5, CSS, Bootstrap, jQuery, etc.
- Validar los datos ingresados DESDE PHP:
- presencia (campos obligatorios)
- formato (ej. sólo números)
- reglas de negocio (ej. la fecha de vencimiento no puede ser menor o igual que la fecha de nacimiento y emisión).
- Separar la lógica de la parte visual (archivos PHP separados, usar función require)
- Si el formulario no es válido, redirigir al formulario mostrando el error correspondiente.
- Si el formulario es válido, mostrar una nueva página con los datos ingresados.
- Si se intenta "saltear" la validación (ej. acceder a la nueva página directamente) redirigir a la página inicial (función header)-->
	<head>
		<title>Formulario de validación</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
	<body>
	
		<strong> Los datos se cargaron correctamente</strong>
		<?php foreach ($_SESSION["datos"] as $dato){
			echo $dato;
		 } ?>	
		<input class="btn btn-md btn-success" type="submit" value="Enviar">
	</body>
</html>
