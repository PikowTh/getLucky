<?php

session_start();

require_once '../model/modelBets.php';

if (isset($_GET['bet'])) {

    switch ($_GET['bet']) {

        case 'add':
            $betsObj = new Bets;

            $betName = htmlspecialchars($_GET['betName']);
            $betDescription = htmlspecialchars($_GET['betDescription']);
            $endTime = htmlspecialchars($_GET['betEndTtime']);
            $contactId = htmlspecialchars($_GET['contactId']);
            $betType = htmlspecialchars($_GET['betType']);;

            $betsObj->addBet($betName, $betDescription, $endTime, $contactId, $betType);

            echo true;
            break;

        case 'accept':
            $betsObj = new Bets;

            $betsObj->acceptBet($_GET['betId']);

            echo true;
            break;

        default:
            echo false;
            break;
    }
}
