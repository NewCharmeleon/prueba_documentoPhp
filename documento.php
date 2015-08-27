<?php

header('Content-Type: text/html; charset=utf-8')

require_once 'paravalidar.php'

$apellido= isset($_POST['apellido']) ? $_POST['apellido'] : null;
$nombre= isset($_POST['nombre']) ? $_POST['nombre'] : null;
$numeroDocumento= isset($_POST['numeroDocumento']) ? $_POST['numeroDocumento'] : null;
$sexo= isset($_POST['sexo']) ? $_POST['sexo'] : null;
$nacionalidad= isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : null;
$foto= isset($_POST['foto']) ? $_POST['foto'] : null;
$domicilio= isset($_POST['domicilio']) ? $_POST['domicilio'] : null;
$ciudad= isset($_POST['ciudad']) ? $_POST['ciudad'] : null;
$departamento= isset($_POST['departamento']) ? $_POST['departamento'] : null;
$provincia= isset($_POST['provincia']) ? $_POST['provincia'] : null;
$fechaNacimiento= isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : null;
$lugarNacimiento= isset($_POST['lugarNacimiento']) ? $_POST['lugarNacimiento'] : null;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if (!validaCaracter($apellido)){
		$errores[] = 'El campo Apellido es incorrecto.';
	}
	if (!validanombre($nombre)){
		$errores[] = 'El campo Nombre es incorrecto.';
	}
	$opciones = array(
		'options' => array(
			'min_range' => 1000000,
			'max_range' => 99999999
			)
	);
	if (!validarNumero($numeroDocumento, $opciones)){
		$errores[] = 'El campo Numero de Documento es incorrecto.';
	}
	if (!validaCaracter($nacionalidad)){
		$errores[] = 'El campo Nacionalidad es incorrecto.';
	}
	if (!validaCaracter($domicilio)){
		$errores[] = 'El campo Domicilio es incorrecto.';
	}
	if (!validaCaracter($ciudad)){
		$errores[] = 'El campo Ciudad es incorrecto.';
	}
	if (!validaCaracter($departamento)){
		$errores[] = 'El campo Departamento es incorrecto.';
	}
	if (!validaCaracter($provincia)){
		$errores[] = 'El campo Provincia es incorrecto.';
	}
	
	if (!errores){
		header('Location: validook.php);
		exit;
	}
}
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
		<title>Formulario de validación de solicitud de Documento</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<h2>Registro Nacional de las personas</h2>
	</head>
	<body>
		<h2>  REPUBLICA ARGENTINA - MERCOSUR
		    DOCUMENTO NACIONAL DE IDENTIDAD
		      REGISTRO NACIONAL DE LAS PERSONAS</h2>
		
		<form action="documento.php" method="post">	
			<fieldset>
			Apellido/s: <br> <input type="text" name="apellido"
			pattern="[a-zA-Záéíóúñ]{2,50}" required/ ><br>
			
			Nombre/s: <br> <input type="text" name="nombre"
			pattern="[a-zA-Záéíóúñ]{2,50}" required/><br>
			<label>		
			Numero De Documento: <br> <input type="text"
			name="numeroDocumento"
			pattern="[0-9]{6,8}" required/><br>
			
			Sexo: <br><label for="M">M</label><input type="radio" name="Sexo" id="M" value="M">
			<label for="F">F</label><input type="radio" name="sexo" id="F" value="F"><br>
			Nacionalidad: <br><input type="text"
			       name="nacionalidad"
			pattern="[a-zA-Záéíóúñ]{2,30}" required/>
			<br>	
			Foto: <br><input type="file" name="foto" required/>
			<br>		
			Fecha De Expedicion:<br>
			<input type="date"
			       name="fechaExpedicion">
			<br>			
			Fecha De Vencimiento: <br>
			<input type="date"
			       name="fechaVencimiento"><br>
			Domicilio: <br>
			<input type="text"
				   name="domicilio"
			pattern="[0-9a-zA-Záéíóúñ]{5,50}" required/>
			<br>
			Ciudad: <br>
			<input type="text"
				   name="ciudad"
			pattern="[a-zA-Záéíóúñ]{2,30}" required/>
			<br>
			Departamento: <br>
			<input type="text"
				   name="departamento"
			pattern="[a-zA-Záéíóúñ]{2,30}" required/>
			<br>
			Provincia: <br>
			<input type="text"
				   name="provincia"
			pattern="[a-zA-Záéíóúñ]{2,30}" required/>
			<br>
			Fecha de Nacimiento: <br>
			<input type="date"
				   name="fechaNacimiento"
			required/>
			<br>
			Lugar de Nacimiento: <br>
			<input type="text"
				   name="lugarNacimiento"
			pattern="[a-zA-Záéíóúñ]{2,30}" required/>
			<br>
			<input type="submit" value="Enviar Datos">
			</fieldset>
		</form>
	
			


	</body>
</html>
