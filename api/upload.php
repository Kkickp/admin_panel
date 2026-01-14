<?php
include "db.php";

$name  = $_POST['name'] ?? '';
$desc  = $_POST['description'] ?? '';
$price = $_POST['price'] ?? 0;
$cat   = $_POST['category'] ?? '';
$stock = $_POST['stock'] ?? 0;

$imageName = "";

if (!empty($_FILES['image']['name'])) {
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $imageName = time() . "_" . rand(1000,9999) . "." . $ext;
    move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/" . $imageName);
}

$stmt = $conn->prepare("
INSERT INTO produk (name, description, price, image, category, stock)
VALUES (?, ?, ?, ?, ?, ?)
");

$stmt->bind_param("ssissi", $name, $desc, $price, $imageName, $cat, $stock);
$stmt->execute();

echo json_encode(["status" => "success"]);
