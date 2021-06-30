<?php
$profilManager = new Manager($pdo);
$content_mail = "";
$content_name = "";
$content_phone= "";
$content_password="";
if (isset($_SESSION['user'])){
    header('location: profilView.php?connect=forbidden');
    exit();
}
if (isset($_POST['submit'])){
    extract($_POST);
    if(empty($name)){
        $content_name = '<div class="error" style="color:red;">Le nom est manquant</div>';
    }
    else if (filter_var($phone, FILTER_SANITIZE_NUMBER_INT) == false){
        $content_phone = '<div class="error" style="color:red;">Le numéro est incorrect</div>';
    }
    else if (filter_var($mail, FILTER_VALIDATE_EMAIL)==false){
        $content_mail = '<div class="error" style="color:red;">Adresse email incorrect</div>';
    }
    else if (empty($password)){
        $content_password = '<div class="error" style="color:red;">Votre mot de passe est incorrect</div>';
    }
    else 
    {
        $profil = new Profile($_POST);
        $profilManager->addUser($profil);
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['companyName'] = $companyName;
        $_SESSION['user']['mail'] = $mail;
        $_SESSION['user']['phone'] = $phone;
        $_SESSION['user']['password'] = $password;
        header('location:profilView.php');
        exit();
    }
}