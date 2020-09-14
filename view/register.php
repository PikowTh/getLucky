<?php

require_once '../controller/RegisterRegex.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veine, votre jour de chance ?</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="../assets/css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="bg-veine">

    <div class="top-phone elegant-color-dark fixed-top">
    </div>

    <div class="container main-body">
        <?php
        if ($registerSuccess) { ?>
            <div>
                <h1>Bravo vous êtes inscris</h1>
                <a href="../index.php">Se connecter</a>
            </div>
        <?php } else { ?>

            <form id="formregister" action="" method="post">

                <div class="row justify-content-center">
                    <div class="col">
                        <input type="mail" placeholder="Mail" id="Mail" name="Mail" value="<?= isset($_POST['Mail']) ? htmlspecialchars($_POST['Mail']) : '' ?>">
                    </div>
                    <div class="container-error-input">
                        <span><?= isset($error['Mail']) ? $error['Mail'] : '' ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" placeholder="Pseudo" id="Pseudo" name="Pseudo" class="form-control rounded-pill" value="<?= isset($_POST['Pseudo']) ? htmlspecialchars($_POST['Pseudo']) : '' ?>">
                    </div>
                    <div class="container-error-input">
                        <span><?= isset($error['Pseudo']) ? $error['Pseudo'] : '' ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="phone" placeholder="numéro telephone" id="PhoneNumber" name="PhoneNumber" value="<?= isset($_POST['PhoneNumber']) ? htmlspecialchars($_POST['PhoneNumber']) : '' ?>">
                    </div>
                    <div class="container-error-input">
                        <span><?= isset($error['PhoneNumber']) ? $error['PhoneNumber'] : '' ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="date" placeholder="date de naissance" id="BirthDate" name="BirthDate" value="<?= isset($_POST['BirthDate']) ? htmlspecialchars($_POST['BirthDate']) : '' ?>">
                    </div>
                    <div class="container-error-input">
                        <span><?= isset($error['BirthDate']) ? $error['BirthDate'] : '' ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="password" placeholder="mot de passe" id="Password" name="Password" value="<?= isset($_POST['Password']) ? htmlspecialchars($_POST['Password']) : '' ?>">
                    </div>
                    <div class="container-error-input">
                        <span><?= isset($error['Password']) ? $error['Password'] : '' ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="password" placeholder="vérification mot de passe" id="VerifPassword" name="VerifPassword" value="<?= isset($_POST['VerifPassword']) ? htmlspecialchars($_POST['VerifPassword']) : '' ?>">
                    </div>
                    <div class="container-error-input">
                        <span><?= isset($error['VerifPassword']) ? $error['VerifPassword'] : '' ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <!-- inserer la div avec la data-sitekey -->
                        <div class="g-recaptcha testcaptcha" data-sitekey="6LfCfMAZAAAAAJJ_sr8K8LJJWybh2YJG3feJV9Ip"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" id="Register-submit" name="Register-submit">S'inscrire</button>
                        <a href="../index.php" class="btn-login">se connecter</a>
                    </div>
                </div>

            </form>

        <?php } ?>
    </div><!-- Fin du main container -->

    <div class="bottom-phone elegant-color-dark fixed-bottom">
        <?php
        include_once '../include/navbar.php';
        ?>
    </div>

    <!-- jQuery -->
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../assets/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../assets/js/mdb.min.js"></script>
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript"></script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>

</html>