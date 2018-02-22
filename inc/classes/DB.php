<?php 
//si no hay constante definida llamada __CONFIG__, no se podra cargar el archivo
if(!defined('__CONFIG__')){
    exit ("Hace falta el archvio de configuracion");
} 
class DB {
    protected static $con;
    private function __construct(){
        try{
            self::$con= new PDO('mysql:charset=utf8mb4;host=localhost;port=3306;dbname=login_course','root','Evangelion01');
            self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$con->setAttribute(PDO::ATTR_PERSISTENT,false);
        }catch(PDOException $e){
            echo "Could not connect to database."; exit;
        }

    }
    public static function getConnection() {
        //if this instance was not been started. start it
        if(!self::$con){
            new DB();
        }
        //RETURN THE WRITABLE DB CONNECTION
        return self::$con;
    }
}

?>