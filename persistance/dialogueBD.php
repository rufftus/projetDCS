<?php
require_once(__DIR__ . '../connexion.php');

class dialogueBD
{

    public function getTopAppli()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT nom ,sum(volume) FROM consommation 
                   JOIN application a ON consommation.app_id=a.app_id 
                    GROUP BY consommation.app_id ORDER BY sum(volume) DESC LIMIT 5";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabAppli = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabAppli;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getEvolutionMois()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT mois ,sum(volume) FROM consommation 
                   JOIN application a ON consommation.app_id=a.app_id 
                    GROUP BY consommation.mois ORDER BY mois ASC ";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabAppli = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabAppli;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

    public function getComparaison()
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT mois ,sum(volume), FROM ressource 
                   JOIN consommation c ON ressource.res_id=c.res_id 
                    where res_id=1
                    UNION 
                    SELECT mois ,sum(volume), FROM ressource 
                   JOIN consommation c ON ressource.res_id=c.res_id 
                    where res_id=3
                    GROUP BY consommation.mois ORDER BY mois ASC ";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabAppli = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabAppli;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

}