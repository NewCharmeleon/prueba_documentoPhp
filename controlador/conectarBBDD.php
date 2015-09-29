<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors", true);


function conectaBBDD(){

						$usuario = "Admin";//$_SESSION['usuario'];
						$password = "Admin123";//$_SESSION['password'];
						try{
							$pdo = new PDO('mysql:host=localhost;dbname=documento','root','');
							$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, TRUE);
							$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$pdo->exec("SET NAMES UTF8");
                                                        return $pdo;
					
						}catch(PDOException $e){
					
						echo "Usuario Incorrecto";
						echo '<a href="/prueba_documentoPhp/index.php";><br>Volver a Loguearse</br></a>';
						}
}


function insertarDatos($pdo,$datos){
        				try{
					$pdo->beginTransaction();
					$sql = "INSERT INTO documento.personas (apellido, nombre, numero_documento, sexo, nacionalidad,
						archivos_externos, fecha_expedicion, fecha_vencimiento, domicilio, ciudad, departamento, 
						provincia, fecha_nacimiento, lugar_nacimiento)
						values ('".$datos['apellido']."', '".$datos['nombre']."','".$datos['numero_documento']."','".$datos['sexo']."',
						'".$datos['nacionalidad']."','".$datos['archivos_externos']."','".$datos['fecha_expedicion']."','".$datos['fecha_vencimiento']."',
                                                '".$datos['domicilio']."','".$datos['ciudad']."','".$datos['departamento']."','".$datos['provincia']."', '".$datos['fecha_nacimiento']."',
						'".$datos['lugar_nacimiento']."')";
						$pdo->exec($sql);
						$pdo->commit();
						return $pdo;
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
				
                                         while($row = $sql->fetch()){
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

