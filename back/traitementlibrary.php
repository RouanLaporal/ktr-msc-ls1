<?php
session_start();
$cardManager = new Manager($pdo);
$content_mail = "";
if (isset($_POST['submit'])){
    extract($_POST);
    if(empty($mail) || filter_var($mail, FILTER_VALIDATE_EMAIL)==false){
        $content_mail = '<div class="error" style="color:red;">Adresse email incorrect</div>';
    }
    else{
        $card = new Card($_POST);
        $cardManager->addCard($card);
    }
}

$mycard = $cardManager->getUser($_SESSION['user']['name']);

