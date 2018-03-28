<?php 
    //perimite el archivo config
    define('__CONFIG__', true);
    // requiere el archivo config
    require_once "inc/config.php"; 
    
    Page::ForceLogin();
    
    $User = new User($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.40/css/uikit.min.css" />
</head>
<body>

    <div class="uk-section uk-container">
        <h2>Dashboard</h2>
        <p>Hello <?php echo $User->email; ?>, you registered at <?php echo $User->reg_time;?></p>
        <a href="logout.php">Log Out</a>
    </div>
    <?php require_once "inc/footer.php"; ?>
    
</body>
</html>