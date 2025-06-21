<?php
require '../config/db.php';


//getting data from post request
$title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';

if (trim($title) === '' OR strlen($title) > 50) {
    echo json_encode(["status" => "error", "message" => "Title is required and it should be less than 50 characters."]);
    exit;
}

//inserting data into db
$stmt = $pdo->prepare("INSERT INTO tasks (title, description) VALUES (?, ?)");
$stmt->execute([$title, $description]);

echo json_encode(["status" => "success", "message" => "Task added."]);
