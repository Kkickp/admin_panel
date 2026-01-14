<?php include "../config/db.php";
$id=$_GET['id'];
$p=$conn->query("SELECT * FROM produk WHERE id=$id")->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
<input name="nama" value="<?=$p['nama']?>">
<input name="harga" value="<?=$p['harga']?>">
<input name="stok" value="<?=$p['stok']?>">
<input name="kategori" value="<?=$p['kategori']?>">

<img src="../uploads/<?=$p['image']?>" width="100"><br>
<input type="file" name="image">

<button name="update">Update</button>
</form>

<?php
if(isset($_POST['update'])){
  $nama=$_POST['nama'];
  $harga=$_POST['harga'];
  $stok=$_POST['stok'];
  $kategori=$_POST['kategori'];

  if($_FILES['image']['name']){
    $img=time()."_".$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],"../uploads/$img");
    $conn->query("UPDATE produk SET image='$img' WHERE id=$id");
  }

  $conn->query("UPDATE produk SET 
  nama='$nama',harga='$harga',stok='$stok',kategori='$kategori' WHERE id=$id");

  header("Location: produk.php");
}
?>
