<?php
require '../config/db.php';


///getting updated data from form
$id = $_POST['id'] ?? 0;
$title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';
$status = $_POST['status'] ?? 'pending';

if (!$id || trim($title) === '') {
    echo json_encode(["status" => "error", "message" => "Invalid data."]);
    exit;
}


//updating data and sending it to jq ajax
$stmt = $pdo->prepare("UPDATE tasks SET title = ?, description = ?, status = ? WHERE id = ?");
$stmt->execute([$title, $description, $status, $id]);

echo json_encode(["status" => "success", "message" => "Task updated."]);
