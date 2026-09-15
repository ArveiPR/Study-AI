<?php
session_start();
include "../backend/koneksi.php";

$user_id = $_SESSION['user_id'];
$message = $_POST['message'];

$conn->query("INSERT INTO group_messages (user_id,message)
VALUES ('$user_id','$message')");

header("Location: ../group_chat.php");