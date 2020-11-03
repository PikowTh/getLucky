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
     * @param [str] $betName Contient le nom du pari
     * @param [str] $betDescription Petite description du pari
     * @param [str] $endTime Indique la fin du pari en dateTime
     * @param [int] $contactId Indique le contact que nous souhaitons défier
     * @param [int] $betType Indique le type du pari
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
     * Fonction permettant d'obtenir tous les paris qui nous ont été lancé : en tant qu'utilisateur connecté
     * @return array tableau contenant les détails du pari
     */
    public function getChallengeBets()
    {

        $query = 'SELECT bets_id, bets_name, bets_description, lhp4_bets.users_id AS challenger, bets_end_time, bet_types_id, bets_accepted FROM lhp4_bets
            INNER JOIN lhp4_contacts
            ON lhp4_bets.contacts_id = lhp4_contacts.contacts_id
            WHERE lhp4_contacts.users_id = :userId';

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
}
