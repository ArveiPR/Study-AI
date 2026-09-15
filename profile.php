<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
?>
<div class="container">
  <div class="card" style="max-width:500px;margin:auto;">
    <h2>Profile</h2>
    <p><strong>Name:</strong> <?= $user['name'] ?></p>
    <p><strong>Email:</strong> <?= $user['email'] ?></p>
    <p><strong>Joined:</strong> <?= $user['created_at'] ?></p>
  </div>
</div>