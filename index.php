<?php
require_once 'controller/indexController.php';
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

    <h1 class="text-center white-text mt-5 mb-2 txt-screen">VEINE</h1>
    <p class="text-center text-white">VEINARD ? C'est ici que tu le sauras !</p>

    <hr class="mb-5">
    
    <div class="container">

        <form id="formregister" action="" method="post">

            <div class="row justify-content-center">
                <div class="col-10">
                    <input type="mail" placeholder="Email" id="Mail" name="Mail" class="form-control rounded-pill" value="<?= isset($_POST['Mail']) ? htmlspecialchars(strip_tags($_POST['Mail'])) : '' ?>">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 text-center">
                    <div class="msg-error"><span class="font-italic white-text"><?= (isset($error['Mail'])) ? $error['Mail'] : '' ?><span></div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-10">
                    <input type="password" placeholder="Mot de passe" id="Password" name="Password" class="form-control rounded-pill" value="<?= isset($_POST['Password']) ? htmlspecialchars(strip_tags($_POST['Password'])) : '' ?>">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 text-center">
                    <div class="msg-error"><span class="font-italic white-text"><?= (isset($error['Password'])) ? $error['Password'] : '' ?></span></div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 text-center">
                    <button type="submit" id="Login-submit" name="Login-submit" class="btn white rounded-pill font-weight-bold blue-text">Connexion</button>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 text-center">
                    <span class="font-italic white-text"><?= (isset($error['login'])) ? $error['login'] : '' ?></span>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 text-center p-2">
                    <p><a href="view/register.php" class="text-dark">Première connexion</a></p>
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