$(document).ready(function () {

    // fonction pour passer au stepper suivant
    // en param le nom du step : ex. step-1
    function goNextStepper(current, next) {
        $('#' + current).hide();
        $('#badge-' + current).addClass('grey lighten-1');
        $('#badge-' + next).removeClass('grey lighten-1');
        $('#badge-' + next).addClass('unique-color-dark');
        $('#' + next).show();
    };

    // fonction sur le bouton précédent permettant de venir à l'arrière
    $('button[data-current]').click(function () {
        let stepNumber = +$(this).data('current');
        goNextStepper('step-' + stepNumber, 'step-' + (stepNumber - 1));
    })


    /// Nous desactivons les boutons pour ne pas valider de pari sans que tout les champs soient remplis
    /// Validation de l'étape 1
    $('#bet-name').keyup(function () {
        if ($('#bet-name').val().length > 3) {
            $('#btnStepOne').attr('disabled', false);
        } else {
            $('#btnStepOne').attr('disabled', true);
        }
    })


    /// Nous desactivons les boutons pour ne pas valider de pari sans que tout les champs soient remplis
    /// Validation de l'étape 3
    $('#bet-area').keyup(function () {
        if ($('#bet-area').val().length > 5) {
            $('#btnStepThree').attr('disabled', false);
        } else {
            $('#btnStepThree').attr('disabled', true);
        }
    })


    /// Nous desactivons les boutons pour ne pas valider de pari sans que tout les champs soient remplis
    /// Validation de l'étape 2
    $('#bet-date').change(function () {
        console.log($('#bet-date').val().length);
        if ($('#bet-date').val().length == 10) {
            $('#btnStepFive').attr('disabled', false);
        } else {
            $('#btnStepFive').attr('disabled', true);
        }
    })

    // création d'un tableau reprenant les infos du pari
    let betInformations = [];

    // recupération des inputs respectifs lors du click sur le bouton next ou directement sur l'icone respectif

    $('button[data-name]').click(function () {
        console.log($('#bet-name').val());

        let betName = $('#bet-name').val();

        betInformations[0] = betName;
        $('#recapName').text(betName);

        goNextStepper('step-1', 'step-2');
    });

    $('button[data-who]').click(function () {
        console.log($(this).data('who'));

        let betWho = $(this).data('who');
        let BetWhoName = $(this).data('whoname')

        betInformations[1] = betWho;
        $('#recapWho').text(BetWhoName);

        goNextStepper('step-2', 'step-3');
    });

    $('button[data-on]').click(function () {
        console.log($('#bet-area').val());

        let betOn = $('#bet-area').val()

        betInformations[2] = betOn;
        $('#recapOn').text(betOn);

        goNextStepper('step-3', 'step-4');
    });

    $('button[data-what]').click(function () {
        console.log($(this).data('what'));

        let what = $(this).data('what')
        let whatName = $(this).data('whatname');

        betInformations[3] = what;
        $('#recapWhat').text(whatName);

        goNextStepper('step-4', 'step-5');
    });

    $('button[data-when]').click(function () {
        let endBet = $('#bet-date').val() + ' ' + $('#bet-hours').val() + ':' + $('#bet-minutes').val() + ':00';
        let betTime = $('#bet-date').val() + ' à ' + $('#bet-hours').val() + ':' + $('#bet-minutes').val();

        console.log(endBet);

        betInformations[4] = endBet;
        $('#recapWhen').text(betTime);

        goNextStepper('step-5', 'step-6');
    });



    // contrôle des données avant envoi sur le bouton submit
    $('button[data-submit]').click(function () {

        let addBet = true;

        // contrôles si le tableau est vide
        if (betInformations.length == 0) {
            addBet = false;
            console.log('Aucun détail');
        }
        // contrôles si le tableau ne contient pas 'undefined'
        if (betInformations.includes(undefined) || (betInformations.length < 5 && betInformations.length != 0)) {
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
                    'betName': betInformations[0],
                    'betDescription': betInformations[2],
                    'betEndTtime': betInformations[4],
                    'contactId': betInformations[1],
                    'betType': betInformations[3]
                },
                success: function (dataReturn) {
                    if (dataReturn) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Pari lancé !'
                        }).then(function () {
                            location.href = 'bets.php';
                        });
                    };
                },
                error: function () {
                    console.log('La pari n\'a pas pu été ajouté')
                },
            });
        }
    });


    // Ajax pour accepter le pari sur le bouton j'accepte
    $('button[data-accept]').click(function () {
        $.ajax({
            url: '../controller/betAjax.php',
            type: 'GET',
            data: {
                'bet': 'accept',
                'betId': $(this).data('accept')
            },
            success: function (dataReturn) {
                if (dataReturn) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Pari accepté !'
                    }).then(function () {
                        location.href = 'bets.php';
                    });
                };
            },
            error: function () {
                console.log('La pari n\'a pas pu été ajouté')
            },
        });




    });


});