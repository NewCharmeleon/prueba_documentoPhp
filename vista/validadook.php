<?php
if (!isset($_POST)){
	//session_start();
}
header('Content-Type: text/html; charset=utf-8');
require_once '../controlador/conectarBBDD.php';
//require_once "controlador/conectarBBDD.php";
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
                 <?php 
                   $pdo = conectaBBDD();
                   // die("gikakk");
                   $pdo = insertarDatos($pdo,$datos);
		?>
		<?php	//echo ($_SESSION["datos"]["apellido"]);?>
		<?php	//echo ($_SESSION["datos"]["provincia"]);?>
			<?php foreach($datos as $dato):?>
				<p>* <?php echo $dato;?>
			<?php endforeach;?>
		<?php endif;?>	
                 <?php 
                   // $pdo = conectaBBDD();
                  //  die("gikakk");
                   // $pdo = insertarDatos($conn,$datos);
                 ?><br><br>
                <form action="" method="post">
		<input class="btn btn-md btn-success" type="submit"  name="ver" value="Ver personas cargadas">
                <?php echo '<a href="busquedaPersona.php";><br>Ver Personas Cargadas</br></a>'; ?>
                </form>
                    <?php if(isset($_POST['ver'])){
                        //verPersonasCargadas($pdo);
                } ?>
	</body>
</html>