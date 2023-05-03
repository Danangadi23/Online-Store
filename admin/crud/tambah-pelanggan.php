<h2>Tambah Pelanggan</h2>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" name="nama" id="nama">
  </div>
  <div class="form-group">
    <label for="harga">Email</label>
    <input type="email" class="form-control" name="email" id="email">
  </div>
  <div class="form-group">
    <label for="telepon">Telepon</label>
    <input type="text" class="form-control" name="telepon" id="telepon">
  </div>
  <div class="form-group">
    <label for="alamat">Alamat</label>
    <textarea class="form-control" name="alamat" id="alamat" rows="10"></textarea>
  </div>
  <button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
if(isset($_POST['save']))
{
  $koneksi->query("INSERT INTO pelanggan(nama_pelanggan, email_pelanggan, telepon_pelanggan, alamat_pelanggan)
  VALUES('$_POST[nama]','$_POST[email]', '$_POST[email]', '$_POST[alamat]')");

  echo "<div class='alert alert-info'>Data Tersimpan</div>";
  echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
}
?>
