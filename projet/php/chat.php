<?php
session_start();
$file_path2 = "../data/info_formulaire.json";
$file_path = "../data/send_messages.json";

// Vérifiez si le fichier existe et chargez les données
if (file_exists($file_path2)) {
    $json_data2 = file_get_contents($file_path2);
    $tab2 = json_decode($json_data2, true);
    if (empty($json_data2) || !is_array($tab2)) {
        $tab2 = array();
    }
} else {
    $tab2 = array();
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
$other_email = $_SESSION['other_email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/chat.css">
    <title>Chat</title>
</head>
<body>
    <div id=divdroit><a href="page_accueil.php"> <img id="home_icon" src="https://www.educol.net/coloriage-maison-dl28263.jpg" width="40px" alt="" ></a></div>
    <div id="chat-container">
        <div id="chat-messages">
            <?php
            foreach ($tab as $entry) {
                if (($entry['email'] == $email && $entry['other_email'] == $other_email) ||
                    ($entry['email'] == $other_email && $entry['other_email'] == $email)) {
                    foreach ($entry['messages'] as $message) {
                        if ($entry['email'] == $email) {
                            echo "<div class='message sent'><div class='message-content'>$message</div></div>";
                        } else {
                            echo "<div class='message received'><div class='message-content'>$message</div></div>";
                        }
                    }
                }
            }
            ?>
        </div>
        <form id="chat-form">
            <input type="text" id="message" placeholder="Type your message here...">
            <button type="submit">Send</button>
        </form>
    </div>
    <script src="../js/chat.js"></script>
</body>
</html>
