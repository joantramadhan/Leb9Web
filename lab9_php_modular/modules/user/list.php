<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Data User</h4>
        
        <input type="text" id="searchUser" class="form-control form-control-sm w-25" placeholder="Cari user...">
    </div>
    
    <div class="card-body">
        <a href="index.php?module=user&action=add" class="btn btn-success mb-3">
            <i class="bi bi-plus-circle"></i> + Tambah User
        </a>

        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query Data
                $query = mysqli_query($koneksi, "SELECT * FROM users ORDER BY id DESC");
                $no = 1;
                while($row = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['username']; ?></td>
                    <td><?= $row['nama_lengkap']; ?></td>
                    <td>
                        <a href="index.php?module=user&action=edit&id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        
                        <a href="#" 
                           onclick="konfirmasiHapus(event, 'index.php?module=user&action=delete&id=<?= $row['id']; ?>')" 
                           class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>