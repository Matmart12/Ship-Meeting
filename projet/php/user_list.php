<?php
session_start();

$file_path = "../data/info_formulaire.json";
if(file_exists($file_path)){
    $json_data = file_get_contents($file_path);
    $tab = json_decode($json_data, true);
    if(empty($json_data) || !is_array($tab)){
        echo "Erreur critique";
        exit();
    }
}
if($tab[$_SESSION["index"]]["grade"]!="admin"){
    header("location:page_accueil.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/user_list.css">
        <title>Compte</title>
    </head>
    <body>
        <div id=divdroit><a href="page_accueil.php"> <img id="home_icon" src="https://www.educol.net/coloriage-maison-dl28263.jpg" width="40px" alt="" ></a></div>
        <p id="titre">Liste des utilisateurs</p>
        <table id="table" border="solid">
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
            else{
                echo "Erreur Critique";
                exit();
            }
            foreach($tab as $compte){
                echo "<tr onclick='redirect(\"$compte[email]\")'>";
                echo "<td class='border'>" . "<img class='img' src='../icones/" . $compte['photo'] . "'>" . "</td>";
                echo "<td class='text'>" . $compte['email'] . "</td>";
                echo "<td class='text'>" . $compte['password'] . "</td>";
                echo "<td class='text'>" . $compte['prenom'] . "</td>";
                echo "<td class='text'>" . $compte['nom'] . "</td>";
                echo "<td class='text'>" . $compte['age'] . "</td>";
                echo "<td class='text'>" . $compte['pays'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <script>
            function redirect(email){
                var sessionEmail = "<?php echo $tab[$_SESSION['index']]['email']; ?>";
                if(sessionEmail == email){
                    window.location.href = "compte.php";
                }
                else{
                    window.location.href = "chat.php";
                }
            }
        </script>
    </body>
</html>
