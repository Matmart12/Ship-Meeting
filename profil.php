<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="all.css">
</head>

</style>
<!--
       
    session_start();
    $Um=$_SESSION("Mail");
    $Up=$_SESSION("Prénom");
    $n=$_POST("Nom");                           |
    $p=$_POST("Prénom");                        |
    $D=$_POST("Description");                   |ou utiliser ajax
    $Mail=$_POST("Mail");                       |
    $Age=$_POST("Age");                         |
    $S=$_POST("sexe");                          |
    $A=$_POST("Adresse");                       |
    $Mdp=$_POST("Mdp");                         |
    $x=strlen($Mdp);
    $MDP;
    for($i=0; $i<$x; $i++){
        if($i===0){
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
    -->
<html>
    <div class="divtab">
        <table width="100%" height="80%" align="center" margin-top="auto">
            <tr colspan="3">
                <center><h1>Profil</h1></center>
            </tr>
            <tr height="200">
                <td rowspan="6" bgcolor="black">
                    <vertical-align>
                        <center>
                            <img src="https://i.pinimg.com/custom_covers/222x/327988854051492592_1514722546.jpg" alt="" class="profil"> <br>
                            <h2><FONT color="white">pseudo: Matmart12</FONT></h2>
                        </center>
                    </vertical-align>
                </td>
                <td colspan="2" rowspan="2">
                    <center>description: </center> <br>
                    <center>description random</center>
                </td>
            </tr>
            <tr></tr>
            <tr height="100">
                <td> Prénom: prénom random </td>                           <!-- seulement pour le propritétaire du compte--> 
                <td> Nom: nom random</td>                              <!-- seulement pour le propritétaire du compte--> 
                
            </tr>
            <tr>
                <td> mot de passe: JeMetUnTrucRandom</td>    <!-- seulement pour le propritétaire du compte--> 
                <td> Mail: MonMail@gmail.com</td>            <!-- seulement pour le propritétaire du compte--> 
            </tr>
            <tr height="100">
                <td> sexe: male</td>
                <td> age: 19 ans</td>                        <!-- seulement pour le propritétaire du compte--> 
            </tr>
            <tr height="100">
                <td> adresse (ville): ville random</td>                  <!-- seulement pour le propritétaire du compte-->
            </tr>
        </table>
    </div>
        <div id="divvue">
            <img src="https://previews.123rf.com/images/yupiramos/yupiramos1702/yupiramos170203297/70844218-signe-humain-oeil-isol%C3%A9-ic%C3%B4ne-dessin-vectoriel.jpg" alt=""width="30px">:
        </div>

</html>
