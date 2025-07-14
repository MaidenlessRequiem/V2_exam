<?php
require_once('../inc/fonction.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['mail']) && !empty($_POST['password'])) {
        $mail = $_POST['mail'];
        $password = $_POST['password'];

        $user = login($mail, $password);

        if ($user) {
            session_start();
            $_SESSION['user'] = $user;
            header('Location: index.php');
            exit;
        }
    }

    // Échec de connexion ou champ vide
    header('Location: login.php?error=1');
    exit;
}
?>
