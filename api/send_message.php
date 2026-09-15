<?php
session_start();
include "../backend/koneksi.php";

if(!isset($_SESSION['user_id'])) exit("Unauthorized");

$user_id = $_SESSION['user_id'];
$conversation_id = $_POST['conversation_id'];
$message = $_POST['message'];

if(trim($message) == '') exit();

// simpan user message
$stmt = $conn->prepare("INSERT INTO messages (conversation_id, sender, message) VALUES (?, 'user', ?)");
$stmt->bind_param("is", $conversation_id, $message);
$stmt->execute();

// =====================
// SIMULASI AI RESPONSE
// =====================
$ai_response = "Ini adalah jawaban AI untuk: " . $message;

// simpan ai message
$stmt = $conn->prepare("INSERT INTO messages (conversation_id, sender, message) VALUES (?, 'ai', ?)");
$stmt->bind_param("is", $conversation_id, $ai_response);
$stmt->execute();

echo $ai_response;