<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Data Barang</h4>
        <a href="index.php?module=barang&action=add" class="btn btn-success btn-sm">
            <i class="bi bi-plus-circle"></i> + Tambah Barang
        </a>
    </div>
    
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Nama Barang</th>
                    <th>Gambar</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th width="130">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Mengambil data dari tabel data_barang
                $query = mysqli_query($koneksi, "SELECT * FROM data_barang ORDER BY id_barang DESC");
                $no = 1;
                while($row = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td class="align-middle text-center"><?= $no++; ?></td>
                    <td class="align-middle"><?= $row['kategori']; ?></td>
                    <td class="align-middle fw-bold"><?= $row['nama']; ?></td>
                    <td class="align-middle text-center">
                        <span class="badge bg-secondary"><?= $row['gambar']; ?></span>
                    </td>
                    <td class="align-middle text-end">Rp <?= number_format($row['harga_beli'], 0, ',', '.'); ?></td>
                    <td class="align-middle text-end">Rp <?= number_format($row['harga_jual'], 0, ',', '.'); ?></td>
                    <td class="align-middle text-center">
                        <span class="badge bg-info text-dark"><?= $row['stok']; ?></span>
                    </td>
                    <td class="align-middle text-center">
    <a href="index.php?module=barang&action=edit&id=<?= $row['id_barang']; ?>" class="btn btn-xs btn-warning">Ubah</a>
    
    <a href="#" 
       onclick="konfirmasiHapus(event, 'index.php?module=barang&action=delete&id=<?= $row['id_barang']; ?>')" 
       class="btn btn-xs btn-danger">Hapus</a>
</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>