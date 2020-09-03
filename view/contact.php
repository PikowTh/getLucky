<?php

require_once '../controller/ContactController.php';

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

    <div class="top-phone elegant-color-dark fixed-top">
    </div>

    <div class="container">

        <form action="" method="post">

            <div id="container-contactPending">

                <div class="container-input mt-5">

                    <input type="text" id="searchInput" name="searchInput" value="" placeholder="Recherche Contact">
                    <button type="submit" id="searchBtn" name="searchBtn" value=""><i class="fas fa-search"></i></button>

                </div>
            </div>
            <?php if (!isset($_POST['searchBtn'])) { ?>
                <div id="container">
                    <div class="row">
                        <div class="col primary-color-dark shadow text-white">
                            <p class="title-contact"><span class="icon-title"><i class="fas fa-dice-one"></i></span>Nos demandes de contact</p>
                        </div>
                    </div>

                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Cras justo odio
                            <span class="badge badge-primary badge-pill">14</span><span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Dapibus ac facilisis in
                            <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Morbi leo risus
                            <span class="badge badge-primary badge-pill">1</span>
                        </li>
                    </ul>

































                    <ul>
                        <?php if (!empty($requestsContactsArray)) {
                            foreach ($requestsContactsArray as $contact) { ?>


                                <li class="contact-center">
                                    <div class="pseudo-contact">
                                        <h4><?= $contact['contact_pseudo'] ?> </h4>
                                    </div>
                                    <div class="container-btn">
                                        En attente de validation <button type="submit" name="deleteRequest" value="<?= $contact['table_contact_id'] ?>"><i class="far fa-trash-alt"></i></button>
                                    </div>
                                </li>


                            <?php }
                        } else { ?>

                            <li class="contact-center">
                                <h4>Pas de nouvelle demande</h4>
                            </li>

                        <?php } ?>
                    </ul>
                </div>

                <div id="container">
                    <div class="row">
                        <div class="col primary-color-dark shadow text-white">
                            <p class="title-contact"><span class="icon-title"><i class="fas fa-dice-two"></i></span>Les demandes de rajout</p>
                        </div>
                    </div>
                    <ul>
                        <?php if (!empty($contactsToAcceptArray)) {
                            foreach ($contactsToAcceptArray as $contact) { ?>


                                <li class="contact-center">
                                    <div class="pseudo-contact">
                                        <h4><?= $contact['contact_pseudo'] ?> </h4>
                                    </div>
                                    <div class="container-btn">
                                        <button type="submit" name="accepted" value="<?= $contact['table_contact_id'] . '-' . $contact['user_connected_id'] . '-' . $contact['users_id'] ?>"><i class="fas fa-check"></i></button>
                                        <button type="submit" name="refused" value="<?= $contact['table_contact_id'] ?>"><i class="fas fa-times"></i></button>
                                    <?php } ?>
                                    </div>
                                </li>


                            <?php } else { ?>

                                <li class="contact-center">
                                    <h4>Pas de demande d'ajout </h4>
                                </li>


                            <?php } ?>

                    </ul>
                </div>

                <div id="container test">
                    <div class="row">
                        <div class="col primary-color-dark shadow text-white">
                            <p class="title-contact"><span class="icon-title"><i class="fas fa-dice-three"></i></span>Mes contacts</p>
                        </div>
                    </div>
                    <ul>
                        <?php if (!empty($contactsArray)) {
                            foreach ($contactsArray as $contact) { ?>


                                <li class="contact-center">
                                    <div class="pseudo-contact">
                                        <h4><?= $contact['contact_pseudo'] ?> </h4>
                                    </div>
                                    <div class="container-btn">
                                        <button type="submit" name="deleteContact" value="<?= $contact['user_connected_id'] . '-' . $contact['users_id'] ?>"><i class="fas fa-trash-alt"></i></button>
                                        <?php if ($contact['bookmark'] == 0) { ?>
                                            <button type="submit" name="bookmarked" value="<?= $contact['table_contact_id'] ?>"><i class="far fa-star"></i></button>
                                        <?php } else { ?>
                                            <button type="submit" name="unmarked" value="<?= $contact['table_contact_id'] ?>"><i class="fas fa-star"></i></button>
                                        <?php } ?>
                                    </div>
                                </li>


                            <?php }
                        } else { ?>

                            <li class="contact-center">
                                <h4>Votre liste de contact est vide </h4>
                            </li>


                        <?php } ?>
                    </ul>
                    <div class="test">

                    </div>
                </div>
            <?php } else { ?>
                <div>
                    <!-- Mise en place de la liste de contacts via un search -->
                    <div id="container">
                        <ul>
                            <?php if (!empty($usersArray)) {
                                foreach ($usersArray as $users) {
                                    // Permet de ne pas afficher l'utilisateur de connecté
                                    if ($users['users_id_pseudo'] == $_SESSION['User']['users_id']) {
                                        continue;
                                    } ?>

                                    <li class="contact-center">
                                        <div class="pseudo-contact">
                                            <h4><?= $users['users_pseudo'] ?> </h4>
                                        </div>
                                        <div class="container-btn">

                                            <?php if ($users['contacts_authorized'] == 0 && $users['toValidate'] == 0) { ?>
                                                <button type="submit" name="add" value="<?= $users['users_id_pseudo'] ?>"><i class="fas fa-plus"></i></button>
                                            <?php }

                                            if ($users['contacts_authorized'] == 1) { ?>
                                                <button type="submit" name="deleteContact" value="<?= $users['user_connected_id'] . '-' . $users['users_id'] ?>"><i class="fas fa-trash-alt"></i></button>
                                                <?php if ($users['contacts_bookmark'] == 0) { ?>
                                                    <button type="submit" name="bookmarked" value="<?= $users['contacts_id'] ?>"><i class="far fa-star"></i></button>
                                                <?php } else { ?>
                                                    <button type="submit" name="unmarked" value="<?= $users['contacts_id'] ?>"><i class="fas fa-star"></i></button>
                                                <?php } ?>
                                            <?php }

                                            if ($users['toValidate'] == 1) { ?>
                                                <button type="submit" name="accepted" value="<?= $users['contacts_id_toValidate'] . '-' . $users['users_id_asked'] . '-' . $users['users_id'] ?>"><i class="fas fa-check"></i>
                                                </button> <button type="submit" name="refused" value="<?= $users['contacts_id_toValidate'] ?>"><i class="fas fa-times" id="testtesmort"></i></button>
                                            <?php }

                                            if ($users['toValidate'] == 8) { ?>
                                                En attente de validation <button type="submit" name="deleteRequest" value="<?= $users['contacts_id'] ?>"><i class="far fa-trash-alt"></i></button>
                                            <?php } ?>

                                        </div>
                                    </li>


                                <?php }
                            } else { ?>

                                <li class="contact-center">
                                    <h4>Aucun résultat :( </h4>
                                </li>

                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
        </form>

    </div>

    <div class="bottom-phone elegant-color-dark fixed-bottom">
        <?php
        include_once '../include/navbar.php'
        ?>
    </div>

    <script src="https://kit.fontawesome.com/2edc250389.js" crossorigin="anonymous"></script>
</body>

</html>