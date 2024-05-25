<?php
session_start();

if(isset($_POST['email'])) 
{
    $_SESSION['other_email'] = $_POST['email'];
} 

if(isset($_POST['email_ban'])) 
{   
    $file_path = "../data/info_formulaire.json";
    if(file_exists($file_path)){
        $json_data = file_get_contents($file_path);
        $tab = json_decode($json_data, true);
        if(empty($json_data) || !is_array($tab)){
            echo "Erreur critique";
            exit();
        }
    }
    else{
        echo "Erreur Critique";
        exit();
    }

    foreach($tab as $key => $compte){
        if($compte['email'] == $_POST['email_ban'])
        {
           $i = $key;
           break;
        }
    }
    $tab[$i]['banni'] = 1;

    file_put_contents($file_path, json_encode($tab,JSON_PRETTY_PRINT));
}