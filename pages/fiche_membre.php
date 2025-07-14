<?php
require_once('../inc/fonction.php');

if (!isset($_GET['id'])) {
    die("ID manquant.");
}

$membre = getMembre($_GET['id']);

if (!$membre) {
    die("Membre introuvable.");
}

$imgPath = "../uploads/membre/" . $membre['image_profil'];
if (!file_exists($imgPath) || empty($membre['image_profil'])) {
    $imgPath = "../uploads/membre/placeholder.jpg";
}


$objets=getObjetsParCategorieTableau($membre['id_membre']);
include("../inc/header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil de <?= htmlspecialchars($membre['nom']) ?></title>
    <style>
         .objets-section {
        max-width: 700px;
        margin: 30px auto;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }
    .categorie {
        background-color: #1976d2;
        color: white;
        padding: 10px 15px;
        border-radius: 8px;
        margin-top: 20px;
        font-size: 1.2em;
        box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    }
    .liste-objets {
        list-style: square inside;
        padding-left: 0;
        margin-top: 10px;
        color: #333;
    }
    .liste-objets li {
        padding: 6px 0;
        border-bottom: 1px solid #eee;
        transition: background-color 0.3s;
    }
    .liste-objets li:hover {
        background-color: #e3f2fd;
    }
    .empty-msg {
        font-style: italic;
        color: #999;
        margin-left: 10px;
    }
        img {
            border: 3px solid #1976d2; /* bordure solide */
            border-radius: 8px;
        }
        .fiche {
            max-width: 600px;
            margin: 40px auto;
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
        h2, h3 {
            color: #1976d2;
        }
        .objets-categorie {
            text-align: left;
            max-width: 600px;
            margin: 20px auto;
        }
        .objets-categorie ul {
            list-style-type: disc;
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <div class="fiche">
        <img src="<?= htmlspecialchars($imgPath) ?>" alt="Photo de profil de <?= htmlspecialchars($membre['nom']) ?>">
        <h2><?= htmlspecialchars($membre['nom']) ?></h2>
        <p><strong>Genre :</strong> <?= htmlspecialchars($membre['genre']) ?></p>
        <p><strong>Naissance :</strong> <?= htmlspecialchars($membre['date_naissance']) ?></p>
        <p><strong>Email :</strong> <?= htmlspecialchars($membre['email']) ?></p>
        <p><strong>Ville :</strong> <?= htmlspecialchars($membre['ville']) ?></p>
    </div>

<div class="objets-section">
<?php
if (empty($objets)) {
    echo '<p class="empty-msg">Ce membre ne possède aucun objet.</p>';
} else {
    foreach ($objets as $categorie => $listeObjets) {
        echo '<div class="categorie">' . htmlspecialchars($categorie) . '</div>';
        if (empty($listeObjets)) {
            echo '<p class="empty-msg">Aucun objet dans cette catégorie.</p>';
        } else {
            echo '<ul class="liste-objets">';
            foreach ($listeObjets as $objet) {
                echo '<li>' . htmlspecialchars($objet) . '</li>';
            }
            echo '</ul>';
        }
    }
}
?>
</div>

</body>
</html>

<?php include("../inc/footer.php"); ?>
