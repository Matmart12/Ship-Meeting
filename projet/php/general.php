<!DOCTYPE html>
<html>
<?php
session_start();
if($_SESSION["index"]==null){
    header("location:accueuil.php");
}
if($tab[$_SESSION["index"]]["grade"]!="admin"&&$tab[$_SESSION["index"]]["grade"]!="abonné"&&$tab[$_SESSION["index"]]["grade"]!="inscrit"){
    header("location:page_accueil.php");
}
?>
<head>
<link rel="stylesheet" href="all.css">
</head>
<?php 
$file_path = "../data/info_formulaire.json";
if(file_exists($file_path)){
    $json_data = file_get_contents($file_path);
    $tab = json_decode($json_data, true);
    if(empty($json_data) || !is_array($tab)){
        echo "Erreur critique";
        exit();
    }
}
if($tab[$_SESSION["index"]]["grade"]=="abonné" && $tab[$_SESSION["index"]]["time"]){
    $tab[$_SESSION["index"]]["grade"]=="inscrit";
    $tab[$_SESSION["index"]]["time"]==0;
}
$c=count($tab);
for($i=0; $i<$c; $i++){
    if($tab[$i]["ship"]==$tab[$_SESSION["index"]]["ship"]){
        $compte[]=$i;
    }
}
$ind=count($compte);
?>
<div id=divdroit><a href="accueuil.php"> <img src="https://www.educol.net/coloriage-maison-dl28263.jpg" width="40px" alt="" ></a></div>
<table id="table" border="solid">
    <?php
    if($ind==0){
        echo "<tr> <tdclass='text'> vous n'avez pas de recommendations </td> </tr>";
    }
    else{
for($i=0; $i<$ind; $i++){
                echo "<tr onclick='redirect(\"" . $tab[$compte[$i]]["email"] . "\")'>";
                echo "<td class='border'>" . "<img class='img' src='../icones/" . $tab[$compte[$i]]['photo'] . "'>" . "</td>";
                echo "<td class='text'>" . $tab[$compte[$i]]['email'] . "</td>";
                echo "<td class='text'>" . $tab[$compte[$i]]['password'] . "</td>";
                echo "<td class='text'>" . $tab[$compte[$i]]['pseudo'] . "</td>";
                echo"<td>";
                ?>
                <form action="Profil" method="post">
                <input type="hidden" name="index" id="index" value="<?php $i?>"> 
                    <button>aller voir le profil</button>
                    </form>
                    <?php
                    echo"</td>";
                echo "</tr>";
            }
        }
            ?>
</table>
</center>