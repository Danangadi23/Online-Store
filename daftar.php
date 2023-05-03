<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
  <title>Register</title>
</head>
<body>
  <!-- NAVBAR  -->
  <?php include 'menu.php'; ?>

  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Daftar Pelanggan</h3>
          </div>
          <div class="panel-body">
            <form action="" method="POST" class="form-horizontal">
              <div class="form-group">
                <label for="nama" class="control-label col-md-2">Nama</label>
                <div class="col-md-8">
                  <input type="text" name="nama" id="nama" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="control-label col-md-2">Email</label>
                <div class="col-md-8">
                  <input type="email" name="email" id="email" class="form-control"  required>
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="control-label col-md-2">Password</label>
                <div class="col-md-8">
                  <input type="password" name="password" id="password" class="form-control"  required>
                </div>
              </div>
              <div class="form-group">
                <label for="telepon" class="control-label col-md-2">Telp/HP</label>
                <div class="col-md-8">
                  <input type="telepon" name="telepon" id="telepon" class="form-control"  required>
                </div>
              </div>
              <div class="form-group">
                <label for="alamat" class="control-label col-md-2">Alamat</label>
                <div class="col-md-8">
                  <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                  <button class="btn btn-primary" name="daftar">Daftar</button>
                </div>
              </div>
            </form>
            <?php
            // jika tombol daftar ditekan
            if(isset($_POST["daftar"]))
            {
              // mengambil isian 
              $nama     = $_POST['nama'];
              $email    = $_POST['email'];
              $password = $_POST['password'];
              $telepon  = $_POST['telepon'];
              $alamat   = $_POST['alamat'];

              // validasi
              $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email'");
              $yangcocok = $ambil->num_rows;

              // cek email  apakah sudah digunakan
              if($yangcocok == 1)
              {
                echo "<script>alert('Pendaftaran gagal email sudah digunakan');</script>";
                echo "<script>location='daftar.php';</script>";
              }
              else 
              {
                // query insert
                $koneksi->query("INSERT INTO pelanggan (email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan) VALUES ('$email', '$password', '$nama', '$telepon', '$alamat')");

                echo "<script>alert('Pendaftaran Sukses, Silahkan Login');</script>";
                echo "<script>location='login.php';</script>";
              }
            }


            ?>



          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>