<?php
// 1. Ambil ID dari URL
$id = $_GET['id'];

// 2. Ambil data user sekarang dari database untuk ditampilkan di form
// Variabel $koneksi otomatis tersedia dari index.php
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
$data  = mysqli_fetch_assoc($query);

// 3. Proses Update jika tombol Simpan ditekan
if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $nama     = $_POST['nama_lengkap'];
    $password_baru = $_POST['password'];

    // Logika Password: 
    // Kalau kolom password diisi, update passwordnya (dienkripsi). 
    // Kalau kosong, biarkan pakai password lama.
    if (!empty($password_baru)) {
        $password_md5 = md5($password_baru);
        $sql = "UPDATE users SET username='$username', nama_lengkap='$nama', password='$password_md5' WHERE id='$id'";
    } else {
        $sql = "UPDATE users SET username='$username', nama_lengkap='$nama' WHERE id='$id'";
    }

    $update = mysqli_query($koneksi, $sql);

    if ($update) {
        echo "<script>
            alert('Data Berhasil Diupdate!');
            window.location.href='index.php?module=user&action=list';
        </script>";
    } else {
        echo "<div class='alert alert-danger'>Gagal update data: " . mysqli_error($koneksi) . "</div>";
    }
}
?>

<div class="card shadow-sm">
    <div class="card-header">
        <h4 class="mb-0">Edit User</h4>
    </div>
    <div class="card-body">
        
        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" value="<?= $data['username']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password Baru</label>
                <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengganti password">
                <div class="form-text text-muted">Hanya isi jika ingin mengubah password.</div>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" value="<?= $data['nama_lengkap']; ?>" required>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="index.php?module=user&action=list" class="btn btn-secondary">Batal</a>
                <button type="submit" name="simpan" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>

    </div>
</div>