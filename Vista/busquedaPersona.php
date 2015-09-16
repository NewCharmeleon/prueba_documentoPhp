<?php

//INCLUYO LA HOJA DE ESTILOS///Para modificar
?>
<link href="css/paginacion.css" type="text/css" rel="stylesheet">
<?
include('config/db.php');
$conn=get_db_conn();

//AL PRINCIPIO COMPRUEBO SI HICIERON CLICK EN ALGUNA PÁGINA
if(isset($_GET['page'])){
    $page= $_GET['page'];
}else{
//SI NO DIGO Q ES LA PRIMERA PÁGINA
    $page=1;
}

//ACA SE SELECCIONAN TODOS LOS DATOS DE LA TABLA
$consulta="SELECT * FROM peliculas";
$datos=mysql_query($consulta,$conn);

//MIRO CUANTOS DATOS FUERON DEVUELTOS
$num_rows=mysql_num_rows($datos);

//ACA SE DECIDE CUANTOS RESULTADOS MOSTRAR POR PÁGINA , EN EL EJEMPLO PONGO 15
$rows_per_page= 15;

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
$consulta .=" $limit";
$peliculas=mysql_query($consulta,$conn);

if(!$peliculas){
        //SI FALLA LA CONSULTA MUESTRO ERROR
 die('Invalid query: ' . mysql_error());
}else{
      //SI ES CORRECTA MUESTRO LOS DATOS
      ?> <table><thead>
        <tr><th>Título</th><th>Director</th><th> Año de producción</th></tr>
        </thead>
        <tbody>
    <? while($row = mysql_fecth_assoc($peliculas)){  ?>
        <tr><td><? echo $row['nombre']; ?> </td><td> <? echo $row['director']; ?> </td><td> <?echo $row['anio']; ?> </td></tr>
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