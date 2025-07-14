<?php
require_once('../inc/fonction.php');
include("../inc/header.php") ;
$categories = getAllCategories();
$selected = isset($_GET['categorie']) ? intval($_GET['categorie']) : 0;
$objets = $selected ? getObjetsByCategorie($selected) : [];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Objets par catégorie</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
</head>
<body>
<div class="container mt-4">
    <h2>Filtrer par catégorie</h2>
    <form method="get" class="mb-3">
        <select name="categorie" class="form-select" style="width:300px;display:inline-block;">
            <option value="0">-- Choisir une catégorie --</option>
            <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat['id_categorie'] ?>" <?= $selected == $cat['id_categorie'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($cat['nom_categorie']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-dark">Filtrer</button>
    </form>
    <?php if ($selected && $objets): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom objet</th>
                    <th>Propriétaire</th>
                    <th>Ville</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($objets as $objet): ?>
                <tr>
                    <td><?= htmlspecialchars($objet['nom_objet']) ?></td>
                    <td><?= htmlspecialchars($objet['nom']) ?></td>
                    <td><?= htmlspecialchars($objet['ville']) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif ($selected): ?>
        <div class="alert alert-warning">Aucun objet dans cette catégorie.</div>
    <?php endif; ?>
</div>
</body>
</html>
<?php
include("../inc/footer.php") ;
?>