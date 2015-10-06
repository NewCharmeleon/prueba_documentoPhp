<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors", true);
header('Content-Type: text/html; charset=utf-8');
require ('paravalidar.php');
require_once "controlador/conectarBBDD.php";

         $pdo = conectaBBDD('root','');
          // die("gikakk");
       $pdo = verPersonasCargadas($pdo);
?>	
