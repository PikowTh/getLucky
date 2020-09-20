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

    public function addBet()
    {
        $query = 'INSERT INTO lhp4_bets (bets_name, bets_description, bets_end_time, bets_accepted, contacts_id, users_id, bet_types_id)
        VALUES ('LoL', 'G2 va gagner les worlds', '2020-10-23 12:00', 0, 58, 22, 1)';

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
}
