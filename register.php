<?php 
    //perimite el archivo config
    define('__CONFIG__', true);
    // requiere el archivo config
    require_once "inc/config.php"; 
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
        <div class="uk-grid uk-child-width-1-3@s uk-child-width-1-1" uk-grid>
            <form class="uk-form-stacked js-register">
                <h2>Register</h2>
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Email</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="form-stacked-text" required="required" type="email" placeholder="email@emal.com">
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Password</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="form-stacked-text" required="required" type="password" placeholder="Tu contraseña">
                    </div>
                </div>
                <div class="ul-margin uk-alert uk-alert-danger js-error" style="display: none;">
                </div>


                <div class="uk-margin">
                    <button class="uk-button uk-button-default" type="submit">Sing in</button>
                </div>
            </form>
        </div>
        
    </div>
    <?php require_once "inc/footer.php"; ?>
    
</body>
</html>