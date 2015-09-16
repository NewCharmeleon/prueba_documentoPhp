<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors", true);

if(!isset($_SESSION)){
	session_start();
}
	$metodo_request = strtoupper(getenv('REQUEST_METHOD'));
	$metodo_http = array('GET', 'POST', 'PUT', 'DELETE', 'HEAD', 'OPTIONS');
	if( ! in_array($metodo_request, $metodo_http))
	{
		//echo "Se muestran páginas de ";
		die('invalid request');
	}
	else{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			echo "Se muestran páginas de ";
			$accion = $_POST['action'];
			if($accion == 'login')
			{
				$usuario = $_POST['usuario'];
				$password = $_POST['password'];
				try{
					$conn = new PDO('mysql:host=localhost;dbname=documento',$usuario,$password);
					$sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";
					$stmt = $conn->prepare($sql);
					$stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
					$stmt->bindParam(':password', $password, PDO::PARAM_STR);
					$stmt->execute();
					if($stmt->rowCount() == 1)
					{
						$fila = $stmt->fetch(PDO::FETCH_ASSOC);
						$_SESSION['id'] = $fila['id'];
						$_SESSION['usuario'] = $fila['usuario'];
						
						header("Location: ../vista/documento.php");
						die();
					}	
				} catch(PDOException $e){
					
					echo "Usuario Incorrecto";
					echo '<a href="../index.php";><br>Volver a Loguearse</br></a>';
					throw new Exception($e->getMessage());
					
					
				}
			}
		
			if($accion == 'insert')
			{
				echo "Se muestra carga ";
				foreach($_POST as $nombre_campo => $valor){ 
				$asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
				eval($asignacion); 
				}
				strtolower($apellido = $_POST['apellido']);
				strtolower($nombre = $_POST['nombre']);
			
			
				$conn = new PDO('mysql:host=localhost;dbname=personas',$usuario,$password);
				$sql = "INSERT INTO personas (apellido, nombre, numero_documento, sexo, nacionalidad,
				archivos_externos, fecha_expedicion, fecha_vencimiento, domicilio, ciudad, departamento, 
				provincia, fecha_nacimiento, lugar_nacimiento)
					values ('".$_SESSION['apellido']."', '".$_SESSION['nombre']."','".$_SESSION['numero_documento']."','".$_SESSION['sexo']."',
					'".$_SESSION['nacionalidad']."','".$_SESSION['archivos_externos']."','".$_SESSION['fecha_expedicion']."','".$_SESSION['fecha_vencimiento']."',
					'".$_SESSION['domicilio']."','".$_SESSION['ciudad']."','".$_SESSION['departamento']."','".$_SESSION['provincia']."', '".$_SESSION['fecha_nacimiento']."',
					'".$_SESSION['lugar_nacimiento']."')";
				$stmt = $conn->prepare($sql);
				/*$stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
				$stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
				$stmt->bindParam(':numero_', $numero_documento, PDO::PARAM_STR);
				$stmt->bindParam(':sexo', $sexo, PDO::PARAM_STR);
				$stmt->bindParam(':documento', $nacionalidad, PDO::PARAM_STR);
				$stmt->bindParam(':fechaexp', $archivos_externos, PDO::PARAM_STR);
				$stmt->bindParam(':fechaven', $fecha_expedicion, PDO::PARAM_STR);
				$stmt->bindParam(':nacionalidad', $fecha_vencimiento, PDO::PARAM_STR);
				$stmt->bindParam(':domicilio', $domicilio, PDO::PARAM_STR);
				$stmt->bindParam(':fechalugar', $ciudad, PDO::PARAM_STR);
				$stmt->bindParam(':provincia', $departamento, PDO::PARAM_STR);
				$stmt->bindParam(':donante', $provincia, PDO::PARAM_STR);
				$stmt->bindParam(':nrotramite', $fecha_nacimiento, PDO::PARAM_STR);
				$stmt->bindParam(':foto', $lugar_nacimiento, PDO::PARAM_STR);*/
			
				$stmt->execute();
				if($stmt->rowCount() == 1)
				{		
					header("Location: vista/index.php");
					die();
				}
			
			}
		
		if($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			$accion = $_GET['action'];
		
			if($accion == 'salir')
			{
				$_SESSION = array();
			
				session_destroy();
				header("Location: vista/index.php");
			
				die();
			}
		
			if($accion == 'verdatos')
			{
			
			$nombreabuscar = $_SESSION['user'];
			
				$conn = new PDO('mysql:host=localhost;dbname=personas',$usuario,$password);
				$sql = "SELECT apellido, nombre, numero_documento, sexo, nacionalidad,
				archivos_externos, fecha_expedicion, fecha_vencimiento, domicilio, ciudad, departamento, 
				provincia, fecha_nacimiento, lugar_nacimiento FROM personas 
				WHERE personas_id = :nombreabuscar;" ;
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				if($stmt->rowCount() == 1)
				{		
					header("Location: vista/info.php");
					die();
				}
			}
		
			if($accion == 'busqueda')
			{
			
				strtolower($busqueda = $_SESSION['busqueda']);
			
				$conn = new PDO('mysql:host=localhost;dbname=personas',$usuario,$password);
				$sql = "SELECT apellido, nombre, numero_documento, sexo, nacionalidad,
				archivos_externos, fecha_expedicion, fecha_vencimiento, domicilio, ciudad, departamento, 
				provincia, fecha_nacimiento, lugar_nacimiento FROM personas 
				WHERE nombre = :busqueda OR apellido = :busqueda;" ;
				$stmt = $conn->prepare($sql);
				$stmt->execute();
			
				if($stmt->rowCount() == 1)
				{		
					header("Location: vista/listado.php");
					die();
				}
			}
		}
	}	
}