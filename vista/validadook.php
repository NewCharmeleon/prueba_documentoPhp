<?php
if (!isset($_POST)){
	//session_start();
}
header('Content-Type: text/html; charset=utf-8');
require_once '../controlador/conectarBBDD.php';
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Formulario de Validacion</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../lib/css/bootstrap.css">
		<h2>Registro Nacional de las personas</h2>
	</head>
	<body>
		<div class="jumbotron">
		<h2>  REPUBLICA ARGENTINA - MERCOSUR
		    DOCUMENTO NACIONAL DE IDENTIDAD
		      REGISTRO NACIONAL DE LAS PERSONAS</h2>
		<form class="form-horizontal">
<fieldset>

	<!-- Form Name -->
	<legend>Menu</legend>
	<a class="btn btn-success" href="documento.php">Cargar mas Personas</a>
        <a class="btn btn-success" href="verPersonas.php">Ver Personas Cargadas</a>
	<a class="btn btn-danger" href="../index.php">Regresar al Inicio</a>
        <br><br>
        <h2><strong> Los datos se ingresaron correctamente</strong><h2>
		<?php if(isset($datos)):?>
                 <?php 
                   $pdo = conectaBBDD();
                   $pdo = insertarDatos($pdo,$datos);
		?>
		
			<?php foreach($datos as $dato):?>
				<p>* <?php echo $dato;?>
			<?php endforeach;?>
		<?php endif;?>	
                <br><br>
                
	</body>
</html>