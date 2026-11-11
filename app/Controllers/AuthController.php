<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['utilisateur'] = $_POST['prenom'];
    header('Location: ../views/recherche/recherche.php');
    exit();
}