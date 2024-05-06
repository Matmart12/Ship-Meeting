<!DOCTYPE html>
<style>
</style>
<html>

<body>
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
        <form action="test.php" method =post>
            <input type="hidden" name="ship" id="ship" value="">        <!--form pour envoyer le ship-->
            <button type="submit" id="button" name="ship1" value="" onmouseover=""> envoyer</button>
    </form>
</center>
        
    <script type="text/javascript">
        var nom1; var nom2; var ship;
        const tab = document.getElementById("Mytab");
        tab.addEventListener("click", function (e) {
        /** @type {HTMLElement} */ const image = e.target; //séléctioner l'image d'une cellule
            const nom = image.getAttribute("name");
            console.log(nom);
            if (nom == null) {
                return;
            }
            if (nom1 != null) {
                if (nom1 != nom) {
                    if (nom2 != null) {
                        if (nom2 != nom) {
                            alert("Le ship possède déjà tous ses personnages, veuillez remodifier le ship ou l'enregistrer!")
                        }
                        else {
                            image.parentElement.style.backgroundColor = "white";    //la cellule où se trouve l'image change son background color
                            nom2 = null;
                        }
                    }
                    else {
                        nom2 = nom;
                        image.parentElement.style.backgroundColor = "lightblue";
                    }
                }
                else {
                    image.parentElement.style.backgroundColor = "white";
                    nom1 = null;
                }
            }
            else {
                image.parentElement.style.backgroundColor = "lightblue";
                nom1 = nom;
            }
        
            if(nom1 == nom2){
                nom2 = null;
            }

        if(nom1!=null && nom2!=null){
            var x;
            if(nom1>nom2){  //remettre les personnages dans l'ordre alphabétique pour rendre le php plus simple par la suite
                x=nom1;
                nom1=nom2;
                nom2=x;
            }
            ship=nom1+"x"+nom2;
        };

        if(nom1!=null && nom2!=null && nom1 != nom2){
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

</html>