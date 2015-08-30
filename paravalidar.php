<?php
/* Validar los datos ingresados DESDE PHP:
-- presencia (campos obligatorios)
-- formato (ej. sólo números)
-- reglas de negocio (ej. la fecha de vencimiento no puede ser menor o igual que la fecha de nacimiento y emisión).
-- Separar la lógica de la parte visual (archivos PHP separados, usar función 'require)'
-- Si el formulario no es válido, redirigir al formulario mostrando el error correspondiente.
-- Si el formulario es válido, mostrar una nueva página con los datos ingresados.
-- Si se intenta "saltear" la validación (ej. acceder a la nueva página directamente) redirigir a la página inicial (función header)*/
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
			return false;
		}else{
			return true;
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
	?>	

