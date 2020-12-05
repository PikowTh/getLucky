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

//tableau des icones des paris
$typeOfArray = [
    1 => "fas fa-hamburger",
    2 => "fas fa-pizza-slice",
    3 => "fas fa-film",
    4 => "fas fa-beer"
];
