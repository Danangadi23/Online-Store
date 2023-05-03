<h2>Data Pembayaran</h2>

<?php

$id_pembelian = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
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
  <title>Data Pembayaran</title>
</head>
<body>
  <div class="row">
    <div class="col-md-6">
      <table class="table">
        <tr>
          <th>Nama</th>
          <td><?php echo $detail['nama']; ?></td>
        </tr>
        <tr>
          <th>Bank</th>
          <td><?php echo $detail['bank']; ?></td>
        </tr>
        <tr>
          <th>Jumlah</th>
          <td><?php echo number_format($detail['jumlah']);?></td>
        </tr>
        <tr>
          <th>Tanggal</th>
          <td><?php echo $detail['tanggal']; ?></td>
        </tr>
      </table>
    </div>

    <div class="col-md-6">
      <img src="../bukti_pembayaran/<?php echo $detail['bukti']?>" alt="" class="img-responsive"> 
    </div>
  </div>

  <form action="" method="POST">
    <div class="form-group">
      <label for="status">No. Resi Pengiriman</label>
      <input type="text" class="form-control" name="resi">
    </div>
    <div class="form-group">
      <label for="status">Status</label>
      <select class="form-control"name="status" id="status">
        <option value="">Pilih Status</option>
        <option value="Lunas">Lunas</option>
        <option value="Barang dikirim">Barang dikirim</option>
        <option value="Batal">Batal</option>
      </select>
    </div>
    <button class="btn btn-primary" name="proses">Proses</button>
    
  </form>
  <?php
  if(isset($_POST["proses"]))
  {
    $resi = $_POST["resi"];
    $status = $_POST["status"];
    $koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");

    echo "<script>alert('Data Pembelian Terupdate')</script>";
    echo "<script>location='index.php?halaman=pembelian';</script>";
  }
  ?>
</body>
</html>