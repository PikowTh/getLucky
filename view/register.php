<?php

require_once '../controller/RegisterRegex.php';


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../assets/style/style.css">
</head>

<body>

    
        
    
    <div id="containerformregister">

        <?php
        if ($registerSuccess) { ?>
            <div>
                <h1>Bravo vous êtes inscris</h1>

                <a href="../index.php">Se connecter</a>
            </div>
        <?php } else { ?>
            <form id="formregister" action="" method="post">
                <div>
                    <div class="container-input">
                        <input type="mail" placeholder="Mail" id="Mail" name="Mail" value="<?= isset($_POST['Mail']) ? htmlspecialchars($_POST['Mail']) : '' ?>">
                    </div>
                    <div class="container-error-input">
                        <span><?= isset($error['Mail']) ? $error['Mail'] : '' ?></span>
                    </div>
                </div>
                <div>
                    <div class="container-input">
                        <input type="text" placeholder="Pseudo" id="Pseudo" name="Pseudo" value="<?= isset($_POST['Pseudo']) ? htmlspecialchars($_POST['Pseudo']) : '' ?>">
                    </div>
                    <div class="container-error-input">
                        <span><?= isset($error['Pseudo']) ? $error['Pseudo'] : '' ?></span>
                    </div>
                </div>
                <div>
                    <div class="container-input">
                        <input type="phone" placeholder="numéro telephone" id="PhoneNumber" name="PhoneNumber" value="<?= isset($_POST['PhoneNumber']) ? htmlspecialchars($_POST['PhoneNumber']) : '' ?>">
                    </div>
                    <div class="container-error-input">
                        <span><?= isset($error['PhoneNumber']) ? $error['PhoneNumber'] : '' ?></span>
                    </div>
                </div>
                <div>
                    <div class="container-input">
                        <input type="date" placeholder="date de naissance" id="BirthDate" name="BirthDate" value="<?= isset($_POST['BirthDate']) ? htmlspecialchars($_POST['BirthDate']) : '' ?>">
                    </div>
                    <div class="container-error-input">
                        <span><?= isset($error['BirthDate']) ? $error['BirthDate'] : '' ?></span>

                    </div>
                </div>
                <div>
                    <div class="container-input">
                        <input type="password" placeholder="mot de passe" id="Password" name="Password" value="<?= isset($_POST['Password']) ? htmlspecialchars($_POST['Password']) : '' ?>">
                    </div>
                    <div class="container-error-input">
                        <span><?= isset($error['Password']) ? $error['Password'] : '' ?></span>
                    </div>
                </div>
                <div>
                    <div class="container-input">
                        <input type="password" placeholder="vérification mot de passe" id="VerifPassword" name="VerifPassword" value="<?= isset($_POST['VerifPassword']) ? htmlspecialchars($_POST['VerifPassword']) : '' ?>">
                    </div>
                    <div class="container-error-input">
                        <span><?= isset($error['VerifPassword']) ? $error['VerifPassword'] : '' ?></span>
                    </div>
                </div>

                <!-- inserer la div avec la data-sitekey -->
                <div class="g-recaptcha testcaptcha" data-sitekey="6LfCfMAZAAAAAJJ_sr8K8LJJWybh2YJG3feJV9Ip"></div>

                <div>
                    <button type="submit" id="Register-submit" name="Register-submit">S'inscrire</button>
                    <a href="../index.php" class="btn-login">se connecter</a>
                </div>


    </div>
    </form>
<?php } ?>



</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>

</html>