<?php
session_start();
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
$Ug="abonné";
$tab[$i]["grade"]=$Ug;
$tab[$i]["time"]+=300;
file_put_contents($file_path, json_encode($tab,JSON_PRETTY_PRINT));
header("location:page_accueil.php");
?>


<!DOCTYPE html>
<html>