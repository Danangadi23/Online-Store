<?php session_start(); ?>
<?php include 'koneksi.php';?>
<?php 

// mendapatkan id produk
$id_produk = $_GET["id"];

// query ambil data
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
  <title>Detail Produk</title>
</head>
<body>
<!-- NAVBAR -->
<?php include 'menu.php'; ?>

  <section class="konten">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="foto_produk/<?php echo $detail['foto_produk']; ?>" alt="" class="img-responsive">
        </div>
        <div class="col-md-6">
          <h2><?php echo $detail['nama_produk']; ?></h2>
          <h4>Rp. <?php echo number_format($detail['harga_produk']); ?></h4>

          <h5>Stock : <?php echo $detail['stock_produk'] ?></h5>

          <form method="POST">
            <div class="form-group">
              <div class="input-group">
                <input type="number" min="1" max="<?php echo $detail['stock_produk']?>" name="jumlah" class="form-control">
                <div class="input-group-btn">
                  <button class="btn btn-primary" name="beli">Beli</button>
                </div>
              </div>
            </div>
          </form>

          <?php

          //jika klik tombol beli
          if(isset($_POST['beli']))
          {
            // mendapatkan jumlah input
            $jumlah = $_POST['jumlah'];
            // masukkan dikeranjang belanja
            $_SESSION["keranjang"][$id_produk] = $jumlah;
            
            echo "<script>alert('Produk telah masuk ke keranjang belanja')</script>";
            echo "<script>location='keranjang.php';</script>";
          }

          ?>

          <!-- <p><?php // echo $detail['deskripsi_produk']; ?></p> -->
        </div>
      </div>
    </div>
  </section>
</body>
</html>