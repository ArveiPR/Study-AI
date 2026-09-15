<?php session_start(); ?>
<link rel="stylesheet" href="assets/css/style.css">

<nav class="navbar">
    <div class="logo">Study AI</div>

    <div class="nav-links">
        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="dashboard.php">Dashboard</a>
            <a href="private_chat.php">Private Chat</a>
            <a href="group_chat.php">Group Chat</a>
            <a href="profile.php">Profile</a>
            <a href="logout.php" class="logout">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="register.php" class="register-btn">Register</a>
        <?php endif; ?>
    </div>
</nav>