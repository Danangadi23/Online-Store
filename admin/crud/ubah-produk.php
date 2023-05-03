<h2>Ubah Produk</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
?>



<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?>">
    </div>
    <div class="form-group">
        <label for="harga">Harga (Rp)</label>
        <input type="number" name="harga" id="harga" class="form-control" value="<?php echo $pecah['harga_produk']; ?>">
    </div>
    <div class="form-group">
        <label for="berat">Berat (gr)</label>
        <input type="number" name="berat" id="berat" class="form-control" value="<?php echo $pecah['berat_produk']; ?>">
    </div>
    <div class="form-group">
        <label for="stock">Stock (pcs)</label>
        <input type="number" name="stock" id="stock" class="form-control" value="<?php echo $pecah['stock_produk']; ?>">
    </div>
    <div class="form-group">
        <img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="200">
    </div>
    <div class="form-group">
        <label for="foto">Ganti foto</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea rows="10" name="deskripsi" id="deskripsi" class="form-control">
    <?php echo $pecah['deskripsi_produk']; ?>
    </textarea>
    </div>
    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
if(isset($_POST['ubah']))
{
  $namafoto = $_FILES['foto']['name'];
  $lokasifoto = $_FILES['foto']['tmp_name'];
  // jika diubah
  if(!empty($lokasifoto))
  {
    move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

    $koneksi->query("UPDATE produk SET 
      nama_produk = '$_POST[nama]', 
      harga_produk = '$_POST[harga]',
      berat_produk = '$_POST[berat]',
      stock_produk = '$_POST[stock]',
      foto_produk = '$namafoto', 
      deskripsi_produk = '$_POST[deskripsi]' WHERE id_produk = '$_GET[id]'");
  }
  else 
  {
    $koneksi->query("UPDATE produk SET 
      nama_produk = '$_POST[nama]', 
      harga_produk = '$_POST[harga]',
      berat_produk = '$_POST[berat]',
      stock_produk = '$_POST[stock]',
      deskripsi_produk = '$_POST[deskripsi]' WHERE id_produk = '$_GET[id]'");
  }

  echo "<script> alert('Data Produk Telah DiUbah'); </script>";
  echo "<script> location='index.php?halaman=produk'; </script>";
}
?>