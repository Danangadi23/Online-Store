<h2>Data Pelanggan</h2>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Pelanggan</th>
      <th>Email</th>
      <th>Telepon</th>
      <th>Alamat</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1;?>
    <?php $ambil = $koneksi->query("SELECT * FROM pelanggan");?>
    <?php while($pecah = $ambil->fetch_assoc()){ ?>
    <tr>
      <td><?php echo $nomor; ?></td>
      <td><?php echo $pecah['nama_pelanggan']; ?></td>
      <td><?php echo $pecah['email_pelanggan']; ?></td>
      <td><?php echo $pecah['telepon_pelanggan']; ?></td>
      <td><?php echo $pecah['alamat_pelanggan']; ?></td>
      <td>
        <a href="index.php?halaman=hapus-pelanggan&id=<?php echo $pecah['id_pelanggan']; ?>" class="btn btn-danger">hapus</a>
        <a href="index.php?halaman=ubah-pelanggan&id=<?php echo $pecah['id_pelanggan']; ?>" class="btn btn-warning">ubah</a>
      </td>
    </tr>
    <?php $nomor++; ?>
    <?php } ?>
  </tbody>
</table>
<a href="index.php?halaman=tambah-pelanggan" class="btn btn-primary">Tambah Pelanggan</a>