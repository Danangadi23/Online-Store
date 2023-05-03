<?php
session_start();

include "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
  <title>Login Pelanggan</title>
</head>
<body>
  
<!-- NAVBAR -->
<?php include 'menu.php'; ?>

  <!-- KONTEN -->
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
          <h3 class="panel-title">Login Pelanggan</h3>
          </div>

          <div class="panel-body">

            <form action="" method="POST">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
              </div>
              <button class="btn btn-primary" name="simpan">Login</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  // jika ada tombol simpan (ditekan)
  if(isset($_POST['simpan']))
  {
    $email    = $_POST['email'];
    $password = $_POST['password'];
    // lakukan query ngecek akun dari tabel pelanggan di db
    $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

    // ngitung akun yang terambil
    $akunyangcocok = $ambil->num_rows;

    // jika 1 akun cocok maka di loginkan
    if($akunyangcocok==1)
    {
      // anda sudah login

      // mendapatkan akun dlm bentuk array
      $akun = $ambil->fetch_assoc();
      // simpan ke dalam session
      $_SESSION['pelanggan'] = $akun;
      
      echo "<script>alert('Anda Sukses Login')</script>";

      // jika sudah belanja
      if(isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])) 
      {
        echo "<script>location='checkout.php';</script>";
      }
      else 
      {
        echo "<script>location='riwayat.php';</script>";
      }
     
    }
    else 
    {
      echo "<script>alert('Anda Gagal Login, Silahkan Periksa Akun Anda')</script>";
      echo "<script>location='login.php';</script>";
    }
  }
  ?>





</body>
</html>