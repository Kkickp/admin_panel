<?php
include "../config/db.php";
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=laporan.xls");
$type=$_GET['type'];
if($type=="global"){
$q=$conn->query("SELECT * FROM jual");
}else{
$q=$conn->query("SELECT * FROM jual WHERE tanggal BETWEEN '$_GET[d1]' AND '$_GET[d2]'");
}
echo "Tanggal\tTotal\n";
while($r=$q->fetch_assoc()){
echo "$r[tanggal]\t$r[total]\n";
}
?>