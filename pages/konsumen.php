<?php include "../config/db.php"; include "../templates/header.php";
$data=$conn->query("SELECT * FROM konsumen");
while($k=$data->fetch_assoc()){
echo "$k[nama] - $k[telp] <br>";
}
include "../templates/footer.php"; ?>