<head>
    <meta charset="UTF-8" />
    <title>Tableau des employés</title>
</head>
<?php
// PARTIE DONNES ---------------------------------------------------------
// inclusion de la méthode de dialogue avec la BD
require_once '../persistance/dialogueBD.php';
try {
    // on crée un objet référençant la classe DialogueBD
    $undlg = new DialogueBD();
    $mesApplications = $undlg->getComparaison();
} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>


<body>
<?php
if (isset($erreur)) {
    echo "Erreur : $erreur";
}
?>
<h1>Comparaison Stockage vs Réseau</h1>

<table>

    <?php
    echo "<tr class='goat'><td class='autre-goat'>Mois</td><td>Stockage(Go)</td><td>Réseau(Go)</td></tr>";
    // Boucle sur les lignes du tableau associatif (résultat requête SQL)
    foreach ($mesApplications as $ligne) {
        $mois = $ligne['mois_format'];
        $stockage = $ligne['total_stockage'];
        $reseau = $ligne['total_reseau'];

        echo "<tr><td>$mois </td> <td>$stockage</td> <td>$reseau</td> </tr>";
    }
    ?>
</table>



</body>
</html>
