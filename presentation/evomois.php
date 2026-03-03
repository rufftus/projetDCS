<head>
    <meta charset="UTF-8" />
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
    <title>Tableau des employés</title>
</head>
<?php
// PARTIE DONNES ---------------------------------------------------------
// inclusion de la méthode de dialogue avec la BD
require_once '../persistance/dialogueBD.php';
try {
    // on crée un objet référençant la classe DialogueBD
    $undlg = new DialogueBD();
    $mesApplications = $undlg->getEvolutionMois();
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
<h1>Évolution mensuelle (total campus)</h1>

<table class="table table-bordered table-striped table-responsive">

    <?php
    echo "<tr ><td><B>Mois</B></td><td><B>Total(unités cumulées)</B></td></tr>";
    // Boucle sur les lignes du tableau associatif (résultat requête SQL)
    foreach ($mesApplications as $ligne) {
        $mois = $ligne['mois'];
        $volume = $ligne['sum(volume)'];
        echo "<tr><td>$mois </td><td>$volume</td> </tr>";
    }
    ?>
</table>



</body>
</html>
