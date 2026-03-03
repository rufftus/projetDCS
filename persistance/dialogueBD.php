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
            $sql = "SELECT 
                        DATE_FORMAT(mois, '%Y-%m') AS mois_format, 
                        SUM(CASE WHEN res_id = 1 THEN volume ELSE 0 END) AS total_stockage,
                        SUM(CASE WHEN res_id = 3 THEN volume ELSE 0 END) AS total_reseau
                    FROM consommation
                    GROUP BY mois 
                    ORDER BY mois ASC";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $tabAppli = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $tabAppli;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }

}