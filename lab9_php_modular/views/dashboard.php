<?php
// 1. Ambil Nama User dari Session
$nama_user = isset($_SESSION['user_nama']) ? $_SESSION['user_nama'] : 'User';

// 2. Query Menghitung Jumlah Data Barang (Dari tabel baru kamu)
// Pastikan tabel 'data_barang' sudah dibuat
$query_hitung = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM data_barang");
$data_hitung  = mysqli_fetch_assoc($query_hitung);
$jumlah_barang = $data_hitung['total'];
?>

<div class="row mb-4">
    <div class="col-md-12">
        <div class="p-5 mb-4 bg-light rounded-3 shadow-sm border">
            <div class="container-fluid py-2">
                <h1 class="display-5 fw-bold text-primary">
                    Halo, <?= $nama_user; ?>! 👋 
                    <span class="text-secondary fs-4 float-end" id="realtime-clock">--:--:--</span>
                </h1>
                <p class="col-md-8 fs-4">Selamat datang di sistem inventaris. Anda bisa mengelola stok dan harga barang di sini.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    
    <div class="col-md-4 mb-3">
        <div class="card text-white bg-primary h-100 shadow">
            <div class="card-header">Statistik Toko</div>
            <div class="card-body">
                <h5 class="card-title">Total Produk</h5>
                <h1 class="display-4 fw-bold"><?= $jumlah_barang; ?></h1>
                <p class="card-text">Item barang tersedia di database.</p>
            </div>
            <div class="card-footer bg-transparent border-light">
                <a href="index.php?module=barang&action=list" class="text-white text-decoration-none">Lihat Detail <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card text-white bg-success h-100 shadow">
            <div class="card-header">Aksi Cepat</div>
            <div class="card-body">
                <h5 class="card-title">Input Barang Baru</h5>
                <p class="card-text">Ada barang masuk? Segera input datanya di sini agar stok terupdate.</p>
            </div>
            <div class="card-footer bg-transparent border-light">
                <a href="index.php?module=barang&action=add" class="text-white text-decoration-none">Input Sekarang &rarr;</a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card bg-warning text-dark h-100 shadow">
            <div class="card-header">Info Akun Anda</div>
            <div class="card-body">
                <h5 class="card-title">Profile Admin</h5>
                <p class="card-text">
                    Username: <strong><?= $_SESSION['username'] ?? '-'; ?></strong><br>
                    Status: <strong>Online</strong>
                </p>
            </div>
            <div class="card-footer bg-transparent border-dark">
                <a href="index.php?module=auth&action=logout" class="text-dark text-decoration-none">Log Out System</a>
            </div>
        </div>
    </div>

</div>