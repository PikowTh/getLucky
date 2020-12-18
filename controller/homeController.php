<?php

session_start();

// controle si une session user est créé
if (!isset($_SESSION['User'])) {
    header('Location: ../index.php');
    exit;
}

require_once '../model/modelBets.php';

$betsObj = new Bets();
$betsArray = $betsObj->getChallengeBets();

//tableau des icones des paris
$typeOfArray = [
    1 => "fas fa-hamburger",
    2 => "fas fa-pizza-slice",
    3 => "fas fa-film",
    4 => "fas fa-beer"
];

$dateNow = date('Y-m-d H:i:s'); // nous formatons la date dans le bon format iso notre base de données
// $betTimeOver = $dateNow > $betDetails['bets_end_time']; // nous permets de savoir que le pari est terminé sous forme de booléen