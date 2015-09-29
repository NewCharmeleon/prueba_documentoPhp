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
		
			if($accion == 'insert')
			{
				/*echo "Se muestra carga ";
				foreach($_POST as $nombre_campo => $valor){ 
				$asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
				eval($asignacion);
                                 * values ('".$_SESSION['apellido']."', '".$_SESSION['nombre']."','".$_SESSION['numero_documento']."','".$_SESSION['sexo']."',
					'".$_SESSION['nacionalidad']."','".$_SESSION['archivos_externos']."','".$_SESSION['fecha_expedicion']."','".$_SESSION['fecha_vencimiento']."',
					'".$_SESSION['domicilio']."','".$_SESSION['ciudad']."','".$_SESSION['departamento']."','".$_SESSION['provincia']."', '".$_SESSION['fecha_nacimiento']."',
					'".$_SESSION['lugar_nacimiento']."')"; 
				*/
                                $usuario = 'Admin';
				$password = 'Admin123';
                                /*while ($post = each($_POST))
                                {
                                    $post[0] = $post[1];
                                }*/
				strtolower($apellido = $_POST['apellido']);
				strtolower($nombre = $_POST['nombre']);
                                $numeroDocumento= $_POST['numeroDocumento'];
                                $sexo= $_POST['sexo'];
                                $nacionalidad= $_POST['nacionalidad'];
                                $foto= $_POST['foto'];
                                $fechaActual= $_POST['fechaActual'];
                                $fechaVenc= $_POST['fechaVenc'];
                                $domicilio= $_POST['domicilio'];
                                $ciudad= $_POST['ciudad'];
                                $departamento= $_POST['departamento'];
                                $provincia= $_POST['provincia'];
                                $fechaNacimiento= $_POST['fechaNacimiento'];
                                $lugarNacimiento= $_POST['lugarNacimiento'];
			
                                try{
                                    $conn = new PDO('mysql:host=localhost;dbname=documento',$usuario,$password);
                                    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, TRUE);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql = "INSERT INTO documento.personas (apellido, nombre, numero_documento, sexo, nacionalidad,
                                    archivos_externos, fecha_expedicion, fecha_vencimiento, domicilio, ciudad, departamento, 
                                    provincia, fecha_nacimiento, lugar_nacimiento)
                                            values (:apellido :nombre, :numeroDoc,:sexo, :nacionalidad, :foto, :fechaAct,
                                            :fechaVen,:domicilio,:ciudad,
                                            :provincia, :fechaNac, :lugarNac)";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);
                                    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                                    $stmt->bindParam(':numeroDoc', $numeroDocumento, PDO::PARAM_STR);
                                    $stmt->bindParam(':sexo', $sexo, PDO::PARAM_STR);
                                    $stmt->bindParam(':nacionalidad', $nacionalidad, PDO::PARAM_STR);
                                    $stmt->bindParam(':foto', $archivos_externos, PDO::PARAM_STR);
                                    $stmt->bindParam(':fechaExp', $fechaActual, PDO::PARAM_STR);
                                    $stmt->bindParam(':fechaVen', $fechaVenc, PDO::PARAM_STR);
                                    $stmt->bindParam(':domicilio', $domicilio, PDO::PARAM_STR);
                                    $stmt->bindParam(':ciudad', $ciudad, PDO::PARAM_STR);
                                    $stmt->bindParam(':provincia', $provincia, PDO::PARAM_STR);
                                    $stmt->bindParam(':fechaNac', $fechaNacimiento, PDO::PARAM_STR);
                                    $stmt->bindParam(':lugarNac', $lugarNacimiento, PDO::PARAM_STR);
                                    $stmt->execute();
                                    if($stmt->rowCount() == 1)
                                    {		
                                            header("Location: /prueba_documentoPhp/vista/documento.php");
                                            if( $rows == 1 ){
                                                 echo 'Inserción correcta';
                                                die();
                                            }
                                    }
                                } catch(PDOException $e){

                                            echo 'No se puede insertar Datos';
                                            die();
				}
                        }
                   }    
		if($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			$accion = $_GET['action'];
                        $usuario = 'Admin';
                        $password = 'Admin123';
		
			if($accion == 'salir')
			{
				$_POST = array();
			
				session_destroy();
				header("Location: vista/index.php");
			
				die();
			}
		
			if($accion == 'verdatos')
			{
			
			//$nombreabuscar = $_POST['personaBuscada'];
                             
                                
				$conn = new PDO('mysql:host=localhost;dbname=documento',$usuario,$password);
                                $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, TRUE);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "SELECT apellido, nombre, numero_documento, sexo, nacionalidad,
				archivos_externos, fecha_expedicion, fecha_vencimiento, domicilio, ciudad, departamento, 
				provincia, fecha_nacimiento, lugar_nacimiento FROM personas 
				WHERE personas_id = :nombreabuscar;" ;
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				
                                while($row = $sql->fetch()){
                                    echo $row['nombre'];
                                }
                                
                                /*if($stmt->rowCount() == 1)
				{		
					header("Location: vista/info.php");
					die();
				}*/
			}
		
			if($accion == 'busqueda')
			{
			
				strtolower($busqueda = $_GET['busqueda']);
			
				$conn = new PDO('mysql:host=localhost;dbname=documento',$usuario,$password);
				$sql = "SELECT apellido, nombre, numero_documento, sexo, nacionalidad,
				archivos_externos, fecha_expedicion, fecha_vencimiento, domicilio, ciudad, departamento, 
				provincia, fecha_nacimiento, lugar_nacimiento FROM personas 
				WHERE nombre = :busqueda OR apellido = :busqueda;" ;
				$stmt = $conn->prepare($sql);
				$stmt->execute();
			
				if($stmt->rowCount() == 1)
				{		
					header("Location: vista/busquedaNombre.php");
                                        echo $row['nombre'];
					die();
                                }else{
                                    
                                    echo $row['nombre'];
                                }
			}
		}
	}	
   
