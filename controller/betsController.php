<?php

session_start();

// controle si une session user est créé
if (!isset($_SESSION['User'])) {
    header('Location: ../index.php');
    exit;
}

require_once '../model/modelBets.php';

$betsObj = new Bets();

$betsArray = $betsObj->getAllBets();
$betsAcceptedArray = $betsObj->getBetsAccepted($_SESSION['User']['users_id']);

//tableau des icones des paris
$typeOfArray = [
    1 => "fas fa-hamburger",
    2 => "fas fa-pizza-slice",
    3 => "fas fa-film",
    4 => "fas fa-beer"
];

var_dump($betsArray);
