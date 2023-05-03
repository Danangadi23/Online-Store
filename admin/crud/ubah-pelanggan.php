<h2>Ubah Data Pelanggan</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();

echo "<pre>";
print_r($pecah);
echo "</pre>";
?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $pecah['nama_pelanggan']; ?>">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="<?php echo $pecah['email_pelanggan']; ?>">
  </div>
  <div class="form-group">
    <label for="telepon">Telepon</label>
    <input type="text" name="telepon" id="telepon" class="form-control" value="<?php echo $pecah['telepon_pelanggan']; ?>">
  </div>
  <div class="form-group">
    <label for="alamat">Alamat</label>
    <textarea rows="10" name="alamat" id="alamat" class="form-control">
    <?php echo $pecah['alamat_pelanggan']; ?>
    </textarea>
  </div>
  <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
if(isset($_POST['ubah']))
{  
    $koneksi->query("UPDATE pelanggan SET 
      nama_pelanggan = '$_POST[nama]', 
      email_pelanggan = '$_POST[email]',
      telepon_pelanggan = '$_POST[telepon]',
      alamat_pelanggan = '$_POST[alamat]' WHERE id_pelanggan = '$_GET[id]'");


  echo "<script> alert('Data pelanggan Telah DiUbah'); </script>";
  echo "<script> location='index.php?halaman=pelanggan'; </script>";
}
?>