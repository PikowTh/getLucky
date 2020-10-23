<?php

require_once '../controller/contactController.php';

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

        <form action="" method="post">

            <div id="mySearchBar" class="container-input search-bar">
                <!-- Container de recherche -->
                <div class="row">
                    <div class="col text-center p-1">
                        <input type="text" id="searchInput" name="searchInput" placeholder="Pseudo ..." class="rounded pl-2">
                        <button type="submit" class="rounded" id="searchBtn" name="searchBtn" value=""><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>

            <?php if (!isset($_POST['searchBtn'])) { ?>
                <div id="myRequests">
                    <!-- container de nos demandes -->
                    <div class="row">
                        <div class="col primary-color-dark shadow text-white">
                            <p class="title-contact"><span class="icon-title"><i class="fas fa-dice-one"></i></span>Nos demandes de contact</p>
                        </div>
                    </div>

                    <ul class="list-group mt-2 mb-2">
                        <?php if (!empty($requestsContactsArray)) {
                            foreach ($requestsContactsArray as $contact) { ?>

                                <li class="shadow list-group-item d-flex justify-content-between align-items-center bg-veine">

                                    <span><?= $contact['contact_pseudo'] ?></span>
                                    <span><button type="submit" name="deleteRequest" class="rounded btn-contact text-muted" value="<?= $contact['table_contact_id'] ?>"><i class="fas fa-times-circle"></i></button></span>
                                </li>

                            <?php }
                        } else { ?>

                            <li class="shadow list-group-item d-flex justify-content-between align-items-center bg-veine">
                                <span>Aucune demande en attente</span>
                            </li>

                        <?php } ?>
                    </ul>
                </div> <!-- fin container nos demandes -->

                <div id="contactsToValidate">
                    <!-- container validation de demandes -->

                    <div class="row">
                        <div class="col primary-color-dark shadow text-white">
                            <p class="title-contact"><span class="icon-title"><i class="fas fa-dice-two"></i></span>Les demandes de rajout</p>
                        </div>
                    </div>

                    <ul class="list-group mt-2 mb-2">
                        <?php if (!empty($contactsToAcceptArray)) {
                            foreach ($contactsToAcceptArray as $contact) { ?>

                                <li class="shadow list-group-item d-flex justify-content-between align-items-center bg-veine">
                                    <span><?= $contact['contact_pseudo'] ?></span>
                                    <span><button type="submit" class="rounded btn-contact success-color" name="accepted" value="<?= $contact['table_contact_id'] . '-' . $contact['user_connected_id'] . '-' . $contact['users_id'] ?>"><i class="fas fa-check"></i></button><button type="submit" class="rounded btn-contact danger-color" name="refused" value="<?= $contact['table_contact_id'] ?>"><i class="fas fa-ban"></i></button></span>
                                </li>

                            <?php } ?>

                        <?php } else { ?>

                            <li class="shadow list-group-item d-flex justify-content-between align-items-center bg-veine">
                                <span>Vous n'avez pas de demande d'ajout</span>
                            </li>

                        <?php } ?>
                    </ul>
                </div><!-- fin container validation de demandes -->

                <div id="myContacts">
                    <!-- container mes contacts -->
                    <div class="row">
                        <div class="col primary-color-dark shadow text-white">
                            <p class="title-contact"><span class="icon-title"><i class="fas fa-dice-three"></i></span>Mes contacts</p>
                        </div>
                    </div>
                    <ul class="list-group mt-2 mb-2">
                        <?php if (!empty($contactsArray)) {
                            foreach ($contactsArray as $contact) { ?>

                                <li class="shadow list-group-item d-flex justify-content-between align-items-center bg-veine">
                                    <span><?= $contact['contact_pseudo'] ?></span>
                                    <span><button type="submit" class="rounded btn-contact text-muted" name="deleteContact" value="<?= $contact['user_connected_id'] . '-' . $contact['users_id'] ?>"><i class="fas fa-trash-alt"></i></button>
                                        <?php if ($contact['bookmark'] == 0) { ?>
                                            <button type="submit" class="rounded btn-contact text-muted" name="bookmarked" value="<?= $contact['table_contact_id'] ?>"><i class="far fa-star"></i></button>
                                        <?php } else { ?>
                                            <button type="submit" class="rounded btn-contact text-warning" name="unmarked" value="<?= $contact['table_contact_id'] ?>"><i class="fas fa-star"></i></button>
                                        <?php } ?>
                                    </span>
                                </li>

                            <?php }
                        } else { ?>

                            <li class="shadow list-group-item d-flex justify-content-between align-items-center bg-veine">
                                <span>Vous n'avez pas de contact</span>
                            </li>

                        <?php } ?>
                    </ul>

                    <div class="bottom-div">
                        <!-- permet le scroll du bas -->
                    </div>

                </div> <!-- fin container mes contacts -->

            <?php } else { ?>

                <div id="contactsList">
                    <!-- container de la liste de contacts -->
                    <ul class="list-group mt-2 mb-2">
                        <?php if (!empty($usersArray)) {
                            foreach ($usersArray as $users) {
                                // Permet de ne pas afficher l'utilisateur de connecté
                                if ($users['users_id_pseudo'] == $_SESSION['User']['users_id']) {
                                    continue;
                                } ?>

                                <li class="shadow list-group-item d-flex justify-content-between align-items-center bg-veine">
                                    <span><?= $users['users_pseudo'] ?></span>
                                    <span>

                                        <?php if ($users['contacts_authorized'] == 0 && $users['toValidate'] == 0) { ?>
                                            <button type="submit" class="rounded btn-contact text-muted" name="add" value="<?= $users['users_id_pseudo'] ?>"><i class="fas fa-plus"></i></button>
                                        <?php }

                                        if ($users['contacts_authorized'] == 1) { ?>
                                            <button type="submit" class="rounded btn-contact text-muted" name="deleteContact" value="<?= $users['user_connected_id'] . '-' . $users['users_id'] ?>"><i class="fas fa-trash-alt"></i></button>
                                            <?php if ($users['contacts_bookmark'] == 0) { ?>
                                                <button type="submit" class="rounded btn-contact text-muted" name="bookmarked" value="<?= $users['contacts_id'] ?>"><i class="far fa-star"></i></button>
                                            <?php } else { ?>
                                                <button type="submit" class="rounded btn-contact text-warning" name="unmarked" value="<?= $users['contacts_id'] ?>"><i class="fas fa-star"></i></button>
                                            <?php } ?>
                                        <?php }

                                        if ($users['toValidate'] == 1) { ?>
                                            <button type="submit" class="rounded btn-contact success-color" name="accepted" value="<?= $users['contacts_id_toValidate'] . '-' . $users['users_id_asked'] . '-' . $users['users_id'] ?>"><i class="fas fa-check"></i>
                                            </button><button type="submit" class="rounded btn-contact danger-color" name="refused" value="<?= $users['contacts_id_toValidate'] ?>"><i class="fas fa-times" id="testtesmort"></i></button>
                                        <?php }

                                        if ($users['toValidate'] == 8) { ?>
                                            En attente <button type="submit" class="rounded btn-contact text-muted" name="deleteRequest" value="<?= $users['contacts_id'] ?>"><i class="fas fa-times-circle"></i></button>
                                        <?php } ?>
                                    </span>
                                </li>
                            <?php }
                        } else { ?>

                            <li class="contact-center">
                                <h4>Aucun résultat :( </h4>
                            </li>

                        <?php } ?>
                    </ul>

                    <!-- permet le scroll du bas -->
                    <div class="bottom-div"></div>

                </div><!-- fin container de la liste de contacts -->
            <?php } ?>

        </form>

    </div> <!-- Global Container -->

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
    <!-- Sweet Alert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>