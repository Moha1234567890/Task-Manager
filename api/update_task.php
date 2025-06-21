<?php
require '../config/db.php';

$id = $_POST['id'] ?? 0;
$title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';
$status = $_POST['status'] ?? 'pending';

if (!$id || trim($title) === '') {
    echo json_encode(["status" => "error", "message" => "Invalid data."]);
    exit;
}

$stmt = $pdo->prepare("UPDATE tasks SET title = ?, description = ?, status = ? WHERE id = ?");
$stmt->execute([$title, $description, $status, $id]);

echo json_encode(["status" => "success", "message" => "Task updated."]);
