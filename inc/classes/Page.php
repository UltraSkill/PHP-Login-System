<?php 
//si no hay constante definida llamada __CONFIG__, no se podra cargar el archivo
if(!defined('__CONFIG__')){
    exit ("Hace falta el archvio de configuracion");
} 
class Page{
    static function ForceLogin()
    {
        if(isset($_SESSION['user_id'])){
            //the user is allowed here
        }
        else 
        {
            //the user is not allowed
            header("Location: login.php"); exit;
        }
    }
    static function ForceDashboard(){
        if(isset($_SESSION['user_id'])){
            //the user is allowed here but redirect anyway
            header("Location: dashboard.php"); exit;
        }
        else 
        {
            //the user is not allowed
            
        }
    }

}

?>