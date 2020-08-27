<?php

require_once '../model/model_users.php';

$NameRegex = "/[a-zA-Z0-9ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]{2,12}$/";
$BirthDateRegex = "/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/";
$PasswordRegex = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";
$PhoneNumberRegex = "/(0)+[0-9]{1}( ){0,1}+[0-9]{2}( ){0,1}+[0-9]{2}( ){0,1}+[0-9]{2}( ){0,1}+[0-9]{2}/";

$registerSuccess = false;

$error = [];

if (isset($_POST['Pseudo'])) {
    $Users = new Users();
    if (!preg_match($NameRegex, $_POST['Pseudo'])) {
        $error['Pseudo'] = 'Mauvais Format';
    };
    if ($Users->VerifyPseudoExist($_POST['Pseudo'])) {
        $error['Pseudo'] = 'Le pseudo " ' . $_POST['Pseudo'] . ' " existe déja';
    };
    if (empty($_POST['Pseudo'])) {
        $error['Pseudo'] = 'Veuillez Renseigner le champ';
    };
};

if (isset($_POST['Mail'])) {
    $Users = new Users();
    if (!filter_var($_POST['Mail'], FILTER_VALIDATE_EMAIL)) {
        $error['Mail'] = 'Mauvais Format';
    };
    if ($Users->VerifyMailExist($_POST['Mail'])) {
        $error['Mail'] = 'Le mail " ' . $_POST['Mail'] . ' " existe déja';
    };
    if (empty($_POST['Mail'])) {
        $error['Mail'] = 'Veuillez Renseigner le champ';
    };
};

if (isset($_POST['PhoneNumber'])) {

    if (!preg_match($PhoneNumberRegex, $_POST['PhoneNumber'])) {
        $error['PhoneNumber'] = 'Mauvais Format';
    };
    if (empty($_POST['PhoneNumber'])) {
        $error['PhoneNumber'] = 'Veuillez Renseigner le champ';
    };
};

if (isset($_POST['BirthDate'])) {

    if (!preg_match($BirthDateRegex, $_POST['BirthDate'])) {
        $error['BirthDate'] = 'Mauvais Format';
    };
    if (empty($_POST['BirthDate'])) {
        $error['BirthDate'] = 'Veuillez Renseigner le champ';
    };
};

if (isset($_POST['Password']) && isset($_POST['VerifPassword'])) {

    if (!preg_match($PasswordRegex, $_POST['Password'])) {
        $error['Password'] = 'Mauvais Format';
    };
    if (empty($_POST['Password'])) {
        $error['Password'] = 'Veuillez Renseigner le champ';
    };
    if (empty($_POST['VerifPassword'])) {
        $error['VerifPassword'] = 'Veuillez Renseigner le champ';
    };
    if ($_POST['VerifPassword'] != $_POST['Password']) {
        $error['VerifPassword'] = 'Les mots de passe ne sont pas identiques';
    };
};

if (isset($_POST['g-recaptcha-response'])) {
    // clé captcha !!!
    $key = "6LfCfMAZAAAAADG6bZI3JC0FGElLUaR7Tb8RatyD";
    $captchaResponse = $_POST['g-recaptcha-response'];
    $remoteip = $_SERVER['REMOTE_ADDR'];
    $api_url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $key . "&response=" . $captchaResponse . "&remoteip=" . $remoteip;
    $decode = json_decode(file_get_contents($api_url), true);
};

if (isset($_POST['Register-submit']) && count($error) == 0) {

    if ($decode['success'] == true) {

        $Users = new Users();

        $mail = htmlspecialchars($_POST['Mail']);
        $pseudo = htmlspecialchars($_POST['Pseudo']);
        $phone = htmlspecialchars($_POST['PhoneNumber']);
        $password = password_hash($_POST['Password'], PASSWORD_BCRYPT);
        $birthdate = htmlspecialchars($_POST['BirthDate']);


        $Users->AddUsers($mail, $pseudo, $phone, $password, $birthdate);
        
        $registerSuccess = true;

    } else {
        $messageError = 'Erreur : Veuillez cochez le captcha pour vous inscrire';
    };
};
