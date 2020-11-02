<?php

require_once '../controller/betsController.php';

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
                <p class="text-center bet-title text-uppercase"><span class="align-middle"><i class="fas fa-star mr-2"></i>Petits défis entre amis<i class="fas fa-star ml-2"></i></span></p>
            </div>
        </div>

        <div class="row">
            <div class="col primary-color-dark shadow text-white">
                <p class="title-contact"><span class="icon-title"><i class="far fa-comments"></i></span>Mes défis en cours</p>
            </div>
        </div>

        <div class="row shadow m-1">
            <div class="col-2 p-2 mx-auto text-center">
                <i class="icon-type <?= $typeOfArray[4] ?>"></i>
            </div>

            <button class="btn col-9 text-center p-1">
                <p class="bet-description font-weight-bold">Croquettes</p>
                <p class="bet-description">Croquettes</p>
            </button>

        </div>

        <div class="row">
            <div class="col primary-color-dark shadow text-white">
                <p class="title-contact"><span class="icon-title"><i class="far fa-comment-dots"></i></span>Mes défis en attentes</p>
            </div>
        </div>

        <div class="row shadow m-1">
            <div class="col-2 border"><img src="https://images-na.ssl-images-amazon.com/images/I/61ZPMSBB8yL._AC_SY679_.jpg" class="card-img test" alt="naruto-image"></div>
            <div class="col-10 border text-center">Pari pari</div>
        </div>


        <div class="row">
            <div class="col primary-color-dark shadow text-white">
                <p class="title-contact"><span class="icon-title"><i class="fas fa-comment"></i></span>Mes défis terminés</p>
            </div>
        </div>

        <div class="row shadow m-1">
            <div class="col-2 border"><img src="https://images-na.ssl-images-amazon.com/images/I/61ZPMSBB8yL._AC_SY679_.jpg" class="card-img test" alt="naruto-image"></div>
            <div class="col-10 border text-center">Pari pari</div>
        </div>

        <!-- permet le scroll du bas -->
        <div class="bottom-div"></div>

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
    <!-- Sweet Alert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>