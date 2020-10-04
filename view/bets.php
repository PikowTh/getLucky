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

    <!-- <img src="https://images-na.ssl-images-amazon.com/images/I/61ZPMSBB8yL._AC_SY679_.jpg" class="card-img test" alt="naruto-image"> -->

        <div class="row shadow m-1 pari">
            <div class="col"><img src="https://images-na.ssl-images-amazon.com/images/I/61ZPMSBB8yL._AC_SY679_.jpg" class="card-img test" alt="naruto-image"></div>
            <div class="col">Pari pari</div>
        </div>

        <div class="row shadow m-1 pari">
            <div class="col-2 border"><img src="https://images-na.ssl-images-amazon.com/images/I/61ZPMSBB8yL._AC_SY679_.jpg" class="card-img test" alt="naruto-image"></div>
            <div class="col-10 border text-center">Pari pari</div>
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
    <!-- Sweet Alert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>