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
else{
    exit();
}
if($tab[$_SESSION["index"]]["grade"]!="abonné"&&$tab[$_SESSION["index"]]["grade"]!="inscrit"){
    header("location:page_accueil.php");
}
$i=$_SESSION["index"];
$Ug="abonné";
$tab[$i]["grade"]=$Ug;
if($tab[$i]["time"]=0){
    $tab[$i]["time"]=time()+300;
}
else{
$tab[$i]["time"]+=300;
}
file_put_contents($file_path, json_encode($tab,JSON_PRETTY_PRINT));
header("location:page_accueil.php");
exit()
?>
<!DOCTYPE html>
<html>