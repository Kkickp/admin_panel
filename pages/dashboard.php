<?php include "../config/db.php"; include "../templates/header.php"; ?>
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
  Selamat datang di Admin Panel
</div>
<ul class="list-group">
<li class="list-group-item"><a href="produk.php">Kelola Produk</a></li>
<li class="list-group-item"><a href="konsumen.php">Kelola Konsumen</a></li>
<li class="list-group-item"><a href="laporan_global.php">Laporan Global</a></li>
<li class="list-group-item"><a href="laporan_periodik.php">Laporan Periodik</a></li>
</ul>
<?php include "../templates/footer.php"; ?>