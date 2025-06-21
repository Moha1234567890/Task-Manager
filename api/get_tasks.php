<?php
require '../config/db.php';


//getting status with get
$status = $_GET['status'] ?? 'all';


//selecting data from tasks
$sql = "SELECT * FROM tasks";
$params = [];



///getting data based on status
if (in_array($status, ['pending', 'completed'])) {
    $sql .= " WHERE status = ?";
    $params[] = $status;
}

//fetching data and sending it to fetch jq ajax
$sql .= " ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);

$tasks = $stmt->fetchAll();
echo json_encode($tasks);
