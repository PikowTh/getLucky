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

    /// Nous desactivons les boutons pour ne pas valider de pari sans que tout les champs soient remplis
    /// nous validons l'étape 2
    $('#bet-area').keyup(function () {
        if ($('#bet-area').val().length > 5) {
            $('#btnStepTwo').attr('disabled', false);
        } else {
            $('#btnStepTwo').attr('disabled', true);
        }
    })

    let betInformations = [];

    // recupération des inputs respectifs lors du click sur le bouton next
    $('button[data-who]').click(function () {
        console.log($(this).data('who'));
        goNextStepper('step-1', 'step-2');

        betInformations[0] = 'Contre Polaire';
    });
    $('button[data-on]').click(function () {
        console.log($('#bet-area').val());
        goNextStepper('step-2', 'step-3');

        betInformations[1] = 'Fnatic Gagne les Worlds';
    });
    $('button[data-what]').click(function () {
        console.log($(this).data('what'));
        goNextStepper('step-3', 'step-4');
        betInformations[2] = 'Un Kebab';
    });
    $('button[data-when]').click(function () {
        let endBet = $('#bet-date').val() + ' ' + $('#bet-hours').val() + ':' + $('#bet-minutes').val() + ':00';
        console.log(endBet);

        goNextStepper('step-4', 'step-5');
        betInformations[3] = '2020-05-23 16:00';
    });



    $('button[data-current]').click(function () {
        let stepNumber = +$(this).data('current');
        goNextStepper('step-' + stepNumber, 'step-' + (stepNumber - 1));
    })


    // contrôle des données avant envoi sur le bouton submit
    $('button[data-submit]').click(function () {

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
                success: function (dataReturn) {
                    if (dataReturn) {
                        Swal.fire(
                            'Good job!',
                            'You clicked the button!',
                            'success'
                        );
                    }
                },
                error: function () {
                    console.log('La pari n\'a pas pu été ajouté')
                },
            });
        }
    });

});