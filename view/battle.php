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


        <div class="row justify-content-between bg-light">
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



        <!-- ----------------- STEP 1 --------------------- -->
        <!-- ---------------------------------------------- -->
        <div id="step-1" class="mt-3" data-content="step-1">

            <div class="row justify-content-center">
                <div class="col">

                    <p class="h5">Qui souhaites-tu affronter ?</p>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tr>
                                <td><button data-who="1"><i class="fas fa-user-circle mr-3"></i>COUCOU</button></td>
                                <td><button data-who="2"><i class="fas fa-user-circle mr-3"></i>COUCOU</button></td>
                                <td><button data-who="3"><i class="fas fa-user-circle mr-3"></i>COUCOU</button></td>
                                <td><button data-who="4"><i class="fas fa-user-circle mr-3"></i>COUCOU</button></td>
                                <td><button data-who="5"><i class="fas fa-user-circle mr-3"></i>COUCOU</button></td>
                                <td><button data-who="6"><i class="fas fa-user-circle mr-3"></i>COUCOU</button></td>
                                <td><button data-who="7"><i class="fas fa-user-circle mr-3"></i>COUCOU</button></td>
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

            <button id="who" type="button" data-who class="stepper-btn btn btn-dark mr-3">Qui</button>
            <button id="btn-step-1" class="btn btn-light" type="button">step 2</button>

        </div>



        <!-- ----------------- STEP 2 --------------------- -->
        <!-- ---------------------------------------------- -->
        <div id="step-2" class="mt-3" data-content="step-2">

            <div class="row justify-content-center">
                <div class="col">
                    <p class="h5">Qui souhaites-tu affronter ?</p>
                </div>
            </div>

            <button type="button" data-on class="stepper-btn btn btn-dark mr-3">Sur</button>
            <button id="btn-step-2" class="btn btn-light" type="button">step 3</button>

        </div>



        <!-- ----------------- STEP 3 --------------------- -->
        <!-- ---------------------------------------------- -->
        <div id="step-3" class="mt-3" data-content="step-3">

            <div class="row justify-content-center">
                <div class="col">
                    <p class="h5">Qui souhaites-tu affronter ?</p>
                </div>
            </div>

            <button type="button" data-what class="stepper-btn btn btn-dark mr-3">Quoi</button>
            <button id="btn-step-3" class="btn btn-light" type="button">step 4</button>

        </div>



        <!-- ----------------- STEP 4 --------------------- -->
        <!-- ---------------------------------------------- -->
        <div id="step-4" class="mt-3" data-content="step-4">

            <div class="row justify-content-center">
                <div class="col">
                    <p class="h5">Qui souhaites-tu affronter ?</p>
                </div>
            </div>

            <button type="button" data-when class="stepper-btn btn btn-dark mr-3">Quand</button>
            <button id="btn-step-4" class="btn btn-light" type="button">suivant</button>

        </div>



        <!-- ----------------- STEP 5 --------------------- -->
        <!-- ---------------------------------------------- -->
        <div id="step-5" class="mt-3" data-content="step-4">

            <div class="row justify-content-center">
                <div class="col">
                    <p class="h5">Qui souhaites-tu affronter ?</p>
                </div>
            </div>

            <button type="button" data-submit class="stepper-btn btn btn-light mr-3">Go!</button>

        </div>


        <!-- div permettant le scroll du bas -->
        <!-- ---------------------------------------------- -->
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

    <!-- Your custom scripts (optional) -->

    <script>
        $('#btn-step-1').click(function() {
            $('#step-1').hide();
            $('#step-2').show();
        })

        $('#btn-step-2').click(function() {
            $('#step-2').hide();
            $('#step-3').show();
        })

        $('#btn-step-3').click(function() {
            $('#step-3').hide();
            $('#step-4').show();
        })

        $('#btn-step-4').click(function() {
            $('#step-4').hide();
            $('#step-5').show();
        })

        let betInformations = [];

        // recupération des inputs respectifs lors du click sur le bouton next
        $("button[data-who]").click(function() {
            console.log($(this).data('who'));
            betInformations[0] = 'Contre Polaire';
        });
        $("button[data-on]").click(function() {
            betInformations[1] = 'Fnatic Gagne les Worlds';
        });
        $("button[data-what]").click(function() {
            betInformations[2] = 'Un Kebab';
        });
        $("button[data-when]").click(function() {
            betInformations[3] = '2020-05-23 16:00';
        });

        // contrôle des données avant envoi sur le bouton submit
        $("button[data-submit]").click(function() {

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