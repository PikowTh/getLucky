<?php

class Bets
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
     * Permet de rajouter un pari dans la table bets
     *
     * @param string $betName Contient le nom du pari
     * @param string $betDescription Petite description du pari
     * @param string $endTime Indique la fin du pari en dateTime
     * @param integer $contactId Indique le contact que nous souhaitons défier
     * @param integer $betType Indique le type du pari
     * @return void
     */
    public function addBet($betName, $betDescription, $endTime, $contactId, $betType)
    {

        $query = 'INSERT INTO lhp4_bets (bets_name, bets_description, bets_end_time, bets_accepted, contacts_id, users_id, bet_types_id)
        VALUES (:bets_name, :bets_description, :bets_end_time, :bets_accepted, :contacts_id, :users_id, :bet_types_id)';

        try {

            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':bets_name', $betName, PDO::PARAM_STR);
            $resultQuery->bindValue(':bets_description', $betDescription, PDO::PARAM_STR);
            $resultQuery->bindValue(':bets_end_time', $endTime, PDO::PARAM_STR);
            $resultQuery->bindValue(':bets_accepted', 0, PDO::PARAM_INT);
            $resultQuery->bindValue(':contacts_id', (int)$contactId, PDO::PARAM_INT);
            $resultQuery->bindValue(':users_id', $_SESSION['User']['users_id'], PDO::PARAM_INT);
            $resultQuery->bindValue(':bet_types_id', (int)$betType, PDO::PARAM_INT);

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
     * Fonction permettant d'obtenir tous les paris / défis créés par la personne connectée via $_SESSION
     * @return array tableau contenant les détails du pari
     */
    public function getAllBets()
    {

        $query = 'SELECT bets_id, bets_name, bets_end_time, bets_accepted, bet_types_id, bets_description FROM lhp4_bets WHERE users_id = :userId';

        try {

            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':userId', (int)($_SESSION['User']['users_id']), PDO::PARAM_INT);

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
     * Fonction permettant d'obtenir les détails d'un pari selon son id 
     * @param integer $betId contient l'id du pari
     * @return array tableau contenant les détails du pari
     */
    public function getBetDetails($betId)
    {

        $query = 'SELECT bets_id, bet_types_img, lhp4_bet_types.bet_types_id, bet_types_name, bets_name, bets_description, bets_end_time, bets_result, bets_fulfilled, bets_accepted, lhp4_contacts.users_id, lhp4_bets.users_id AS challenger, users_pseudo
            FROM lhp4_bets
            INNER JOIN lhp4_contacts
            ON lhp4_bets.contacts_id = lhp4_contacts.contacts_id
            INNER JOIN lhp4_users
            ON lhp4_bets.users_id = lhp4_users.users_id
            INNER JOIN lhp4_bet_types
            ON lhp4_bets.bet_types_id = lhp4_bet_types.bet_types_id
            WHERE bets_id = :betId';

        try {

            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':betId', (int)($betId), PDO::PARAM_INT);

            if ($resultQuery->execute()) {
                return $resultQuery->fetch();
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * Fonction permettant de savoir si le contact à des paris en attente avec nous = va nous permettre de supprimer contact
     * @param integer $userId contient l'id du user
     * @param integer $contactUserId contient l'id du user contact
     * @return boolean
     */
    public function haveContactBet($userId, $contacUserId)
    {

        $query = 'SELECT bets_id, bet_types_img, lhp4_bet_types.bet_types_id, bet_types_name, bets_name, bets_description, bets_end_time, bets_result, bets_fulfilled, bets_accepted, lhp4_contacts.users_id, lhp4_bets.users_id AS challenger, users_pseudo
            FROM lhp4_bets
            INNER JOIN lhp4_contacts
            ON lhp4_bets.contacts_id = lhp4_contacts.contacts_id
            INNER JOIN lhp4_users
            ON lhp4_bets.users_id = lhp4_users.users_id
            INNER JOIN lhp4_bet_types
            ON lhp4_bets.bet_types_id = lhp4_bet_types.bet_types_id
            WHERE lhp4_contacts.users_id = :userId OR lhp4_bets.users_id = :contacUserId';

        try {

            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':userId', (int)($userId), PDO::PARAM_INT);
            $resultQuery->bindValue(':contacUserId', (int)($contacUserId), PDO::PARAM_INT);

            if ($resultQuery->execute()) {
                return $resultQuery->fetch();
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }


    /**
     * Fonction permettant d'obtenir tous les paris acceptés par le user
     * @param integer $userId contient l'id du user
     * @return array tableau de tous les paris acceptés
     */
    public function getBetsAccepted($userId)
    {

        $query = 'SELECT bets_id, bet_types_img, lhp4_bet_types.bet_types_id, bet_types_name, bets_name, bets_description, bets_end_time, bets_result, bets_fulfilled, bets_accepted, lhp4_contacts.users_id, lhp4_bets.users_id AS challenger, users_pseudo
            FROM lhp4_bets
            INNER JOIN lhp4_contacts
            ON lhp4_bets.contacts_id = lhp4_contacts.contacts_id
            INNER JOIN lhp4_users
            ON lhp4_bets.users_id = lhp4_users.users_id
            INNER JOIN lhp4_bet_types
            ON lhp4_bets.bet_types_id = lhp4_bet_types.bet_types_id
            WHERE bets_accepted = 1 AND lhp4_contacts.users_id = :userId
            ORDER BY bets_end_time DESC';

        try {

            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':userId', (int)($userId), PDO::PARAM_INT);

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
     * Fonction permettant d'obtenir tous les paris qui nous ont été lancé en tant qu'utilisateur connecté = les personnes qui nous défient
     * @return array tableau contenant les détails du pari
     */
    public function getChallengeBets()
    {

        $query = 'SELECT bets_id, bets_name, bets_description, lhp4_bets.users_id AS challenger, bets_end_time, bet_types_id, bets_accepted FROM lhp4_bets
            INNER JOIN lhp4_contacts
            ON lhp4_bets.contacts_id = lhp4_contacts.contacts_id
            WHERE lhp4_contacts.users_id = :userId
            ORDER BY bets_end_time DESC';

        try {

            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':userId', (int)($_SESSION['User']['users_id']), PDO::PARAM_INT);

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
     * Fonction permettant d'accepter un pari : On change le statut du pari en accepté
     * @param integer $betId contient l'id du pari à modifier
     * @return void
     */
    public function acceptBet($betId)
    {

        $query = 'UPDATE lhp4_bets
            SET lhp4_bets.bets_accepted = 1
            WHERE lhp4_bets.bets_id = :betId';

        try {

            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':betId', (int)($betId), PDO::PARAM_INT);

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
     * Fonction permettant d'effacer qui n'a pas encore été accepté
     * @param integer $betId contient l'id du pari à modifier
     * @return void
     */
    public function refuseBet($betId)
    {

        $query = 'DELETE FROM lhp4_bets
            WHERE lhp4_bets.bets_id = :betId';

        try {

            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':betId', (int)($betId), PDO::PARAM_INT);

            if ($resultQuery->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
