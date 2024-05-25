<?php
session_start();
$file_path2 = "../data/info_formulaire.json";
$file_path = "../data/send_messages.json";

if (file_exists($file_path2)) {
    $json_data2 = file_get_contents($file_path2);
    $tab2 = json_decode($json_data2, true);
    if (empty($json_data2) || !is_array($tab2)) {
        $tab2 = array();
    }
} else {
    $tab2 = array();
}
if($tab[$_SESSION["index"]]["grade"]=="abonné" && $tab[$_SESSION["index"]]["time"]){
    $tab[$_SESSION["index"]]["grade"]=="inscrit";
    $tab[$_SESSION["index"]]["time"]==0;
}
if($tab[$_SESSION["index"]]["grade"]!="admin" && $tab[$_SESSION["index"]]["grade"]!="abonné" && $tab[$_SESSION["index"]]["grade"]!="inscrit"){
    header("location:page_accueil.php");
}
// Vérifiez si le fichier existe et chargez les données
if (file_exists($file_path)) {
    $json_data = file_get_contents($file_path);
    $tab = json_decode($json_data, true);
    if (empty($json_data) || !is_array($tab)) {
        $tab = array();
    }
} else {
    $tab = array();
}

$email = $tab2[$_SESSION['index']]['email'];

// Initialisez la variable de messages de session si elle n'existe pas
if (!isset($_SESSION['send_messages'])) {
    $_SESSION['send_messages'] = array();
}

// Ajoutez le nouveau message à la session si reçu
if (isset($_POST['message'])) {
    $_SESSION['send_messages'][] = $_POST['message'];
}

// Rechercher l'entrée de l'utilisateur actuel dans le tableau
$found = false;
foreach ($tab as &$entry) {
    if ($entry['email'] == $email) {
        // Ajoutez les nouveaux messages aux messages existants
        $entry['messages'] = array_merge($entry['messages'], $_SESSION['send_messages']);
        $found = true;
        break;
    }
}

// Si l'utilisateur n'existe pas encore dans le fichier, ajouter une nouvelle entrée
if (!$found) {
    $data_array = array(
        'email' => $email,
        'index' => $_SESSION['other_index'],
        'messages' => $_SESSION['send_messages'],
    );
    $tab[] = $data_array;
}

// Enregistrer les données mises à jour dans le fichier JSON
file_put_contents($file_path, json_encode($tab, JSON_PRETTY_PRINT));

// Réinitialisez les messages de la session après les avoir enregistrés
$_SESSION['send_messages'] = array();