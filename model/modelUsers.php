<?php

class Users
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

    public function VerifyMailExist($mail)
    {
        $query = 'SELECT `users_mail` FROM lhp4_users WHERE `users_mail` = :userMail ';

        try {
            // Permet de vérifier si le Mail est déja présent dans la base de donnée ou non //
            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':userMail', $mail);
            $resultQuery->execute();
            $count = $resultQuery->rowCount();
            if ($count == 0) {
                // Si mail existe dans bdd = false //
                return false;
            } else {
                // Si mail existe pas dans bdd = true //
                return true;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function VerifyPseudoExist($pseudo)
    {
        $query = 'SELECT `users_pseudo` FROM lhp4_users WHERE `users_pseudo` = :userPseudo ';

        try {
            // Permet de vérifier si le Mail est déja présent dans la base de donnée ou non //
            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':userPseudo', $pseudo);
            $resultQuery->execute();
            $count = $resultQuery->rowCount();
            if ($count == 0) {
                // Si mail existe dans bdd = false //
                return false;
            } else {
                // Si mail existe pas dans bdd = true //
                return true;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function AddUsers($mail, $pseudo, $phone, $password, $birthdate)
    {

        $query = 'INSERT INTO lhp4_users (users_mail, users_pseudo, users_phone, users_password, users_birthdate) VALUES (:users_mail, :users_pseudo, :users_phone, :users_password, :users_birthdate)';

        try {
            // Permet de vérifier si le Mail est déja présent dans la base de donnée ou non //
            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':users_mail', $mail);
            $resultQuery->bindValue(':users_pseudo', $pseudo);
            $resultQuery->bindValue(':users_phone', $phone);
            $resultQuery->bindValue(':users_password', $password);
            $resultQuery->bindValue(':users_birthdate', $birthdate);
            $resultQuery->execute();
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    
    public function VerifyLogin($mail, $password)
    {

        $query = 'SELECT `users_mail`, `users_password` FROM lhp4_users WHERE `users_mail` = :users_mail ';

        try {
            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':users_mail', $mail);
            $resultQuery->execute();
            $resultUser = $resultQuery->fetch();

            if ($resultUser) {
                return password_verify($password, $resultUser['users_password']);
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function GetUserInfos($mail)
    {

        $query = 'SELECT * FROM lhp4_users WHERE `users_mail` = :users_mail ';

        try {
            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':users_mail', $mail);
            $resultQuery->execute();
            $resultUser = $resultQuery->fetch();

            if ($resultUser) {
                return $resultUser;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function UpdateMailUsers($newMail, $usersId)
    {
        $query = 'UPDATE `lhp4_users` SET users_mail = :users_mail WHERE users_pseudo = :users_pseudo';

        try {
            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':users_pseudo', $usersId);
            $resultQuery->bindValue(':users_mail', $newMail);
            $resultQuery->execute();

            if ($resultQuery) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function UpdatePhoneUsers($newPhone, $usersId)
    {
        $query = 'UPDATE `lhp4_users` SET users_phone = :users_phone WHERE users_pseudo = :users_pseudo';

        try {
            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':users_pseudo', $usersId);
            $resultQuery->bindValue(':users_phone', $newPhone);
            $resultQuery->execute();

            if ($resultQuery) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function UpdatePasswordUsers($newPassword, $usersId)
    {
        $query = 'UPDATE `lhp4_users` SET users_password = :users_password WHERE users_id = :users_id';

        try {
            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':users_id', $usersId);
            $resultQuery->bindValue(':users_password', $newPassword);
            $resultQuery->execute();

            if ($resultQuery) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getNameById($usersId)
    {
        $query = 'SELECT users_pseudo FROM lhp4_users WHERE lhp4_users.users_id = :users_id';

        try {
            $resultQuery = $this->bdd->prepare($query);
            $resultQuery->bindValue(':users_id', $usersId);
            $resultQuery->execute();
            $resultUser = $resultQuery->fetch();

            if ($resultUser) {
                return $resultUser;
            } else {
                return 'false';
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

}
