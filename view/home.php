<?php
session_start();

if (!isset($_SESSION['User'])) {
    header('Location: ../index.php');
}

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

    <div class="stepper-nav">
            <div class="row justify-content-between">
                <div class="col text-center">
                    <span class="stepper-badge badge unique-color-dark">1</span>
                </div>
                <div class="col text-center">
                    <span class="stepper-badge badge grey">2</span>
                </div>
                <div class="col text-center">
                    <span class="stepper-badge badge grey">3</span>
                </div>
                <div class="col text-center">
                    <span class="stepper-badge badge grey">4</span>
                </div>
                <div class="col text-center">
                    <span class="stepper-badge badge grey">GO</span>
                </div>
            </div>
        </div>


        <div class="stepper mt-3" data-content="step-1">

            <div class="row justify-content-center">
                <!-- title -->
                <div class="col">
                    <p class="h5">Qui souhaites-tu affronter ?</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- content -->
                <div class="col">
                    <div class="card stylish-color-dark">
                        <div class="card-body text-white">
                            This is some text within a card body.
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-end">
                <!-- buttons -->
                <button type="button" data-who class="stepper-btn btn btn-dark mr-3">Qui</button>
                <button type="button" data-on class="stepper-btn btn btn-dark mr-3">Sur</button>
                <button type="button" data-what class="stepper-btn btn btn-dark mr-3">Quoi</button>
                <button type="button" data-when class="stepper-btn btn btn-dark mr-3">Quand</button>
                <button type="button" data-submit class="stepper-btn btn btn-dark mr-3">Go!</button>
            </div>

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