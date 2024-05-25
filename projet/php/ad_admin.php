<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="all.css">
</head>

</style>
<?php
session_start();
$file_path = "../data/info_formulaire.json";
if(file_exists($file_path)){
    $json_data = file_get_contents($file_path);
    $tab = json_decode($json_data, true);
    if(empty($json_data) || !is_array($tab)){
        echo "erreur crittique";
    }
}
if($tab[$_SESSION["index"]]["grade"]!="admin"&&$tab[$_SESSION["index"]]["grade"]!="abonné"&&$tab[$_SESSION["index"]]["grade"]!="inscrit"){
    header("location:page_accueil.php");
}
$i=$_SESSION["index"];
$Ug="admin";
$tab[$i]["grade"]=$Ug;
file_put_contents($file_path, json_encode($tab,JSON_PRETTY_PRINT));
header("location:page_accueil.php");
?>