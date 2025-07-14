<?php 
include("../inc/header.php") ;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Bienvenue</h1>
    <ul class="list-group">
        <li class="list-group-item"><a href="liste.php">Liste des objets</a></li>
        <li class="list-group-item"><a href="categorie.php">Filtrer par catégorie</a></li>
    </ul>
</div>
</body>
</html>

<?php
include("../inc/footer.php") ;
?>