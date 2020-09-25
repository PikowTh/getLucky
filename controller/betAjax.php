<?php
if (isset($_GET['bet'])) {

    switch ($_GET['bet']) {
        case 'add':
            $betsObj = new Bets;

            $betName = htmlspecialchars($_GET['betName']);
            $betDescription = htmlspecialchars($_GET['betDescription']);
            $endTime = htmlspecialchars($_GET['betEndTtime']);
            $contactId = htmlspecialchars($_GET['contactId']);
            $betType;

            $betsObj->addBet($betName, $betDescription, $endTime, $contactId, $betType);
            
            break;
    }
}
