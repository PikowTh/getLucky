<?php

class Contacts
{
    private $bdd;

    public function __construct()
    {
        try {
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
     * @return type array when succcess
     * @return type booleen when fail
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
            $resultQuery->bindValue(':users_id', $userId);
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
     * @param type integer id du user connecté
     * @return type array when succcess
     * @return type booleen when fail
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
            $resultQuery->bindValue(':users_id', $userId);
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
     * @param type integer id du user connecté
     * @return type array when succcess
     * @return type booleen when fail
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
            $resultQuery->bindValue(':users_id', $userId);
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
     * @param type string sous la forme de 16-17-18
     * @return type boolean qui nous indiquera la réussite de la méthode 
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
            $resultQueryAuthorized->bindValue(':contact_id', $contactId);

            // Nous allons créer un contact avec l'id de la personne qui a demandé le contact.
            // La personne qui valide le contact bénéficiera elle aussi du contact dans ses contacts..
            $queryAdd = 'INSERT INTO lhp4_contacts (contacts_bookmark, contacts_authorized, users_id)
            VALUES (0, 1, :users_id)';

            $resultQueryAdd = $this->bdd->prepare($queryAdd);
            $resultQueryAdd->bindValue(':users_id', $usersId);

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
     * @param type integer l'id du contact à manipuler
     * @return type boolean indiquant la réussite de la méthode
     * 
     */
    public function bookmarkedContacts($contactId)
    {
        $query = 'UPDATE lhp4_contacts SET contacts_bookmark = 1 WHERE contacts_id = :contact_id ';

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
     * Méthode pour que le contact en soit plus dans nos favoris
     * @param type integer qui sera le contact_id de la table contact
     * @return type boolean indiquant la réussite de la méthode
     * 
     */
    public function unmarkedContacts($contactId)
    {
        $query = 'UPDATE lhp4_contacts SET contacts_bookmark = 0 WHERE contacts_id = :contact_id ';

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
     * Méthode pour supprimer une demande en attente de validation du futur contact (Le user connecté change d'avis)
     * @param type integer le contact id de la table contact
     * @return type boolean indiquant la réussite de la méthode
     */
    public function deleteRequest($contactId)
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
     * Méthode pour supprimer un contact des contacts
     * @param type string qui sera de type 14-15 pour obtenir l'id du user connecté et l'id du contact
     * @return type boolean indiquant la réussite de la méthode
     * 
     */
    public function deleteContact($usersIds)
    {
        var_dump($usersIds);
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
     * @param type integer qui sera le contact_id de la table contact
     * @return type boolean indiquant la réussite de la méthode
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

    public function searchContact($contactId)
    {
        $query = 'SELECT lhp4_users.users_id AS contact_id, have_contacts.users_id, users_pseudo as contact_pseudo, lhp4_contacts.contacts_id AS table_contact_id,
        CASE 
            WHEN `lhp4_contacts`.`contacts_bookmark` = 1 AND have_contacts.users_id = :contact_id THEN 1
            ELSE 0
        END AS `bookmarked`,
        CASE 
            WHEN `lhp4_contacts`.`contacts_authorized` = 1 AND have_contacts.users_id = :contact_id THEN 1
            WHEN `lhp4_contacts`.`contacts_authorized` IS NOT NULL AND have_contacts.users_id = :contact_id THEN 0
        END AS `authorized`
        FROM veine.lhp4_users
        LEFT JOIN `lhp4_contacts`
        ON `lhp4_contacts`.users_id = lhp4_users.users_id
        LEFT JOIN have_contacts
        ON lhp4_contacts.contacts_id = have_contacts.contacts_id
        WHERE lhp4_users.users_id != :contact_id';

        try {

            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':contact_id', $contactId);



            if ($resultQuery->execute()) {
                return $resultQuery->fetchAll();
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
