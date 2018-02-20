<?php 
    //perimite el archivo config
    define('__CONFIG__', true);
    // requiere el archivo config
    require_once "../inc/config.php"; 
    //siempre regresa el formato JSON
    

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        header('Content-Type: application/json');
        $return = [];

        //make sure the user does not exist
        // make sure the user CAN be added AND is added
        //Return the proper information back to javascript to redirect us
        $return['redirect']='dashboard.php';
        $return['name']="Tlacaelel Leon";
        echo json_encode($return, JSON_PRETTY_PRINT); 
        exit;
    }else{
        //die kill the script redirect the user
        exit('test');
    }
    
?>