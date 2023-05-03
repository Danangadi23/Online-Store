<h2>Data Produk</h2>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Harga</th>
      <th>Berat</th>
      <th>Stock</th>
      <th>Foto</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    <?php $ambil = $koneksi->query("SELECT * FROM produk");?>
    <?php while($pecah = $ambil->fetch_assoc()){ ?>
    <tr>
      <td><?php echo $nomor; ?></td>
      <td><?php echo $pecah['nama_produk']; ?></td>
      <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
      <td><?php echo $pecah['berat_produk']; ?> gr</td>
      <td><?php echo $pecah['stock_produk']; ?></td>
      <td>
        <img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="120">
      </td>
      <td>
        <a href="index.php?halaman=hapus-produk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-danger" id="hapus">hapus</a>
        <a href="index.php?halaman=ubah-produk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning">ubah</a>
        <!-- <a href="index.php?halaman=beli&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-primary">beli</a> -->
      </td>
    </tr>
    <?php $nomor++; ?>
    <?php } ?>
  </tbody>
</table>
<a href="index.php?halaman=tambah-produk" class="btn btn-primary">Tambah Produk</a>