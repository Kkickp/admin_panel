<?php include "../config/db.php"; include "../templates/header.php"; ?>

<h1 class="h3 mb-4">Laporan Periodik</h1>

<form method="get" class="row g-2 mb-3">
<input type="date" name="dari" class="form-control col">
<input type="date" name="sampai" class="form-control col">
<button class="btn btn-primary col">Filter</button>
</form>

<table class="table table-bordered shadow">
<tr><th>ID</th><th>Konsumen</th><th>Total</th><th>Tanggal</th></tr>

<?php
$where="";

if(isset($_GET['dari'])){
$dari=$_GET['dari'];
$sampai=$_GET['sampai'];
$where="WHERE DATE(tanggal) BETWEEN '$dari' AND '$sampai'";
}

$data=$conn->query("
SELECT jual.*, konsumen.nama
FROM jual
LEFT JOIN konsumen ON jual.id_konsumen=konsumen.id
$where
ORDER BY jual.id DESC
");

while($r=$data->fetch_assoc()){
echo "
<tr>
<td>$r[id]</td>
<td>$r[nama]</td>
<td>Rp $r[total]</td>
<td>$r[tanggal]</td>
</tr>
";
}
?>

</table>

<?php include "../templates/footer.php"; ?>
