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


        <div class="row justify-content-between blue darken-2">
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
                <span id="badge-step-5" class="stepper-badge badge grey lighten-1">GO</span>
            </div>
        </div>



        <!-- /----------------- STEP 1 ---------------------/ -->
        <!-- /----------------------------------------------/ -->
        <div id="step-1" class="mt-3" data-content="step-1">

            <div class="row justify-content-center">
                <div class="col">

                    <p class="h5  text-center">Qui souhaites-tu affronter ?</p>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tr>
                                <td><button data-who="1"><i class="fas fa-user-circle mr-3"></i>Polaire</button></td>
                                <td><button data-who="2"><i class="fas fa-user-circle mr-3"></i>Grizz</button></td>
                                <td><button data-who="3"><i class="fas fa-user-circle mr-3"></i>Panda</button></td>
                                <td><button data-who="4"><i class="fas fa-user-circle mr-3"></i>Natasha</button></td>
                                <td><button data-who="5"><i class="fas fa-user-circle mr-3"></i>Polochon</button></td>
                                <td><button data-who="6"><i class="fas fa-user-circle mr-3"></i>Ariel</button></td>
                                <td><button data-who="7"><i class="fas fa-user-circle mr-3"></i>Mulan</button></td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <table class="table table-borderless">
                            <tr>
                                <td><button data-who="8"><i class="fas fa-user-circle mr-3"></i>COUCOU</button></td>
                            </tr>
                            <tr>
                                <td><button data-who="9"><i class="fas fa-user-circle mr-3"></i>COUCOU</button></td>
                            </tr>
                            <tr>
                                <td><button data-who="10"><i class="fas fa-user-circle mr-3"></i>COUCOU</button></td>
                            </tr>
                            <tr>
                                <td><button data-who="11"><i class="fas fa-user-circle mr-3"></i>COUCOU</button></td>
                            </tr>
                            <tr>
                                <td><button data-who="12"><i class="fas fa-user-circle mr-3"></i>COUCOU</button></td>
                            </tr>
                        </table>

                    </div>

                </div>
            </div>

        </div>



        <!-- /----------------- STEP 2 ---------------------/ -->
        <!-- /----------------------------------------------/ -->
        <div id="step-2" class="mt-3" data-content="step-2">

            <div class="row justify-content-center">
                <div class="col text-center">
                    <p class="h5">Quel est ton pari ?</p>
                    <textarea name="bet-area" id="bet-area" cols="40" rows="10"></textarea>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col text-center">
                    <button type="button" data-current="2" class="stepper-btn btn btn-light mr-3">retour</button>
                    <button type="button" data-on class="stepper-btn btn btn-dark mr-3">suivant</button>
                </div>
            </div>
        </div>



        <!-- /----------------- STEP 3 ---------------------/ -->
        <!-- /----------------------------------------------/ -->
        <div id="step-3" class="mt-3" data-content="step-3">

            <div class="row justify-content-center">
                <p class="h5 text-center">Que souhaites-tu parier ?</p>
            </div>

            <div class="row shadow-sm justify-content-center p-1">
                <i class="bet-logo fas fa-pizza-slice p-2"></i>
                <button class="btn" data-what="1">pizza</button>
                <p class="bet-text">Une Pizza, à partager bien sûre !</p>
            </div>

            <div class="row shadow-sm justify-content-center p-1">
                <div class="col">
                    <div class="text-center">
                        <i class="bet-logo fas fa-hamburger p-2"></i><button class="btn" data-what="2">hamburger</button></div>
                    <div class="text-center">
                        <p class="bet-text">Un petit BK, McDo ou bien Quick ...</p>
                    </div>
                </div>
            </div>

            <div class="row shadow-sm" data-what="3">
                <div class="col-3 text-center">
                    <i class="bet-logo fas fa-film p-2"></i>
                </div>
                <div class="col text-left pt-2">
                    <div class="h4">CINEMA</div>
                    <p class="bet-text">Une petite toile, du pop-corn en option ...</p>
                </div>
            </div>

            <div class="row shadow-sm" data-what="4">
                <div class="col-3 text-center">
                    <i class="bet-logo fas fa-wine-glass-alt p-2"></i>
                </div>
                <div class="col text-left pt-2">
                    <div class="h4">VERRE</div>
                    <p class="bet-text">Refaire le monde devant un verre, ou deux ...</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col text-center">
                    <button type="button" data-current="3" class="stepper-btn btn btn-light mr-3">retour</button>
                </div>
            </div>

        </div>



        <!-- /----------------- STEP 4 ---------------------/ -->
        <!-- /----------------------------------------------/ -->
        <div id="step-4" class="mt-3" data-content="step-4">

            <div class="row justify-content-center">
                <div class="col">
                    <p class="h5 text-center">Quand s'arrête ton pari ?</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col text-center">
                    <input id="bet-date" name="bet-date" class="big-date" type="date">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col text-center">
                    <select id="bet-hours" name="hours" class="big-hour border" >
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                    </select>
                    <select id="bet-minutes" name="minutes" class="big-hour border"  >
                        <option value="00">00</option>
                        <option value="30">30</option>
                    </select>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col text-center">
                    <button type="button" data-current="4" class="stepper-btn btn btn-light mr-3">retour</button>
                    <button type="button" data-when class="stepper-btn btn btn-dark mr-3">suivant</button>
                </div>
            </div>
        </div>



        <!-- /----------------- STEP 5 ---------------------/ -->
        <!-- /----------------------------------------------/ -->
        <div id="step-5" class="mt-3" data-content="step-4">

            <div class="row justify-content-center">
                <div class="col">
                    <p class="h5">Qui souhaites-tu affronter ?</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col text-center">
                    <button type="button" data-current="5" class="stepper-btn btn btn-light mr-3">retour</button>
                    <button type="button" data-submit class="stepper-btn btn btn-light mr-3">Go!</button>
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

    <script>
        // fonction pour passer au stepper suivant
        // en param le nom du step : ex. step-1
        function goNextStepper(current, next) {
            $('#' + current).hide();
            $('#badge-' + current).addClass('grey lighten-1');
            $('#badge-' + next).removeClass('grey lighten-1');
            $('#badge-' + next).addClass('unique-color-dark');
            $('#' + next).show();
        };

        let betInformations = [];

        // recupération des inputs respectifs lors du click sur le bouton next
        $('button[data-who]').click(function() {
            console.log($(this).data('who'));
            goNextStepper('step-1', 'step-2');

            betInformations[0] = 'Contre Polaire';
        });
        $('button[data-on]').click(function() {
            console.log($('#bet-area').val());
            goNextStepper('step-2', 'step-3');

            betInformations[1] = 'Fnatic Gagne les Worlds';
        });
        $('button[data-what]').click(function() {
            console.log($(this).data('what'));
            goNextStepper('step-3', 'step-4');
            betInformations[2] = 'Un Kebab';
        });
        $('button[data-when]').click(function() {
            let endBet = $('#bet-date').val() + ' ' + $('#bet-hours').val() + ':' + $('#bet-minutes').val() + ':00';
            console.log(endBet);

            goNextStepper('step-4', 'step-5');
            betInformations[3] = '2020-05-23 16:00';
        });



        $('button[data-current]').click(function() {
            let stepNumber = +$(this).data('current');
            goNextStepper('step-' + stepNumber, 'step-' + (stepNumber - 1));
        })








        // contrôle des données avant envoi sur le bouton submit
        $('button[data-submit]').click(function() {

            let addBet = true;

            // contrôles si le tableau est vide
            if (betInformations.length == 0) {
                addBet = false;
                console.log('Aucun détail');
            }
            // contrôles si le tableau ne contient pas 'undefined'
            if (betInformations.includes(undefined) || (betInformations.length < 4 && betInformations.length != 0)) {
                addBet = false;
                console.log('Attention tout n\'est pas rempli');
            }

            // envoi des données en ajax
            if (addBet) {
                $.ajax({
                    url: '../controller/betAjax.php',
                    type: 'GET',
                    data: {
                        'bet': 'add',
                        'betName': 'Worlds League of Legends',
                        'betDescription': 'Je pari que les Fnatic gagne les worlds',
                        'betEndTtime': '1900-01-01 00:00:00',
                        'contactId': 107,
                        'betType': 1
                    },
                    success: function(dataReturn) {
                        if (dataReturn) {
                            Swal.fire(
                                'Good job!',
                                'You clicked the button!',
                                'success'
                            );
                        }
                    },
                    error: function() {
                        console.log('La pari n\'a pas pu été ajouté')
                    },
                });
            }
        });
    </script>

</body>

</html>