<?php
	//Verificacion de inicion de Sesion
	if (!isset($_SESSION)){
		session_start();
}
	//Creacion del arreglo de sesion datos 
	$_SESSION["datos"] = Array();

/* Validar los datos ingresados DESDE PHP:
-- presencia (campos obligatorios)
-- formato (ej. sólo números)
-- reglas de negocio (ej. la fecha de vencimiento no puede ser menor o igual que la fecha de nacimiento y emisión).
-- Separar la lógica de la parte visual (archivos PHP separados, usar función 'require)'
-- Si el formulario no es válido, redirigir al formulario mostrando el error correspondiente.
-- Si el formulario es válido, mostrar una nueva página con los datos ingresados.
-- Si se intenta "saltear" la validación (ej. acceder a la nueva página directamente) redirigir a la página inicial (función header)*/
	
	//Funcion php que validad que el campo este seteado y que no este vacio
	function validarvacio($valor){ 
		if(isset($valor) && empty($valor)){
			return false;
		}else{
			return true;
		}
	}
	//Funcion php que valida que el numero ingresado sea entero
	function validarNumero($valor, $opciones=null){
		if(filter_var($valor,FILTER_VALIDATE_INT, $opciones) === FALSE){
			return false;
		}else{
			return true;
		}
	}	
	//Funcion php que valida que el caracter ingresado sea el permitido 
	//permitiendo el ingreso de palabras compuestas
	function validarCaracter($valor)	{
		$permitidos =  '/^[a-zA-Záéíóúñ\s]{2,50}$/i';
		if (preg_match($permitidos,$valor)){
			return true;
		}else{
			return false;
		}
	}
	function validarAlfanumerico($valor)	{
		$permitidosalpha =  '/^[a-zA-Záéíóúñ\s+0-9]{2,50}$/i';
		if (preg_match($permitidosalpha,$valor)){
			return true;
		}else{
			return false;
		}
	}
	//Funcion php que valida que el tipo de archivo externo sea de formato valido
	//solo imagen.
	function restringirTiposDeArchivosExternos($mime_types){
		$mime_types = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'bmp' => 'image/bmp'
			);
			return $mime_types;
		}
		//add_filter('upload_mimes', 'restrict_mime_type_list');
	
	//Verificacion de los ratos recibidos por POST del documento
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		//Creacion del arreglo de opciones para la validacion 
		$opciones = array(
			'options' => array(
				'min_range' => 1000000,
				'max_range' => 99999999
			)
		);
		//Verificacion del seteo de las variables ingresadas sino es asi le asigna "null"
		$apellido= isset($_POST['apellido']) ? $_POST['apellido'] : null;
		$nombre= isset($_POST['nombre']) ? $_POST['nombre'] : null;
		$numeroDocumento= isset($_POST['numeroDocumento']) ? $_POST['numeroDocumento'] : null;
		$sexo= isset($_POST['sexo']) ? $_POST['sexo'] : null;
		$nacionalidad= isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : null;
		//$foto= isset($_POST['foto']) ? $_POST['foto'] : null;
		$domicilio= isset($_POST['domicilio']) ? $_POST['domicilio'] : null;
		$ciudad= isset($_POST['ciudad']) ? $_POST['ciudad'] : null;
		$departamento= isset($_POST['departamento']) ? $_POST['departamento'] : null;
		$provincia= isset($_POST['provincia']) ? $_POST['provincia'] : null;
		$fechaNacimiento= isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : null;
		$lugarNacimiento= isset($_POST['lugarNacimiento']) ? $_POST['lugarNacimiento'] : null;
		
		//Segunda validacion que verifica si los datos ingresados contienen los caracteres permitidos
		if (!validarCaracter($apellido)){
			$errores[] = 'El campo Apellido es incorrecto.';
		}else{
			$_SESSION["datos"]["apellido"] = $apellido;
		}
	
		if (!validarCaracter($nombre)){
			$errores[] = 'El campo Nombre es incorrecto.';
		}
		else{
			$_SESSION["datos"]["nombre"] = $nombre;
		}
		if (!validarNumero($numeroDocumento, $opciones)){
			$errores[] = 'El campo Numero de Documento es incorrecto.';
		}else{
			$_SESSION["datos"]["numeroDocumento"] = $numeroDocumento;
		}
		//verificacion de seteo de option select en html
		if ((!isset($sexo))&&(empty($sexo))){
			$errores[] = 'El campo Sexo no ha sido seleccionado.';
		}else{
			$_SESSION["datos"]["sexo"] = $sexo;
		}
			
		if ((!isset($nacionalidad)) && (empty($nacionalidad))){
			$errores[] = 'El campo Nacionalidad no ha sido seleccionado.';
		}else{
			$_SESSION["datos"]["nacionalidad"] = $nacionalidad;
		}
		
		if (!validarAlfanumerico($domicilio)){
			$errores[] = 'El campo Domicilio es incorrecto.';
		}else{
			$_SESSION["datos"]["domicilio"] = $domicilio;
		}
		if (!validarCaracter($ciudad)){
			$errores[] = 'El campo Ciudad es incorrecto.';
		}else{
			$_SESSION["datos"]["ciudad"] = $ciudad;
		}
		if (!validarCaracter($departamento)){
			$errores[] = 'El campo Departamento es incorrecto.';
		}else{
			$_SESSION["datos"]["departamento"] = $departamento;
		}
		if ((!isset($provincia)) && (empty($provincia))){
			$errores[] = 'El campo Provincia no ha sido seleccionado.';
		}else{
			$_SESSION["datos"]["provincia"] = $provincia;
		}
		if ((!isset($fechaNacimiento)) && (empty($fechaNacimiento))){
			$errores[] = 'El campo Fecha de Nacimiento seleccionado es incorrecto.';
		}else{
			$_SESSION["datos"]["fechaNacimiento"] = $fechaNacimiento;
		}
		if (!validarCaracter($lugarNacimiento)){
			$errores[] = 'El campo Lugar de Nacimiento es incorrecto.';
		}else{
			$_SESSION["datos"]["lugarNacimiento"] = $lugarNacimiento;
		}
	//Verificacion de la existencia de errores, en caso afirmativo redirige a la pagina original, caso contrario dirige a la pagina de validacion ok.
	if (!$errores){
		 	
		header('Location: validadook.php');
		exit;
	}else{
		require_once 'documento.php';
		exit;
	}
}