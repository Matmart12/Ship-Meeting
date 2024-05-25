<?php
session_start();
echo "cool";
$_SESSION["formule"]="abonné";
$time=time();
//changer la formule sur le fichier et faire en sorte que ce soit temporaire
sleep(5);
header("location:accueuil.php");
?>

<!DOCTYPE html>
<html>