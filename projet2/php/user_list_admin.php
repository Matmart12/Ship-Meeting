<?php
session_start();
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
                echo "<td class='text'>" . $compte['pseudo'] . "</td>";
                echo "<td class='text'>" . $compte['prenom'] . "</td>";
                echo "<td class='text'>" . $compte['nom'] . "</td>";
                echo "<td class='text'>" . $compte['genre'] . "</td>";
                echo "<td class='text'>" . $compte['age'] . " ans</td>";
                echo "<td class='text'>" . $compte['pays'] . "</td>";
                echo "<td class='text'>" . $compte['grade'] . "</td>";
                echo "<td class='text'>" . $compte['ship'] . "</td>";
                echo "<td><button type='button' onclick='ban(\"$compte[email]\")'>Bannir</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>
        <script>
            function redirect(email){
                var sessionEmail = "<?php echo $tab[$_SESSION['index']]['email']; ?>";
                if(sessionEmail == email){
                    window.location.href = "compte.php";
                }
                else{
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "set_other_email.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            // Rediriger vers chat.php après avoir stocké l'email dans la session
                            window.location.href = "chat.php";  
                        }
                    };
                    xhr.send("email=" + email);
                }
            }
            function ban(email){
                var xhr2 = new XMLHttpRequest();
                xhr2.open("POST", "set_other_email.php", true);
                xhr2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr2.onreadystatechange = function () {
                    if (xhr2.readyState == 4 && xhr2.status == 200) {
                        window.location.href = "user_list_admin.php";  
                    }
                };
                xhr2.send("email_ban=" + email);
            }
        </script>