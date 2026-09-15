<?php
session_start();
include "backend/koneksi.php";


if(isset($_POST['login'])){

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows > 0){

        $stmt->bind_result($id,$hashedPassword);
        $stmt->fetch();

        if(password_verify($password,$hashedPassword)){
            $_SESSION['user_id'] = $id;
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Password salah!";
        }

    } else {
        $error = "Email tidak ditemukan!";
    }
}
?>

<link rel="stylesheet" href="assets/css/style.css">
<nav class="navbar">
  <button id="themeToggle" class="theme-btn">🌙</button>
  <div class="logo">🎓 StudyAI</div>
  <div class="nav-links">
    <a href="index.php">Home</a>
    <a href="register.php" class="btn btn-primary">Get Started</a>
  </div>
</nav>
<div class="auth-page">
  <div class="auth-card">
    <h2>Login</h2>

    <?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>

    <form method="POST">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" name="login">Login</button>
    </form>

    <div class="auth-footer">
      Belum punya akun? <a href="register.php">Register</a>
    </div>
  </div>
</div>
<script src="assets/js/app.js"></script>