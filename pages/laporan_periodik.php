<form>
<input type="date" name="d1">
<input type="date" name="d2">
<button>Filter</button>
</form>
<?php
include "../config/db.php";
if(isset($_GET['d1'])){
$d1=$_GET['d1']; $d2=$_GET['d2'];
$q=$conn->query("SELECT * FROM jual WHERE tanggal BETWEEN '$d1' AND '$d2'");
while($r=$q->fetch_assoc()){
echo "$r[tanggal] - $r[total]<br>";
}
echo "<a href='../export/excel.php?type=periodic&d1=$d1&d2=$d2'>Excel</a> | ";
echo "<a href='../export/pdf.php?type=periodic&d1=$d1&d2=$d2'>PDF</a>";
}
?>