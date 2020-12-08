<?php

session_start();

// controle si une session user est créé
if (!isset($_SESSION['User'])) {
    header('Location: ../index.php');
    exit;
}

var_dump($_SESSION['User']);

require_once '../model/modelBets.php';
require_once '../model/modelUsers.php';

$betsObj = new Bets();
$usersObj = new Users();
$betDetails = $betsObj->getBetDetails($_GET['betId']);

// je recupère tous les défis que le user a accepté
var_dump($betsObj->getBetsAccepted($_SESSION['User']['users_id']));

var_dump($betDetails);
var_dump($usersObj->getNameById($betDetails['users_id']));
var_dump($_SESSION['User']['users_id']);



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

// comparaison date ok
$dateNow = date('Y-m-d H:i:s');
var_dump($dateNow > $betDetails['bets_end_time']);