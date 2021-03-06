<?php
	//Verificacion de inicion de Sesion
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors", true);
 if (empty($_POST)){
	require_once __DIR__.'/vista/documento.php';
	}else{
	session_start();	
	header('Content-Type: text/html; charset=utf-8');
	
	//Creacion del arreglo de sesion datos 
	require_once('funciones.php');
	
	//$_POST["datos"] = Array();
        //$nacionalidades = crearArrays1();
        //crearArrays2();
        //verificarDatos();
	
        foreach($_POST AS $key => $value) { 
                        $_POST[$key] = isset ($value) ? ($value) : null; 
                } 
        //VerificarDatos();        
	$datos['apellido'] = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
	$datos['nombre'] = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
	$datos['numeroDocumento'] = filter_var($_POST['numeroDocumento'], FILTER_VALIDATE_INT);
	$datos['sexo'] = filter_var($_POST['sexo'], FILTER_SANITIZE_SPECIAL_CHARS);
	$datos['nacionalidad'] = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : null;
	$datos['archivo'] = isset($_POST['archivo']) ? $_POST['archivo'] : null;
	$datos['fechaActual']=date("Y-m-d");
        $anio=(15+date("Y")); 
	$datos['fechaVenc']=date("$anio-m-d");
	$datos['domicilio'] = filter_var($_POST['domicilio'], FILTER_SANITIZE_STRING);
	$datos['ciudad']= filter_var($_POST['ciudad'], FILTER_SANITIZE_STRING);
	$datos['departamento']= filter_var($_POST['departamento'], FILTER_SANITIZE_STRING);
	$datos['provincia']= isset($_POST['provincia']) ? $_POST['provincia'] : null;
	$datos['fechaNacimiento'] =isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : null;
	$datos['lugarNacimiento']=isset($_POST['lugarNacimiento']) ? $_POST['lugarNacimiento'] : null;
	
	
		
	
	//Verificacion de los ratos recibidos por POST del documento
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		//Creacion del arreglo de opciones para la validacion 
		
		
		/*foreach($_POST as $nombre_campo => $valor){ 
			
				$asignacion = "\$" . $nombre_campo . "='" . $valor . "';";
				eval($asignacion); 
		}*/
		//verificarSeteo();
		//Verificacion del seteo de las variables ingresadas sino es asi le asigna "null"
		/*$validos = array(
		($usuario= isset($_POST['usuario']) ? $_POST['usuario'] : null),
		//$clave= isset($_POST['clave']) ? $_POST['clave'] : null;
		
		($apellido= isset($_POST['apellido']) ? $_POST['apellido'] : null),
		($nombre= isset($_POST['nombre']) ? $_POST['nombre'] : null),
		($numeroDocumento= isset($_POST['numeroDocumento']) ? $_POST['numeroDocumento'] : null),
		($sexo= isset($_POST['sexo']) ? $_POST['sexo'] : null),
		($nacionalidad= isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : null),
		//$foto= isset($_POST['foto']) ? $_POST['foto'] : null;
		($domicilio= isset($_POST['domicilio']) ? $_POST['domicilio'] : null),
		($ciudad= isset($_POST['ciudad']) ? $_POST['ciudad'] : null),
		($departamento= isset($_POST['departamento']) ? $_POST['departamento'] : null),
		($provincia= isset($_POST['provincia']) ? $_POST['provincia'] : null),
		($fechaNacimiento= isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : null),
		($lugarNacimiento= isset($_POST['lugarNacimiento']) ? $_POST['lugarNacimiento'] : null),
		);*/
		//Segunda validacion que verifica si los datos ingresados contienen los caracteres permitidos
		/*if (!validarUsuario($usuario)){
			$errores_validacion[] = 'El campo Usuario ingresado es incorrecto.';
		}else{
			$_SESSION["datos"]["usuario"] = $usuario;
		}*/
							
		if (!validarCaracter($datos['apellido'])){
			$errores[] = 'El campo Apellido es incorrecto.';
		}
	
		if (!validarCaracter($datos['nombre'])){
			$errores[] = 'El campo Nombre es incorrecto.';
		}
		
		if (!validarNumero($datos['numeroDocumento'], $opciones)){
			$errores[] = 'El campo Numero de Documento es incorrecto.';
		}
		//verificacion de seteo de option select en html
		if ((!isset($datos['sexo']) ||($datos['sexo'])==null)){
			$errores[] = 'El campo Sexo no ha sido seleccionado.';
		}
			
		if ((!isset($datos['nacionalidad']) || ($datos['nacionalidad'])==null)){
			$errores[] = 'El campo Nacionalidad no ha sido seleccionado.';
		}
		
		if (!validarAlfanumerico($datos['domicilio'])){
			$errores[] = 'El campo Domicilio es incorrecto.';
		}
		if (!validarCaracter($datos['ciudad'])){
			$errores[] = 'El campo Ciudad es incorrecto.';
		}
		if (!validarCaracter($datos['departamento'])){
			$errores[] = 'El campo Departamento es incorrecto.';
		}
		if ((!isset($datos['provincia']) || ($datos['provincia'])==null)){
			$errores[] = 'El campo Provincia no ha sido seleccionado.';
		}
		if ((!isset($datos['fechaNacimiento']) || ($datos['fechaNacimiento'])==null)){
			$errores[] = 'La Fecha de Nacimiento seleccionada es incorrecta.';
		}
		if (!validarCaracter($datos['lugarNacimiento'])){
			$errores[] = 'El campo Lugar de Nacimiento es incorrecto.';
		}
	}	
	//Verificacion de la existencia de errores, en caso afirmativo redirige a la pagina original, caso contrario dirige a la pagina de validacion ok.
	
	 if (empty($errores)){
		
		require 'validadook.php';
		exit;
	}else{
		if ($errores): ?>
<br> <ul style="color: #f00;"><br>
          <?php foreach ($errores as $error): ?>
                       <li> <?php echo $error ?> </li>
          <?php endforeach; ?>
       </ul>
       <?php endif;
		require 'vista/documento.php';
		exit;
	}
	}	?>
	