<?php

require_once 'model/model_users.php';

$error = [];

if (isset($_POST['Mail'])) {
    if (empty($_POST['Mail'])) {
        $error['Mail'] = 'Veuillez Renseigner le champ';
    };
}

if (isset($_POST['Password'])) {
    if (empty($_POST['Password'])) {
        $error['Password'] = 'Veuillez Renseigner le champ';
    };
}



if (isset($_POST['Login-submit']) && count($error) == 0) {

    $loginUser = new Users;

    $mail = $_POST['Mail'];
    $password = $_POST['Password'];

    if ($loginUser->VerifyLogin($mail, $password)) {

        session_start();
        $_SESSION['User'] = $loginUser->GetUserInfos($mail);
        header('Location: view/home.php');

    } else {

        $error['login'] = 'mauvais login / mot de passe';
        
    }
}
