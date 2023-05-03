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
  <title>TypoShop</title>
</head>
<body>

<!-- NAVBAR -->
<?php include 'menu.php'; ?>

  <!-- container -->
  <div class="konten">
    <div class="container">
      <h2>New Product</h2>

      <div class="row">

        <?php $ambil = $koneksi->query("SELECT * FROM produk");?>
        <?php while($perproduk = $ambil->fetch_assoc()){ ?>
        <div class="col-md-3">
          <div class="thumbnail">
            <img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" style="width:100%;height:270px;object-fit:cover;">
            <div class="caption">
              <h3><?php echo $perproduk['nama_produk']?></h3>
              <h5>Rp. <?php echo number_format($perproduk['harga_produk'])?></h5>
              <h5>Tersisa <?php echo $perproduk['stock_produk']?></h5>
              <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
              <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-default">Detail</a>
            </div>
          </div>
        </div>
        <?php } ?> 

      </div>
         

    </div>
  </div>
</body>
</html>