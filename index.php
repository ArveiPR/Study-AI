<?php
session_start();

?>
<link rel="stylesheet" href="assets/css/style.css">

<nav class="navbar">
  <button id="themeToggle" class="theme-btn">🌙</button>
  <div class="logo">🎓 StudyAI</div>
  <div class="nav-links">
    <a href="index.php">Home</a>
    <a href="login.php">Login</a>
    <a href="register.php" class="btn btn-primary">Get Started</a>
    <a href="register.php"> chat </a>
  </div>
</nav>

<div class="container hero">

  <div class="hero-text">
    <h1>AI Study & Discussion Chatbot</h1>
    <p>Learn, discuss, and grow together with AI. Get instant help and collaborate with peers.</p>
    <br>
    <a href="register.php" class="btn btn-primary">Start Learning</a>
    <a href="register.php" class="btn">Join Group Chat</a>
  </div>

  <div class="card">
    <p><b>AI:</b> Let me help you understand photosynthesis 🌱</p>
    <p class="ai message">Plants create food using sunlight...</p>
  </div>

</div>
<script src="assets/js/app.js"></script>