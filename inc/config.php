<?php 
//si no hay constante definida llamada __CONFIG__, no se podra cargar el archivo
if(!defined('__CONFIG__')){
    exit ("Hace falta el archvio de configuracion");
} 
// sessions are always turned on
if(!isset($_SESSION)){
    session_start();
}
// nuestra configuracion esta abajo
error_reporting(-1);
ini_set('display_errors','On');
//include the DB.php file
include_once "classes/DB.php";
include_once "classes/filter.php";

$con = DB::getConnection();
?>