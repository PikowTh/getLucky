<?php

session_start();

// controle si une session user est créé
if (!isset($_SESSION['User'])) {
    header('Location: ../index.php');
    exit;
}

var_dump($_SESSION['User']);

require_once '../model/modelBets.php';

$betsObj = new Bets();
$betDetails = $betsObj->getBetDetails($_GET['betId'])[0];
var_dump($betDetails);

// Formatage de la date pour affichage en fr
setlocale(LC_TIME, 'fr_FR.UTF8');
$dateArray = explode('-', explode(' ', $betDetails['bets_end_time'])[0]);
$timeArray = explode(':', explode(' ', $betDetails['bets_end_time'])[1]);
$betDate = mktime($timeArray[0], $timeArray[1], 0, $dateArray[1], $dateArray[2], $dateArray[0]);
// theDate qui sera affichée dans les détails
$theDate = strftime("%A %d %B %Y à %Hh%M", $betDate);

//tableau des icones des paris
$typeOfArray = [
    1 => "fas fa-hamburger",
    2 => "fas fa-pizza-slice",
    3 => "fas fa-film",
    4 => "fas fa-beer"
];
