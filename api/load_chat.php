<?php
session_start();
include "../backend/koneksi.php";

if(!isset($_SESSION['user_id'])){
    exit("Unauthorized");
}

$user_id = $_SESSION['user_id'];

$result = $conn->prepare("SELECT sender, message FROM private_chats WHERE user_id=? ORDER BY id ASC");
$result->bind_param("i", $user_id);
$result->execute();
$data = $result->get_result();

$messages = [];

while($row = $data->fetch_assoc()){
    $messages[] = $row;
}

echo json_encode($messages);