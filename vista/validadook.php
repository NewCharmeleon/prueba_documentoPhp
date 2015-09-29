<?php
if (!isset($_POST)){
	session_start();
}
header('Content-Type: text/html; charset=utf-8');
require ('paravalidar.php');
require_once "controlador/conectarBBDD.php";
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Formulario de validación</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
	<body>
	
		<strong> Los datos se ingresaron correctamente</strong>
		<?php if(isset($datos)):?>
		<?php	//echo ($_SESSION["datos"]["apellido"]);?>
		<?php	//echo ($_SESSION["datos"]["provincia"]);?>
			<?php foreach($datos as $dato):?>
				<p>* <?php echo $dato;?>
			<?php endforeach;?>
		<?php endif;?>	
                 <?php 
                    $pdo = conectaBBDD($usuario,$password);
                    $pdo = insertarDatos($pdo,$datos);
		?>
		<input class="btn btn-md btn-success" type="submit" value="Cargar Datos">
	</body>
</html>