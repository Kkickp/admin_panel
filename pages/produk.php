<?php include "../config/db.php"; include "../templates/header.php"; ?>

<h1 class="h3 mb-4">Kelola Produk</h1>

<div class="card shadow mb-4">
<div class="card-body">

<form method="post" enctype="multipart/form-data" class="row g-2 mb-4">

<input class="form-control col" name="nama" placeholder="Nama" required>
<input class="form-control col" name="harga" placeholder="Harga" required>
<input class="form-control col" name="stok" placeholder="Stok" required>

<select class="form-control col" name="kategori">
<option>Blangkon</option>
<option>Souvenir</option>
<option>Aksesoris</option>
</select>

<input type="file" name="image" class="form-control col" required>

<button class="btn btn-primary col">Simpan</button>

</form>

<?php
if(isset($_POST['nama'])){
  $nama=$_POST['nama'];
  $harga=$_POST['harga'];
  $stok=$_POST['stok'];
  $kategori=$_POST['kategori'];

  $img=time()."_".$_FILES['image']['name'];
  move_uploaded_file($_FILES['image']['tmp_name'],"../uploads/$img");

  $conn->query("INSERT INTO produk(nama,harga,stok,kategori,image)
  VALUES('$nama','$harga','$stok','$kategori','$img')");
}
?>

<table class="table table-bordered">
<tr>
<th>Gambar</th><th>Nama</th><th>Harga</th><th>Stok</th><th>Aksi</th>
</tr>

<?php
$data=$conn->query("SELECT * FROM produk ORDER BY id DESC");
while($p=$data->fetch_assoc()){
echo "
<tr>
<td><img src='../uploads/$p[image]' width='60'></td>
<td>$p[nama]</td>
<td>Rp $p[harga]</td>
<td>$p[stok]</td>
<td>
<a class='btn btn-sm btn-warning' href='edit_produk.php?id=$p[id]'>Edit</a>
<a class='btn btn-sm btn-danger' href='hapus_produk.php?id=$p[id]'>Hapus</a>
</td>
</tr>
";
}
?>

</table>

</div>
</div>

<?php include "../templates/footer.php"; ?>
