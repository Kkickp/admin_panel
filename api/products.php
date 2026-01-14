<?php
include "db.php";

$q = $conn->query("SELECT * FROM produk ORDER BY id DESC");

$data = [];

$baseUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];

while ($row = $q->fetch_assoc()) {

    if (!empty($row['image'])) {
        $row['image'] = $baseUrl . "https://adminpanel-production-2c95.up.railway.app/uploads/" . $row['image'];
    } else {
        $row['image'] = "";
    }

    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);
