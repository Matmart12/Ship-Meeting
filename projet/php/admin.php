<?php
session_start();
if(file_exists($file_path)){
    $json_data = file_get_contents($file_path);
    $tab = json_decode($json_data, true);
    if(empty($json_data) || !is_array($tab)){
        echo "erreur crittique";
    }
}

if($tab[$_SESSION("index")]["grade"]=="abonné" && $tab[$_SESSION("index")]["time"]){
    $tab[$_SESSION("index")]["grade"]=="inscrit";
    $tab[$_SESSION("index")]["time"]==0;
}
?>

<head>
<link rel="stylesheet" href="all.css">
</head>
<div id=divdroit><a href="accueuil.php"> <img src="https://www.educol.net/coloriage-maison-dl28263.jpg" width="40px" alt="" ></a></div>
<form action="" method=post>

<div id="table">
<center>
        il semblerait que vous souhaitez devenir admin sur ce site. <br>
        Veuillez donc trouver la solution du riddle suivant: <br>
    <br>
        -Je suis partout à la fois. <br>
        -Je suis présent depuis le big bang. <br>
        -Je suis dans le passé, le présent et le futur. <br>
        <br>
    <textarea name="admin?" cols="50">
Qui-suis-je?
    </textarea> <br>
    <button onclick="ajoutadmin()">activer le mode admin</button>
</center>
</div>
</form>
<script type="text/javascript">
function ajoutadmin(){
document.location.href="ad_admin.php";
}

