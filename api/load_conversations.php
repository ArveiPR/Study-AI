<?php
session_start();
include "../backend/koneksi.php";

if(!isset($_SESSION['user_id'])) exit("Unauthorized");

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT id, title FROM conversations WHERE user_id=? ORDER BY id DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$data = [];

while($row = $result->fetch_assoc()){
    $data[] = $row;
}

echo json_encode($data);