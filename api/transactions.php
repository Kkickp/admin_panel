<?php
include "db.php";

$input = json_decode(file_get_contents("php://input"), true);

$total = $input['total'] ?? 0;

$stmt = $conn->prepare("INSERT INTO transactions (total, created_at) VALUES (?, NOW())");
$stmt->bind_param("i", $total);
$stmt->execute();

echo json_encode(["status" => "ok"]);
