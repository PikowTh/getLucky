<?php

require_once '../model/modelBets.php';

$test = new Bets();

var_dump($test->getAllBets());
