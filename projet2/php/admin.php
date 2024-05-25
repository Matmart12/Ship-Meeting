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
else{
    echo "Erreur Critique";
    exit();
}

$index = $_SESSION["index"];

if($tab[$index]["grade"]=="abonné" && $tab[$index]["time"]){
    $tab[$index]["grade"]=="inscrit";
    $tab[$index]["time"]==0;
}

if(isset($_POST['admin'])){
    $tab[$index]['grade'] = "admin";
    file_put_contents($file_path, json_encode($tab,JSON_PRETTY_PRINT));
    header("Location: page_accueil.php");
    exit();
}
?>

<head>
<link rel="stylesheet" href="all.css">
</head>
<div id=divdroit><a href="page_accueil.php"> <img src="https://www.educol.net/coloriage-maison-dl28263.jpg" width="40px" alt="" ></a></div>
<div id="table">
<center>
        Il semblerait que vous souhaitez devenir admin sur ce site. <br>
        Veuillez trouver la solution du riddle suivant: <br>
    <br>
        -Je suis partout à la fois. <br>
        -Je suis présent depuis le big bang. <br>
        -Je suis dans le passé, le présent et le futur. <br>
        <br>
    <form action="admin.php" method="POST">
        <textarea placeholder="Qui-suis-je?" name="admin" cols="50"></textarea> <br>
        <button onclick="ajoutadmin()">activer le mode admin</button>
    </form>
</center>
</div>


