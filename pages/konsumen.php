<?php include "../config/db.php"; include "../templates/header.php"; ?>

<h1 class="h3 mb-4">Kelola Konsumen</h1>

<table class="table table-bordered shadow">
<tr><th>Nama</th><th>Telp</th><th>Alamat</th></tr>

<?php
$data=$conn->query("SELECT * FROM konsumen ORDER BY id DESC");
while($k=$data->fetch_assoc()){
echo "
<tr>
<td>$k[nama]</td>
<td>$k[telp]</td>
<td>$k[alamat]</td>
</tr>
";
}
?>

</table>

<?php include "../templates/footer.php"; ?>
