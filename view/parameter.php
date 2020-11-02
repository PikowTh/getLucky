<?php

require_once '../controller/parameterController.php';

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

        <div id="myId" class="p-2">
            <div class="row">
                <div class="col-3 user-avatar text-center rounded-lg">
                    <i class="far fa-user"></i>
                </div>
                <div class="col user-name">
                    <div class="text-uppercase h2"><?= $_SESSION['User']['users_pseudo'] ?></div>
                    <div><?= $_SESSION['User']['users_mail'] ?></div>
                </div>
            </div>
        </div>


        <div class="container-fluid">

            <?php

            if (!isset($_POST['modify'])) { ?>
                <form action="" method="POST">
                    <div><button name="modify" value="mail" type="submit" class="btn border border-dark rounded w-100 mx-auto">E-mail</button></div>
                    <div><button name="modify" value="phone" type="submit" class="btn border border-dark rounded w-100 mx-auto">Téléphone</button></div>
                    <div><button name="modify" value="password" type="submit" class="btn border border-dark rounded w-100 mx-auto">Mot de passe</button></div>
                </form>
                <form method="post" action="../view/deconnexion.php">
                    <div><button name="killSession" type="submit" class="btn blue accent-1 font-weight-bold rounded w-100 mx-auto">Déconnexion</button></div>
                </form>
            <?php }

            if (isset($_POST['modify'])) {

                switch ($_POST['modify']) {
                    case "mail":
                        include '../include/mailModifyForm.php';
                        break;
                    case "phone":
                        include '../include/phoneModifyForm.php';
                        break;
                    case "password":
                        include '../include/passwordModifyForm.php';
                        break;
                }
            }

            ?>

        </div>

        <div class="bottom-phone elegant-color-dark fixed-bottom">
            <?php include_once '../include/navbar.php' ?>
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