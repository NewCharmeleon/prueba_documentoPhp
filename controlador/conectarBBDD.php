<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors", true);

function conectaBBDD(){

				
                                //$usuario = "Admin";//$_SESSION['usuario'];
				//		$password = "Admin123";//$_SESSION['password'];
						try{
							$pdo = new PDO('mysql:host=localhost;dbname=personasbbdd',"root","");
							$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, TRUE);
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							
                                                       // $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";
                                                        //$stmt = $pdo->prepare($sql);
                                                      //  $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
                                                       // $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                                                        //$stmt->execute();
                                                        $pdo->exec("SET NAMES UTF8");
                                                        return $pdo;   
                                                       
						}catch(PDOException $e){
					
						echo "Error de conexion con la Base de Datos";
						echo '<a href="/prueba_documentoPhp/index.php";><br>Volver a Loguearse</br></a>';
						}
}


function insertarDatos($pdo,$datos){
        				try{
					$pdo->beginTransaction();
					$sql = "INSERT INTO personasbbdd.personas (apellido, nombre, numero_documento, sexo, nacionalidad,".
						"archivos_externos, fecha_expedicion, fecha_vencimiento, domicilio, ciudad, departamento, 
						provincia, fecha_nacimiento, lugar_nacimiento)".
						"VALUES ('".$datos['apellido']."', '".$datos['nombre']."','".$datos['numero_documento']."','".$datos['sexo']."',
						'".$datos['nacionalidad']."','".$datos['archivos_externos']."','".$datos['fecha_expedicion']."','".$datos['fecha_vencimiento']."',
                                                '".$datos['domicilio']."','".$datos['ciudad']."','".$datos['departamento']."','".$datos['provincia']."', '".$datos['fecha_nacimiento']."',
						'".$datos['lugar_nacimiento']."')";
						
                                       /* $sql = "INSERT INTO `personasbbdd`.`personas` (`id`, `apellido`, `nombre`, `numero_documento`, "
                                                . "`sexo`, `nacionalidad`, `fecha_expedicion`, `fecha_vencimiento`, `domicilio`, `ciudad`, "
                                                . "`departamento`, `provincia`, `fecha_nacimiento`, `lugar_nacimiento`) VALUES (\'3\', "
                                                . "\'Gato\', \'Don\', \'22222222\', \'M\', \'Argentino\', \'2015-10-01\', \'2030-10-01\', "
                                                . "\'su calle 111\', \'rawson\', \'rawson\', \'Chubut\', \'2015-02-17\', \'gaiman\')";*/
                                        
                                       /* $sql->bindParam(':apellido', $datos[apellido], PDO::PARAM_STR);
                                        $pdo->bindParam(':nombre', $datos[nombre], PDO::PARAM_STR);
                                         $pdo->bindParam(':numero_documento', $datos[numero_documento], PDO::PARAM_STR);
                                        $pdo->bindParam(':sexo', $datos[sexo], PDO::PARAM_STR);
                                         $pdo->bindParam(':nacionalidad', $datos[nacionalidad], PDO::PARAM_STR);
                                        $pdo->bindParam(':archivos_externos', $datos[archivos_externos], PDO::PARAM_STR);
                                         $pdo->bindParam(':fecha_expedicion', $datos[fecha_expedicion], PDO::PARAM_STR);
                                        $pdo->bindParam(':fecha_vencimiento', $datos[fecha_vencimiento], PDO::PARAM_STR);
                                         $pdo->bindParam(':domicilio', $datos[domicilio], PDO::PARAM_STR);
                                        $pdo->bindParam(':ciudad', $datos[ciudad], PDO::PARAM_STR);
                                         $pdo->bindParam(':departamento', $datos[departamento], PDO::PARAM_STR);
                                        $pdo->bindParam(':provincia', $datos[provincia], PDO::PARAM_STR);
                                         $pdo->bindParam(':fecha_nacimiento', $datos[fecha_nacimiento], PDO::PARAM_STR);
                                        $pdo->bindParam(':lugar_nacimiento', $datos[lugar_nacimiento], PDO::PARAM_STR);*/
                                        
                                        $pdo->exec($sql);
						$pdo->commit();
                                                return $pdo;
                                                echo 'Bien...';
					}catch(PDOException $e){
						$pdo->rollBack();
						echo 'Error: Los datos no fueron insertados en la tabla' . $e->getMessage();
					}
}
function verPersonasCargadas($pdo){
    
                                    try{
					$sql = "SELECT apellido, nombre, numero_documento, sexo, nacionalidad,
                                        archivos_externos, fecha_expedicion, fecha_vencimiento, domicilio, ciudad, departamento, 
                                        provincia, fecha_nacimiento, lugar_nacimiento FROM personas" ;
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();
				
                                         while($row = $sql->fetchAll()){
                                           echo $row['nombre'];
                                        }
                                    }catch(PDOException $e){
						$pdo->rollBack();
						echo 'Error: Los datos no existen en la tabla' . $e->getMessage();
				}
 }
function verPersonasPorPagina($pdo){
    
                                    try{
					$sql = "SELECT apellido, nombre, numero_documento, sexo, nacionalidad,
                                        archivos_externos, fecha_expedicion, fecha_vencimiento, domicilio, ciudad, departamento, 
                                        provincia, fecha_nacimiento, lugar_nacimiento FROM personas LIMIT 10";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();
				
                                         while($row = $sql->fetch()){
                                           echo $row['nombre'];
                                        }
                                    }catch(PDOException $e){
						$pdo->rollBack();
						echo 'Error: Los datos no existen en la tabla' . $e->getMessage();
				}
 }                                

