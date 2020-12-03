<?php

session_start();

// controle si une session user est créé
if (!isset($_SESSION['User'])) {
    header('Location: ../index.php');
    exit;
}

require_once '../model/modelBets.php';

$betsObj = new Bets();
var_dump($betsObj->getBetDetails($_GET['betId']));
