<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="../css/chat.css">
</head>
<body>
    <div id="divdroit"><a href="page_accueil.php"><img id="home_icon" src="https://www.educol.net/coloriage-maison-dl28263.jpg" width="40px" alt="Home"></a></div>
    <div class="chat-container">
        <div class="chat-header">
            Chat Room
        </div>
        <div class="chat-messages" id="chat-messages">
            <!-- Les messages seront ajoutés ici dynamiquement -->
        </div>
        <div class="chat-input">
            <form id="chat-form" method="POST" action="chat.php">
                <input type="text" name="message" id="message" placeholder="Type a message..." required>
                <button type="submit">Send</button>
            </form>
        </div>
    </div>
    <script src="../java/chat.js"></script>
</body>
</html>
