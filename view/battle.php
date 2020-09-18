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

    <style>
        /* Simple setup for this demo */

        .mdl-card {
            width: 550px;
            min-height: 0;
            margin: 10px auto;
        }

        .mdl-card__supporting-text {
            width: 100%;
            padding: 0;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step {
            width: 25%;
            /* 100 / no_of_steps */
        }


        /* Begin actual mdl-stepper css styles */

        .mdl-stepper-horizontal-alternative {
            display: table;
            width: 100%;
            margin: 0 auto;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step {
            display: table-cell;
            position: relative;
            padding: 24px;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step:hover,
        .mdl-stepper-horizontal-alternative .mdl-stepper-step:active {
            background-color: rgba(0, 0, 0, .06);
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step:active {
            border-radius: 15% / 75%;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step:first-child:active {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step:last-child:active {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step:hover .mdl-stepper-circle {
            background-color: #757575;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step:first-child .mdl-stepper-bar-left,
        .mdl-stepper-horizontal-alternative .mdl-stepper-step:last-child .mdl-stepper-bar-right {
            display: none;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step .mdl-stepper-circle {
            width: 24px;
            height: 24px;
            margin: 0 auto;
            background-color: #9E9E9E;
            border-radius: 50%;
            text-align: center;
            line-height: 2em;
            font-size: 12px;
            color: white;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step.active-step .mdl-stepper-circle {
            background-color: rgb(33, 150, 243);
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step.step-done .mdl-stepper-circle:before {
            content: "\2714";
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step.step-done .mdl-stepper-circle *,
        .mdl-stepper-horizontal-alternative .mdl-stepper-step.editable-step .mdl-stepper-circle * {
            display: none;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step.editable-step .mdl-stepper-circle {
            -moz-transform: scaleX(-1);
            /* Gecko */
            -o-transform: scaleX(-1);
            /* Opera */
            -webkit-transform: scaleX(-1);
            /* Webkit */
            transform: scaleX(-1);
            /* Standard */
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step.editable-step .mdl-stepper-circle:before {
            content: "\270E";
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step .mdl-stepper-title {
            margin-top: 16px;
            font-size: 14px;
            font-weight: normal;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step .mdl-stepper-title,
        .mdl-stepper-horizontal-alternative .mdl-stepper-step .mdl-stepper-optional {
            text-align: center;
            color: rgba(0, 0, 0, .26);
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step.active-step .mdl-stepper-title {
            font-weight: 500;
            color: rgba(0, 0, 0, .87);
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step.active-step.step-done .mdl-stepper-title,
        .mdl-stepper-horizontal-alternative .mdl-stepper-step.active-step.editable-step .mdl-stepper-title {
            font-weight: 300;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step .mdl-stepper-optional {
            font-size: 12px;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step.active-step .mdl-stepper-optional {
            color: rgba(0, 0, 0, .54);
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step .mdl-stepper-bar-left,
        .mdl-stepper-horizontal-alternative .mdl-stepper-step .mdl-stepper-bar-right {
            position: absolute;
            top: 36px;
            height: 1px;
            border-top: 1px solid #BDBDBD;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step .mdl-stepper-bar-right {
            right: 0;
            left: 50%;
            margin-left: 20px;
        }

        .mdl-stepper-horizontal-alternative .mdl-stepper-step .mdl-stepper-bar-left {
            left: 0;
            right: 50%;
            margin-right: 20px;
        }
    </style>





</head>

<body class="bg-veine">

    <div class="top-phone elegant-color-dark fixed-top">
    </div>

    <div class="container main-body">

        <div class="row">
            <div class="col">
                <input class="big-date" type="date">
            </div>
        </div>

        <div class="mdl-card mdl-shadow--2dp">

            <div class="mdl-card__supporting-text">

                <div class="mdl-stepper-horizontal-alternative">
                    <div class="mdl-stepper-step active-step step-done">
                        <div class="mdl-stepper-circle"><span>1</span></div>
                        <div class="mdl-stepper-title">Add pets</div>
                        <div class="mdl-stepper-bar-left"></div>
                        <div class="mdl-stepper-bar-right"></div>
                    </div>
                    <div class="mdl-stepper-step active-step editable-step">
                        <div class="mdl-stepper-circle"><span>2</span></div>
                        <div class="mdl-stepper-title">Set location</div>
                        <div class="mdl-stepper-optional">Optional</div>
                        <div class="mdl-stepper-bar-left"></div>
                        <div class="mdl-stepper-bar-right"></div>
                    </div>
                    <div class="mdl-stepper-step active-step">
                        <div class="mdl-stepper-circle"><span>3</span></div>
                        <div class="mdl-stepper-title">Invite friends</div>
                        <div class="mdl-stepper-optional">Optional</div>
                        <div class="mdl-stepper-bar-left"></div>
                        <div class="mdl-stepper-bar-right"></div>
                    </div>
                    <div class="mdl-stepper-step">
                        <div class="mdl-stepper-circle"><span>4</span></div>
                        <div class="mdl-stepper-title">Share</div>
                        <div class="mdl-stepper-optional">Optional</div>
                        <div class="mdl-stepper-bar-left"></div>
                        <div class="mdl-stepper-bar-right"></div>
                    </div>
                </div>

            </div>

        </div>



























    </div>

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
    <script type="text/javascript"></script>
</body>

</html>