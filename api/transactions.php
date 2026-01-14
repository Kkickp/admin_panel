<?php
include "db.php";
header("Content-Type: application/json");

// Ambil raw body
$raw = file_get_contents("php://input");

if (!$raw) {
    echo json_encode(["status"=>"error","msg"=>"Empty request body"]);
    exit;
}

$data = json_decode($raw, true);

if (!$data) {
    echo json_encode(["status"=>"error","msg"=>"Invalid JSON","raw"=>$raw]);
    exit;
}

// Validasi minimal
if (!isset($data['nama'], $data['telp'], $data['alamat'], $data['total'], $data['items'])) {
    echo json_encode(["status"=>"error","msg"=>"Incomplete data"]);
    exit;
}

$nama   = $data['nama'];
$telp   = $data['telp'];
$alamat = $data['alamat'];
$total  = $data['total'];
$items  = $data['items'];

$conn->begin_transaction();

try {

    // ========================
    // 1. Cek / Insert Konsumen
    // ========================
    $stmt = $conn->prepare("SELECT id FROM konsumen WHERE telp=? LIMIT 1");
    $stmt->bind_param("s", $telp);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($row = $res->fetch_assoc()) {
        $id_konsumen = $row['id'];
    } else {
        $stmt = $conn->prepare("INSERT INTO konsumen(nama,telp,alamat) VALUES(?,?,?)");
        $stmt->bind_param("sss", $nama, $telp, $alamat);
        $stmt->execute();
        $id_konsumen = $conn->insert_id;
    }

    // ========================
    // 2. Insert Jual
    // ========================
    $stmt = $conn->prepare("INSERT INTO jual(id_konsumen,total) VALUES(?,?)");
    $stmt->bind_param("ii", $id_konsumen, $total);
    $stmt->execute();
    $id_jual = $conn->insert_id;

    // ========================
    // 3. Detail Jual + Update stok
    // ========================
    $stmtDetail = $conn->prepare("INSERT INTO detailjual(id_jual,id_produk,qty,harga) VALUES(?,?,?,?)");
    $stmtStock  = $conn->prepare("UPDATE produk SET stok = stok - ? WHERE id = ?");

    foreach ($items as $i) {
        $id_produk = $i['id_produk'];
        $qty       = $i['qty'];
        $harga     = $i['harga'];

        $stmtDetail->bind_param("iiii", $id_jual, $id_produk, $qty, $harga);
        $stmtDetail->execute();

        $stmtStock->bind_param("ii", $qty, $id_produk);
        $stmtStock->execute();
    }

    $conn->commit();

    echo json_encode([
        "status"=>"success",
        "id_jual"=>$id_jual,
        "id_konsumen"=>$id_konsumen
    ]);

} catch (Exception $e) {

    $conn->rollback();

    echo json_encode([
        "status"=>"error",
        "msg"=>$e->getMessage()
    ]);
}
