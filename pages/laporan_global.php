<?php include "../config/db.php"; include "../templates/header.php"; ?>
<table border="1">
<tr><th>Tanggal</th><th>Total</th></tr>
<?php
$q=$conn->query("SELECT * FROM jual");
while($r=$q->fetch_assoc()){
echo "<tr><td>$r[tanggal]</td><td>$r[total]</td></tr>";
}
?>
</table>
<a href="../export/excel.php?type=global">Excel</a> |
<a href="../export/pdf.php?type=global">PDF</a>
<?php include "../templates/footer.php"; ?>