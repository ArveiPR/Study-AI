<?php
session_start();
include "backend/koneksi.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$sql = "SELECT group_messages.*, users.name 
        FROM group_messages 
        JOIN users ON group_messages.user_id = users.id 
        ORDER BY group_messages.id ASC";

$result = $conn->query($sql);

if(!$result){
    die("Query Error: " . $conn->error);
}
?>

<link rel="stylesheet" href="assets/css/style.css">
<nav class="navbar">
    <div class="logo">🎓Study AI</div>

    <div class="nav-links">
        <a href="home.php">Home</a>
            <a href="dashboard.php">Dashboard</a>
            <a href="private_chat.php">Private Chat</a>
            <a href="logout.php" class="logout">Logout</a>
            <button id="themeToggle" class="theme-btn">🌙</button>
       
    </div>
</nav>
<div class="container">

  <div class="card chat-box">

    <?php if($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="message ai">
                <b><?= htmlspecialchars($row['name']) ?>:</b><br>
                <?= htmlspecialchars($row['message']) ?>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>Belum ada pesan di grup.</p>
    <?php endif; ?>

  </div>

  <form method="POST" action="api/send_group.php" class="chat-input">
      <input name="message" placeholder="Tulis pesan..." required>
      <button class="btn btn-primary">Send</button>
  </form>

</div>
<script src="assets/js/app.js"></script>