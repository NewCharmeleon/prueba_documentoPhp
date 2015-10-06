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
					$conn = new PDO('mysql:host=localhost;dbname=personasbbdd',"root","");
					$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, TRUE);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					
					$sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";
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
 function insertarDatos($conn,$datos){
        				try{
					$conn->beginTransaction();
					$sql = "INSERT INTO personasbbdd.personas (apellido, nombre, numero_documento, sexo, nacionalidad,".
						"archivos_externos, fecha_expedicion, fecha_vencimiento, domicilio, ciudad, departamento, 
						provincia, fecha_nacimiento, lugar_nacimiento)".
						"VALUES ('".$datos['apellido']."', '".$datos['nombre']."','".$datos['numero_documento']."','".$datos['sexo']."',
						'".$datos['nacionalidad']."','".$datos['archivos_externos']."','".$datos['fecha_expedicion']."','".$datos['fecha_vencimiento']."',
                                                '".$datos['domicilio']."','".$datos['ciudad']."','".$datos['departamento']."','".$datos['provincia']."', '".$datos['fecha_nacimiento']."',
						'".$datos['lugar_nacimiento']."')";
						
                                        /*$sql = "INSERT INTO `personasbbdd`.`personas` (`id`, `apellido`, `nombre`, `numero_documento`, "
                                                . "`sexo`, `nacionalidad`, `fecha_expedicion`, `fecha_vencimiento`, `domicilio`, `ciudad`, "
                                                . "`departamento`, `provincia`, `fecha_nacimiento`, `lugar_nacimiento`) VALUES (\'3\', "
                                                . "\'Gato\', \'Don\', \'22222222\', \'M\', \'Argentino\', \'2015-10-01\', \'2030-10-01\', "
                                                . "\'su calle 111\', \'rawson\', \'rawson\', \'Chubut\', \'2015-02-17\', \'gaiman\')";*/
                                        
                                        $sql->bindParam(':apellido', $datos[apellido], PDO::PARAM_STR);
                                        $sql->bindParam(':nombre', $datos[nombre], PDO::PARAM_STR);
                                         $sql->bindParam(':numero_documento', $datos[numero_documento], PDO::PARAM_STR);
                                        $sql->bindParam(':sexo', $datos[sexo], PDO::PARAM_STR);
                                         $sql->bindParam(':nacionalidad', $datos[nacionalidad], PDO::PARAM_STR);
                                        $sql->bindParam(':archivos_externos', $datos[archivos_externos], PDO::PARAM_STR);
                                         $sql->bindParam(':fecha_expedicion', $datos[fecha_expedicion], PDO::PARAM_STR);
                                        $sql->bindParam(':fecha_vencimiento', $datos[fecha_vencimiento], PDO::PARAM_STR);
                                         $sql->bindParam(':domicilio', $datos[domicilio], PDO::PARAM_STR);
                                        $sql->bindParam(':ciudad', $datos[ciudad], PDO::PARAM_STR);
                                         $sql->bindParam(':departamento', $datos[departamento], PDO::PARAM_STR);
                                        $sql->bindParam(':provincia', $datos[provincia], PDO::PARAM_STR);
                                         $sql->bindParam(':fecha_nacimiento', $datos[fecha_nacimiento], PDO::PARAM_STR);
                                        $sql->bindParam(':lugar_nacimiento', $datos[lugar_nacimiento], PDO::PARAM_STR);
                                        
                                        $conn->exec($sql);
						$conn->commit();
						return $conn;
					}catch(PDOException $e){
						$conn->rollBack();
						echo 'Error: Los datos no fueron insertados en la tabla' . $e->getMessage();
					}

function verPersonasCargadas($conn){
    
                                    try{
					$sql = "SELECT apellido, nombre, numero_documento, sexo, nacionalidad,
                                        archivos_externos, fecha_expedicion, fecha_vencimiento, domicilio, ciudad, departamento, 
                                        provincia, fecha_nacimiento, lugar_nacimiento FROM personas" ;
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();
				
                                         while($row = $sql->fetchAll()){
                                           echo $row['nombre'];
                                        }
                                    }catch(PDOException $e){
						$conn->rollBack();
						echo 'Error: Los datos no existen en la tabla' . $e->getMessage();
				}
 }
function verPersonasPorPagina($conn){
    
                                    try{
					$sql = "SELECT apellido, nombre, numero_documento, sexo, nacionalidad,
                                        archivos_externos, fecha_expedicion, fecha_vencimiento, domicilio, ciudad, departamento, 
                                        provincia, fecha_nacimiento, lugar_nacimiento FROM personas LIMIT 10";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();
				
                                         while($row = $sql->fetch()){
                                           echo $row['nombre'];
                                        }
                                    }catch(PDOException $e){
						$conn->rollBack();
						echo 'Error: Los datos no existen en la tabla' . $e->getMessage();
				}
 }    }                
?>	