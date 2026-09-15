<?php
session_start();
include "../backend/koneksi.php";

if(!isset($_SESSION['user_id'])) exit("Unauthorized");

$conversation_id = $_GET['conversation_id'] ?? 0;

$stmt = $conn->prepare("SELECT sender, message FROM messages WHERE conversation_id=? ORDER BY id ASC");
$stmt->bind_param("i", $conversation_id);
$stmt->execute();
$result = $stmt->get_result();

$data = [];

while($row = $result->fetch_assoc()){
    $data[] = $row;
}

echo json_encode($data);