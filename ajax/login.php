<?php 
    //perimite el archivo config
    define('__CONFIG__', true);
    // requiere el archivo config
    require_once "../inc/config.php"; 
    //siempre regresa el formato JSON
    
    
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        //header('Content-Type: application/json');
        $return = [];
        $email =Filter::String($_POST['email']);
        $password=$_POST['password'];
        $user_found=User::Find($email,true);
        if($user_found){
            //user exist
            $user_id= (int) $user_found['user_id'];
            $hash = (string) $user_found['password'];
            if(password_verify($password,$hash)){
                //user is signed in
                $return['redirect']='dashboard.php';
                $_SESSION['user_id']=$user_id;
            }else {
                //invalid user/password
                $return['error']="Invalid user email/password";
            }
        }
        else{
            //they need to create a new account
            $return['error']="You do not have an account. <a href='register.php'>Create one now?</a>";
        }
        // make sure the user CAN be added AND is added
        //Return the proper information back to javascript to redirect us
        $return['name']="Tlacaelel Leon";
        echo json_encode($return, JSON_PRETTY_PRINT); 
        exit;
    }else{
        //die kill the script redirect the user
        exit('Invalid URL');
    }
    
?>