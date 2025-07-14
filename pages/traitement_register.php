<?php
require_once('../inc/fonction.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $success = false;

    if (
        !empty($_POST['nom']) &&
        !empty($_POST['genre']) &&
        !empty($_POST['ville']) &&
        !empty($_POST['naissance']) &&
        !empty($_POST['mail']) &&
        !empty($_POST['password']) &&
        isset($_FILES['image'])
    ) {
        $nom = $_POST['nom'];
        $genre = $_POST['genre'];
        $ville = $_POST['ville'];
        $naissance = $_POST['naissance'];
        $email = $_POST['mail'];
        $mdp = $_POST['password'];

        $fichier = $_FILES['image'];
        $uploadDir = "../uploads/membre/";

        if ($fichier['error'] === UPLOAD_ERR_OK) {
            $ext = strtolower(pathinfo($fichier['name'], PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($ext, $allowed)) {
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $nomFichier = uniqid("profil_", true) . '.' . $ext;
                $chemin = $uploadDir . $nomFichier;

                if (move_uploaded_file($fichier['tmp_name'], $chemin)) {
                    $success = inscription($nom, $naissance, $genre, $email, $ville, $mdp, $chemin);
                }
            }
        }
    }

    // Redirection unique ici
    if (!$success) {
        session_start();
        $_SESSION['user'] = login($email, $mdp);
        header('Location: index.php');
    } else {
        header('Location: register.php?error=1');
    }

    exit;
}
?>
