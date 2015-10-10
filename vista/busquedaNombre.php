<?php 
session_start();
error_reporting(E_ALL);
ini_set("display_errors", true);
require_once "../controlador/conectarBBDD.php";
//include "controlador/porteroBBDD.php";
?>

<!DOCTYPE html>
<html lang="es">
    <!--Pagina Principal de Login de Usuario-->
    <head>
        <title>Formulario de validación de solicitud de Documento</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css">
    <h2><center>Bienvenido Usuario</center><h2><br>
            <h2><center>Registro Nacional de las Personas</center></h2>
            </head>
            <body>
                <div class="jumbotron">
                    <h2> <center> REPUBLICA ARGENTINA - MERCOSUR<br>
                            DOCUMENTO NACIONAL DE IDENTIDAD<br>
                            REGISTRO NACIONAL DE LAS PERSONAS</center></h2>


                    <form action="" method="get" role="form">	
                        <center><fieldset>

                                Busqueda por Nombre: <br> <input title="Ingrese Nombre a buscar" type="text" name="busquedaNom" id="busquedaNom"
                                                                 placeholder= "Ingrese Nombre" pattern="[a-zA-Z]{4,20}" 
                                                                 value = "" required /> <br><br>
                                                                 <?php $busquedaNom = busquedaNom; ?> 
                                <input id="action" type="hidden" name="busqueda" value="busqueda"/>
                                <center><button class="btn btn-primary btn-block" type="submit">Buscar Datos por Nombre</center>
                                <?php  $pdo = conectaBBDD();
                                         // die("gikakk");
                                          $pdo = verPersona($pdo);
                                 ?>         
                            </fieldset>
                        </center>
                    </form>
                </div>
            </body>
            </html>