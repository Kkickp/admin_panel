<?php include "../config/db.php"; include "../templates/header.php"; ?>
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

<div class="row">

<div class="col-md-3">
<div class="card shadow mb-4">
<div class="card-body">
Produk<br>
<b><?= $conn->query("SELECT COUNT(*) c FROM produk")->fetch_assoc()['c']; ?></b>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card shadow mb-4">
<div class="card-body">
Konsumen<br>
<b><?= $conn->query("SELECT COUNT(*) c FROM konsumen")->fetch_assoc()['c']; ?></b>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card shadow mb-4">
<div class="card-body">
Transaksi<br>
<b><?= $conn->query("SELECT COUNT(*) c FROM jual")->fetch_assoc()['c']; ?></b>
</div>
</div>
</div>
<div class="card shadow mb-4">
<div class="card-body">
Produk<br>
<b><?= $conn->query("SELECT COUNT(*) c FROM produk")->fetch_assoc()['c']; ?></b>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card shadow mb-4">
<div class="card-body">
Konsumen<br>
<b><?= $conn->query("SELECT COUNT(*) c FROM konsumen")->fetch_assoc()['c']; ?></b>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card shadow mb-4">
<div class="card-body">
Transaksi<br>
<b><?= $conn->query("SELECT COUNT(*) c FROM jual")->fetch_assoc()['c']; ?></b>
</div>
</div>
</div>

</div>

<?php include "../templates/footer.php"; ?>
