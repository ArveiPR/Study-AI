<?php
session_start();
include "backend/koneksi.php";

if(isset($_POST['register'])){

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // cek email sudah ada atau belum
    $check = $conn->prepare("SELECT id FROM users WHERE email=?");
    $check->bind_param("s",$email);
    $check->execute();
    $check->store_result();

    if($check->num_rows > 0){
        $error = "Email sudah terdaftar!";
    } else {

        $stmt = $conn->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
        $stmt->bind_param("sss",$name,$email,$password);

        if($stmt->execute()){
            header("Location: login.php");
            exit();
        } else {
            $error = "Register gagal!";
        }
    }
}
?>

<link rel="stylesheet" href="assets/css/style.css">
<nav class="navbar">
  <button id="themeToggle" class="theme-btn">🌙</button>
  <div class="logo">🎓 StudyAI</div>
  <div class="nav-links">
    <a href="index.php">Home</a>
    <a href="login.php">Login</a>
  </div>
</nav>
<div class="auth-page">
  <div class="auth-card">
    <h2>Create Account</h2>

    <?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>

    <form method="POST">
      <input name="name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" name="register">Register</button>
    </form>

    <div class="auth-footer">
      Sudah punya akun? <a href="login.php">Login</a>
    </div>
  </div>
</div>
<script src="assets/js/app.js"></script>