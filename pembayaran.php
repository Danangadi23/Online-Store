<?php
session_start();
// koneksi
include "koneksi.php";

// jika tidak ada session atau belum login
if(!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
  echo "<script>alert('Silahkan Login');</script>";
  echo "<script>location='login.php';</script>";
  exit();
}

$idpem = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

$id_pelanggan_beli = $detpem["id_pelanggan"];
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if($id_pelanggan_login !== $id_pelanggan_beli)
{
  echo "<script>alert('Tidak Boleh!');</script>";
  echo "<script>location='riwayat.php';</script>";
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
  <title>Pembayaran</title>
</head>
<body>
<!-- navbar -->
<?php include "menu.php";?>

<div class="container">
  <h2>Konfirmasi Pembayaran</h2>
  <p>Kirim Bukti Pembayaran Anda Disini</p>
  <div class="alert alert-info">Total tagihan Anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]);?></strong></div>

  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="nama">Nama Penyetor</label>
      <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
      <label for="bank">Bank</label>
      <input type="text" class="form-control" name="bank">
    </div>
    <div class="form-group">
      <label for="jumlah">Jumlah</label>
      <input type="text" class="form-control" name="jumlah" min="1">
    </div>
    <div class="form-group">
      <label for="nama">Bukti Foto</label>
      <input type="file" class="form-control" name="bukti">
      <p class="text-danger">Foto Bukti harus JPG maksimal 2MB</p>
    </div>
    <button class="btn btn-primary" name="kirim">Kirim</button>
  </form>
</div>

<?php

if(isset($_POST["kirim"]))
{
  //upload
  $namabukti = $_FILES["bukti"]["name"];
  $lokasibukti = $_FILES["bukti"]["tmp_name"];
  $namafiks = date("YmdHis").$namabukti;
  move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

  $nama = $_POST["nama"];
  $bank = $_POST["bank"];
  $jumlah = $_POST["jumlah"];
  $tanggal = date("Y-m-d");

  // SIMPAN PEMBAYARAN
  $koneksi->query("INSERT INTO pembayaran(id_pembelian, nama, bank, jumlah, tanggal, bukti) VALUES ('$idpem',  '$nama', '$bank', '$jumlah', '$tanggal', '$namafiks')");

  // update data
  $koneksi->query("UPDATE pembelian SET status_pembelian='Sudah Kirim Pembayaran' WHERE id_pembelian='$idpem'");

  echo "<script>alert('Terimakasih Telah mengirimkan Pembayaran');</script>";
  echo "<script>location='riwayat.php';</script>";
}

?>
</body>
</html>