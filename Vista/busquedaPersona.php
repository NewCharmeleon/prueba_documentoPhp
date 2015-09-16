<?php

//INCLUYO LA HOJA DE ESTILOS///Para modificar
?>
<link href="css/paginacion.css" type="text/css" rel="stylesheet">
<?
include "controlador/conexionBBDD.php";
try{
	$conn= new PDO('mysql:host=localhost;dbname=documento',$usuario,$password);
}catch(PDOException $e){
					
					echo "Usuario Incorrecto";
					echo '<a href="../index.php";><br>Volver a Loguearse</br></a>';
					throw new Exception($e->getMessage());
				
					
	}

//AL PRINCIPIO COMPRUEBO SI HICIERON CLICK EN ALGUNA PÁGINA
if(isset($_GET['page'])){
    $page= $_GET['page'];
}else{
//SI NO DIGO Q ES LA PRIMERA PÁGINA
    $page=1;
}

//ACA SE SELECCIONAN TODOS LOS DATOS DE LA TABLA
$sql="SELECT * FROM personas";
$stmt = $conn->prepare($sql);
$stmt->execute();

//MIRO CUANTOS DATOS FUERON DEVUELTOS
$num_rows=$stmt->rowCount;

//ACA SE DECIDE CUANTOS RESULTADOS MOSTRAR POR PÁGINA , EN EL EJEMPLO PONGO 10
$rows_per_page= 10;

//CALCULO LA ULTIMA PÁGINA
$lastpage= ceil($num_rows / $rows_per_page);

//COMPRUEBO QUE EL VALOR DE LA PÁGINA SEA CORRECTO Y SI ES LA ULTIMA PÁGINA
$page=(int)$page;
if($page > $lastpage){
    $page= $lastpage;
}
if($page < 1){
    $page=1;
}

//CREO LA SENTENCIA LIMIT PARA AÑADIR A LA CONSULTA QUE DEFINITIVA
$limit= 'LIMIT'. ($page -1) * $rows_per_page . ',' .$rows_per_page;

//REALIZO LA CONSULTA QUE VA A MOSTRAR LOS DATOS (ES LA ANTERIO + EL $limit)
$sql .=" $limit";
$stmt = $conn->prepare($sql);
$stmt->execute();
$personas= $stmt->fetch(PDO::FETCH_ASSOC);

if(!$personas){
        //SI FALLA LA CONSULTA MUESTRO ERROR
	die();
	}else{
      //SI ES CORRECTA MUESTRO LOS DATOS
      ?> <table><thead>
        <tr><th>Apellido</th><th>Nombre</th><th> Numero de Documento</th></tr>
		<tr><th>Sexo</th><th>Nacionalidad</th><th>
        </thead>
        <tbody>
    <? while($row = $stmt->fetch(PDO::FETCH_ASSOC)){  ?>
        <tr><td><? echo $row['apellido']; ?> </td><td> <? echo $row['nombre']; ?> </td>
		<td> <?echo $row['numero_documento']; ?> </td></tr>
		<tr><td><? echo $row['sexo']; ?> </td><td> <? echo $row['nacionalidad']; ?>
       <?  } ?>
      </tbody>
      </table>
<?
//UNA VEZ Q MUESTRO LOS DATOS TENGO Q MOSTRAR EL BLOQUE DE PAGINACIÓN SIEMPRE Y CUANDO HAYA MÁS DE UNA PÁGINA

if($numrows != 0){
   $nextpage= $page +1;
   $prevpage= $page -1;
?><ul id="pagination-digg"><?
//SI ES LA PRIMERA PÁGINA DESHABILITO EL BOTON DE PREVIOUS, MUESTRO EL 1 COMO ACTIVO Y MUESTRO EL RESTO DE PÁGINAS
 if ($page == 1) {
    ?>
      <li class="previous-off">&laquo; Previous</li>
      <li class="active">1</li> <?
    for($i= $page+1; $i<= $lastpage ; $i++){?>
            <li><a href="busquedas.php?page=<? echo $i;?>"><? echo $i;?></a></li>
 <? }
       //Y SI LA ULTIMA PÁGINA ES MAYOR QUE LA ACTUAL MUESTRO EL BOTON NEXT O LO DESHABILITO
    if($lastpage >$page ){?>       
      <li class="next"><a href="busquedas.php?page=<? echo $nextpage;?>" >Next &raquo;</a></li><?
    }else{?>
      <li class="next-off">Next &raquo;</li>
<?  }
 } else {
    ?>
    //EN CAMBIO SI NO ESTAMOS EN LA PÁGINA UNO HABILITO EL BOTON DE PREVIUS Y MUESTRO LAS DEMÁS
      <li class="previous"><a href="busquedas.php?page=<? echo $prevpage;?>"  >&laquo; Previous</a></li><?
      for($i= 1; $i<= $lastpage ; $i++){
                       //COMPRUEBO SI ES LA PÁGINA ACTIVA O NO
            if($page == $i){
        ?>  <li class="active"><? echo $i;?></li><?
            }else{
        ?>  <li><a href="busquedas.php?page=<? echo $i;?>" ><? echo $i;?></a></li><?
            }
      }
         //SI NO ES LA ÚLTIMA PÁGINA ACTIVO EL BOTON NEXT    
      if($lastpage >$page ){    ?> 
      <li class="next"><a href="busquedas.php?page=<? echo $nextpage;?>">Next &raquo;</a></li><?
      }else{
    ?> <li class="next-off">Next &raquo;</li><?
      }
 }   
?></ul></div><?
}