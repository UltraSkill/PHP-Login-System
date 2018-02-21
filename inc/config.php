<?php 
//si no hay constante definida llamada __CONFIG__, no se podra cargar el archivo
if(!defined('__CONFIG__')){
    exit ("Hace falta el archvio de configuracion");
} 

// nuestra configuracion esta abajo

//include the DB.php file
include_once "classes/DB.php";
include_once "classes/filter.php";

$con = DB::getConnection();
?>