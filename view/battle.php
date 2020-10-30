<?php

require_once '../controller/battleController.php';

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









        <!-- /----------------- STEPPER NUMBER ---------------------/ -->
        <!-- /----------------------------------------------/ -->
        <div class="row justify-content-between primary-color-dark">
            <div class="col text-center">
                <span id="badge-step-1" class="stepper-badge badge unique-color-dark">1</span>
            </div>
            <div class="col text-center">
                <span id="badge-step-2" class="stepper-badge badge grey lighten-1">2</span>
            </div>
            <div class="col text-center">
                <span id="badge-step-3" class="stepper-badge badge grey lighten-1">3</span>
            </div>
            <div class="col text-center">
                <span id="badge-step-4" class="stepper-badge badge grey lighten-1">4</span>
            </div>
            <div class="col text-center">
                <span id="badge-step-5" class="stepper-badge badge grey lighten-1">5</span>
            </div>
            <div class="col text-center">
                <span id="badge-step-6" class="stepper-badge badge grey lighten-1">GO</span>
            </div>
        </div>


        <!-- /----------------- STEP 1 ---------------------/ -->
        <!-- /----------------------------------------------/ -->
        <div id="step-1" class="mt-3" data-content="step-1">

            <div class="row justify-content-center">
                <div class="col text-center">
                    <p class="h5">Quel nom donnes-tu à ton pari ?</p>
                    <input type="text" name="bet-name" id="bet-name">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col text-center">
                    <button id="btnStepOne" type="button" disabled data-name class="btn btn-dark mr-3">suivant</button>
                </div>
            </div>
        </div>


        <!-- /----------------- STEP 2 ---------------------/ -->
        <!-- /----------------------------------------------/ -->
        <div id="step-2" class="mt-3" data-content="step-2">

            <div class="row justify-content-center">
                <div class="col">

                    <p class="h5  text-center">Qui souhaites-tu affronter ?</p>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tr>
                                <td><button data-who="70"><i class="fas fa-user-circle mr-3"></i>Polaire</button></td>
                                <td><button data-who="71"><i class="fas fa-user-circle mr-3"></i>Grizz</button></td>
                                <td><button data-who="72"><i class="fas fa-user-circle mr-3"></i>Panda</button></td>
                                <td><button data-who="77"><i class="fas fa-user-circle mr-3"></i>Natasha</button></td>
                                <td><button data-who="77"><i class="fas fa-user-circle mr-3"></i>Polochon</button></td>
                                <td><button data-who="77"><i class="fas fa-user-circle mr-3"></i>Ariel</button></td>
                                <td><button data-who="77"><i class="fas fa-user-circle mr-3"></i>Mulan</button></td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <table class="table table-borderless">
                            <tr>
                                <td><button data-who="79"><i class="fas fa-user-circle mr-3"></i>Rubik</button></td>
                            </tr>
                            <tr>
                                <td><button data-who="80"><i class="fas fa-user-circle mr-3"></i>Cube</button></td>
                            </tr>

                        </table>

                    </div>

                </div>

            </div>

            <div class="row justify-content-center">
                <div class="col text-center">
                    <button type="button" data-current="2" class="btn btn-light mr-3">retour</button>
                </div>
            </div>

        </div>



        <!-- /----------------- STEP 3 ---------------------/ -->
        <!-- /----------------------------------------------/ -->
        <div id="step-3" class="mt-3" data-content="step-3">

            <div class="row justify-content-center">
                <div class="col text-center">
                    <p class="h5">Quel est ton pari ?</p>
                    <textarea name="bet-area" id="bet-area" cols="40" rows="5"></textarea>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col text-center">
                    <button type="button" data-current="3" class="btn btn-light mr-3">retour</button>
                    <button id="btnStepThree" type="button" disabled data-on class="btn btn-dark mr-3">suivant</button>
                </div>
            </div>
        </div>



        <!-- /----------------- STEP 4 ---------------------/ -->
        <!-- /----------------------------------------------/ -->
        <div id="step-4" class="mt-3" data-content="step-4">

            <div class="row justify-content-center">
                <p class="h5 text-center">Que souhaites-tu parier ?</p>
            </div>

            <div class="row shadow-sm">
                <div class="col text-center p-0">
                    <button class="btn" data-what="1"><i class="bet-logo fas fa-hamburger"></i></button>
                </div>
                <div class="col d-flex flex-column justify-content-center align-items-start p-0">
                    <div class="h5 mb-0">BURGER</div>
                    <p class="bet-text text-left pr-2">Un petit BK, McDo, KFC, Kebab, Quick ...</p>
                </div>
            </div>

            <div class="row shadow-sm">
                <div class="col text-center p-0">
                    <button class="btn" data-what="2"><i class="bet-logo fas fa-pizza-slice"></i></button>
                </div>
                <div class="col d-flex flex-column justify-content-center align-items-start p-0">
                    <div class="h5 mb-0">PIZZA</div>
                    <p class="bet-text text-left pr-2">Une Pizza ... à partager bien sûre !</p>
                </div>
            </div>

            <div class="row shadow-sm">
                <div class="col text-center p-0">
                    <button class="btn" data-what="3"><i class="bet-logo fas fa-film"></i></button>
                </div>
                <div class="col d-flex flex-column justify-content-center align-items-start p-0">
                    <div class="h5 mb-0">CINEMA</div>
                    <p class="bet-text text-left pr-2">Une petite toile et du pop-corn en option ...</p>
                </div>
            </div>

            <div class="row shadow-sm">
                <div class="col text-center p-0">
                    <button class="btn" data-what="4"><i class="beer-logo fas fa-beer"></i></button>
                </div>
                <div class="col d-flex flex-column justify-content-center align-items-start p-0">
                    <div class="h5 mb-0">VERRE</div>
                    <p class="bet-text text-left pr-2">Refaire le monde devant un verre, ou deux ...</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col text-center">
                    <button type="button" data-current="4" class="btn btn-light mr-3">retour</button>
                </div>
            </div>

        </div>




        <!-- /----------------- STEP 5 ---------------------/ -->
        <!-- /----------------------------------------------/ -->
        <div id="step-5" class="mt-3" data-content="step-5">

            <div class="row justify-content-center">
                <div class="col">
                    <p class="h5 text-center">Quand le pari prend-t-il fin ?</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col text-center mt-2">
                    <input id="bet-date" name="bet-date" class="big-date" type="date">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col text-center">
                    <select id="bet-hours" name="hours" class="big-hour border mt-2">
                        <?php for ($i = 1; $i <= 24; $i++) { ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                    </select>
                    <select id="bet-minutes" name="minutes" class="big-hour border">
                        <option value="00">00</option>
                        <option value="30">30</option>
                    </select>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col text-center">
                    <button type="button" data-current="5" class="btn btn-light mr-3">retour</button>
                    <button id="btnStepFive" type="button" disabled data-when class="btn btn-dark mr-3">suivant</button>
                </div>
            </div>
        </div>



        <!-- /----------------- STEP 6 ---------------------/ -->
        <!-- /----------------------------------------------/ -->
        <div id="step-6" class="mt-3" data-content="step-6">

            <div class="row justify-content-center">
                <div class="col">
                    <p class="h5">Petit recap'</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col text-center">
                    <button type="button" data-current="6" class="btn btn-light mr-3">retour</button>
                    <button type="button" data-submit class="btn default-color mr-3">Lancer le pari !</button>
                </div>
            </div>
        </div>


        <!-- div permettant le scroll du bas -->
        <!-- /----------------------------------------------/ -->
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
    <!-- custom script -->
    <script type="text/javascript" src="../assets/js/myScript.js"></script>

</body>

</html>