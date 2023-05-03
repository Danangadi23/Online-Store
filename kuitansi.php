<?php 
include "koneksi.php";

$id = $_GET['id'];
$ambil  = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ORDER BY id_pelanggan");
$pecah = $ambil->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="kuitansi.css">
    <title>Kuitansi</title>
</head>
<body>
    
    <nav>
        <h1>TypoShop Sejahtera Agung</h1>
        <h3>Supplier Apaaja</h3>
    </nav>

    <div class="container">
        <div class="lokasi">
            <!-- <p>Alamat : </p>
            <p>Phone  :</p>
            <p>Operator :</p>
            <p>Date  : </p> --> 
        </div>
        <div class="kuitansi">
            <div>Kuitansi Pembayaran</div>
            <p><?php echo $pecah['nama_pelanggan']?></p>
        </div>
        <div class="group-uang">
            <div class="total">
                Uang Sejumlah 
                <div class="uang">
                    Rp. <?php echo number_format($pecah['total_pembelian']);?>
                </div>
            </div>
            <div class="tgl-pesanan">
                <?php echo $pecah['tanggal_pembelian'];?>
            </div>
        </div>
    </div>

    <footer>
        <div class="pelanggan">
            <p><?php echo $pecah['nama_pelanggan']?></p>
            <p>TypoShop Sejahtera Agung</p>
        </div>
        <div class="pemilik">
            Direktur : Arya Dira
        </div>
    </footer>
    <?php
    ?>
</body>
</html>