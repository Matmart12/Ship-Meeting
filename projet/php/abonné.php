<!DOCTYPE html>
<html>
<?php
session_start();
$file_path = "../data/info_formulaire.json";
if(file_exists($file_path)){
    $json_data = file_get_contents($file_path);
    $tab = json_decode($json_data, true);
    if(empty($json_data) || !is_array($tab)){
        echo "Vous n'avez pas créer un compte sur Ship-Meeting";
    }
}
$i=$_SESSION["index"];
$Ug="abonné";
$tab[$i]["grade"]=$Ug;
$time=time();
$tab[$i]["time"];
file_put_contents($file_path, json_encode($tab,JSON_PRETTY_PRINT));
header("location:accueuil.php");
    
    
    sleep(5);
    header("location:accueuil.php");
?>