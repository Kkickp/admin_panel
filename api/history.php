<?php
include "db.php";

$q = $conn->query("SELECT * FROM jual ORDER BY id DESC");

$data = [];
while($r = $q->fetch_assoc()){
  $data[] = $r;
}

echo json_encode($data);
