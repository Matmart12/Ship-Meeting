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
        <table width=30% align="center" id=table>
            <tr height=100px >
                <th bgcolor="red" onclick="inscription()">Formule inscrit/e</th>
            </tr>
            <tr >
                <th height=100px bgcolor="blue" onclick="abonné()">Formule abonné/e</th>
            </tr>
            <tr >
                <th height=100px bgcolor="yellow" onclick="admin()">Formule admin</th>
            </tr>
        </table>
    </body>
</html>

<script type="text/javascript">
    //function inscription(){
        //document.location.href="inscription.php";
    //}
    function abonné(){
        document.location.href="abonnement.php";
    }
    function admin()
    {
        document.location.href="admin.php";
    }
</script>

</html>