<?php $koneksi = new mysqli("localhost", "root", "", "tokopenjualan");?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <title>Nota</title>
</head>
<body>

<script>
        
</script>

<section class="konten">
  <div class="container">

    <!-- notaa admin -->
    <h2>Faktur Penjualan</h2>

    <?php 
    $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan");
    $detail = $ambil->fetch_assoc();
    ?>
    
    <div class="row">
      <div class="col-md-4">
        <h3>Pembelian</h3>
        <strong>No. Pembelian : <?php echo $detail['id_pembelian']; ?></strong> <br>
        Tanggal : <?php echo $detail['tanggal_pembelian']; ?> <br>
        Total   : Rp. <?php echo number_format($detail['total_pembelian']); ?>
      </div>
      <div class="col-md-4">
        <h3>Pelanggan</h3>
        <strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
        <p>
          <p><?php echo $detail['telepon_pelanggan']; ?></p>
          <p><?php echo $detail['email_pelanggan']; ?></p>
        </p>
      </div>
      <div class="col-md-4">
        <h3>Pengiriman</h3>
        <strong><?php echo $detail['nama_kota']; ?></strong> <br>
        Ongkos Kirim : Rp. <?php echo number_format($detail['tarif']); ?> <br>
        Alamat  : <?php echo $detail['alamat_pengiriman']; ?>
      </div>
 
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Harga</th>
          <th>Berat</th>
          <th>Jumlah</th>
          <th>Subberat</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk")?>
        <?php while($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
          <td><?php echo $nomor; ?></td>
          <td><?php echo $pecah['nama']; ?></td>
          <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
          <td><?php echo $pecah['berat']; ?> gr</td>
          <td><?php echo $pecah['jumlah']; ?></td>
          <td><?php echo $pecah['subberat']; ?></td>
          <td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
        </tr>
        <?php $nomor++?>;
        <?php } ?>
      </tbody>
    </table>

    <div class="row">
      <div class="col-md-7">
        <div class="alert alert-info">
          <div style="font-size: 24px;">
           Total Pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>