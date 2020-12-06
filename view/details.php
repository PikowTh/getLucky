<?php

require_once '../controller/detailsController.php';

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
        <div class="row">
            <div class="col">
                <p class="text-center bet-title text-uppercase"><span class="align-middle"><i class="fas fa-crown mr-2"></i>" .. Veine .. "<i class="far fa-gem ml-2"></i></span></p>
            </div>
        </div>

        <div class="row">
            <div class="col primary-color-dark shadow text-white">
                <p class="title-contact"><span class="icon-title"><i class="fas fa-info-circle"></i></span>Détails du pari</p>
            </div>
        </div>

        <?php
        if ($betDetails['challenger'] == $_SESSION['User']['users_id']) {
            echo 'c le mien';
            // comparaison date ok
            $dateNow = date('Y-m-d H:i:s');
            var_dump($dateNow > $betDetails['bets_end_time']);
        }
        ?>

        <div class="row shadow m-1">
            <div class="col-12 p-2">
                <p class="text-center h2 font-weight-bold text-uppercase m-0"><?= $betDetails['users_pseudo'] ?></p>
                <p class="text-center m-0">te défie !</p>
            </div>
        </div>

        <div class="row shadow m-1">
            <div class="col-12 p-2">
                <p class="text-center h6 font-weight-bolder text-uppercase m-0"><?= $betDetails['bets_description'] ?></p>
            </div>
        </div>

        <div class="row shadow m-1">
            <div class="col-12 text-center p-2">
                <?php
                    $dateTimeArray = explode(' ', $betDetails['bets_end_time']);
                ?>
                <div><input type="text" class="text-center" value="<?= $dateTimeArray[0] ?>" disabled></div>
                <div><input type="text" class="text-center" value="<?= $dateTimeArray[1] ?>" disabled></div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-5 text-center">
                <button type="button" class="btn btn-success btn-sm rounded">j'accepte !</button>
            </div>
            <div class="col-5 text-center">
                <button type="button" class="btn btn-danger btn-sm rounded">non merci !</button>
            </div>
        </div>

        <div class="row justify-content-center m-1">
            <div class="btn border border-dark col-4 h3" onclick="history.go(-1)"><i class="fas fa-arrow-left"></i></div>
        </div>

        <div class="bottom-div">
            <!-- permet le scroll du bas -->
        </div>

    </div><!-- fin container main body -->

    <div class="bottom-phone elegant-color-dark fixed-bottom">
        <?php
        include_once '../include/navbar.php'
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
    <script></script>
</body>

</html>