<?php
include "db.php";

$q = $conn->query("SELECT * FROM produk");

$data = [];

while($row = $q->fetch_assoc()){
  if($row['image']){
    $row['image'] = "https://YOUR-RAILWAY-DOMAIN/uploads/".$row['image'];
  }
  $data[] = $row;
}

echo json_encode($data);
