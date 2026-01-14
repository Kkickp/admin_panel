<?php
include "../config/db.php";
include "../templates/header.php";

$id=$_GET['id'];
$conn->query("DELETE FROM produk WHERE id=$id");
header("Location: produk.php");
?>