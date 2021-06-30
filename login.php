<?php
require 'config/init.php';
include './back/traitmentLogin.php';
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
        </head>
        <body>
            <div class="container">
                <h2 class="title-login">Connectez vous</h2>
                <form method="POST" class="login-form">
                    <input type="text" name="name" id="name" placeholder="Name">
                    <input type="password" name="password" placeholder="Mot de passe">
                    <?= $content;?>
                    <input type="submit" name = "submit" value="Connectez-vous">
                </form>
            </div>
        </body>
    </html>
