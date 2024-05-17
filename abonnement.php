<!DOCTYPE html>
<html>
<?php
session_start();
?>
<head>
<link rel="stylesheet" href="all.css">
</head>
<div id=divdroit><a href="accueuil.php"> <img src="https://www.educol.net/coloriage-maison-dl28263.jpg" width="40px" alt="" ></a></div>
<div id="table">
<center>
        
    <table>
        <tr height=20px>
            il semblerait que vous souhaitez devenir abonné sur ce site. <br>
        Veuillez mettre les informations suivantes: <br>
        </tr>
        <tr height=50px>
            <td>
                <center>
                    votre numéro de carte de crédit:  <br>
                    <textarea name="" id=""></textarea>
                </center>
            </td>
        </tr>
        <tr height=50px>
            <td>
                <center>
                    votre numéro de téléphone: <br>
                    <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                </center>
            </td>        
        </tr>
        <tr>
            <td>
                <center>
            <button onclick="abonné()">activer l'abonnement</button>
        </center>
        </td>
        </tr>
    </table>
</center>
</div>
<script>
    function abonné(){
        document.location.href="abonné.php"
    }
</script>