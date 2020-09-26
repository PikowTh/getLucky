<?php

session_start();

if (!isset($_SESSION['User'])) {
    header('Location: ../index.php');
}

var_dump($_SESSION['User']);

