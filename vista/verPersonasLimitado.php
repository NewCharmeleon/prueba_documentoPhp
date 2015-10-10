<?php
include_once '../controlador/conectarBBDD.php';
//Limito la busqueda 
$TAMANO_PAGINA = 10; 

//examino la página a mostrar y el inicio del registro a mostrar 
$pagina = $_GET["pagina"]; 
if (!$pagina) { 
   	$inicio = 0; 
   	$pagina=1; 
        //$criterio=1;
} 
else { 
   	$inicio = ($pagina - 1) * $TAMANO_PAGINA; 
}
echo '<a href="/prueba_documentoPhp/index.php";><br>Volver al Inicio</br></a>';
echo '<a href="documento.php";><br>Volver a pagina de Carga</br></a>';
echo '<br><br>';
$pdo = conectaBBDD();
$total_paginas=verCantidadDatosLimitados($pdo,$TAMANO_PAGINA,$pagina);
$personas = verPersonasPorPagina($pdo, $inicio, $TAMANO_PAGINA);
if($personas){
    echo '<br>'."Personas Cargadas".':'.'<br>';
    foreach($personas as $persona){
		echo '<table>';
                echo'<tr>';
                echo '<br><td>'.'||'.$persona["id"].'||'.$persona["nombre"].' '.$persona["apellido"].'&nbsp &nbsp &nbsp'. $persona["numero_documento"].
                        '&nbsp &nbsp '.$persona["sexo"].'&nbsp &nbsp '.$persona["nacionalidad"].'&nbsp &nbsp '.$persona["fecha_expedicion"].'&nbsp &nbsp '.
                        $persona["fecha_vencimiento"].'&nbsp &nbsp '.$persona["domicilio"].'&nbsp &nbsp '.$persona["ciudad"].'&nbsp &nbsp '.$persona["departamento"].
                        '&nbsp &nbsp '.$persona["provincia"].'&nbsp &nbsp '.$persona["fecha_nacimiento"].'&nbsp &nbsp '.$persona["lugar_nacimiento"].'||'.'</td>';
                
                echo '</tr>';
                echo'</table>';
                
    };
}



//muestro los distintos índices de las páginas, si es que hay varias páginas 
if ($total_paginas > 1){ 
   	for ($i=1;$i<=$total_paginas;$i++){ 
      	if ($pagina == $i) 
         	//si muestro el índice de la página actual, no coloco enlace 
         	echo $pagina . " "; 
      	else 
         	//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 
         	echo "<a href='verPersonasLimitado.php?pagina=" . $i . "'>" . $i . "</a> "; 
   	} 
}
/*$personas = verPersonasPorPagina($pdo, $criterio, $inicio, $TAMANO_PAGINA);

foreach($personas as $persona){
		echo $persona["Id"];

};*/
