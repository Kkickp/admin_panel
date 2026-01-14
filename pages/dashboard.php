<?php include "../config/db.php"; ?>
<?php include "../templates/header.php"; ?>

<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

<div class="row">

<!-- Produk -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
        Produk
      </div>
      <div class="h5 mb-0 font-weight-bold text-gray-800">
        <?php
          $q = $conn->query("SELECT COUNT(*) as total FROM produk");
          echo $q->fetch_assoc()['total'];
        ?>
      </div>
    </div>
  </div>
</div>

<!-- Konsumen -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
        Konsumen
      </div>
      <div class="h5 mb-0 font-weight-bold text-gray-800">
        <?php
          $q = $conn->query("SELECT COUNT(*) as total FROM konsumen");
          echo $q->fetch_assoc()['total'];
        ?>
      </div>
    </div>
  </div>
</div>

<!-- Transaksi -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
        Transaksi
      </div>
      <div class="h5 mb-0 font-weight-bold text-gray-800">
        <?php
          $q = $conn->query("SELECT COUNT(*) as total FROM jual");
          echo $q->fetch_assoc()['total'];
        ?>
      </div>
    </div>
  </div>
</div>

<!-- Pendapatan -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-danger shadow h-100 py-2">
    <div class="card-body">
      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
        Total Pendapatan
      </div>
      <div class="h5 mb-0 font-weight-bold text-gray-800">
        Rp
        <?php
          $q = $conn->query("SELECT SUM(total) as total FROM jual");
          echo number_format($q->fetch_assoc()['total'] ?? 0);
        ?>
      </div>
    </div>
  </div>
</div>

</div>

<?php include "../templates/footer.php"; ?>
