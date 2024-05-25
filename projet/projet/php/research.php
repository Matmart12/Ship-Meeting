<!DOCTYPE html>
<html>

<?php
session_start();
if(isset($_SESSION["other_email"])){
    $_SESSION["other_email"]="";
}
$file_path = "../data/info_formulaire.json";
if(file_exists($file_path)){
    $json_data = file_get_contents($file_path);
    $tab = json_decode($json_data, true);
    if(empty($json_data) || !is_array($tab)){
        echo "Erreur critique";
        exit();
    }
}
if($_SESSION["index"]==null){
    header("Location: connexion.php");
}
if($tab[$_SESSION["index"]]["grade"] !="admin" && $tab[$_SESSION["index"]]["grade"] !="abonné" && $tab[$_SESSION["index"]]["grade"] !="inscrit"){
    header("location: page_accueil.php");
}
$c=count($tab);
for($i=0; $i<$c; $i++){
    if($tab[$i]["pseudo"]==$_POST["pseudo"]){
        $compte[]=$i;
    }
}

$ind=count($compte);
?>

<html>
    <head>
        <link rel="stylesheet" href="all.css">
    </head>
    <body>
    
    <div id=divdroit><a href="accueil.php"> <img src="https://www.educol.net/coloriage-maison-dl28263.jpg" width="40px" alt="" ></a></div>
    <table id="table" border="solid">
        <center><form action="research.php" method="post">
                <input type="text" name="pseudo" value="Veuillez entrer un pseudo" require/>
                <button type="submit" value="send" > <img width="40px" src="https://static.vecteezy.com/ti/vecteur-libre/p3/4566919-style-dessin-doodle-loupe-icone-dessin-dessin-a-la-main-vectoriel.jpg" alt=""></button>
            </form>
        </center>
        <?php
        if($ind==0){
            echo "<tr> <tdclass='text'> vous n'avez pas de recommendations </td> </tr>";
        }
        else{
    for($i=0; $i<$ind; $i++){
                    echo "<tr onclick='redirect(\"" . $tab[$compte[$i]]["email"] . "\")'>";
                    echo "<td class='border'>" . "<img class='img' src='../icones/" . $tab[$compte[$i]]['photo'] . "' width=50px>" . "</td>";
                    echo "<td class='text'>" . $tab[$compte[$i]]['email'] . "</td>";
                    echo "<td class='text'>" . $tab[$compte[$i]]['password'] . "</td>";
                    echo "<td class='text'>" . $tab[$compte[$i]]['pseudo'] . "</td>";
                    echo"<td>";
                    ?>
                    <form action="profil.php" method="post">
                    <input type="hidden" name="index" id="index" value="<?php $i?>"> 
                        <button >aller voir le profil</button>
                        </form>
                        <?php
                        echo"</td>";
                    echo "</tr>";
                }
            }
                ?>
    </table>
    </center>
    </body>
    <script>
            function redirect(email){
                var sessionEmail = "<?php echo $tab[$_SESSION['index']]['email']; ?>";
                if(sessionEmail == email){
                    window.location.href = "profil.php";
                }
                else{
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "set_other_email.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            // Rediriger vers profil.php après avoir stocké l'email dans la session
                            window.location.href = "profil.php";  
                        }
                    };
                    xhr.send("email=" + email);
                }
            }
        </script>
</html>