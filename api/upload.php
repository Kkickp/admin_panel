<?php
include "db.php";

$name = $_POST['name'];
$price = $_POST['price'];
$desc = $_POST['description'];
$cat = $_POST['category'];
$stock = $_POST['stock'];

$file = $_FILES['image'];
$filename = time()."_".$file['name'];
move_uploaded_file($file['tmp_name'], "../uploads/".$filename);

$conn->query("INSERT INTO produk (name,description,price,image,category,stock)
VALUES ('$name','$desc','$price','$filename','$cat','$stock')");

echo json_encode(["status"=>"ok"]);
