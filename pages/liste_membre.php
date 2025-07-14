<?php
require_once('../inc/fonction.php');
$membres = listMembres();
include("../inc/header.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des membres</title>
    <style>
        body {
            font-family: "Segoe UI", sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
        }

        .card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 2px solid #eee;
        }

        .card h3 {
            margin: 10px 0 5px;
            font-size: 1.1em;
            color: #222;
        }

        .card p {
            font-size: 0.95em;
            color: #666;
            margin: 5px 0 15px;
        }

        .card a {
            display: inline-block;
            padding: 8px 16px;
            background-color: #1976d2;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.2s ease;
        }

        .card a:hover {
            background-color: #1258a8;
        }
    </style>
</head>

<body>
    <h1>Liste des Membres</h1>
    <div class="grid-container">
        <?php foreach ($membres as $m): ?>
            <?php
            $imgPath = $m['image_profil'];
          // echo $imgPath ;
            if (!file_exists($imgPath)) {
                $imgPath = "../uploads/membre/placeholder.jpg";
            }

            ?>
            <div class="card">

                <img
                    src="<?= $imgPath ?>"
                    alt="Photo de <?= htmlspecialchars($m['nom']) ?>">


                <h3><?= htmlspecialchars($m['nom']) ?></h3>
                <p><?= htmlspecialchars($m['ville']) ?></p>
                <a href="fiche_membre.php?id=<?= $m['id_membre'] ?>">Voir le profil</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>

<?php include("../inc/footer.php"); ?>

</html>