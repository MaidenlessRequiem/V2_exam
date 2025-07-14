<?php
function dbconnect()
{
    static $connect = null;

    if ($connect === null) {
        //jV8bPgbK
        $connect = mysqli_connect('localhost', 'ETU003964', 'jV8bPgbK', 'db_s2_ETU003964');
        if (!$connect) {
            die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
        }

        mysqli_set_charset($connect, 'utf8mb4');
    }

    return $connect;
}
?>