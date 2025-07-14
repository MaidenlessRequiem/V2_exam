<?php
require_once('../inc/fonction.php');

if (!isset($_GET['id'])) {
    die("ID manquant.");
}

$membre = getMembre($_GET['id']);

if (!$membre) {
    die("Membre introuvable.");
}

$imgPath = "../uploads/membres/" . $membre['image_profil'];
if (!file_exists($imgPath) || empty($membre['image_profil'])) {
    $imgPath = "placeholder.jpeg";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil de <?= htmlspecialchars($membre['nom']) ?></title>
    <style>
        .fiche {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .fiche img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="fiche">
        <?php
            $imgPath = $membre['image_profil'];
          // echo $imgPath ;
            if (!file_exists($imgPath)) {
                $imgPath = "../uploads/membre/placeholder.jpg";
            }

            ?>
        <img src="<?= htmlspecialchars($imgPath) ?>" alt="Photo de profil">
        <h2><?= htmlspecialchars($membre['nom']) ?></h2>
        <p><strong>Genre:</strong> <?= htmlspecialchars($membre['genre']) ?></p>
        <p><strong>Naissance:</strong> <?= htmlspecialchars($membre['date_naissance']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($membre['email']) ?></p>
        <p><strong>Ville:</strong> <?= htmlspecialchars($membre['ville']) ?></p>
    </div>
</body>
</html>
