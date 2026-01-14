<?php include "../config/db.php"; include "../templates/header.php"; ?>

<h3>Tambah Produk</h3>

<form method="post" enctype="multipart/form-data">
  <input name="nama" placeholder="Nama Produk" required>
  <input name="harga" placeholder="Harga" required>
  <input name="stok" placeholder="Stok" required>

  <textarea name="deskripsi" placeholder="Deskripsi Produk" required></textarea>

  <select name="kategori">
    <option value="Blangkon">Blangkon</option>
    <option value="Souvenir">Souvenir</option>
    <option value="Aksesoris">Aksesoris</option>
  </select>

  <input type="file" name="image" required>

  <button name="simpan">Simpan</button>
</form>

<hr>

<h3>Daftar Produk</h3>

<form method="get">
  <input name="q" placeholder="Cari produk...">
  <button>Cari</button>
</form>

<?php
// SIMPAN
if(isset($_POST['simpan'])){
  $nama=$_POST['nama'];
  $harga=$_POST['harga'];
  $stok=$_POST['stok'];
  $kategori=$_POST['kategori'];
  $deskripsi=$_POST['deskripsi'];

  $imgName = time()."_".$_FILES['image']['name'];
  move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/$imgName");

  $conn->query("INSERT INTO produk(nama,harga,stok,kategori,deskripsi,image)
  VALUES('$nama','$harga','$stok','$kategori','$deskripsi','$imgName')");
}

// PAGINATION + SEARCH
$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page-1)*$limit;

$search="";
if(isset($_GET['q'])){
  $q=$_GET['q'];
  $search="WHERE nama LIKE '%$q%'";
}

$data=$conn->query("SELECT * FROM produk $search LIMIT $offset,$limit");

while($p=$data->fetch_assoc()){
echo "
<div style='border:1px solid #ccc;padding:10px;margin:10px'>
  <img src='../uploads/$p[image]' width='100'><br>
  <b>$p[nama]</b><br>
  Rp $p[harga]<br>
  Stok: $p[stok]<br>
  Kategori: $p[kategori]<br>
  <small>$p[deskripsi]</small><br>

  <a href='edit_produk.php?id=$p[id]'>Edit</a> |
  <a href='hapus_produk.php?id=$p[id]' onclick='return confirm(\"Hapus produk?\")'>Hapus</a>
</div>
";
}
?>
<?php include "../templates/footer.php"; ?>