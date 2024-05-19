<?php

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $file_path = "../data/info_formulaire.json";
    if(file_exists($file_path)){
        $json_data = file_get_contents($file_path);
        $tab = json_decode($json_data, true);
        if(empty($json_data) || !is_array($tab)){
            $tab = array();
        }
        else{
            foreach ($tab as $compte){
                if(isset($compte['email']) && $compte['email'] === $email){
                    echo "L'email est déjà enregistré. Veuillez utiliser un autre email.";
                    exit();
                }
            }
        }
    }
} 
if(isset($_POST['password'], $_POST['prenom'], $_POST['nom'], $_POST['age'], $_POST['pays'])){
    $password = $_POST['password'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $age = $_POST['age'];
    $pays = $_POST['pays'];
    $file = $_FILES['photo'];

    $data_array = array(
        'email' => $email,
        'password' => $password,
        'prenom' => $prenom,
        'nom' => $nom,
        'age' => $age,
        'pays' => $pays,
        'ship' => 0,
    );

    if(isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['photo'];
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $photo_name = $email . '.' . $extension;
        move_uploaded_file($file['tmp_name'], "../icones/$photo_name");
        $data_array['photo'] = $photo_name;
    } 
    else {
        $data_array['photo'] = "0.png";
    }

    $tab[] = $data_array;

    file_put_contents($file_path, json_encode($tab,JSON_PRETTY_PRINT));

    header("Location: connexion.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inscription.css">
    <title>Formulaire d'inscription</title>
</head>

<body>
    <form enctype="multipart/form-data" method="POST" action="inscription.php">    <div id=divdroit><a href="../page_connexion.php"> <img src="https://www.educol.net/coloriage-maison-dl28263.jpg" width="40px" alt="" ></a></div>
        <legend><h1>Formulaire d'inscription</h1>
            <table>  
                <tr>
                    <td colspan="2"><input placeholder="email" type="email" name="email" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input id="password" placeholder="password" type="password" name="password" required></button></td>
                </tr>
                <tr>
                    <td colspan="2"><input placeholder="prenom" type="text" name="prenom" required> </td>
                </tr>
                <tr>
                    <td colspan="2"><input placeholder="nom" type="text" name="nom" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input placeholder="age" type="number" min="18" max="110" name="age" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input placeholder="pays" type="text" name="pays" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input id="id1" type="file" accept=".png" name="photo" ></td>
                </tr>
                <tr>
                    <td><button id="inscription" type="button" onclick="Connect()">Se connecter</button></td>
                    <td><button id="inscription" type="submit">S'inscrire</button></td>
                </tr>
            </table>
        </legend>
    </form>
    <script>
        function Accueil(){
            window.location.href = "../page_connexion.php";
        }
        function Connect(){
            window.location.href = "connexion.php";
        }
        function Password() {
            password = document.getElementById("password");
            if (password.type === "password")
                password.type = "text";
            else
                password.type = "password";
        }
    </script>
</body>
</html>