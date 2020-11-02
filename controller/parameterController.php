<?php
session_start();

require_once '../model/modelUsers.php';

if (!isset($_SESSION['User'])) {
    header('Location: ../index.php');
    exit;
}

$newParameters = new Users();

$PhoneNumberRegex = "/(0)+[0-9]{1}( ){0,1}+[0-9]{2}( ){0,1}+[0-9]{2}( ){0,1}+[0-9]{2}( ){0,1}+[0-9]{2}/";

// Verifs Nouvel Email

$errorEmail = [];

if (isset($_POST['newEmailUser']) || isset($_POST['verifyNewEmailUser'])) {

    if (!filter_var($_POST['newEmailUser'], FILTER_VALIDATE_EMAIL)) {
        $errorEmail['newEmailUser'] = 'Mauvais Format';
    }

    if ($newParameters->VerifyMailExist($_POST['newEmailUser'])){
        $errorEmail['newEmailUser'] = 'Mail non disponible';
    }

    if (!filter_var($_POST['verifyNewEmailUser'], FILTER_VALIDATE_EMAIL)) {
        $errorEmail['verifyNewEmailUser'] = 'Mauvais Format';
    }

    if (empty($_POST['newEmailUser'])) {
        $errorEmail['newEmailUser'] = 'Veuillez renseigner le champ';
    }

    if (empty($_POST['verifyNewEmailUser'])) {
        $errorEmail['verifyNewEmailUser'] = 'Veuillez renseigner le champ';
    }

    if ($_POST['verifyNewEmailUser'] != $_POST['newEmailUser']) {
        $errorEmail['verifyNewEmailUser'] = 'Les mails ne sont pas identiques';
    }
}

if (isset($_POST['submitResetEmail']) && count($errorEmail) == 0) {
    $newMail = htmlspecialchars($_POST['newEmailUser']);
    $usersId = $_SESSION['User']['users_pseudo'];
    $newParameters->UpdateMailUsers($newMail, $usersId);
}

// Verifs Nouveau N° Téléphone

$errorPhone = [];

if (isset($_POST['newPhoneUser']) || isset($_POST['verifyNewPhoneUser'])) {
    if (!preg_match($PhoneNumberRegex, $_POST['newPhoneUser'])) {
        $errorPhone['newPhoneUser'] = 'Mauvais Format';
    };
    if (!preg_match($PhoneNumberRegex, $_POST['verifyNewPhoneUser'])) {
        $errorPhone['verifyNewPhoneUser'] = 'Mauvais Format';
    };
    if (empty($_POST['newPhoneUser'])) {
        $errorPhone['newPhoneUser'] = 'Veuillez Renseigner le champ';
    };
    if (empty($_POST['verifyNewPhoneUser'])) {
        $errorPhone['verifyNewPhoneUser'] = 'Veuillez Renseigner le champ';
    };
    if ($_POST['verifyNewPhoneUser'] != $_POST['newPhoneUser']) {
        $errorPhone['verifyNewPhoneUser'] = 'Les Numéros ne sont pas identiques';
    };
}

if (isset($_POST['submitResetPhone']) && count($errorPhone) == 0) {
    $newPhone = htmlspecialchars($_POST['newPhoneUser']);
    $usersId = $_SESSION['User']['users_pseudo'];
    $newParameters->UpdatePhoneUsers($newPhone, $usersId);
}

// Verifs Nouveau Mot de Passe

$errorPassword = [];

if (isset($_POST['passwordUser'])) {
    if (empty($_POST['passwordUser'])) {
        $errorPassword['passwordUser'] = 'Veuillez Renseigner le champ';
    };
    if (empty($_POST['newPasswordUser'])) {
        $errorPassword['newPasswordUser'] = 'Veuillez Renseigner le champ';
    };
    if (empty($_POST['verifyNewPasswordUser'])) {
        $errorPassword['verifyNewPasswordUser'] = 'Veuillez Renseigner le champ';
    };
    if ($_POST['verifyNewPasswordUser'] != $_POST['newPasswordUser']) {
        $errorPassword['verifyNewPasswordUser'] = 'Les mots de passe ne sont pas identiques';
    };
}

$message = '';

if (isset($_POST['submitResetPassword']) && count($errorPassword) == 0) {
    $password = htmlspecialchars($_POST['passwordUser']);
    if (password_verify($password, $_SESSION['User']['users_password'])) {
        $usersId = $_SESSION['User']['users_id'];
        $newPassword = password_hash($_POST['newPasswordUser'], PASSWORD_BCRYPT);
        $newParameters->UpdatePasswordUsers($newPassword, $usersId);
    } else {
        $message = 'Erreur';
    }
}