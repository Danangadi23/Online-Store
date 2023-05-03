<?php
session_start();
// mendapatkan id produk
$id_produk = $_GET['id'];

// jika sudah ada produk di keranjang maka jumalhnya di +1
if(isset($_SESSION['keranjang'][$id_produk])) 
{
  $_SESSION['keranjang'][$id_produk] += 1;
}
// selain itu (belum ada di keranjang) maka produk di beli 1
else 
{
  $_SESSION['keranjang'][$id_produk] = 1;
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

//larikan ke keranjang
echo "<script>alert('Produk Telah dimasukkan ke Keranjang Belanja')</script>";
echo "<script>location='keranjang.php';</script>";


?>