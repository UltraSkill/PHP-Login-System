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
        //$email =strtolower($email); //HACE EL STRING MINUSCULAS
        //make sure the user does not exist
        $findUser = $con->prepare("SELECT user_id, password FROM users WHERE email= LOWER(:email) LIMIT 1");
        $findUser->bindParam(':email',$email, PDO::PARAM_STR);
        $findUser->execute();
        if($findUser->rowCount()==1){
            //user exist
            $User = $findUser->fetch(PDO::FETCH_ASSOC);
            $user_id= (int) $User['user_id'];
            $hash = (string) $User['password'];
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