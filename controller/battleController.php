<?php

session_start();

// controle si une session user est créé
if (!isset($_SESSION['User'])) {
    header('Location: ../index.php');
    exit;
}

require_once '../model/modelContact.php';

$contactsObj = new Contacts;
$contactsArray = $contactsObj->getContacts($_SESSION['User']['users_id']);