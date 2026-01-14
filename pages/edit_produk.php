<?php include "../config/db.php"; ?>
<?php include "../templates/header.php"; ?>
<?php
ob_start();
include "../config/db.php";

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan");
}

$id = intval($_GET['id']);

/* =========================
   PROSES UPDATE
========================= */
if (isset($_POST['update'])) {

    $nama     = $_POST['nama'];
    $harga    = $_POST['harga'];
    $stok     = $_POST['stok'];
    $kategori = $_POST['kategori'];

    // Upload gambar jika ada
    if (!empty($_FILES['image']['name'])) {
        $img = time() . "_" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/$img");

        $conn->query("UPDATE produk SET image='$img' WHERE id=$id");
    }

    // Update data produk
    $conn->query("
        UPDATE produk SET 
            nama='$nama',
            harga='$harga',
            stok='$stok',
            kategori='$kategori'
        WHERE id=$id
    ");

    header("Location: produk.php");
    exit;
}

/* =========================
   AMBIL DATA PRODUK
========================= */
$p = $conn->query("SELECT * FROM produk WHERE id=$id")->fetch_assoc();

if (!$p) {
    die("Produk tidak ditemukan");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
</head>
<body>

<h3>Edit Produk</h3>

<form method="post" enctype="multipart/form-data">
    <input name="nama" value="<?= htmlspecialchars($p['nama']) ?>" required><br><br>
    <input name="harga" value="<?= $p['harga'] ?>" required><br><br>
    <input name="stok" value="<?= $p['stok'] ?>" required><br><br>
    <input name="kategori" value="<?= htmlspecialchars($p['kategori']) ?>" required><br><br>

    <img src="../uploads/<?= $p['image'] ?>" width="120"><br><br>

    <input type="file" name="image"><br><br>

    <button name="update">Update</button>
</form>

</body>
</html>
