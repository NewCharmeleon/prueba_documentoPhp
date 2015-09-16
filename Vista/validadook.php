<?php

if (!isset($_SESSION)){
	session_start();
}
header('Content-Type: text/html; charset=utf-8');
require ('paravalidar.php');
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Formulario de validación</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
	<body>
	
		<strong> Los datos se ingresaron correctamente</strong>
		<?php //if(isset($_SESSION["datos"])):?>
		<?php	//echo ($_SESSION["datos"]["apellido"]);?>
		<?php	//echo ($_SESSION["datos"]["provincia"]);?>
			<?php //foreach($_SESSION["datos"] as $dato):?>
				<p>* <?php //echo $dato;?>
			<?php //endforeach;?>
		<?php //endif;?>	
		<?php if(isset($datos)):?>
			<?php foreach($datos as $val):?>
				<p>* <?php echo $val;?>
			<?php endforeach;?>
		<?php endif;?>
		<input class="btn btn-md btn-success" type="submit" value="Cargar Datos">
	</body>
</html>
