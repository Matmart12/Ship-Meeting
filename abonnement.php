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
            <button onclick="ajoutabon()"></button>
        </tr>
    </table>
</center>
</div>

<?php
function ajoutabon(){
    $_SESSION["formule"]="abonné";
    $time=time();
    //changer la formule sur le fichier et faire en sorte que ce soit temporaire
}
?>
    

    


</form>