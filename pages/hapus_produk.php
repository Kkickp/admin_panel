<?php
include "../config/db.php";
$id=$_GET['id'];
$conn->query("DELETE FROM produk WHERE id=$id");
header("Location: produk.php");
?>