<?php
if (isset($_POST['simpan'])) {
    $kategori   = $_POST['kategori'];
    $nama       = $_POST['nama'];
    $gambar     = $_POST['gambar']; // Input teks manual dulu biar simpel
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok       = $_POST['stok'];

    $query = "INSERT INTO data_barang (kategori, nama, gambar, harga_beli, harga_jual, stok) 
              VALUES ('$kategori', '$nama', '$gambar', '$harga_beli', '$harga_jual', '$stok')";
    
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Barang Berhasil Disimpan!'); window.location.href='index.php?module=barang&action=list';</script>";
    } else {
        echo "<div class='alert alert-danger'>Gagal: " . mysqli_error($koneksi) . "</div>";
    }
}
?>

<div class="card shadow-sm">
    <div class="card-header"><h4 class="mb-0">Tambah Barang</h4></div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-control">
                        <option value="Elektronik">Elektronik</option>
                        <option value="Fashion">Fashion</option>
                        <option value="ATK">ATK</option>
                    </select>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Nama File Gambar</label>
                <input type="text" name="gambar" class="form-control" placeholder="Contoh: hp_samsung.jpg">
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Harga Beli</label>
                    <input type="number" name="harga_beli" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Harga Jual</label>
                    <input type="number" name="harga_jual" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Stok Awal</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>
            </div>

            <div class="text-end">
                <a href="index.php?module=barang&action=list" class="btn btn-secondary">Batal</a>
                <button type="submit" name="simpan" class="btn btn-primary">Simpan Barang</button>
            </div>
        </form>
    </div>
</div>