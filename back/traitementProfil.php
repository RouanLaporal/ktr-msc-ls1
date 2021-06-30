<?php
$content_mail = "";
$content_name = "";
$content_phone= "";
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
}