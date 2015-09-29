<?php
//Funcion que verifica si las variables POST han sido seteadas.
/*function verificarSeteo(){
        
        $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : null;
	$nombre= isset($_POST['nombre']) ? $_POST['nombre'] : null;
	$numeroDocumento= isset($_POST['numeroDocumento']) ? $_POST['numeroDocumento'] : null;
	$sexo= isset($_POST['sexo']) ? $_POST['sexo'] : null;
	$nacionalidad= isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : null;
	$foto= isset($_POST['foto']) ? $_POST['foto'] : null;
	$domicilio= isset($_POST['domicilio']) ? $_POST['domicilio'] : null;
	$ciudad= isset($_POST['ciudad']) ? $_POST['ciudad'] : null;
	$departamento= isset($_POST['departamento']) ? $_POST['departamento'] : null;
	$provincia= isset($_POST['provincia']) ? $_POST['provincia'] : null;
	$fechaNacimiento= isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : null;
	$lugarNacimiento= isset($_POST['lugarNacimiento']) ? $_POST['lugarNacimiento'] : null;
       
}*/
function crearArrays1(){
    $nacionalidades = array("Seleccione su Nacionalidad: ", "Argentina", "Extranjero");
    
}
function crearArrays2(){
    
    $provincias = array('Seleccione una provincia: ', 'Buenos Aires', 'Catamarca', 
    'Chaco','Chubut','Córdoba', 'Corrientes', 'Entre Ríos', 'Formosa', 'Jujuy', 
    'La Pampa','La Rioja', 'Mendoza', 'Misiones', 'Neuquén', 'Río Negro', 'Salta',
    'San Juan','San Luis', 'Santa Cruz', 'Santa Fé', 'Santiago del Estero',
    'Tierra del Fuego', 'Tucumán');
}
function verificarDatos(){
       
	
	$datos['apellido'] = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
	$datos['nombre'] = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
	$datos['numeroDocumento'] = filter_var($_POST['numeroDocumento'], FILTER_VALIDATE_INT);
	$datos['sexo'] = filter_var($_POST['sexo'], FILTER_SANITIZE_SPECIAL_CHARS);
	$datos['nacionalidad'] = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : null;
	$datos['archivo'] = isset($_POST['archivo']) ? $_POST['archivo'] : null;
	$datos['fechaActual']=date("Y/m/d");
	$datos['fechaVenc']=date("'d-m-Y',strtotime('+15 Year')");
	$datos['domicilio'] = filter_var($_POST['domicilio'], FILTER_SANITIZE_STRING);
	$datos['ciudad']= filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
	$datos['departamento']= filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
	
	$datos['provincia']= isset($_POST['provincia']) ? $_POST['provincia'] : null;
	$datos['fechaNacimiento'] =date($_POST['anio']."/".$_POST['mes']."/".$_POST['dia']);
	$datos['lugarNacimiento']=isset($_POST['lugarNacimiento']) ? $_POST['lugarNacimiento'] : null;
	
}

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
	//Funcion PHP para validar Usuario
	function validarUsuario($valor)	{
		$permitidos =  '/^[a-zA-Z]{20}$/i';
		if (preg_match($permitidos,$valor)){
			return true;
		}else{
			return false;
		}
	}
	//Funcion PHP para validar Clave
	function validarClave($valor)	{
		$permitidos =  '/^[a-zA-Z0-9]{8}$/i';
		if (preg_match($permitidos,$valor)){
			return true;
		}else{
			return false;
		}
	}
	//Funcion PHP para validar Alfanumerico
	
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
	
                
                
                
        function redirigirPagina($num,$url){
             static $http = array (
                100 => "HTTP/1.1 100 Continue",
                200 => "HTTP/1.1 200 OK",
                300 => "HTTP/1.1 300 Multiple Choices",
                301 => "HTTP/1.1 301 Moved Permanently",
                302 => "HTTP/1.1 302 Found",
                400 => "HTTP/1.1 400 Bad Request",
                401 => "HTTP/1.1 401 Unauthorized",
                403 => "HTTP/1.1 403 Forbidden",
                404 => "HTTP/1.1 404 Not Found",
                500 => "HTTP/1.1 500 Internal Server Error",
                501 => "HTTP/1.1 501 Not Implemented",
                502 => "HTTP/1.1 502 Bad Gateway",
                503 => "HTTP/1.1 503 Service Unavailable",
                504 => "HTTP/1.1 504 Gateway Time-out"
            );
   header($http[$num]);
   header ("Location: $url");
}

?>
        