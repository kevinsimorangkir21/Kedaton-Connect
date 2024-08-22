document.addEventListener('DOMContentLoaded', function() {
    Papa.parse('/csv/hsi2024.csv', {
        header: true,  // Menggunakan baris pertama sebagai header
        download: true,
        complete: function(results) {
            console.log(results.data);  // Tambahkan ini untuk memeriksa data
            window.propertyData = results.data;

            // Inisialisasi DataTables dengan data yang diambil dari CSV
            $('#data-tabel').DataTable({
                data: window.propertyData,
                responsive: true,
                scrollX: true,
                scrollY: 400,  // Sesuaikan dengan tinggi yang diinginkan
                pageLength: 15, // Menampilkan 15 baris per halaman
                lengthMenu: [[15, 20, 50, 100], [15, 20, 50, 100]], // Menu panjang halaman
                order: [[1, 'desc']], // Urutkan berdasarkan kolom 'TGL BAGI WO' secara descending
                columns: [
                    { data: 'BULAN' },
                    { data: 'TGL BAGI WO' },
                    { data: 'NAMA PELANGGAN' },
                    { data: 'STO' },
                    { data: 'STATUS' },
                    { data: 'MITRA' },
                    { data: 'AREA' }
                ]
            });
        },
        error: function(error) {
            console.error("Error fetching CSV data:", error);
        }
    });
});
