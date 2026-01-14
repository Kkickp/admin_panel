<?php
include "db.php";

$q = $conn->query("SELECT * FROM produk");

$data = [];

while ($row = $q->fetch_assoc()) {

    $data[] = [
        "id" => $row["id"],
        "name" => $row["nama"],
        "description" => $row["deskripsi"],
        "price" => (int)$row["harga"],
        "image" => $row["image"] 
            ? "https://adminpanel-production-2c95.up.railway.app/uploads/".$row["image"]
            : ""
    ];
}

echo json_encode($data);
