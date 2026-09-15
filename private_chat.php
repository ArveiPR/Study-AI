<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Private Chat - Study AI</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<nav class="navbar">
  <button id="themeToggle" class="theme-btn">🌙</button>
    <div class="logo">🎓Study AI</div>
    <div class="nav-links">
        <a href="home.php">Home</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="group_chat.php">Group Chat</a>
        <a href="logout.php" class="logout">Logout</a>
        
    </div>
</nav>

<div class="chat-page">
    <div class="chat-container">

        <div id="chatBox" class="chat-messages">

            <!-- ✅ Typing Indicator TARUH DI SINI -->
            <div id="typing-indicator" class="typing" style="display:none;">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>

        </div>

        <div class="chat-input-area">
            <input id="message" placeholder="Ask AI...">
            <button onclick="sendMessage()">Send</button>
        </div>

    </div>
</div>

<script src="assets/js/app.js"></script>
</body>
</html>
