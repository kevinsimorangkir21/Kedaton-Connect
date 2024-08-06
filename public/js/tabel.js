document.addEventListener('DOMContentLoaded', function() {
    fetch('json/hsi2024.json')
        .then((response) => response.json())
        .then((data) => {
            window.propertyData = data;
            $('#data-tabel').DataTable({
                data: window.propertyData,
                responsive: true,
                scrollX: true,
                scrollY: 400,  // Sesuaikan dengan tinggi yang diinginkan
                pageLength: 15, // Menampilkan hanya 9 baris per halaman
                lengthMenu: [[15, 20, 50, 100], [15, 20, 50, 100]], // Menu panjang halaman
                order: [[0, 'desc']], // Urutkan berdasarkan kolom 'id' secara descending
                columns: [
                    { data: 'BULAN' },
                    { data: 'NAMA' },
                    { data: 'STO' },
                    { data: 'KETERANGAN' },
                    { data: 'MITRA' },
                    { data: 'AREA' }
                ]
            });
        })
        .catch((error) => console.error("Error fetching data:", error));
});
