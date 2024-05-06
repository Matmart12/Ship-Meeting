<?php
$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$email = $_POST["email"];
$age = $_POST["age"];
$pays = $_POST["pays"];
$photo = $_FILES["photo"];
$password = $_POST["password"] 
$compte = fopen("/workspaces/projets/Preing 2/projet/donnees/comptes.txt","w");
fwrite($compte,"$prenom $nom $email $age $pays $password");
fclose($compte);
