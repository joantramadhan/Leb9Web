<?php
// --- PROSES SIMPAN DATA KE DATABASE ---
if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $nama     = $_POST['nama_lengkap'];
    
    // 1. Ambil password dari inputan
    $pass_input = $_POST['password'];
    
    // 2. Enkripsi password dengan MD5 (agar sesuai dengan sistem Login kita)
    $password = md5($pass_input);

    // 3. Masukkan ke Database (Kolom: username, password, nama_lengkap)
    $query = "INSERT INTO users (username, password, nama_lengkap) 
              VALUES ('$username', '$password', '$nama')";
    
    $simpan = mysqli_query($koneksi, $query);

    if ($simpan) {
        echo "<script>
            alert('Data User Berhasil Disimpan!');
            window.location.href='index.php?module=user&action=list';
        </script>";
    } else {
        echo "<div class='alert alert-danger'>Gagal menyimpan data: " . mysqli_error($koneksi) . "</div>";
    }
}
?>

<div class="card shadow-sm">
    <div class="card-header">
        <h4 class="mb-0">Tambah User Baru</h4>
    </div>
    <div class="card-body">
        
        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukan username unik" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukan password" required>
                <div class="form-text text-muted">Password akan otomatis dienkripsi sebelum disimpan.</div>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" placeholder="Contoh: Joant Admin" required>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="index.php?module=user&action=list" class="btn btn-secondary">Batal</a>
                <button type="submit" name="simpan" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>

    </div>
</div>