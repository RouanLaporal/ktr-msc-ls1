<?php
require "config/init.php";
include './back/traitementProfil.php';
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
        </head>
        <body>
            <div class="container">
            <h2 class="title-inscription">Inscrivez-vous</h2>
            <form method="POST" class="inscription-form">
                <?= $content_name;?>
                <input type="text" name="name" id="name" placeholder="Name" required>
                <input type="text" name="companyName" id="companyName" placeholder="Company Name">
                <?= $content_mail;?>
                <input type="mail" name="mail" id="mail" placeholder="Email address">
                <?= $content_phone;?>
                <input type="tel" name="phone" id="phone" placeholder="Telephone">
                <input type="password" name="password" id="password" placeholder="Mot de Passe" required> 
                <input type="submit" name = "submit" value="Créer mon profil">
            </form>
        </body>
</html>