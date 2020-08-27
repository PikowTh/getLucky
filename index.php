<?php

require_once 'controller/LoginRegex.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>

<body>

 
        <div class="logo">
            <figure></figure>
        </div>
 
    <div id="containerformregister">

        <form id="formregister" action="" method="post">
            <div>
                <div class="container-input">
                    <input type="mail" placeholder="Mail" id="Mail" name="Mail" value="<?= isset($_POST['Mail']) ? htmlspecialchars(strip_tags($_POST['Mail'])) : '' ?>">
                </div>
                <div class="container-error-input">
                    <span><?= (isset($error['Mail'])) ? $error['Mail'] : '' ?></span>
                </div>
            </div>
          
            <div>
                <div class="container-input">
                    <input type="password" placeholder="mot de passe" id="Password" name="Password" value="<?= isset($_POST['Password']) ? htmlspecialchars(strip_tags($_POST['Password'])) : '' ?>">
                </div>
                <div class="container-error-input">
                    <span><?= (isset($error['Password'])) ? $error['Password'] : '' ?></span>
                </div>
            </div>
            <div>
            <span><?= (isset($error['login'])) ? $error['login'] : '' ?></span>
                <button type="submit" id="Login-submit" name="Login-submit">Se Connecter</button>
                <a href="view/register.php" class="btn-register">s'inscrire</a>

            </div>
    </div>
    
    </form>
    
</div>


</body>

</html>