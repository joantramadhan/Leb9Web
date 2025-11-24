document.addEventListener("DOMContentLoaded", function() {
    
    // Fitur Jam
    const clockElement = document.getElementById('realtime-clock');
    if (clockElement) {
        setInterval(() => {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', { hour12: false });
            clockElement.innerText = timeString + " WIB";
        }, 1000);
    }

    // Fitur Search Table
    const searchInput = document.getElementById('searchUser');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('table tbody tr');
            
            rows.forEach(row => {
                let text = row.innerText.toLowerCase();
                if (text.includes(filter)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }

});

// --- FUNGSI HAPUS ---
// Fungsi ini dipanggil dari tombol hapus di list.php
function konfirmasiHapus(event, urlLink) {
    event.preventDefault(); // Mencegah link langsung bekerja

    Swal.fire({
        title: 'Yakin hapus data?',
        text: "Data akan hilang permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ef4444', // Merah (sesuai tema dark)
        cancelButtonColor: '#64748b', // Abu-abu
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal',
        background: '#1e293b', // Background dark card
        color: '#fff'          // Teks putih
    }).then((result) => {
        if (result.isConfirmed) {
            // Kalau user klik Ya, arahkan browser ke URL delete.php
            window.location.href = urlLink;
        }
    });
}