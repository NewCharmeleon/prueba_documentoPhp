<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=documento','Admin','Admin123');
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, TRUE);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET NAMES UTF8");
    

$apellido = isset($_GET['apellido']) ? $_GET['apellido'] : null;
$documento = isset($_GET['documento']) ? $_GET['documento'] : null;
$ciudad = isset($_GET['ciudad']) ? $_GET['ciudad'] : null;

if((!$apellido) && (!$documento) && ($ciudad))
{
    http_response_code(400);
    die();
}
if (!($apellido==null)){
$apellido = strtoupper($apellido);

$sql =""
        . "select per_no as id, "
        . "concat_ws(' ', apellido, nombre) as label, "
        . "concat_ws(' ', apellido, nombre) as value "
        . "from documento.personas where upper(last_name) like :apellido limit 10";
$stmt = $pdo->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);

$stmt->bindParam(':apellido', $apellido);
$stmt->execute();

$results = $stmt->fetchAll();
}else 
	if (!($documento==null)){
		$sql =""
			. "select per_no as id, "
			. "concat_ws(' ', apellido, nombre, documento) as label, "
			. "concat_ws(' ', apellido, nombre, documento) as value "
			. "from documento.personas where numero_documento = :documento limit 10";
			$stmt = $pdo->prepare($sql);
			$stmt->setFetchMode(PDO::FETCH_ASSOC);

			$stmt->bindParam(':numero_documento', $documento);
			$stmt->execute();

			$results = $stmt->fetchAll();
		}	
	}
}else{
		$sql =""
			. "select per_no as id, "
			. "concat_ws(' ', apellido, nombre, documento, ciudad) as label, "
			. "concat_ws(' ', apellido, nombre, documento, ciudad) as value "
			. "from documento.personas where ciudad = :ciudad limit 10";
			$stmt = $pdo->prepare($sql);
			$stmt->setFetchMode(PDO::FETCH_ASSOC);

			$stmt->bindParam(':ciudad', $ciudad);
			$stmt->execute();

			$results = $stmt->fetchAll();
	}	
}

//COMIENZA EL WEB SERVICE
header('Content-Type: application/json; charset=UTF-8');

echo json_encode($results, true);

} catch (PDOException $e) {
	 
    die('Error de conexion: ' . $e->getMessage());
}