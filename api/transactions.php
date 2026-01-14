<?php
include "db.php";

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if(!$data){
    echo json_encode(["status"=>"error","msg"=>"Invalid JSON"]);
    exit;
}

$nama   = $data['nama'];
$telp   = $data['telp'];
$alamat = $data['alamat'];
$total  = $data['total'];
$items  = $data['items'];

$conn->begin_transaction();

try {

    // 1. Simpan / cari konsumen
    $cek = $conn->query("SELECT id FROM konsumen WHERE telp='$telp' LIMIT 1");

    if($cek->num_rows > 0){
        $row = $cek->fetch_assoc();
        $id_konsumen = $row['id'];
    } else {
        $conn->query("INSERT INTO konsumen(nama,telp,alamat)
                      VALUES('$nama','$telp','$alamat')");
        $id_konsumen = $conn->insert_id;
    }

    // 2. Simpan jual
    $conn->query("INSERT INTO jual(id_konsumen,total)
                  VALUES('$id_konsumen','$total')");
    $id_jual = $conn->insert_id;

    // 3. Simpan detailjual
    foreach($items as $i){
        $id_produk = $i['id_produk'];
        $qty       = $i['qty'];
        $harga     = $i['harga'];

        $conn->query("INSERT INTO detailjual(id_jual,id_produk,qty,harga)
                      VALUES('$id_jual','$id_produk','$qty','$harga')");

        // kurangi stok produk
        $conn->query("UPDATE produk SET stok = stok - $qty WHERE id=$id_produk");
    }

    $conn->commit();

    echo json_encode(["status"=>"success"]);

}catch(Exception $e){
    $conn->rollback();
    echo json_encode(["status"=>"error","msg"=>$e->getMessage()]);
}
