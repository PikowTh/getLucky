<?php

session_start();

// controle si une session user est créé
if (!isset($_SESSION['User'])) {
    header('Location: ../index.php');
    exit;
}

require_once '../model/modelBets.php';
require_once '../model/modelUsers.php';

$betsObj = new Bets();
$usersObj = new Users();
$betDetails = $betsObj->getBetDetails($_POST['betId']);

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

// comparaison des dates
$dateNow = date('Y-m-d H:i:s'); // nous formatons la date dans le bon format iso notre base de données
$betTimeOver = $dateNow > $betDetails['bets_end_time']; // nous permets de savoir que le pari est terminé sous forme de booléen

// Nous déterminons si le user le propriétaire du pari 
$betOwner = $betDetails['challenger'] == $_SESSION['User']['users_id']; // nous permets de savoir si le owner est le user sous forme de booléen

