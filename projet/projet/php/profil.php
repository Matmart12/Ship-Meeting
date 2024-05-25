

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


if($tab[$_SESSION["index"]]["grade"]=="abonné" && $tab[$_SESSION["index"]]["time"]){
    $tab[$_SESSION["index"]]["grade"]=="inscrit";
    $tab[$_SESSION["index"]]["time"]==0;
}

if($tab[$_SESSION["index"]]["grade"]!="admin" && $tab[$_SESSION["index"]]["grade"]!="abonné" && $tab[$_SESSION["index"]]["grade"]!="inscrit"){
    header("location:page_accueil.php");
}

if(isset($_POST["index"])){
$i=$_POST["index"];
if( $tab[$_SESSION["index"]]["grade"]!="abonné" && $tab[$_SESSION["index"]]["grade"]!="inscrit"){
    if($_SESSION["index"]!=$i){
        header("Location: page_accueil.php");
    }
}
}
else{
    $i=$_SESSION["index"];
}
$Um=$tab[$_SESSION["index"]]["email"];
$Ug=$tab[$_SESSION["index"]]["grade"];
$Mail=$tab[$i]["email"];
$Pseudo=$tab[$i]["pseudo"];
$n=$tab[$i]["nom"];
$p=$tab[$i]["prenom"];
$D=$tab[$i]["description"];
$Age=$tab[$i]["age"];
$S=$tab[$i]["genre"];
$Mdp=$tab[$i]["password"];
$vues=$tab[$i]["vues"];
$A=$tab[$i]["pays"];
$sh=$tab[$i]["ship"];
$x=strlen($Mdp);
for($i=0; $i<$x; $i++){
    if($i==0){
        $MDP[0]=$Mdp[0];
    }
    else{
        if($i+1!=$x){
            $MDP[$i]='*';
        }
        else{
            $MDP[$i]=$Mdp[$i];
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="all.css">
</head>



    <div id=divdroit><a href="compte.php"><img src="https://e7.pngegg.com/pngimages/313/130/png-clipart-colored-pencil-black-and-white-drawing-sharpener-s-angle-pencil.png" alt="" width=70px></a>
    <a href="page_accueil.php"> <img src="https://www.educol.net/coloriage-maison-dl28263.jpg" width="40px" alt="" ></a></div>
    <div class="divtab">
        <table width="90%" height="90%" align="center" margin-top="auto">
            <tr colspan="3">
                <center><h1>Profil</h1></center>
            </tr>
            <tr height="200">
                <td rowspan="6" bgcolor="black">
                    <vertical-align>
                        <center>
                            <img src="https://i.pinimg.com/custom_covers/222x/327988854051492592_1514722546.jpg" alt="" class="profil"> <br>
                            <h2><FONT color="white"><?php echo  "pseudo: $Pseudo"?></FONT></h2>
                        </center>
                    </vertical-align>
                </td>
                <td colspan="2" rowspan="2">
                    <center>description: </center> <br>
                    <center><?php echo "$D" ?></center>
                </td>
            </tr>
            <tr></tr>
            <tr height="110">
                <td> <?php if($Um==$Mail|| $Ug=="admin")echo "Prénom: $p"?></td>                           <!-- seulement pour le propritétaire du compte--> 
                <td> <?php if($Um==$Mail|| $Ug=="admin")echo "Nom: $n"?></td>                              <!-- seulement pour le propritétaire du compte--> 
                
            </tr>
            <tr>
                <td> <?php if($Um==$Mail|| $Ug=="admin")echo "mot de passe: $MDP" ?></td>    <!-- seulement pour le propritétaire du compte--> 
                <td> <?php if($Um==$Mail|| $Ug=="admin")echo "Mail: $Mail" ?></td>            <!-- seulement pour le propritétaire du compte--> 
            </tr>
            <tr height="110">
                <td> <?php if($Um==$Mail|| $Ug=="admin")echo "sexe: $S" ?></td>
                <td> <?php if($Um==$Mail|| $Ug=="admin")echo "age: $Age" ?></td>                        <!-- seulement pour le propritétaire du compte--> 
            </tr>
            <tr height="110">
                <td> <?php if($Um==$Mail|| $Ug=="admin")echo "adresse (ville): $A" ?></td>                  <!-- seulement pour le propritétaire du compte-->
                <td> <?php if($Um==$Mail|| $Ug=="admin")echo "ship: $sh" ?></td> 
            </tr>
        </table>
    </div>
        <div id="divdroit">
        <?php $Vues+=1; 
        echo "$Vues" ?>
        <img src="https://previews.123rf.com/images/yupiramos/yupiramos1702/yupiramos170203297/70844218-signe-humain-oeil-isol%C3%A9-ic%C3%B4ne-dessin-vectoriel.jpg" alt=""width="40px"> 
        </div>

</html>
