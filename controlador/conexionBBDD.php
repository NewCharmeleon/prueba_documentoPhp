<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors", true);

if(!isset($_POST)){
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
					$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, TRUE);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					
					$sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND pasword = :password";
					$stmt = $conn->prepare($sql);
					$stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
					$stmt->bindParam(':password', $password, PDO::PARAM_STR);
					$stmt->execute();
					if($stmt->rowCount() == 1)
					{
						$fila = $stmt->fetch(PDO::FETCH_ASSOC);
						$_POST['id'] = $fila['id'];
						$_POST['usuario'] = $fila['usuario'];
						
						header("Location: /prueba_documentoPhp/vista/documento.php");
						die();
					}	else{
						echo "Usuario Incorrecto";
						echo '<a href="/prueba_documentoPhp/index.php";><br>Volver a Loguearse</br></a>';
						}
					}catch(PDOException $e){
					
					echo "Usuario Incorrecto";
					echo '<a href="/prueba_documentoPhp/index.php";><br>Volver a Loguearse</br></a>';
					
				
				}
            }
		
		}		
	}	
?>	