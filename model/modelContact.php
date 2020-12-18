<?php

class Contacts
{
    private $bdd;

    public function __construct()
    {
        try {
            // $this->bdd = new PDO('mysql:host=db5000916307.hosting-data.io;dbname=dbs801015;charset=utf8', 'dbu604452', 'MADE-by-LHP4');
            $this->bdd = new PDO('mysql:host=localhost;dbname=veine;charset=utf8', 'root', '');
            // Activation des erreurs PDO
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // mode de fetch par défaut : FETCH_ASSOC / FETCH_OBJ / FETCH_BOTH
            $this->bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Méthode pour récuperer les contacts qui attendend la validation du user connecté
     * @return array when succcess
     * @return boolean when fail
     * 
     */
    public function getContactsToAccept($userId)
    {
        $query = 'SELECT lhp4_contacts.users_id AS user_connected_id, have_contacts.users_id, users_pseudo AS contact_pseudo, lhp4_contacts.contacts_id AS table_contact_id
        FROM lhp4_contacts
        INNER JOIN have_contacts
        ON have_contacts.contacts_id = lhp4_contacts.contacts_id
        INNER JOIN lhp4_users
        ON have_contacts.users_id = lhp4_users.users_id
        WHERE lhp4_contacts.users_id = :users_id AND contacts_authorized = 0';

        try {

            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':users_id', (int)$userId, PDO::PARAM_INT);
            $resultQuery->execute();

            $resultContacts = $resultQuery->fetchAll();

            if ($resultContacts) {
                return $resultContacts;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Méthode pour récuperer tous les contacts que le "user connecté" a accepté
     * @param integer id du user connecté
     * @return array when succcess
     * @return boolean when fail
     * 
     */
    public function getContacts($userId)
    {
        $query = 'SELECT have_contacts.users_id AS user_connected_id, 
        lhp4_contacts.users_id, lhp4_users.users_pseudo AS contact_pseudo, contacts_authorized AS authorized, contacts_bookmark as bookmark, lhp4_contacts.contacts_id AS table_contact_id
        FROM lhp4_contacts
        INNER JOIN have_contacts
        ON have_contacts.contacts_id = lhp4_contacts.contacts_id
        INNER JOIN lhp4_users
        ON lhp4_contacts.users_id = lhp4_users.users_id
        WHERE have_contacts.users_id = :users_id AND contacts_authorized = 1';

        try {

            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':users_id', (int)$userId, PDO::PARAM_INT);
            $resultQuery->execute();

            $resultContacts = $resultQuery->fetchAll();

            if ($resultContacts) {
                return $resultContacts;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Méthode permettant de récupérer les demandes de contact du user connecté
     * @param integer id du user connecté
     * @return array when succcess
     * @return boolean when fail
     * 
     */
    public function getRequestContacts($userId)
    {
        $query = 'SELECT have_contacts.users_id AS user_connected_id, lhp4_contacts.users_id, users_pseudo AS contact_pseudo, contacts_authorized AS authorized, lhp4_contacts.contacts_id AS table_contact_id
        FROM have_contacts
        INNER JOIN lhp4_contacts
        ON have_contacts.contacts_id = lhp4_contacts.contacts_id
        INNER JOIN lhp4_users
        ON lhp4_contacts.users_id = lhp4_users.users_id
        WHERE have_contacts.users_id = :users_id AND contacts_authorized = 0';

        try {

            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':users_id', (int)$userId, PDO::PARAM_INT);
            $resultQuery->execute();

            $resultContacts = $resultQuery->fetchAll();

            if ($resultContacts) {
                return $resultContacts;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Méthode pour valider un contact de la liste d'attente + rajouter le contact dans sa liste
     * @param string sous la forme de 16-17-18
     * @return boolean qui nous indiquera la réussite de la méthode 
     * 
     */
    public function validateContacts($contactInfos)
    {

        $contactId = explode('-', $contactInfos)[0];
        $connectedId = explode('-', $contactInfos)[1];
        $usersId = explode('-', $contactInfos)[2];

        try {
            // Nous modifions la valeur du contacts_authorized à 1 pour valider la demande
            $queryAuthorized = 'UPDATE lhp4_contacts SET contacts_authorized = 1 WHERE contacts_id = :contact_id ';

            $resultQueryAuthorized = $this->bdd->prepare($queryAuthorized);
            $resultQueryAuthorized->bindValue(':contact_id', (int)$contactId, PDO::PARAM_INT);

            // Nous allons créer un contact avec l'id de la personne qui a demandé le contact.
            // La personne qui valide le contact bénéficiera elle aussi du contact dans ses contacts..
            $queryAdd = 'INSERT INTO lhp4_contacts (contacts_bookmark, contacts_authorized, users_id)
            VALUES (0, 1, :users_id)';

            $resultQueryAdd = $this->bdd->prepare($queryAdd);
            $resultQueryAdd->bindValue(':users_id', (int)$usersId, PDO::PARAM_INT);

            // Nous allons créer une ligne dans la table intermédiaire : "having contact" pour lier le contact à la personne qui vient d'accepter
            $queryCreateContact = 'INSERT INTO have_contacts VALUES( :contacts_id, :users_id)';

            $resultQueryCreateContact = $this->bdd->prepare($queryCreateContact);

            if ($resultQueryAuthorized->execute() && $resultQueryAdd->execute()) {
                $resultQueryCreateContact->bindValue(':contacts_id', $this->bdd->lastInsertId());
                $resultQueryCreateContact->bindValue(':users_id', $connectedId);
                $resultQueryCreateContact->execute();
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Méthode pour Ajouter un contact au favoris
     * @param integer l'id du contact à manipuler
     * @return boolean indiquant la réussite de la méthode
     * 
     */
    public function bookmarkedContacts($contactId)
    {
        $query = 'UPDATE lhp4_contacts SET contacts_bookmark = 1 WHERE contacts_id = :contact_id ';

        try {

            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':contact_id', (int)$contactId, PDO::PARAM_INT);

            if ($resultQuery->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Méthode pour que le contact en soit plus dans nos favoris
     * @param integer qui sera le contact_id de la table contact
     * @return boolean indiquant la réussite de la méthode
     * 
     */
    public function unmarkedContacts($contactId)
    {
        $query = 'UPDATE lhp4_contacts SET contacts_bookmark = 0 WHERE contacts_id = :contact_id ';

        try {

            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':contact_id', (int)$contactId, PDO::PARAM_INT);

            if ($resultQuery->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Méthode pour supprimer une demande en attente de validation du futur contact (Le user connecté change d'avis)
     * @param integer le contact id de la table contact
     * @return boolean indiquant la réussite de la méthode
     */
    public function deleteRequest($contactId)
    {
        $query = 'DELETE FROM lhp4_contacts WHERE contacts_id = :contact_id';

        try {

            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':contact_id', (int)$contactId, PDO::PARAM_INT);

            if ($resultQuery->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Méthode pour demander un user en ami via son user_id
     * @param integer le user_id du user que l'on souhaite en ami
     * @return boolean indiquant la réussite de la méthode
     */
    public function addContact($userIdtoAdd)
    {
        // Requete pour insérer dans la table contacts
        $queryAddContacts = 'INSERT INTO lhp4_contacts (contacts_bookmark, contacts_authorized, users_id)
        VALUES (0, 0, :users_id)';
        // Requete pour insérer dans la table have_contacts
        $QueryAddHave = 'INSERT INTO have_contacts VALUES (:contact_id,:user_id_connected)';


        try {
            // Nous préparons la première requête pour insérer dans la table contacts la demande de contact
            $resultQueryAddContact = $this->bdd->prepare($queryAddContacts);
            $resultQueryAddContact->bindValue(':users_id', (int)$userIdtoAdd, PDO::PARAM_INT);

            // Nous préparons une 2eme requete pour insérer une ligne dans la table have_contacts permettant de déterminer à qui appartient la demande
            $resultQueryAddHave = $this->bdd->prepare($QueryAddHave);

            if ($resultQueryAddContact->execute()) {
                $resultQueryAddHave->bindValue(':contact_id', $this->bdd->lastInsertId());
                $resultQueryAddHave->bindValue(':user_id_connected', $_SESSION['User']['users_id']);
                $resultQueryAddHave->execute();
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Méthode pour supprimer un contact des contacts
     * @param string qui sera de type 14-15 pour obtenir l'id du user connecté et l'id du contact
     * @return boolean indiquant la réussite de la méthode
     * 
     */
    public function deleteContact($usersIds)
    {
        $contactUserId = explode('-', $usersIds)[0];
        $connectedId = explode('-', $usersIds)[1];

        // Nous effectuons une requete nous permettant d'obtenir les contacts id de la table contact à supprimer

        $queryGetContactIds = 'SELECT lhp4_contacts.contacts_id, lhp4_contacts.users_id, have_contacts.users_id,
        CASE
        WHEN (lhp4_contacts.users_id = :contactUserId AND have_contacts.users_id = :connectedId) THEN 1
        WHEN (lhp4_contacts.users_id = :connectedId AND have_contacts.users_id = :contactUserId) THEN 1
        END AS `delete`
        FROM lhp4_contacts
        INNER JOIN have_contacts
        ON lhp4_contacts.contacts_id = have_contacts.contacts_id
        HAVING `delete` = 1';

        $resultQueryGetContactIds = $this->bdd->prepare($queryGetContactIds);
        $resultQueryGetContactIds->bindValue(':connectedId', $connectedId);
        $resultQueryGetContactIds->bindValue(':contactUserId', $contactUserId);
        $resultQueryGetContactIds->execute();

        // On effectue un fetchAll pour obtenir les 2 lignes contenant les "contact_id"
        $arrayContactIds = $resultQueryGetContactIds->fetchAll();
        // On les stocks dans 2 variables que nous allons utiliser dans notre requete DELETE
        $firstContactId = $arrayContactIds[0]['contacts_id'];
        $secondContactId = $arrayContactIds[1]['contacts_id'];

        $query = 'DELETE FROM lhp4_contacts WHERE contacts_id IN (:firstContactId, :secondContactId)';

        try {

            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':firstContactId', $firstContactId);
            $resultQuery->bindValue(':secondContactId', $secondContactId);

            if ($resultQuery->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Méthode pour supprimer une demande de contact en attentes
     * @param integer qui sera le contact_id de la table contact
     * @return boolean indiquant la réussite de la méthode
     *  
     */
    public function refusedContact($contactId)
    {
        $query = 'DELETE FROM lhp4_contacts WHERE contacts_id = :contact_id';

        try {

            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':contact_id', $contactId);

            if ($resultQuery->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Méthode pour rechercher tous les users inscrits
     * @return boolean indiquant la réussite de la méthode
     *  
     */
    public function searchContact($search)
    {

        $query = 'SELECT `lhp4_users`.`users_id` as `users_id_pseudo`, `lhp4_users`.`users_pseudo`, `user_connected_id`, `contact_from_user_connected`.`contacts_authorized`, `contact_from_user_connected`.`contacts_bookmark`, `contact_from_user_connected`.`contacts_id`,
        `contact_who_asked_user`.`users_id_asked`, `contact_who_asked_user`.`users_id`, `contact_who_asked_user`.`contacts_id` AS `contacts_id_toValidate`,
        CASE       
        WHEN user_connected_id IS NULL AND contact_who_asked_user.users_id_asked = :userId then 1
        WHEN user_connected_id = :userId AND contact_who_asked_user.users_id_asked IS NULL then 8
        END as toValidate
        FROM lhp4_users
        LEFT JOIN (
        SELECT lhp4_users.users_id as user_connected_id, 
        lhp4_contacts.contacts_id, lhp4_contacts.users_id, contacts_authorized, contacts_bookmark
        FROM lhp4_contacts
        INNER JOIN have_contacts
        ON have_contacts.contacts_id = lhp4_contacts.contacts_id
        INNER JOIN lhp4_users
        ON have_contacts.users_id = lhp4_users.users_id
        WHERE have_contacts.users_id = :userId) AS contact_from_user_connected
        ON lhp4_users.users_id = contact_from_user_connected.users_id
        LEFT JOIN (
        SELECT lhp4_contacts.users_id as users_id_asked, have_contacts.users_id, users_pseudo, lhp4_contacts.contacts_id
        FROM lhp4_contacts
        INNER JOIN have_contacts
        ON have_contacts.contacts_id = lhp4_contacts.contacts_id
        INNER JOIN lhp4_users
        ON have_contacts.users_id = lhp4_users.users_id
        WHERE lhp4_contacts.users_id = :userId
        ) AS contact_who_asked_user
        ON lhp4_users.users_id = contact_who_asked_user.users_id
        wHERE `lhp4_users`.`users_pseudo` LIKE :search
        ORDER BY lhp4_users.users_pseudo';

        try {

            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':userId', $_SESSION['User']['users_id']);
            $resultQuery->bindValue(':search', $search . '%');

            if ($resultQuery->execute()) {
                return $resultQuery->fetchAll();
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Méthode pour controller si le contact existe déja pour le user
     * @param integer le user_id de la personne connectée
     * @param integer le user_id du user que l'on souhaite ajouter
     * @return boolean qui indique si le contact est présent
     */
    public function checkContactIn($userId, $userIdtoAdd)
    {
        $query = 'SELECT `have_contacts`.`users_id` AS `user_id`, `lhp4_contacts`.`users_id` AS `contact_id`
                FROM `have_contacts`
                INNER JOIN `lhp4_contacts`
                ON `have_contacts`.`contacts_id` = `lhp4_contacts`.`contacts_id`
                INNER JOIN `lhp4_users`
                ON `lhp4_users`.`users_id` = `lhp4_contacts`.`users_id`
                WHERE `have_contacts`.`users_id` = :userId AND `lhp4_contacts`.`users_id` = :userIdToAdd';

        try {
            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':userId', (int)$userId, PDO::PARAM_INT);
            $resultQuery->bindValue(':userIdToAdd', (int)$userIdtoAdd, PDO::PARAM_INT);
            $resultQuery->execute();
            $resultArray = $resultQuery->fetchAll();

            if (count($resultArray) > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
