<?php
require_once 'connection.php';

function login($mail, $password) {
    $request = "SELECT * FROM V1_EXAM_membre WHERE email = '%s' AND mdp = '%s' LIMIT 1";
    $request = sprintf($request, $mail, $password) ;
    $result = mysqli_query(dbconnect(), $request);
    if(is_bool($result)) {
        return false;
    }
    return mysqli_fetch_assoc($result);
}

function inscription($nom, $naissance, $genre, $email, $ville, $mdp, $image) {
    $request = "INSERT INTO V1_EXAM_membre (nom, date_naissance, genre, email, ville, mdp, image_profil)
                VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')";
    $request = sprintf($request, $nom, $naissance, $genre, $email, $ville, $mdp, $image);
    $result = mysqli_query(dbconnect(), $request);
    return !is_bool($result);
}

function getAllObjetsWithEmprunt() {
    $sql = "SELECT o.nom_objet, c.nom_categorie, m.nom, m.ville,
                   e.date_emprunt, e.date_retour
            FROM V1_EXAM_objet o
            JOIN V1_EXAM_categorie_objet c ON o.id_categorie = c.id_categorie
            JOIN V1_EXAM_membre m ON o.id_membre = m.id_membre
            LEFT JOIN V1_EXAM_emprunt e ON o.id_objet = e.id_objet AND e.date_retour IS NULL";
    $result = mysqli_query(dbconnect(), $sql);
    $data = [] ;
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}

function getAllCategories() {
    $sql = "SELECT * FROM V1_EXAM_categorie_objet";
    $result = mysqli_query(dbconnect(), $sql);
    $data = [] ;
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}

function getObjetsByCategorie($id_categorie) {
    $sql = "SELECT o.nom_objet, m.nom, m.ville
            FROM V1_EXAM_objet o
            JOIN V1_EXAM_membre m ON o.id_membre = m.id_membre
            WHERE o.id_categorie = " . intval($id_categorie);
    $result = mysqli_query(dbconnect(), $sql);
    $data = [] ;
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}

function getMembre($id) {
    $conn = dbconnect();
    $id = (int)$id;
    $sql = "SELECT * FROM V1_EXAM_membre WHERE id_membre = $id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function listMembres() {
    $conn = dbconnect();
    $sql = "SELECT * FROM V1_EXAM_membre ORDER BY nom";
    $result = mysqli_query($conn, $sql);
    $membres = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $membres[] = $row;
    }
    return $membres;
}
function getObjetsByMembre($id_membre) {
    $conn = dbconnect();
    $id = (int)$id_membre;

    $sql = "SELECT * FROM V1_EXAM_objet WHERE id_membre = $id ORDER BY nom_objet";
    $result = mysqli_query($conn, $sql);

    $objets = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $objets[] = $row;
    }
    return $objets;
}


function getCategories() {
    $conn = dbconnect();

    $sql = "SELECT * FROM V1_EXAM_categorie_objet";
    $result = mysqli_query($conn, $sql);

    $categories = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[$row['id_categorie']] = $row['nom_categorie'];
    }
    return $categories;
}

function getObjetsParCategorie($id_membre) {
    $categories = getCategories(); 
    $objets = getObjetsByMembre($id_membre);

    $resultat = [];
    foreach ($categories as $id_categorie => $nom_categorie) {
        $resultat[$nom_categorie] = [];
    }

     foreach ($objets as $objet) {
        $catId = $objet['id_categorie'];
        if (isset($categories[$catId])) {
            $resultat[$categories[$catId]][] = $objet['nom_objet'];
        }
    }

    return $resultat;
}


?>