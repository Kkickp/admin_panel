<?php include "../config/db.php"; include "../templates/header.php"; ?>
<h1 class="h3 mb-4">Laporan Penjualan Global</h1>

<table class="table table-striped shadow">
<tr>
<th>ID</th><th>Konsumen</th><th>Total</th><th>Tanggal</th>
</tr>

<?php
$data=$conn->query("
SELECT jual.*, konsumen.nama 
FROM jual 
LEFT JOIN konsumen ON jual.id_konsumen=konsumen.id
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
<a href="../export/excel.php?type=global">Excel</a> |
<a href="../export/pdf.php?type=global">PDF</a>

<?php include "../templates/footer.php"; ?>
