<?php
require '../config/db.php';

///getting id
$id = $_POST['id'] ?? 0;

//deleting data after getting id
$stmt = $pdo->prepare("DELETE FROM tasks WHERE id = ?");
$stmt->execute([$id]);

echo json_encode(["status" => "success", "message" => "Task deleted."]);
