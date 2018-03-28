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
        $user_found=User::Find($email);
        if($user_found){
            //user exist
            $return['error']="You already have an account";
        }
        else{
            
            //user does not  exist. add them now
            $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
            $addUser =$con->prepare("INSERT INTO users(email, password) VALUES (LOWER(:email), :password)");
            $addUser ->bindParam(':email',$email, PDO::PARAM_STR);
            $addUser ->bindParam(':password',$password, PDO::PARAM_STR);
            $addUser->execute();
            $user_id=$con->lastInsertId();
            $_SESSION['user_id']=(int)$user_id;
            $return['redirect']='dashboard.php?message=welcome';
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