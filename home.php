<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home - Study AI</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<nav class="navbar">
    <div class="logo">🎓Study AI</div>

    <div class="nav-links">
        <a href="home.php">Home</a>

        <?php if(isset($_SESSION['user_id'])): ?>
            
            <a href="dashboard.php">Dashboard</a>
            <a href="private_chat.php">Private Chat</a>
            <a href="group_chat.php">Group Chat</a>
            <a href="logout.php" class="logout">Logout</a>
            <button id="themeToggle" class="theme-btn">🌙</button>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="register.php" class="register-btn">Register</a>
            
        <?php endif; ?>
    </div>
</nav>

<div class="container hero">

  <div class="hero-text">
    <h1>AI Study & Discussion Chatbot</h1>
    <p>Learn, discuss, and grow together with AI. Get instant help and collaborate with peers.</p>
    <br>
    <a href="private_chat.php" class="btn btn-primary">Start Learning</a>
    <a href="group_chat.php" class="btn">Join Group Chat</a>
  </div>

  <div class="card">
    <p><b>AI:</b> Let me help you understand photosynthesis 🌱</p>
    <p class="ai message">Plants create food using sunlight...</p>
  </div>

</div>
<script src="assets/js/app.js"></script>
</body>
</html>