<?php
session_start();

if (!isset($_SESSION['User'])) {
    header('Location: index.php');
}

require_once '../model/model_contact.php';

$contacts = new Contacts();

if (isset($_POST['accepted'])) {
    $contactInfos = $_POST['accepted'];
    $contacts->validateContacts($contactInfos);
}

if (isset($_POST['bookmarked'])) {
    $contactId = $_POST['bookmarked'];
    $contacts->bookmarkedContacts($contactId);
}

if (isset($_POST['unmarked'])) {
    $contactId = $_POST['unmarked'];
    $contacts->unmarkedContacts($contactId);
}

if (isset($_POST['deleteContact'])) {
    $usersIds = $_POST['deleteContact'];
    $contacts->deleteContact($usersIds);
}

if (isset($_POST['deleteRequest'])) {
    $usersIds = $_POST['deleteRequest'];
    $contacts->deleteRequest($usersIds);
}

if (isset($_POST['refused'])) {
    $contactId = $_POST['refused'];
    $contacts->refusedContact($contactId);
}

if (isset($_POST['add'])) {
    $userId = $_POST['add'];
    $contacts->addContact($userId);
}

if(isset($_POST['searchBtn'])){
    $usersArray = $contacts->searchContact($_POST['searchInput']);
}

$contactsToAcceptArray = $contacts->getContactsToAccept($_SESSION['User']['users_id']);
$requestsContactsArray = $contacts->getRequestContacts($_SESSION['User']['users_id']);
$contactsArray = $contacts->getContacts($_SESSION['User']['users_id']);
