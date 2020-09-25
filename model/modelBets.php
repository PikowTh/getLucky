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
}
