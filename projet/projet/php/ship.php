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

if($tab[$_SESSION("index")]["grade"]=="abonné" && $tab[$_SESSION("index")]["time"]){
    $tab[$_SESSION("index")]["grade"]=="inscrit";
    $tab[$_SESSION("index")]["time"]==0;
}

if($tab[$_SESSION["index"]]["grade"]!="admin" && $tab[$_SESSION["index"]]["grade"]!="abonné" && $tab[$_SESSION["index"]]["grade"]!="inscrit"){
    header("location:page_accueil.php");
}

if((isset($_POST['ship'])) && (!empty($_POST['ship']))){
    $tab[$_SESSION['index']]['ship'] = $_POST['ship'];
    file_put_contents($file_path, json_encode($tab,JSON_PRETTY_PRINT));
    header("Location: page_accueil.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
    <body>
        <div id="divdroit"><a href="page_accueil.php"><img id="home_icon" src="https://www.educol.net/coloriage-maison-dl28263.jpg" width="40px" alt="Home"></a></div>
        <center>
            <table width="75%" id="Mytab">
                <tr>
                    <center>
                        <th colspan="4"> Veuillez choisir un ship </th>
                    </center>
                </tr>
                <tr>
                    <td>
                        <center><img src="https://i.pinimg.com/custom_covers/222x/327988854051492592_1514722546.jpg" alt=""
                                name="Eren" class="normal"></center>
                    </td>
                    <td>
                        <center><img src="https://i.pinimg.com/custom_covers/222x/327988854051492592_1514722546.jpg" alt=""
                                name="Mikasa" class="normal"></center>
                    </td>
                    <td>
                        <center><img src="https://i.pinimg.com/custom_covers/222x/327988854051492592_1514722546.jpg" alt=""
                                name="Mouise" class="normal"></center>
                    </td>
                    <td>
                        <center><img src="https://i.pinimg.com/custom_covers/222x/327988854051492592_1514722546.jpg" alt=""
                                name="" class="normal"></center>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center><img src="" alt="" name="" ></center>
                    </td>
                    <td>
                        <center><img src="" alt="" name="" ></center>
                    </td>
                    <td>
                        <center><img src="" alt="" name="" ></center>
                    </td>
                    <td>
                        <center><img src="" alt="" name="" ></center>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center><img src="" alt="" name="" ></center>
                    </td>
                    <td>
                        <center><img src="" alt="" name="" ></center>
                    </td>
                    <td>
                        <center><img src="" alt="" name="" ></center>
                    </td>
                    <td>
                        <center><img src="" alt="" name="" ></center>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center><img src="" alt="" name="" ></center>
                    </td>
                    <td>
                        <center><img src="" alt="" name="" ></center>
                    </td>
                    <td>
                        <center><img src="" alt="" name="" ></center>
                    </td>
                    <td>
                        <center><img src="" alt="" name="" ></center>
                    </td>
                </tr>
            </table>
            <form action="php/ship.php" method = "POST">
                <input type="hidden" name="ship" id="ship" value="">
                <button type="submit" id="button" name="ship1" value="" onmouseover=""> envoyer</button>
            </form>
    </center>
</html>
        
<script type="text/javascript">
    var name1; var name2; var ship;
    const tab = document.getElementById("Mytab");
    tab.addEventListener("click", function (e) {
    /** @type {HTMLElement} */ const image = e.target; //séléctioner l'image d'une cellule
        const name = image.getAttribute("name");
        console.log(name);
        if (name == null) {
            return;
        }
        if (name1 != null) {
            if (name1 != name) {
                if (name2 != null) {
                    if (name2 != name) {
                        alert("Le ship possède déjà tous ses personnages, veuillez remodifier le ship ou l'enregistrer!")
                    }
                    else {
                        image.parentElement.style.backgroundColor = "white";    //la cellule où se trouve l'image change son background color
                        name2 = null;
                    }
                }
                else {
                    name2 = name;
                    image.parentElement.style.backgroundColor = "lightblue";
                }
            }
            else {
                image.parentElement.style.backgroundColor = "white";
                name1 = null;
            }
        }
        else {
            image.parentElement.style.backgroundColor = "lightblue";
            name1 = name;
        }
    
        if(name1 == name2){
            name2 = null;
        }

    if(name1!=null && name2!=null){
        var x;
        if(name1>name2){  //remettre les personnages dans l'ordre alphabétique pour rendre le php plus simple par la suite
            x=name1;
            name1=name2;
            name2=x;
        }
        ship=name1+"x"+name2;
    };

    if(name1!=null && name2!=null && name1 != name2){
            document.getElementById('ship').value=ship;             //activer/désactiver le bouton en fonction de si on a assez de données
            document.getElementById('button').style.visibility="visible";
        }
        else{
            document.getElementById('ship').value="";
            document.getElementById('button').style.visibility="hidden";
        }
    })

    document.getElementById('ship').value="";
    document.getElementById('button').style.visibility="hidden";
</script>