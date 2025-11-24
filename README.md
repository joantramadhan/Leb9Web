# 📦 Sistem Informasi Inventaris (Modular PHP)

Aplikasi manajemen data barang dan user sederhana yang dibangun menggunakan **PHP Native** dengan konsep **Modularisasi** dan **Routing**. Project ini dibuat untuk memenuhi tugas Praktikum Pemrograman Web.

Project ini menerapkan struktur **MVC (Model-View-Controller)** sederhana di mana tampilan (View), logika (Controller/Module), dan konfigurasi dipisahkan agar kode lebih rapi dan mudah dikembangkan.

---

## ✨ Fitur Utama

### 1. Arsitektur Modular & Routing
- Menggunakan satu titik masuk (`index.php`) untuk mengatur semua halaman.
- Struktur URL bersih: `index.php?module=barang&action=add`.
- Templating terpisah (`header.php`, `footer.php`) sehingga mudah di-maintenance.

### 2. Manajemen Data (CRUD)
- **Data Barang:** Tambah, Edit, Hapus, dan Lihat daftar barang (disertai Harga Beli/Jual & Stok).
- **Data User:** Manajemen pengguna sistem dengan enkripsi password MD5.
- **Pencarian Live:** Filter data tabel secara real-time tanpa reload halaman (JavaScript).

### 3. User Interface (UI) Premium
- **Desain Modern:** Menggunakan Bootstrap 5 dengan font *Poppins*.
- **Color Palette:** Tema *Indigo Violet & Neon Gold* yang elegan.
- **Interaktif:** - Jam Digital Real-time.
    - Notifikasi cantik menggunakan **SweetAlert2** (bukan alert browser biasa).
    - Tombol *Mini Action* yang rapi.

### 4. Keamanan
- **Session Management:** Halaman admin terkunci jika belum login.
- **Enkripsi Password:** Password user disimpan menggunakan hash MD5.

---

## 🛠️ Teknologi yang Digunakan

- **Backend:** PHP Native (v7.4 / v8.x)
- **Database:** MySQL / MariaDB
- **Frontend:** HTML5, CSS3, Bootstrap 5.3
- **Scripting:** JavaScript (Vanilla JS), SweetAlert2 Library
- **Font:** Google Fonts (Poppins)

---
## 🔐 Akun Demo
Gunakan akun berikut untuk login pertama kali:

Username: admin

Password: admin123
## 📸 Preview

![Cuplikan layar_24-11-2025_192826_localhost](https://github.com/user-attachments/assets/64ddf7df-60b3-4a14-933c-eeed8c3be795)
![Cuplikan layar_24-11-2025_192448_localhost](https://github.com/user-attachments/assets/0cba0938-26d4-4e23-a3a3-b3eb9d0dfa39)
![Cuplikan layar_24-11-2025_192754_localhost](https://github.com/user-attachments/assets/4a2fd947-c8c3-4ab1-bf47-20cb663f2871)
![Cuplikan layar_24-11-2025_19285_localhost](https://github.com/user-attachments/assets/1463d757-fed0-4205-8c65-e8fcf716d0a9)
![Cuplikan layar_24-11-2025_193456_localhost](https://github.com/user-attachments/assets/ab96ac4b-f6d2-4f00-b11b-da232c9870e7)

## 📂 Struktur Folder

```text 
project/
├── index.php           # Router Utama (Pusat Kontrol)
├── README.md           # Dokumentasi Project
├── config/
│   └── database.php    # Koneksi ke Database
├── views/
│   ├── header.php      # Template Header & Navbar
│   ├── footer.php      # Template Footer & Script JS
│   └── dashboard.php   # Halaman Utama Dashboard
├── modules/
│   ├── auth/           # Modul Login & Logout
│   ├── user/           # Modul CRUD User
│   └── barang/         # Modul CRUD Barang
└── assets/
    ├── css/            # Style CSS Kustom (Premium Theme)
    └── js/             # Script JS (Live Search, Clock, SweetAlert)
