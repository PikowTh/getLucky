<?php

require_once '../controller/parameterController.php';

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veine, votre jour de chance ?</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="../assets/css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="bg-veine">

    <div class="container main-body">
        <div id="myId" class="p-2">
            <div class="row">
                <div class="col-3 user-avatar text-center rounded">
                    <i class="far fa-user"></i>
                </div>
                <div class="col user-name">
                    <div class="font-weight-bold"><?= $_SESSION['User']['users_pseudo'] ?></div>
                    <div><?= $_SESSION['User']['users_mail'] ?></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm col-lg-6">
                <form class="text-center" method="post">
                    <label for="newEmailUser">Nouvel Email :</label>
                    <input type="email" id="newEmailUser" class="form-control mb-4" name="newEmailUser">
                    <span><?= isset($errorEmail['newEmailUser']) ? $errorEmail['newEmailUser'] : '' ?></span>
                    <label for="verifyNewEmailUser">Confirmation Nouvel Email :</label>
                    <input type="email" id="verifyNewEmailUser" class="form-control mb-4" name="verifyNewEmailUser">
                    <span><?= isset($errorEmail['verifyNewEmailUser']) ? $errorEmail['verifyNewEmailUser'] : '' ?></span>
                    <button class="btn btn-info btn-sm" name="submitResetEmail" type="submit">Changer l'Email</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm col-lg-6">
                <form class="text-center" method="post">
                    <span><?= isset($errorPhone['emailUser']) ? $errorPhone['emailUser'] : '' ?></span>
                    <label for="newPhoneUser">Nouveau Numéro de Téléphone :</label>
                    <input type="phone" id="newPhoneUser" class="form-control mb-4" name="newPhoneUser">
                    <span><?= isset($errorPhone['newPhoneUser']) ? $errorPhone['newPhoneUser'] : '' ?></span>
                    <label for="verifyNewPhoneUser">Confirmation Nouveau Numéro de Téléphone :</label>
                    <input type="phone" id="verifyNewPhoneUser" class="form-control mb-4" name="verifyNewPhoneUser">
                    <span><?= isset($errorPhone['verifyNewPhoneUser']) ? $errorPhone['verifyNewPhoneUser'] : '' ?></span>
                    <button class="btn btn-info btn-sm" name="submitResetPhone" type="submit">Changer le Numéro de Téléphone</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm col-lg-6">
                <form class="text-center" method="post">
                    <span><?= $message ?></span></br>
                    <label for="passwordUser">Ancien Mot de Passe :</label>
                    <input type="password" id="passwordUser" class="form-control mb-4" name="passwordUser">
                    <span><?= isset($errorPassword['passwordUser']) ? $errorPassword['passwordUser'] : '' ?></span>
                    <label for="newPasswordUser">Nouveau Mot de Passe :</label>
                    <input type="password" id="newPasswordUser" class="form-control mb-4" name="newPasswordUser">
                    <span><?= isset($errorPassword['newPasswordUser']) ? $errorPassword['newPasswordUser'] : '' ?></span>
                    <label for="verifyNewPasswordUser">Confirmation Nouveau Mot de Passe :</label>
                    <input type="password" id="verifyNewPasswordUser" class="form-control mb-4" name="verifyNewPasswordUser">
                    <span><?= isset($errorPassword['verifyNewPasswordUser']) ? $errorPassword['verifyNewPasswordUser'] : '' ?></span>
                    <button class="btn btn-info btn-sm" name="submitResetPassword" type="submit">Changer le Mot de Passe</button>
                </form>
            </div>
        </div>
    </div>

    <div class="bottom-div">
        <form method="post" action="../view/deconnexion.php">
            <button type="submit" id="delete" name="killSession" class="btn-floating"><i class="fas fa-door-open"></i></button>
        </form>
        <!-- permet le scroll du bas -->
    </div>

    <div class="bottom-phone elegant-color-dark fixed-bottom">
        <?php include_once '../include/navbar.php' ?>
    </div>

    <!-- jQuery -->
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../assets/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../assets/js/mdb.min.js"></script>
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript"></script>
</body>

<?php var_dump($_SESSION) ?>

</html>