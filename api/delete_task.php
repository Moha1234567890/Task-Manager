<?php
require '../config/db.php';

$id = $_POST['id'] ?? 0;

$stmt = $pdo->prepare("DELETE FROM tasks WHERE id = ?");
$stmt->execute([$id]);

echo json_encode(["status" => "success", "message" => "Task deleted."]);
