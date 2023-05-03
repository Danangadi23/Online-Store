<?php

$ambil = $koneksi->query("SELECT * FROM produk  WHERE id_produk = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoproduk = $pecah['foto_produk'];
if(file_exists("../foto_produk/$fotoproduk"))
{
  unlink("../foto_produk/$fotoproduk");
}

$koneksi->query("DELETE FROM produk WHERE id_produk = '$_GET[id]'");

// if(!isset($_GET['hapus']))
// {
//   echo "<script> confirm('Yakin Mau Hapus Produk??'); </script>";
//   echo "<script> location='index.php?halaman=produk';</script>";
// } 
// else 
// {
//   echo "<script> location='index.php?halaman=tambah-produk';</script>"; 
// }

echo "<script> confirm('Yakin Mau Hapus Produk??'); </script>";
echo "<script> location='index.php?halaman=produk';</script>";


?>