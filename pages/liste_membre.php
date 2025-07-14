<?php
require_once('inc/membre.php');
$membres = listMembres();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des membres</title>
    <style>
        .profil-card {
            border: 1px solid #ccc;
            border-radius: 12px;
            padding: 16px;
            margin: 10px;
            width: 250px;
            float: left;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            text-align: center;
        }
        .profil-card img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <h1>Liste des membres</h1>
    <?php foreach ($membres as $m): ?>
        <?php
            $imgPath = "../uploads/membres/" . $m['image_profil'];
            if (!file_exists($imgPath) || empty($m['image_profil'])) {
                $imgPath = "placeholder.jpeg";
            }
        ?>
        <div class="profil-card">
            <img src="<?= htmlspecialchars($imgPath) ?>" alt="Photo">
            <h3><?= htmlspecialchars($m['nom']) ?></h3>
            <p><?= htmlspecialchars($m['ville']) ?></p>
            <a href="fiche_membre.php?id=<?= $m['id_membre'] ?>">Voir profil</a>
        </div>
    <?php endforeach; ?>
</body>
</html>
