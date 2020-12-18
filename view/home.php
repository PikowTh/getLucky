<?php

require_once '../controller/homeController.php';

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
        <form action="details.php" method="post">
            <div class="row">
                <div class="col">
                    <p class="text-center bet-title text-uppercase"><span class="align-middle"><i class="fas fa-crown mr-2"></i>" .. Veine .. "<i class="far fa-gem ml-2"></i></span></p>
                </div>
            </div>

            <div class="row">
                <div class="col primary-color-dark shadow text-white">
                    <p class="title-contact"><span class="icon-title"><i class="far fa-bell"></i></span>Incoming Battle !!!</p>
                </div>
            </div>

            <?php foreach ($betsArray as $bet) {
                if ($bet['bets_accepted'] == 1) {
                    echo ' ';
                    continue;
                } ?>
                <div class="row shadow m-1">

                    <div class="col-2 p-2 mx-auto text-center">
                        <i class="icon-type <?= $typeOfArray[$bet['bet_types_id']] ?>"></i>
                    </div>

                    <button name="betId" value="<?= $bet['bets_id'] ?>" class="btn col-9 text-center p-1">
                        <p class="bet-description-title font-weight-bold"><?= $bet['bets_name'] ?></p>
                        <p class="bet-description text-center text-truncate"><?= $bet['bets_description'] ?></p>
                    </button>

                </div>
            <?php } ?>
        </form>
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