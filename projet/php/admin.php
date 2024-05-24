<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="all.css">
    </head>
    <body>
        <div id=divdroit><a href="page_accueil.php"> <img src="https://www.educol.net/coloriage-maison-dl28263.jpg" width="40px" alt="" ></a></div>
        <form action="" method=post>
            <div id="table">
            <center>
                il semblerait que vous souhaitez devenir admin sur ce site. <br>
                Veuillez donc trouver la solution du riddle suivant: <br>
                <br>
                -Riddle1 <br>
                -Riddle2 <br>
                -Riddle3 <br>
                <br>
                <textarea name="admin?" cols="50">
                    Veuillez mettre votre réponse ici.
                </textarea> <br>
                <button onclick="ajoutadmin()">activer l'abonnement</button>
            </center>
            </div>
        </form>
    </body>
</html>
<?php
function ajoutadmin(){
    $_SESSION["formule"]="admin";
    $time=time();
    //changer la formule sur le fichier
}
?>

