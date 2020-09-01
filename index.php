<?php
require_once 'controller/LoginRegex.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veine, jour de chance ?</title>

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

<body class="blue darken-3">


    <h1>VEINE</h1>

    <div class="container">

        <form id="formregister" action="" method="post">

            <div class="row justify-content-center">
                <div class="col-6">
                    <input type="mail" placeholder="mail" id="Mail" name="Mail" class="form-control" value="<?= isset($_POST['Mail']) ? htmlspecialchars(strip_tags($_POST['Mail'])) : '' ?>">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 text-center">
                    <span class="font-italic white-text"><?= (isset($error['Mail'])) ? $error['Mail'] : 'Renseigner champs' ?><span>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-6">
                    <input type="password" placeholder="mot de passe" id="Password" name="Password" class="form-control" value="<?= isset($_POST['Password']) ? htmlspecialchars(strip_tags($_POST['Password'])) : '' ?>">
                    <div class="container">
                        <span class="font-italic white-text"><?= (isset($error['Password'])) ? $error['Password'] : 'Renseigner champs' ?></span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6">
                    <button type="submit" id="Login-submit" name="Login-submit" class="btn btn-unique btn-sm">Se Connecter</button>
                    <div class="container">
                        <span class="font-italic white-text"><?= (isset($error['login'])) ? $error['login'] : '' ?></span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6">
                    <a href="view/register.php">Pas encore inscrit ? C'est par ici</a>
                </div>
            </div>

        </form>

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
</body>

</html>