<?php
require "config/init.php";
include './back/traitementlibrary.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
</head>

<body>
    <div class="container">
        <h2 class="title-inscription">Nouvelle carte</h2>
        <form method="POST" class="inscription-form">
            <input type="text" name="name" id="name" placeholder="Name">
            <input type="text" name="companyName" id="companyName" placeholder="Company Name">
            <?= $content_mail; ?>
            <input type="mail" name="mail" id="mail" placeholder="Email address" required>
            <input type="tel" name="phone" id="phone" placeholder="Telephone">
            <input type="submit" name="submit" value="Ajouter ma carte">
        </form>
        <h2> Page profil </h2>
    <div class="info-membre">
        Name
        <span class="aff-info">
            <?= htmlspecialchars($mycard->name()); ?>
        </span>
    </div>
    <div class="info-membre">
        Company Name
        <span class="aff-info">
            <?= $mycard->companyName(); ?>
        </span>
    </div>
    <div class="info-membre">
        Numéro de Téléphone
        <span class="aff-info">
            <?= $mycard->phone(); ?>
        </span>
    </div>
    <div class="info-membre">
        Adresse Email
        <span class="aff-info">
            <?= $mycard->mail(); ?>
        </span>
    </div>
    <a href="?session=destroy"><input type="button" class="destroy-btn" value="Déconnexion"></a>
</body>

</html>