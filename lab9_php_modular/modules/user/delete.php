<?php
// Cek apakah ada ID di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query Hapus
    $query = mysqli_query($koneksi, "DELETE FROM users WHERE id='$id'");

    if ($query) {
        echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href='index.php?module=user&action=list';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data!');
            window.location.href='index.php?module=user&action=list';
        </script>";
    }
} else {
    // Jika tidak ada ID, kembalikan ke list
    header("Location: index.php?module=user&action=list");
}
?>