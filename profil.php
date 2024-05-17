<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="all.css">
</head>

</style>
<!--
       <php
    session_start();
    $Um=$_SESSION("Mail");
    $Pseudo=$_POST("Pseudo")
    $n=$_POST("Nom");                           |
    $p=$_POST("Prénom");                        |
    $D=$_POST("Description");                   |ou utiliser ajax
    $Mail=$_POST("Mail");                       |
    $Age=$_POST("Age");                         |
    $S=$_POST("sexe");                          |
    $A=$_POST("Adresse");                       |
    $Mdp=$_POST("Mdp");                         |
    $x=strlen($Mdp);
    $Vues=£_POST("vues")
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
    
    <?php $x="lol"; 
    $Um="mdr@gmail.com";
    $Mail="bruh.com";
    $D="Je suis un humain tkt"?>
<html>

    <div id=divdroit><a href="accueuil.php"> <img src="https://www.educol.net/coloriage-maison-dl28263.jpg" width="40px" alt="" ></a></div>
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
                <td> <?php if($Um==$Mail)echo "Prénom: $p" ?></td>                           <!-- seulement pour le propritétaire du compte--> 
                <td> <?php if($Um==$Mail)echo "Nom: $n"?></td>                              <!-- seulement pour le propritétaire du compte--> 
                
            </tr>
            <tr>
                <td> <?php if($Um==$Mail)echo "mot de passe: $MDP" ?></td>    <!-- seulement pour le propritétaire du compte--> 
                <td> <?php if($Um==$Mail)echo "Mail: $Mail" ?></td>            <!-- seulement pour le propritétaire du compte--> 
            </tr>
            <tr height="110">
                <td> <?php if($Um==$Mail)echo "sexe: $S" ?></td>
                <td> <?php if($Um==$Mail)echo "age: $Age" ?></td>                        <!-- seulement pour le propritétaire du compte--> 
            </tr>
            <tr height="110">
                <td> <?php if($Um==$Mail)echo "adresse (ville): $A" ?></td>                  <!-- seulement pour le propritétaire du compte-->
            </tr>
        </table>
    </div>
        <div id="divdroit">
        <?php $Vues+=1; 
        echo "$Vues" ?>
        <img src="https://previews.123rf.com/images/yupiramos/yupiramos1702/yupiramos170203297/70844218-signe-humain-oeil-isol%C3%A9-ic%C3%B4ne-dessin-vectoriel.jpg" alt=""width="40px"> 
        </div>

</html>
