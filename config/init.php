<?php
//connexion PDO
try{
    $pdo = new PDO('mysql:host=localhost;dbname=ktr-msc-ls1;', 'root','',[PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]);
    $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
}
catch(Exception $e){
    die('Erreur; '.$e->getMessage());
}
if(isset($_GET['session']) && $_GET['session'] == 'destroy'){
    session_destroy();
    header('location:login.php');
    exit();
}

require 'function.php';