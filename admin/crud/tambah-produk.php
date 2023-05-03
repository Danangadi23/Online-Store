<h2>Tambah Produk</h2>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" name="nama" id="nama">
  </div>
  <div class="form-group">
    <label for="harga">Harga (Rp)</label>
    <input type="number" class="form-control" name="harga" id="harga">
  </div>
  <div class="form-group">
    <label for="stock">Berat (gr)</label>
    <input type="number" class="form-control" name="stock" id="stock">
  </div>
  <div class="form-group">
    <label for="stock">Stock (pcs)</label>
    <input type="number" class="form-control" name="stock" id="stock">
  </div>
  <div class="form-group">
    <label for="deskripsi">Deskripsi</label>
    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="10"></textarea>
  </div>
  <div class="form-group">
    <label for="foto">Foto</label>
    <input type="file" class="form-control" name="foto" id="foto">
  </div>
  <button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
if(isset($_POST['save']))
{
  $nama = $_FILES['foto']['name'];
  $lokasi = $_FILES['foto']['tmp_name'];
  move_uploaded_file($lokasi, "../foto_produk/".$nama);
  $koneksi->query("INSERT INTO produk(nama_produk, harga_produk, berat_produk, stock_produk, foto_produk, deskripsi_produk)
  VALUES('$_POST[nama]','$_POST[harga]', '$_POST[berat]', '$_POST[stock]', '$nama', '$_POST[deskripsi]')");

  echo "<div class='alert alert-info'>Data Tersimpan</div>";
  echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
?>