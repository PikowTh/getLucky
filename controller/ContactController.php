<?php
session_start();

if (!isset($_SESSION['User'])) {
    header('Location: index.php');
}

require_once '../model/model_contact.php';

// on crée un object contact à l'aide de la classe Contacts
$contacts = new Contacts();

if (isset($_POST['accepted'])) {
    $contactInfos = htmlspecialchars($_POST['accepted']);
    // Nous controlons que le contact n'est pas déja présent, si non présent, nous allons pouvoir l'ajouter dans nos contacts
    $contactId = explode('-', $contactInfos)[2];
    if (!$contacts->checkContactIn($_SESSION['User']['users_id'], $contactId)) {
        $contacts->validateContacts($contactInfos);
    }
}

if (isset($_POST['bookmarked'])) {
    $contactId = htmlspecialchars($_POST['bookmarked']);
    $contacts->bookmarkedContacts($contactId);
}

if (isset($_POST['unmarked'])) {
    $contactId = htmlspecialchars($_POST['unmarked']);
    $contacts->unmarkedContacts($contactId);
}

if (isset($_POST['deleteContact'])) {
    $usersIds = htmlspecialchars($_POST['deleteContact']);
    $contacts->deleteContact($usersIds);
}

if (isset($_POST['deleteRequest'])) {
    $usersIds = htmlspecialchars($_POST['deleteRequest']);
    $contacts->deleteRequest($usersIds);
}

if (isset($_POST['refused'])) {
    $contactId = htmlspecialchars($_POST['refused']);
    $contacts->refusedContact($contactId);
}

if (isset($_POST['add'])) {
    $userId = htmlspecialchars($_POST['add']);
    // Nous controlons que le contact n'est pas déja présent, si non présent, nous allons pouvoir faire une demande d'ajout
    if (!$contacts->checkContactIn($_SESSION['User']['users_id'], $userId)) {
        $contacts->addContact($userId);
    }
}

if (isset($_POST['searchBtn'])) {
    $usersArray = $contacts->searchContact($_POST['searchInput']);
}

$contactsToAcceptArray = $contacts->getContactsToAccept($_SESSION['User']['users_id']);
$requestsContactsArray = $contacts->getRequestContacts($_SESSION['User']['users_id']);
$contactsArray = $contacts->getContacts($_SESSION['User']['users_id']);
