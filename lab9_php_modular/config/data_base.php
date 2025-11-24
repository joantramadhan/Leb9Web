<?php
$host = "localhost";
$user = "root";
$pass = ""; // Sesuaikan jika ada password
$db   = "lab9_php_modular"; // Ganti dengan nama database praktikum 8

$koneksi = mysqli_connect($host, $user, $pass, $db, 8111);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>