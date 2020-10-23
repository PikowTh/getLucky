<?php

require_once '../controller/registerController.php';

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

    <div class="container main-body">
        <?php
        if ($registerSuccess) { ?>
            <div>
                <h1>Bravo vous êtes inscris</h1>
                <a href="../index.php">Se connecter</a>
            </div>
        <?php } else {

            include_once '../include/registerForm.php'; ?>

            <!-- lien se connecter ----------------------------------------- -->
            <div class="row justify-content-center">
                <span class="text-dark">Déja inscrit ? <a href="../index.php" class="btn-login text-dark font-weight-bold"> Je me connecte ! </a></span>
            </div>

        <?php } ?>

    </div><!-- Fin du main container -->
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