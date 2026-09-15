<?php
session_start();
include "../backend/koneksi.php";

if(!isset($_SESSION['user_id'])){
    exit("Unauthorized");
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("INSERT INTO conversations (user_id, title) VALUES (?, 'New Chat')");
$stmt->bind_param("i", $user_id);
$stmt->execute();

echo $conn->insert_id; // kirim conversation id