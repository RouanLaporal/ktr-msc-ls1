<?php
    $manager = new Manager($pdo);
    $profil = $manager->getUser($_SESSION['user']['name']);

    $content = (isset($_GET['connect']) && $_GET['connect'] == 'forbidden') ? '<div style="background:tomato;padding:2%;">Vous ne pouvez pas accéder à la page d\'inscription</div>' :  "";

    if(!isset($_SESSION['user'])){
        header('location:login.php?access=forbidden');
        exit();
    }