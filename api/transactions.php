<?php
include "db.php";

$input = json_decode(file_get_contents("php://input"), true);

$id_konsumen = $input['id_konsumen'];
$total = $input['total'];
$items = $input['items']; // array produk

$conn->query("INSERT INTO jual(id_konsumen,tanggal,total)
VALUES('$id_konsumen', CURDATE(), '$total')");

$id_jual = $conn->insert_id;

foreach($items as $item){
  $conn->query("INSERT INTO detailjual(id_jual,id_produk,qty,harga,subtotal)
  VALUES('$id_jual','{$item['id_produk']}','{$item['qty']}','{$item['harga']}',
  '{$item['qty']*$item['harga']}')");

  // KURANGI STOK
  $conn->query("UPDATE produk SET stok = stok - {$item['qty']} 
  WHERE id = {$item['id_produk']}");
}


echo json_encode(["status"=>"success"]);
