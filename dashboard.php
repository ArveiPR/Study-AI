<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'] ?? "User";
?>

<h1>Selamat datang, <?php echo htmlspecialchars($username); ?> 👋</h1>
<link rel="stylesheet" href="assets/css/style.css">
<nav class="navbar">
  <div class="logo">🎓 StudyAI</div>
  <div class="nav-links">
    <a href="home.php">Home</a>
    <button id="themeToggle" class="theme-btn">🌙</button>    
  </div>
</nav>
<div class="container">
  <h1>Dashboard</h1>
  <div class="grid">

    <div class="card">
      <h3>🤖 Private Chat</h3>
      <p>Ask AI anything instantly.</p>
      <a href="private_chat.php" class="btn btn-primary">Open</a>
    </div>

    <div class="card">
      <h3>👥 Group Chat</h3>
      <p>Collaborate with others.</p>
      <a href="group_chat.php" class="btn btn-primary">Join</a>
    </div>

    <div class="card">
      <h3>🧠 Smart Quiz</h3>
      <p>Generate AI quizzes.</p>
      <a href="#" class="btn btn-primary">Generate</a>
    </div>

  </div>
</div>
<script src="assets/js/app.js"></script>