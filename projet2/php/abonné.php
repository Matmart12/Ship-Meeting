<?php
session_start();
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

if($tab[$_SESSION["index"]]["grade"]!="admin"&&$tab[$_SESSION["index"]]["grade"]!="abonné"&&$tab[$_SESSION["index"]]["grade"]!="inscrit"){
    header("location:page_accueil.php");
}

$index = $_SESSION["index"];
$tab[$index]["grade"]="abonné";
$tab[$index]["time"]+=300;
file_put_contents($file_path, json_encode($tab,JSON_PRETTY_PRINT));
header("location:page_accueil.php");
exit();