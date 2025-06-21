<?php
require '../config/db.php';

$status = $_GET['status'] ?? 'all';

$sql = "SELECT * FROM tasks";
$params = [];

if (in_array($status, ['pending', 'completed'])) {
    $sql .= " WHERE status = ?";
    $params[] = $status;
}

$sql .= " ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);

$tasks = $stmt->fetchAll();
echo json_encode($tasks);
