<?php
session_start();
include "../backend/koneksi.php";
include "openai.php";

if(!isset($_SESSION['user_id'])){
    die("Session not found");
}

$user_id = $_SESSION['user_id'];
$message = $_POST['message'];

$response = askAI($message);

$stmt = $conn->prepare("INSERT INTO private_messages (user_id, message, response) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $user_id, $message, $response);
$stmt->execute();
$stmt->close();

echo $response;