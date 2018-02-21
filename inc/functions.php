<?php 
//force the user to logged in
    function ForceLogin()
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
    function ForceDashboard(){
        if(isset($_SESSION['user_id'])){
            //the user is allowed here but redirect anyway
            header("Location: dashboard.php"); exit;
        }
        else 
        {
            //the user is not allowed
            
        }
    }
?>