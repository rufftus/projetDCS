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
    $mesApplications = $undlg->getTopAppli();
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
<h1>Top 5 des applications (consommation totale)</h1>

<table class="table table-bordered table-striped table-responsive">

    <?php
    echo "<tr><td>Application</td><td>Total(unités cumulées)</td></tr>";
    // Boucle sur les lignes du tableau associatif (résultat requête SQL)
    foreach ($mesApplications as $ligne) {
        $nom = $ligne['nom'];
        $volume = $ligne['sum(volume)'];
        echo "<tr><td>$nom </td><td>$volume</td> </tr>";
    }
    ?>
</table>



</body>
</html>
