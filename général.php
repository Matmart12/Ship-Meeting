<!DOCTYPE html>
<html>
<?php
session_start();
?>
<head>
<link rel="stylesheet" href="all.css">
</head>
<div id=divdroit><a href="accueuil.php"> <img src="https://www.educol.net/coloriage-maison-dl28263.jpg" width="40px" alt="" ></a></div>
<center><table>
    <tr>
        <td colspan=2>
            <?php 
                if($var==0){
                    echo("Nous n'avons pas trouvé d'utilisateurs qui peuvent vous correspondre!");
                }
                else{
                    echo("Voici les utilisateurs pouvant vous correspondre!");
                }
            ?>
        </td>
    </tr>
    <tr>
        <td>
            <img src="" alt="">                       
        </td>
        <td>
            <?php
                echo("$nom[$i] \n");        //à refaire pour tout les utilisateurs qui ont le même ship + faire en sorte que ça agisse comme un boutonpour envoyer au bon profil
                echo("$Des[$i]");               
                $i++;
            ?>
        </td>
    </tr>
</table>
</center>