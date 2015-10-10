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

function vincular($parametro, $valor, $var_type = null){
    
    if(is_null($var_type)){
        switch (true){
            case is_bool($valor):
                $var_type = PDO::PARAM_BOOL;
                break;
            case is_int($valor):
                $var_type = PDO::PARAM_INT;
                break;
            case is_null($valor):
                $var_type = PDO::PARAM_NULL;
                break;
            default:
                $var_type = PDO::PARAM_STR;
                
        }
        $stmt->bindValue($parametro, $valor, $var_type);
        return; 
    }
    
    
}
function insertarDatos($pdo,$datos){
        				try{
					$pdo->beginTransaction();
					/* $apellido = $datos[apellido];
                                         $nombre = $datos[nombre];
                                         $numero_documento = $datos[numeroDocumento];
                                        $sexo = $datos[sexo];
                                         $nacionalidad = $datos[nacionalidad];
                                        $archivos_externos = $datos[archivos_externos];
                                         $fecha_expedicion = $datos[fechaActual];
                                        $fecha_vencimiento = $datos[fechaVenc];
                                         $domicilio = $datos[domicilio];
                                        $ciudad = $datos[ciudad];
                                         $departamento = $datos[departamento];
                                        $provincia = $datos[provincia];
                                         $fecha_nacimiento = $datos[fechaNacimiento];
                                        $lugar_nacimiento = $datos[lugarNacimiento];*/
                                         
                                       $sql = "INSERT INTO personasbbdd.personas (id, apellido, nombre, numero_documento, sexo, nacionalidad,".
                                          
						"archivos_externos, fecha_expedicion, fecha_vencimiento, domicilio, ciudad, departamento, 
						provincia, fecha_nacimiento, lugar_nacimiento)".
						"VALUES ('null','".$datos['apellido']."', '".$datos['nombre']."','".$datos['numeroDocumento']."','".$datos['sexo']."',
						'".$datos['nacionalidad']."','".$datos['archivos_externos']."','".$datos['fechaActual']."','".$datos['fechaVenc']."',
                                                '".$datos['domicilio']."','".$datos['ciudad']."','".$datos['departamento']."','".$datos['provincia']."', '".$datos['fechaNacimiento']."',
						'".$datos['lugarNacimiento']."')";
					/* $sql = "INSERT INTO personasbbdd.personas (apellido, nombre, numero_documento, sexo, nacionalidad,
						archivos_externos, fecha_expedicion, fecha_vencimiento, domicilio, ciudad, departamento, 
						provincia, fecha_nacimiento, lugar_nacimiento) VALUES (':apellido', ':nombre', ':numero_documento',
                                               ':sexo', ':nacionalidad', ':archivos_externos', ':fecha_expedicion',':fechavencimiento', ':domicilio', ':ciudad',
                                               ':departamento', ':provincia', ':fecha_nacimiento', ':lugar_nacimiento')";
                                       /* $pdo->bindParam(':apellido', $apellido, PDO::PARAM_STR);
                                        $conn->bindParam(':nombre', $datos[nombre], PDO::PARAM_STR);
                                         $conn->bindParam(':numero_documento', $datos[numeroDocumento], PDO::PARAM_INT);
                                        $conn->bindParam(':sexo', $datos[sexo], PDO::PARAM_STR);
                                         $conn->bindParam(':nacionalidad', $datos[nacionalidad], PDO::PARAM_STR);
                                        $conn->bindParam(':archivos_externos', $datos[archivos_externos], PDO::PARAM_STR);
                                         $conn->bindParam(':fecha_expedicion', $datos[fechaActual], PDO::PARAM_STR);
                                        $conn->bindParam(':fecha_vencimiento', $datos[fechaVenc], PDO::PARAM_STR);
                                         $conn->bindParam(':domicilio', $datos[domicilio], PDO::PARAM_STR);
                                        $conn->bindParam(':ciudad', $datos[ciudad], PDO::PARAM_STR);
                                         $conn->bindParam(':departamento', $datos[departamento], PDO::PARAM_STR);
                                        $conn->bindParam(':provincia', $datos[provincia], PDO::PARAM_STR);
                                         $conn->bindParam(':fecha_nacimiento', $datos[fechaNacimiento], PDO::PARAM_STR);
                                        $conn->bindParam(':lugar_nacimiento', $datos[lugarNacimiento], PDO::PARAM_STR);	
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
 function verPersona($pdo){
                                $busqueda = $_GET['busqueda'];
     
                                try{
					$sql = "SELECT apellido, nombre, numero_documento, sexo, nacionalidad,
                                        archivos_externos, fecha_expedicion, fecha_vencimiento, domicilio, ciudad, departamento, 
                                        provincia, fecha_nacimiento, lugar_nacimiento FROM personas WHERE nombre = :busqueda" ;
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->bindParam(':busqueda', $busqueda, PDO::PARAM_STR);
                                        $stmt->execute();
				
                                       
                                        
                                         while($row = $stmt->fetch()){
                                           echo $row['nombre'];
                                        }
                                    }catch(PDOException $e){
						$pdo->rollBack();
						echo 'Error: Los datos no existen en la tabla' . $e->getMessage();
				}
     
     
 }
function verPersonasCargadas($pdo){
    
                                    try{
					$sql = "SELECT * FROM personasbbdd.personas" ;
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();
                                        $res = $stmt->fetchAll();
                                         
                                        return $res;
                                    }catch(PDOException $e){
						$pdo->rollBack();
						echo 'Error: Los datos no existen en la tabla' . $e->getMessage();
				}
 }
function verPersonasPorPagina($pdo, $criterio, $inicio, $TAMANO_PAGINA){
    
                                    try{
					$sql = "SELECT * FROM personas".$criterio." limit " . $inicio . "," . $TAMANO_PAGINA;
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();
                                        $res=$stmt->fetchALL();
                                         //while($row = $stmt->fetchALL()){
                                           //echo $row['nombre'];
                                        //}
                                        return $res;
                                    }catch(PDOException $e){
						$pdo->rollBack();
						echo 'Error: Los datos no existen en la tabla' . $e->getMessage();
				}
 }                                
function verCantidadDatos($pdo,$TAMANO_PAGINA,$pagina){
                                    try{
					$sql = "SELECT * FROM personasbbdd.personas" ;
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();
                                       //$num_rows=($stmt->rowCount);
                                        $num_rows=COUNT($stmt->fetchALL());
                                        $total_paginas = ceil($num_rows/$TAMANO_PAGINA);
                                         echo "Número de registros encontrados: " . $num_rows . "<br>"; 
                                        echo "Se muestran páginas de " . $TAMANO_PAGINA . " registros cada una<br>"; 
                                        echo "Mostrando la página " . $pagina . " de " . $total_paginas . "<p>";
                                        return $total_paginas;
                                    }catch(PDOException $e){
						$pdo->rollBack();
						echo 'Error: Los datos no existen en la tabla' . $e->getMessage();
				}
    
    
}
