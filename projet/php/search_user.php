<?php
session_start();

$query = isset($_POST['query']) ? $_POST['query'] : '';

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

$ship = $tab[$_SESSION['index']]['ship'];
$tab2 = [];

foreach($tab as $key => $compte){
    if(($compte['ship'] == $ship && $compte['banni'] == 0) && ($key != $_SESSION['index']) && (stripos($compte['pseudo'], $query) !== false)){
        $tab2[] = $compte;
    }
}

if(!empty($tab2)){
    foreach($tab2 as $key => $compte){
        echo "<tr onclick='redirect(\"$key\")'>";
        echo "<td class='border'>" . "<img class='img' src='../icones/0.png'>" . "</td>";
        echo "<td class='text'>" . $compte['pseudo'] . "</td>";
        echo "<td class='text'>" . $compte['genre'] . "</td>";
        echo "<td class='text'>" . $compte['age'] . " ans</td>";
        echo "<td class='text'>" . $compte['pays'] . "</td>";
        echo "<td class='text'>" . $compte['grade'] . "</td>";
        echo "<td class='text'>" . $compte['time'] . "</td>";
        echo "<td class='text'>" . $compte['ship'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td class='text'>Aucun utilisateur trouvé avec ce pseudo</td></tr>";
}
?>
