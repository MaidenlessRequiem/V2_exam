<?php
require_once('../inc/fonction.php');
include("../inc/header.php") ;
$objets = getAllObjetsWithEmprunt();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des objets</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
</head>
<body>
<div class="container mt-4">
    <h2>Liste des objets</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom objet</th>
                <th>Catégorie</th>
                <th>Propriétaire</th>
                <th>Ville</th>
                <th>Emprunté</th>
                <th>Date de retour</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($objets as $objet): ?>
            <tr>
                <td><?= htmlspecialchars($objet['nom_objet']) ?></td>
                <td><?= htmlspecialchars($objet['nom_categorie']) ?></td>
                <td><?= htmlspecialchars($objet['nom']) ?></td>
                <td><?= htmlspecialchars($objet['ville']) ?></td>
                <td><?= $objet['date_emprunt'] ? 'Oui' : 'Non' ?></td>
                <td><?= $objet['date_retour'] ? htmlspecialchars($objet['date_retour']) : '-' ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
<?php
include("../inc/footer.php") ;
?>