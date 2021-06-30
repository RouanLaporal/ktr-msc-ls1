<?php
    session_start();
    $profilManager = new Manager($pdo);
    $content = "";
    if (isset($_POST['submit'])){
        extract($_POST);
        if(empty($name) || empty($password) || $profilManager->connect($name,$password)){
            $content = '<div class="error" style="color:red;">L\'identifiant ou le mot de passe ne correspond pas</div>';
        }
        else
        {
            $_SESSION['user']['name'] = $name;
            $_SESSION['user']['password'] = $password;
            header('location:profilView.php');
            exit();
        }
    }